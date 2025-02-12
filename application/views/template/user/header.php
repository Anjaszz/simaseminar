<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Simaseminar – Solusi Manajemen Seminar & Webinar</title>
    <title>SIMAS</title>  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <script src="https://cdn.tailwindcss.com"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">  
    <link rel="icon" type="image/x-icon" href="assets/logo.svg">
    <link href="<?= base_url('assets/css/animation-user-home.css'); ?>" rel="stylesheet">
    <meta name="description" content="Simaseminar adalah platform manajemen seminar berbasis web yang membantu peserta menemukan dan mendaftar seminar dengan mudah. Vendor dapat mengelola acara, registrasi, dan sertifikat secara otomatis dalam satu sistem efisien. Kunjungi sekarang">
    <meta property="og:title" content="Simaseminar – Solusi Manajemen Seminar & Webinar">
<meta property="og:description" content="Kelola seminar dengan mudah! Simaseminar membantu peserta menemukan dan mendaftar seminar, serta mempermudah vendor mengelola acara, registrasi, dan sertifikat secara otomatis.">
<meta property="og:image" content="https://simaseminar.web.id/assets/backend/template/assets/images/SIMAS.png">
<meta property="og:url" content="https://simaseminar.web.id">
<meta property="og:type" content="website">
<meta name="keywords" content="manajemen seminar, platform seminar, pendaftaran seminar, event management, sertifikat online, webinar, Simaseminar">
<meta name="robots" content="index, follow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/fav.png') ?>" />
    <style>
       .navbar {
    background: white; /* Gradien dari biru muda ke biru */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.9); 
}

.navbar-nav .nav-link.active {
    color: black !important;
    border-bottom: 2px solid #007bff;
    padding-bottom: 0.5rem;
}

.navbar-nav .nav-link:hover {
    color: #007bff !important;
}


.profile-icon {
    margin-left: auto;
}


#profileButton {
    border: 2px solid #828282; /* Border abu-abu */
    border-radius: 8px; /* Membuat sudut border menjadi kotak dengan radius yang halus */
    padding: 5px 10px; /* Ruang di dalam tombol */
    background-color: transparent; /* Latar belakang transparan mengikuti navbar */
    color: #828282; /* Warna teks/icon */
    box-shadow: none; /* Menghilangkan shadow pada klik */
}

#profileButton i {
    margin-right: 3px; /* Jarak antara icon dan teks */
}

#profileButton:hover {
    background-color: transparent; /* Efek latar belakang saat dihover, transparan */
    
}



.welcome {
    text-align: center;
    margin-top: 20px;
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-title {
    font-weight: bold;
}

.card-text {
    margin-bottom: 5px;
}

.navbar-nav .nav-link {
    margin-right: 15px; /* Jarak antar link */
}

.profile-icon .nav-link {
    font-weight: bold; /* Memberikan penekanan pada link profil */
}

header {
    background-color: #007bff; /* Warna latar belakang biru */
}

.sticky-top {
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    z-index: 1030; /* pastikan navbar tetap di atas elemen lain */
}

.badge-gradient {
    background: linear-gradient(135deg, #808080, #b0b0b0); /* Warna abu-abu gradient */
    color: white; /* Warna teks badge */
}

.navbar-nav .nav-link.active {
    color: #007bff !important; /* Warna biru */
    font-weight: bold; /* Opsional: membuat teks lebih tebal */
}




    </style>
    <!-- Di header view -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Tambahkan ini di template view, sebelum closing body tag -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    <?php if($this->session->flashdata('swal_icon')): ?>
    Swal.fire({
        icon: '<?= $this->session->flashdata('swal_icon') ?>',
        title: '<?= $this->session->flashdata('swal_title') ?>',
        text: '<?= $this->session->flashdata('swal_text') ?>',
        timer: 2000,
        showConfirmButton: false
    });
    <?php endif; ?>
});
</script>

<body>



