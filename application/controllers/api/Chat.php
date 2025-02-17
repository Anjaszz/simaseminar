<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
    
    private $api_key = 'AIzaSyDzlzf9di9yJzpS9SW74Ga0qmSNJF1Aye0';
    private $knowledge_base;
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        header('Access-Control-Allow-Headers: Content-Type');
        
        // Initialize knowledge base
        $this->knowledge_base = [
            'general' => [
                'about' => 'SIMAS adalah platform manajemen seminar yang memudahkan mahasiswa untuk mencari dan mendaftar seminar yang sesuai dengan minat mereka. Platform ini menyediakan berbagai jenis seminar, baik online maupun offline.',
                'benefits' => 'Keuntungan menggunakan SIMAS: mendapatkan sertifikat resmi, belajar dari pembicara ahli, dan fleksibilitas dalam memilih jadwal seminar.',
                'features' => 'Fitur utama SIMAS meliputi: pencarian seminar berdasarkan kategori, jenis, dan lokasi, sistem pendaftaran online, manajemen sertifikat, dan sistem pembayaran terintegrasi.'
            ],
            'registration' => [
                'how_to' => 'Untuk mendaftar seminar: 1. Login ke akun SIMAS Anda, 2. Pilih seminar yang diminati, 3. Klik tombol "Daftar", 4. Ikuti instruksi pembayaran (jika berbayar), 5. Tunggu konfirmasi pendaftaran',
                'requirements' => 'Syarat mendaftar seminar: - Memiliki akun SIMAS, - Melengkapi profil, - Memenuhi persyaratan khusus seminar (jika ada)',
                'payment' => 'SIMAS menerima pembayaran melalui transfer bank dan e-wallet. Setelah pembayaran dikonfirmasi, Anda akan menerima notifikasi.'
            ],
            'seminars' => [
                'types' => 'SIMAS menyediakan berbagai jenis seminar: - Online (webinar), - Offline (tatap muka), - Hybrid (kombinasi online dan offline)',
                'categories' => 'Kategori seminar di SIMAS: - Teknologi, - Bisnis, - Desain, - Kesehatan, dan kategori lainnya.',
                'pricing' => 'Harga seminar bervariasi: - Gratis, - Rp 0 - 50.000, - Rp 50.000 - 100.000, - Rp 100.000+'
            ],
            'certificates' => [
                'info' => 'Setiap peserta yang telah mengikuti seminar akan mendapatkan sertifikat resmi yang dapat diunduh melalui platform SIMAS.',
                'requirements' => 'Untuk mendapatkan sertifikat: 1. Hadir dalam seminar, 2. Mengisi form feedback, 3. Memenuhi persyaratan khusus seminar',
                'download' => 'Sertifikat dapat diunduh melalui menu "Sertifikat Saya" setelah seminar selesai dan semua persyaratan terpenuhi.'
            ]
        ];
    }

    public function index() {
        $input = json_decode(file_get_contents('php://input'), true);
        $message = isset($input['message']) ? $input['message'] : '';

        if (empty($message)) {
            $this->send_error('No message provided');
            return;
        }

        try {
            $response = $this->getGeminiResponse($message);
            
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode([
                    'status' => 'success',
                    'response' => $response
                ]));
        } catch (Exception $e) {
            log_message('error', 'Gemini API Error: ' . $e->getMessage());
            $this->send_error('Failed to get response from AI');
        }
    }

    private function getGeminiResponse($message) {
        // Create context from knowledge base
        $context = "Kamu adalah asisten AI untuk platform SIMAS (Sistem Informasi Manajemen Seminar). " .
                  "Gunakan informasi berikut ini untuk menjawab pertanyaan user. " .
                  "Jawab dengan sopan dan informatif. Jika ada informasi yang tidak ada dalam konteks, " .
                  "katakan bahwa kamu tidak memiliki informasi tersebut. " .
                  "Berikut adalah informasi tentang SIMAS:\n\n";

        // Add knowledge base to context
        foreach ($this->knowledge_base as $category => $items) {
            $context .= "=== " . strtoupper($category) . " ===\n";
            foreach ($items as $key => $value) {
                $context .= "- " . $value . "\n";
            }
            $context .= "\n";
        }

        // Add the user's question
        $context .= "\nPertanyaan user: " . $message . "\n\n" .
                   "Tolong jawab pertanyaan tersebut berdasarkan informasi yang diberikan di atas. " .
                   "Berikan jawaban yang ringkas dan to the point.";

        // Endpoint Gemini API
        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=' . $this->api_key;
        
        // Data for Gemini
        $data = [
            'contents' => [
                [
                    'parts' => [
                        [
                            'text' => $context
                        ]
                    ]
                ]
            ],
            'generationConfig' => [
                'temperature' => 0.7,
                'topK' => 40,
                'topP' => 0.95,
                'maxOutputTokens' => 1024,
            ]
        ];

        // Initialize cURL
        $ch = curl_init($url);
        
        // Set cURL options
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($data),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ]);

        // Execute request
        $response = curl_exec($ch);
        
        // Check for cURL errors
        if (curl_errno($ch)) {
            throw new Exception('Curl error: ' . curl_error($ch));
        }
        
        // Close cURL connection
        curl_close($ch);
        
        // Decode response
        $responseData = json_decode($response, true);
        
        // Get response text
        if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
            return $responseData['candidates'][0]['content']['parts'][0]['text'];
        } else {
            if (isset($responseData['error'])) {
                throw new Exception($responseData['error']['message'] ?? 'Unknown error from Gemini API');
            }
            throw new Exception('Invalid response format from Gemini API');
        }
    }

    private function send_error($message) {
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode([
                'status' => 'error',
                'message' => $message
            ]));
    }
}