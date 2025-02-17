<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller

{
    protected $admin_email; // Variabel kelas untuk menyimpan email admin

   

    public function __construct()
    {
        parent::__construct();
        // Cek apakah user sudah login, jika belum arahkan ke login
        if (!$this->session->userdata('admin_id')) {
            redirect('master/auth');
        }
        // Load model untuk mengambil data total
        $this->load->model('Home_model');
        $this->load->model('Laporan_master_model');
    
        // Ambil admin_id dari session
        $admin_id = $this->session->userdata('admin_id');
    
        // Set admin email as class property
        $this->admin_email = $this->Home_model->get_email_by_admin_id($admin_id);
    }


    public function index()
    {
        $title = 'Home';
        $mahasiswa = anchor('mahasiswa', 'Data Mahasiswa');
        $fakultas = anchor('fakultas', 'Data Fakultas');
        $prodi = anchor('prodi', 'Data Prodi');
        $jenjang = anchor('jenjang', 'Data Jenjang');
        $box = $this->info_box();
        $monthly_income = $this->Laporan_master_model->get_monthly_income();
    
        $data = array(
            'mahasiswa' => $mahasiswa,
            'fakultas' => $fakultas,
            'prodi' => $prodi,
            'jenjang' => $jenjang,
            'title' => $title,
            'box' => $box,
            'monthly_income' => $monthly_income,
            'admin_email' => $this->admin_email, // Add admin email to data array
        );
    
        $this->template->load('master/template/template_v', 'master/home', $data);
    }



    public function info_box()
    {
        $box = [
            [
                'color'         => 'green',
                'total'     => $this->Home_model->total('mahasiswa'), // Memanggil method total dari model
                'title'        => 'Total Peserta',
                'icon'        => 'users',
                'link' => site_url('mahasiswa')
            ],
            [
                'color'         => 'blue',
                'total'     => $this->Home_model->total('users'), // Memanggil method total dari model
                'title'        => 'Total Vendor',
                'icon'        => 'poll',
                'link' => site_url('master/vendor')
            ],
            
            [
                'color'         => 'yellow',
                'total'     => $this->Home_model->total('seminar'), // Memanggil method total dari model
                'title'        => 'Total Seminar',
                'icon'        => 'layer-group',
                'link' => site_url('master/home')
            ],
            [
                'color'         => 'red',
                'total'     => $this->Laporan_master_model->total_pemasukan(), // Memanggil method total dari model
                'title'        => 'Total Pemasukan',
                'icon'        => 'money-bill-wave',
                'link' => site_url('master/laporan/keuangan')
            ],
        ];
        $info_box = json_decode(json_encode($box), FALSE);
        return $info_box;
    }
}
