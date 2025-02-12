<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dotenv\Dotenv;
require_once FCPATH . 'vendor/autoload.php';
require_once APPPATH . 'third_party/Midtrans/Midtrans.php';




class Payment extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('user_data')) {
            redirect('user/auth');
        }
        $this->load->model('ModelPayment');
        $dotenv = Dotenv::createImmutable(FCPATH);
        $dotenv->load();
        \Midtrans\Config::$serverKey = getenv('MIDTRANS_SERVER_KEY');
        \Midtrans\Config::$isProduction = true;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;
    }
    
    public function bayar($id_seminar) {
        $logged_in_user_id = $this->session->userdata('id_mahasiswa');
        $paymentData = $this->ModelPayment->getPaymentDataBySeminar($id_seminar, $logged_in_user_id);
        
        if ($paymentData) {
            $full_name = explode(' ', $paymentData->nama_mhs, 2);
            $first_name = $full_name[0];
            $last_name = isset($full_name[1]) ? $full_name[1] : '';
            $order_id = 'order_' . time() . '_' . $paymentData->id_pendaftaran;
            
            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_id,
                    'gross_amount' => $paymentData->harga_tiket,
                ),
                'customer_details' => array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'email' => $paymentData->email,
                    'phone' => $paymentData->no_telp,
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            
            $data['snap_token'] = $snapToken;
            $data['id_seminar'] = $id_seminar;
            $data['id_pendaftaran'] = $paymentData->id_pendaftaran;
            $data['paymentData'] = $paymentData;
            
            $this->load->view('template/user/header', $data);
            $this->load->view('payment_view', $data);
            $this->load->view('template/user/footer', $data);
        } else {
            show_404();
        }
    }
    
    public function confirm_payment() {
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            log_message('debug', 'Received payment confirmation input: ' . json_encode($input));
            
            if (!isset($input['id_pendaftaran']) || !isset($input['status'])) {
                log_message('error', 'Missing required parameters');
                throw new Exception('Parameter tidak lengkap');
            }
            
            $id_pendaftaran = $input['id_pendaftaran'];
            $status = $input['status'];
            
            // Validate input
            if (!is_numeric($id_pendaftaran) || !is_numeric($status)) {
                log_message('error', 'Invalid parameter types');
                throw new Exception('Format parameter tidak valid');
            }
            
            if ($this->ModelPayment->updatePaymentStatus($id_pendaftaran, $status)) {
                echo json_encode([
                    'success' => true,
                    'message' => 'Pembayaran berhasil diproses'
                ]);
            } else {
                throw new Exception('Gagal memperbarui status pembayaran');
            }
            
        } catch (Exception $e) {
            log_message('error', 'Payment confirmation error: ' . $e->getMessage());
            echo json_encode([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
}