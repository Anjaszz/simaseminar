
<style>
    /* Chat animations */
@keyframes slideRight {
    from {
        opacity: 0;
        transform: translateX(-20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

@keyframes slideLeft {
    from {
        opacity: 0;
        transform: translateX(20px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.slide-right {
    animation: slideRight 0.3s ease-out;
}

.slide-left {
    animation: slideLeft 0.3s ease-out;
}

/* Chatbot container styles */
#chatbot-container {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 10px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

#chatbot-icon {
    transition: transform 0.3s ease;
}

#chatbot-icon:hover {
    transform: scale(1.1);
}

/* Message styles */
.bot-message, .user-message {
    margin-bottom: 1rem;
}

/* Custom scrollbar for chat messages */
#chat-messages::-webkit-scrollbar {
    width: 6px;
}

#chat-messages::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 10px;
}

#chat-messages::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 10px;
}

#chat-messages::-webkit-scrollbar-thumb:hover {
    background: #757575;
}

/* Suggestion buttons hover effect */
.suggest-btn {
    transition: all 0.2s ease;
}

.suggest-btn:hover {
    transform: translateX(5px);
}
</style>
<div class="bg-gray-50 mt-20">  
    <!-- Hero Section with Stats -->  
    <header class="relative bg-gradient-to-r from-blue-600 to-purple-600 animate-header-gradient py-20">  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
        <div class="text-center">  
            <h1 class="animate-title text-4xl font-extrabold text-white sm:text-5xl lg:text-6xl">  
                Selamat datang, <?php echo $nama_mahasiswa; ?><span class="animate-wave">👋</span>
            </h1>  
            <p class="animate-subtitle mt-4 text-xl text-gray-100">  
                Platform Seminar Terbaik untuk Pengembangan Karirmu  
            </p>  
            <div class="animate-buttons mt-8 flex justify-center space-x-4">  
                <a href="#upcoming" class="bg-white text-blue-600 px-3 sm:px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300 transform hover:scale-105">  
                    Lihat Seminar  
                </a>  
                <a href="#about" class="bg-transparent border-2 border-white text-white px-4 sm:px-6 py-3 rounded-lg font-semibold hover:bg-white/10 transition duration-300 transform hover:scale-105">  
                    Pelajari Lebih Lanjut  
                </a>  
            </div>  
        </div>  
          
        <!-- Stats Cards -->  
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">  
            <div class="animate-stats-card stats-hover bg-white/10 backdrop-blur-lg rounded-xl p-6 text-white">  
                <div class="text-3xl font-bold"><?php echo number_format($total_seminars); ?>+</div>  
                <div class="text-gray-200">Seminar Tersedia</div>  
            </div>  
            <div class="animate-stats-card stats-hover bg-white/10 backdrop-blur-lg rounded-xl p-6 text-white">  
                <div class="text-3xl font-bold"><?php echo number_format($total_participants); ?>+</div>  
                <div class="text-gray-200">Peserta Aktif</div>  
            </div>  
            <div class="animate-stats-card stats-hover bg-white/10 backdrop-blur-lg rounded-xl p-6 text-white">  
                <div class="text-3xl font-bold"><?php echo number_format($success_rate); ?>%</div>  
                <div class="text-gray-200">Tingkat Kepuasan</div>  
            </div>  
        </div>  
    </div>  
</header>
  
    <!-- Search and Filter Section -->  
    <!-- Modifikasi bagian filter di view -->
<section class="py-8 bg-white shadow-sm">  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
        <form action="<?php echo base_url('user/home/index'); ?>" method="GET" class="space-y-4">  
            <div class="grid grid-cols-1 md:grid-cols-6 gap-2">  
                <!-- Search Bar -->  
                <div class="col-span-2">  
                    <div class="relative">  
                        <input type="text"   
                               name="search"   
                               placeholder="Cari seminar..."   
                               value="<?php echo $this->input->get('search'); ?>"  
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">  
                        <button type="submit" class="absolute right-2 top-2 text-gray-500">  
                            <i class="fas fa-search"></i>  
                        </button>  
                    </div>  
                </div>  

                <!-- Kategori Seminar -->
                <div>
                    <select name="id_kategori" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            onchange="this.form.submit()">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori_seminar as $kategori): ?>
                        <option value="<?php echo $kategori->id_kategori; ?>"
                                <?php echo ($this->input->get('id_kategori') == $kategori->id_kategori) ? 'selected' : ''; ?>>
                            <?php echo $kategori->nama_kategori; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Jenis Seminar -->
                <div>
                    <select name="id_jenis" 
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            onchange="this.form.submit()">
                        <option value="">Semua Jenis</option>
                        <?php foreach ($jenis_seminar as $jenis): ?>
                        <option value="<?php echo $jenis->id_jenis; ?>"
                                <?php echo ($this->input->get('id_jenis') == $jenis->id_jenis) ? 'selected' : ''; ?>>
                            <?php echo $jenis->nama_jenis; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Location Filter -->  
                <div>  
                    <select name="id_lokasi"   
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"  
                            onchange="this.form.submit()">  
                        <option value="">Semua Lokasi</option>  
                        <?php foreach ($lokasi_seminar as $lokasi): ?>  
                        <option value="<?php echo $lokasi->id_lokasi; ?>"   
                                <?php echo ($this->input->get('id_lokasi') == $lokasi->id_lokasi) ? 'selected' : ''; ?>>  
                            <?php echo $lokasi->nama_provinsi; ?>  
                        </option>  
                        <?php endforeach; ?>  
                    </select>  
                </div>  
  
                <!-- Price Filter -->  
                <div>  
                    <select name="price_range"   
                            class="w-full px-2 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"  
                            onchange="this.form.submit()">  
                        <option value="">Semua Harga</option>  
                        <option value="free" <?php echo ($this->input->get('price_range') == 'free') ? 'selected' : ''; ?>>Gratis</option>  
                        <option value="paid" <?php echo ($this->input->get('price_range') == 'paid') ? 'selected' : ''; ?>>Berbayar</option>  
                        <option value="0-50000" <?php echo ($this->input->get('price_range') == '0-50000') ? 'selected' : ''; ?>>Rp 0 - 50.000</option>  
                        <option value="50000-100000" <?php echo ($this->input->get('price_range') == '50000-100000') ? 'selected' : ''; ?>>Rp 50.000 - 100.000</option>  
                        <option value="100000+" <?php echo ($this->input->get('price_range') == '100000+') ? 'selected' : ''; ?>>Rp 100.000+</option>  
                    </select>  
                </div>  
            </div>

            <!-- Quick Filters -->  
            <div class="flex flex-wrap gap-3 w-full mt-4">  
                <button type="button"   
                        class="lg:px-4 px-3 py-2 bg-blue-100 text-blue-600 rounded-full hover:bg-blue-200 transition"  
                        onclick="filterNearby()">  
                    <i class="fas fa-map-marker-alt mr-2"></i>Terdekat  
                </button>  
                <button type="button"   
                        class="lg:px-4 px-3 py-2 bg-green-100 text-green-600 rounded-full hover:bg-green-200 transition"  
                        onclick="filterToday()">  
                    <i class="fas fa-calendar-day mr-2"></i>Hari Ini  
                </button>  
                <button type="button"   
                        class="lg:px-4 px-3 py-2 bg-purple-100 text-purple-600 rounded-full hover:bg-purple-200 transition"  
                        onclick="filterFree()">  
                    <i class="fas fa-ticket-alt mr-2"></i>Gratis  
                </button>  
            </div>  
        </form>  
    </div>  
</section>

    <!-- Featured Categories -->  
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="category-title text-3xl font-bold text-gray-900 mb-8">Kategori Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <!-- Teknologi -->
            <div 
                onclick="window.location.href='?id_kategori=1';" 
                class="category-card category-hover bg-blue-50 rounded-xl p-6 text-center hover:bg-blue-100 transition cursor-pointer">
                <i class="category-icon fas fa-laptop-code text-3xl text-blue-600 mb-3"></i>
                <h3 class="font-semibold">Teknologi</h3>
            </div>
            
            <!-- Bisnis -->
            <div 
                onclick="window.location.href='?id_kategori=5';" 
                class="category-card category-hover bg-green-50 rounded-xl p-6 text-center hover:bg-green-100 transition cursor-pointer">
                <i class="category-icon fas fa-chart-line text-3xl text-green-600 mb-3"></i>
                <h3 class="font-semibold">Bisnis</h3>
            </div>
            
            <!-- Desain -->
            <div 
                onclick="window.location.href='?id_kategori=11';" 
                class="category-card category-hover bg-purple-50 rounded-xl p-6 text-center hover:bg-purple-100 transition cursor-pointer">
                <i class="category-icon fas fa-paint-brush text-3xl text-purple-600 mb-3"></i>
                <h3 class="font-semibold">Desain</h3>
            </div>
            
            <!-- Kesehatan -->
            <div 
                onclick="window.location.href='?id_kategori=4';" 
                class="category-card category-hover bg-red-50 rounded-xl p-6 text-center hover:bg-red-100 transition cursor-pointer">
                <i class="category-icon fas fa-heartbeat text-3xl text-red-600 mb-3"></i>
                <h3 class="font-semibold">Kesehatan</h3>
            </div>
        </div>
    </div>
</section>

  
    <!-- Horizontal Seminar Scroll -->  
    <section id="upcoming" class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold gradient-text">Seminar Mendatang</h2>
            <p class="text-gray-600 mt-2">Seminar terdekat dalam 6 minggu ke depan</p>
            
            <?php if (empty($upcoming_seminars)): ?>
                <div class="text-center py-8">
                    <p class="text-gray-600">Belum ada seminar yang akan datang.</p>
                </div>
            <?php else: ?>
                <?php 
                    $available_seminars = array_filter($upcoming_seminars, function($s) { 
                        return !$s->is_slot_habis; 
                    });
                ?>
                <div class="text-center py-4">
                    <p class="text-gray-800 font-semibold">
                        Ada <span class="text-blue-600"><?php echo count($available_seminars); ?></span> seminar dengan kuota tersedia
                    </p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (!empty($upcoming_seminars)): ?>
        <div class="relative">
            <div class="overflow-x-auto scrollbar-hide cursor-grab active:cursor-grabbing" id="seminar-scroll">
                <div class="flex space-x-6 pb-4">
                    <?php foreach ($upcoming_seminars as $seminar): ?>
                    <div class="flex-none w-80">
                        <div class="bg-white rounded-xl card-shadow hover:shadow-xl transition-all duration-300">
                            <!-- Poster Seminar -->
                            <img src="<?php echo base_url('uploads/poster/' . $seminar->lampiran); ?>"
                                 class="w-full h-48 object-cover rounded-t-xl"
                                 alt="<?php echo $seminar->nama_seminar; ?>">
                            
                            <div class="p-6">
                                <!-- Judul Seminar -->
                                <h3 class="font-semibold text-lg mb-2 line-clamp-2">
                                    <?php echo $seminar->nama_seminar; ?>
                                </h3>
                                
                                <!-- Info Vendor -->
                                <p class="text-sm text-gray-500 mb-2">
    Oleh: <span class="text-gray-700 font-medium"><?php echo $seminar->nama_vendor; ?></span>
</p>
<div class="text-sm text-gray-500 <?php echo strtolower($seminar->nama_jenis) === 'offline' ? 'bg-purple-300' : 'bg-green-300'; ?> rounded-full py-1 px-3 w-fit mb-4">
    <p class="text-gray-600"><?php echo $seminar->nama_jenis ?? 'Tidak ada jenis'; ?></p>
</div>
                                
                                <!-- Tanggal dan Countdown -->
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-calendar mr-2"></i>
                                        <span><?php echo date('d M Y', strtotime($seminar->tgl_pelaksana)); ?></span>
                                    </div>
                                    <div class="text-sm">
                                        <?php if ($seminar->remaining_days == 0): ?>
                                            <span class="text-red-500 font-medium">Hari ini</span>
                                        <?php else: ?>
                                            <span class="text-blue-500 font-medium"><?php echo $seminar->remaining_days; ?> hari lagi</span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Progress Bar -->
                                <div class="flex items-center space-x-3 bg-gray-50 rounded-lg p-3 mb-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="h-full rounded-full transition-all duration-500
                                            <?php   
                                                if ($seminar->remaining_days <= 7) {  
                                                    echo 'bg-red-500';  
                                                } else if ($seminar->remaining_days <= 14) {  
                                                    echo 'bg-yellow-500';  
                                                } else {  
                                                    echo 'bg-green-500';  
                                                }  
                                            ?>"
                                            style="width: <?php echo number_format($seminar->progress, 0); ?>%">
                                        </div>
                                    </div>
                                </div>

                                <!-- Harga -->
                                <div class="flex flex-col items-start justify-between w-full gap-3">
                                    <?php if ($seminar->harga_tiket == 0): ?>
                                        <span class="text-green-600 font-medium px-3 py-1 bg-green-100 rounded-full text-sm">
                                            Gratis
                                        </span>
                                    <?php else: ?>
                                        <span class="text-blue-600 font-semibold">
                                            Rp <?php echo number_format($seminar->harga_tiket, 0, ',', '.'); ?>
                                        </span>
                                    <?php endif; ?>

                                    <!-- Tombol Aksi -->
                                    <div class="flex flex-row gap-3 items-center w-full">
                                        <?php if ($seminar->is_slot_habis): ?>
                                            <button class="px-4 py-2 bg-red-100 text-red-600 rounded-lg cursor-not-allowed w-full" disabled>
                                                <i class="fas fa-times"></i> Slot Penuh
                                            </button>
                                        <?php elseif ($seminar->is_registered): ?>
                                            <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg cursor-not-allowed w-full" disabled>
                                                <i class="fas fa-check"></i> Terdaftar
                                            </button>
                                        <?php else: ?>
                                            <button class="daftar-seminar px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 w-full"
                                                    data-seminar-id="<?php echo $seminar->id_seminar; ?>"
                                                    onclick="confirmRegistration('<?php echo $seminar->id_seminar; ?>')">
                                                <i class="fas fa-user-plus"></i> Daftar
                                            </button>
                                        <?php endif; ?>

                                        <a href="<?php echo base_url('user/home/detail/' . $seminar->id_seminar); ?>"
                                           class="px-4 py-2 bg-blue-500 text-white text-center rounded-lg hover:bg-blue-600 transition-colors duration-200 w-full">
                                            <i class="fas fa-info-circle"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- All Seminars Section -->  
<section class="py-12 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold gradient-text">Semua Seminar</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($seminar_data as $seminar): ?>
            <div class="bg-white rounded-xl card-shadow hover:shadow-xl transition-all duration-300">
                <img src="<?php echo base_url('uploads/poster/' . $seminar->lampiran); ?>"
                     class="w-full h-48 object-cover rounded-t-xl"
                     alt="<?php echo $seminar->nama_seminar; ?>">
                <div class="p-6">
                    <h3 class="font-semibold text-lg mb-2 line-clamp-2">
                        <?php echo $seminar->nama_seminar; ?>
                    </h3>
                    <!-- Nama Vendor -->
                    <!-- Info Vendor dan Jenis -->
<p class="text-sm text-gray-500 mb-2">
    Oleh: <span class="text-gray-700 font-medium"><?php echo $seminar->nama_vendor; ?></span>
</p>
<div class="text-sm text-gray-500 <?php echo strtolower($seminar->nama_jenis) === 'offline' ? 'bg-purple-300' : 'bg-green-300'; ?> rounded-full py-1 px-3 w-fit mb-4">
    <p class="text-gray-600"><?php echo $seminar->nama_jenis ?? 'Tidak ada jenis'; ?></p>
</div>
                   <!-- Tanggal dan Countdown -->
                   <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-calendar mr-2"></i>
                                        <span><?php echo date('d M Y', strtotime($seminar->tgl_pelaksana)); ?></span>
                                    </div>
                                    <div class="text-sm">
                                        <?php if ($seminar->remaining_days == 0): ?>
                                            <span class="text-red-500 font-medium">Hari ini</span>
                                        <?php else: ?>
                                            <span class="text-blue-500 font-medium"><?php echo $seminar->remaining_days; ?> hari lagi</span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Progress Bar -->
                                <div class="flex items-center space-x-3 bg-gray-50 rounded-lg p-3 mb-4">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="h-full rounded-full transition-all duration-500
                                            <?php   
                                                if ($seminar->remaining_days <= 7) {  
                                                    echo 'bg-red-500';  
                                                } else if ($seminar->remaining_days <= 14) {  
                                                    echo 'bg-yellow-500';  
                                                } else {  
                                                    echo 'bg-green-500';  
                                                }  
                                            ?>"
                                            style="width: <?php echo number_format($seminar->progress, 0); ?>%">
                                        </div>
                                    </div>
                                </div>

                    <!-- Price and Action Buttons -->
                    <div class="flex flex-col items-start justify-between w-full gap-3">
                    <?php if ($seminar->harga_tiket == 0): ?>
    <span class="text-green-600 font-medium px-3 py-1 bg-green-100 rounded-full text-sm">
        Gratis
    </span>
<?php else: ?>
    <span class="text-blue-600 font-semibold">
        Rp <?php echo number_format($seminar->harga_tiket, 0, ',', '.'); ?>
    </span>
<?php endif; ?>

                        <div class="flex flex-row gap-3 items-center w-full">
                            <?php if ($seminar->is_slot_habis): ?>
                                <button class="px-4 py-2 bg-red-100 text-red-600 rounded-lg cursor-not-allowed" disabled>
                                    <i class="fas fa-times"></i> Habis
                                </button>
                            <?php elseif ($seminar->is_registered): ?>
                                <button class="px-4 py-2 bg-gray-100 w-full text-gray-600 rounded-lg cursor-not-allowed" disabled>
                                    <i class="fas fa-check"></i> Diikuti
                                </button>
                            <?php else: ?>
                                <button class="daftar-seminar px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors duration-200 w-full"
        data-seminar-id="<?php echo $seminar->id_seminar; ?>">
    <i class="fas fa-user-plus"></i> Daftar
</button>
                            <?php endif; ?>

                            <a href="<?php echo base_url('user/home/detail/' . $seminar->id_seminar); ?>"
                               class="px-4 py-2 w-full bg-blue-500 text-white text-center rounded-lg hover:bg-blue-600 transition-colors duration-200">
                                <i class="fas fa-info-circle"></i> Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

  
  <!-- Why Choose Us -->  
<section class="py-12 bg-white">  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">  
        <h2 class="why-us-title text-3xl font-bold text-center text-gray-900 mb-12">
            Mengapa Memilih Kami?
        </h2>  
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">  
            <div class="feature-item text-center p-6 rounded-xl transition-all duration-300 hover:shadow-lg">  
                <div class="feature-icon-wrapper bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">  
                    <i class="fas fa-certificate text-2xl text-blue-600"></i>  
                </div>  
                <h3 class="text-xl font-semibold mb-2">Sertifikat Resmi</h3>  
                <p class="text-gray-600">Dapatkan sertifikat resmi yang diakui untuk setiap seminar yang Anda ikuti</p>  
            </div>  

            <div class="feature-item text-center p-6 rounded-xl transition-all duration-300 hover:shadow-lg">  
                <div class="feature-icon-wrapper bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">  
                    <i class="fas fa-users text-2xl text-green-600"></i>  
                </div>  
                <h3 class="text-xl font-semibold mb-2">Pembicara Ahli</h3>  
                <p class="text-gray-600">Belajar langsung dari para ahli dan praktisi terbaik di bidangnya</p>  
            </div>  

            <div class="feature-item text-center p-6 rounded-xl transition-all duration-300 hover:shadow-lg">  
                <div class="feature-icon-wrapper bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">  
                    <i class="fas fa-clock text-2xl text-purple-600"></i>  
                </div>  
                <h3 class="text-xl font-semibold mb-2">Fleksibel</h3>  
                <p class="text-gray-600">Ikuti seminar sesuai jadwal dan kebutuhan Anda</p>  
            </div>  
        </div>  
    </div>  
</section> 
  
   <!-- Testimonials -->  
<section class="py-12 bg-gray-50">  
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Apa Kata Mereka?</h2>
        
        <div class="testimonial-container">
            <div class="testimonial-track" id="testimonialTrack">
                <?php foreach ($testimonials as $index => $testimonial): ?>  
                <div class="testimonial-slide" style="animation-delay: <?php echo $index * 0.2; ?>s">
                    <div class="testimonial-card bg-white p-6 rounded-xl shadow-md h-full">  
                        <div class="flex items-center mb-4">  
                            <img 
                                src="<?php echo $testimonial['avatar']; ?>" 
                                class="w-12 h-12 rounded-full object-cover" 
                                alt="<?php echo $testimonial['name']; ?>"
                            >  
                            <div class="ml-4">  
                                <h4 class="font-semibold"><?php echo $testimonial['name']; ?></h4>  
                                <div class="rating-stars flex text-yellow-400">  
                                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>  
                                        <i class="fas fa-star"></i>  
                                    <?php endfor; ?>  
                                </div>  
                            </div>  
                        </div>  
                        <p class="text-gray-600"><?php echo $testimonial['content']; ?></p>  
                    </div>  
                </div>  
                <?php endforeach; ?>  
            </div>
        </div>
    </div>  
</section>
  
   <!-- CTA Section -->  
<section class="relative py-20 bg-gradient-to-br from-blue-600 to-purple-700 overflow-hidden cta-gradient">
    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-700 opacity-75"></div>
    
    <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="relative z-10">
            <div class="mb-8 space-y-4 cta-content cta-title">
                <h2 class="text-4xl md:text-5xl font-extrabold text-white leading-tight tracking-tight">
                    Transformasikan Seminar Anda dengan SIMAS
                </h2>
                <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto">
                    Gabung sebagai vendor dan nikmati solusi manajemen seminar tercanggih. Tingkatkan pengalaman dan efisiensi acara Anda dalam satu platform cerdas.
                </p>
            </div>

            <div class="cta-content cta-buttons flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="<?php echo base_url('/daftar/vendor'); ?>" 
                   class="cta-button w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border border-transparent text-base font-bold rounded-full text-blue-700 bg-white hover:bg-blue-50 transition-all duration-300">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Daftar Jadi Vendor Sekarang
                </a>
                <a href="<?php echo base_url('/landingVendor'); ?>" 
                   class="cta-button w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 border border-white text-base font-bold rounded-full text-white hover:bg-white/10 transition-all duration-300">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Pelajari Lebih Lanjut
                </a>
            </div>

            <div class="mt-12 flex justify-center items-center space-x-4 opacity-70 cta-content cta-features">
                <div class="cta-feature-item flex items-center text-white">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m7.5 0c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3z"></path>
                    </svg>
                    <span class="text-sm">Manajemen Seminar Profesional</span>
                </div>
                <div class="cta-feature-item flex items-center text-white">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span class="text-sm">Keuntungan Finansial Maksimal</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Shapes -->
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden">
        <div class="cta-blur absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl transform -translate-x-1/2 -translate-y-1/2"></div>
        <div class="cta-blur absolute bottom-0 left-0 w-80 h-80 bg-white/10 rounded-full blur-3xl transform translate-x-1/2 translate-y-1/2"></div>
    </div>
</section>
  
 <!-- Chatbot Icon -->
<div id="chatbot-icon" class="fixed bottom-6 right-6 bg-blue-600 w-14 h-14 rounded-full flex items-center justify-center cursor-pointer shadow-lg hover:bg-blue-700 transition-all z-50">
    <i class="fas fa-comment-dots text-white text-2xl"></i>
</div>

<!-- Chatbot Interface -->
<div id="chatbot-container" class="fixed bottom-24 right-6 w-96 bg-white rounded-lg shadow-xl hidden z-50">
    <!-- Chat Header -->
    <div class="bg-blue-600 text-white p-4 rounded-t-lg flex justify-between items-center">
        <div class="flex items-center">
            <i class="fas fa-robot mr-2"></i>
            <span class="font-semibold">AI Assistant</span>
        </div>
        <button id="close-chat" class="text-white hover:text-gray-200">
            <i class="fas fa-times"></i>
        </button>
    </div>
    
    <!-- Chat Messages -->
    <div id="chat-messages" class="p-4 h-80 overflow-y-auto bg-gray-50">
        <!-- Initial greeting and suggestions -->
        <div class="bot-message mb-4">
            <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3 max-w-[80%]">
                    <p class="text-gray-800">Halo! Ada yang bisa saya bantu?</p>
                </div>
            </div>
        </div>
        
        <!-- Suggested Questions -->
        <div class="suggested-questions mb-4">
            <p class="text-sm text-gray-500 mb-2">Pertanyaan yang sering ditanyakan:</p>
            <div class="flex flex-col gap-2">
                <button class="suggest-btn text-left px-3 py-2 bg-white border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                    Bagaimana cara mendaftar seminar?
                </button>
                <button class="suggest-btn text-left px-3 py-2 bg-white border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                    Apa saja seminar gratis yang tersedia?
                </button>
                <button class="suggest-btn text-left px-3 py-2 bg-white border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                    Bagaimana cara mendapatkan sertifikat seminar?
                </button>
            </div>
        </div>
    </div>
    
    <!-- Chat Input -->
    <div class="p-4 border-t">
        <form id="chat-form" class="flex gap-2">
            <input type="text" 
                   id="chat-input" 
                   class="flex-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                   placeholder="Ketik pesan...">
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-all">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>
</div>
</div>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 
<script>  
document.addEventListener('DOMContentLoaded', function() {
    const daftarButtons = document.querySelectorAll('.daftar-seminar');
    
    daftarButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const seminarId = this.dataset.seminarId;
            
            Swal.fire({
                title: 'Konfirmasi Pendaftaran',
                text: 'Apakah Anda yakin ingin mendaftar ke seminar ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Daftar!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cek status login
                    const isLoggedIn = <?php echo $this->session->userdata('user_data') ? 'true' : 'false'; ?>;
                    
                    if (!isLoggedIn) {
                        Swal.fire({
                            title: 'Login Diperlukan',
                            text: 'Anda harus login terlebih dahulu untuk mendaftar seminar',
                            icon: 'info',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Login Sekarang',
                            cancelButtonText: 'Nanti Saja'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '<?php echo base_url('user/auth'); ?>';
                            }
                        });
                    } else {
                        window.location.href = '<?php echo base_url('user/home/daftar/'); ?>' + seminarId;
                    }
                }
            });
        });
    });
});
// Tambahkan event listener untuk tombol daftar
document.addEventListener('DOMContentLoaded', function() {
    const daftarButtons = document.querySelectorAll('.daftar-seminar');
    daftarButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const seminarId = this.getAttribute('data-seminar-id');
            confirmRegistration(seminarId);
        });
    });
});
// Smooth scrolling untuk seminar cards
const scrollContainer = document.getElementById('seminar-scroll');
let isDown = false;
let startX;
let scrollLeft;

scrollContainer.addEventListener('mousedown', (e) => {
    isDown = true;
    scrollContainer.style.cursor = 'grabbing';
    startX = e.pageX - scrollContainer.offsetLeft;
    scrollLeft = scrollContainer.scrollLeft;
});

scrollContainer.addEventListener('mouseleave', () => {
    isDown = false;
    scrollContainer.style.cursor = 'grab';
});

scrollContainer.addEventListener('mouseup', () => {
    isDown = false;
    scrollContainer.style.cursor = 'grab';
});

scrollContainer.addEventListener('mousemove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - scrollContainer.offsetLeft;
    const walk = (x - startX) * 2;
    scrollContainer.scrollLeft = scrollLeft - walk;
});

// Filter seminar berdasarkan lokasi, tanggal, dan harga
function filterNearby() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            const lat = position.coords.latitude;
            const lng = position.coords.longitude;

            const form = document.createElement('form');
            form.method = 'GET';
            form.action = '<?php echo base_url('user/home/index'); ?>';

            const latInput = document.createElement('input');
            latInput.type = 'hidden';
            latInput.name = 'lat';
            latInput.value = lat;

            const lngInput = document.createElement('input');
            lngInput.type = 'hidden';
            lngInput.name = 'lng';
            lngInput.value = lng;

            form.appendChild(latInput);
            form.appendChild(lngInput);
            document.body.appendChild(form);
            form.submit();
        });
    } else {
        alert('Geolocation is not supported by this browser.');
    }
}

function filterToday() {
    window.location.href = '<?php echo base_url('user/home/index'); ?>?date=today';
}

function filterFree() {
    window.location.href = '<?php echo base_url('user/home/index'); ?>?price_range=free';
}   

// Chat functionality
document.addEventListener('DOMContentLoaded', function() {
    const chatbotIcon = document.getElementById('chatbot-icon');
    const chatbotContainer = document.getElementById('chatbot-container');
    const closeChat = document.getElementById('close-chat');
    const chatForm = document.getElementById('chat-form');
    const chatInput = document.getElementById('chat-input');
    const chatMessages = document.getElementById('chat-messages');

    // Define suggested questions
    const suggestedQuestions = [
        'Bagaimana cara mendaftar seminar?',
        'Apa saja jenis seminar yang tersedia?',
        'Bagaimana cara mendapatkan sertifikat?',
        'Berapa biaya untuk mengikuti seminar?'
    ];

    // Function to create initial chat content
    function createInitialChatContent() {
        return `
            <div class="bot-message mb-4">
                <div class="flex items-start">
                    <div class="bg-blue-100 rounded-lg p-3 max-w-[80%]">
                        <p class="text-gray-800">Halo! Saya asisten SIMAS. Ada yang bisa saya bantu tentang seminar?</p>
                    </div>
                </div>
            </div>
            
            <div class="suggested-questions mb-4">
                <p class="text-sm text-gray-500 mb-2">Pertanyaan yang sering ditanyakan:</p>
                <div class="flex flex-col gap-2">
                    ${suggestedQuestions.map(question => `
                        <button class="suggest-btn text-left px-3 py-2 bg-white border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors text-sm">
                            ${question}
                        </button>
                    `).join('')}
                </div>
            </div>
        `;
    }

    // Toggle chat interface
    chatbotIcon.addEventListener('click', () => {
        chatbotContainer.classList.toggle('hidden');
        if (!chatbotContainer.classList.contains('hidden')) {
            chatInput.focus();
            chatMessages.innerHTML = createInitialChatContent();
            addSuggestionListeners();
        }
    });

    closeChat.addEventListener('click', () => {
        chatbotContainer.classList.add('hidden');
    });

    // Function to add suggestion button listeners
    function addSuggestionListeners() {
        document.querySelectorAll('.suggest-btn').forEach(button => {
            button.addEventListener('click', function() {
                const question = this.textContent.trim();
                handleUserMessage(question);
                
                // Remove suggestions after clicking
                const suggestedQuestions = document.querySelector('.suggested-questions');
                if (suggestedQuestions) {
                    suggestedQuestions.remove();
                }
            });
        });
    }

    // Function to add a message to the chat
    function addMessage(message, type) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `${type}-message mb-4 ${type === 'user' ? 'text-right' : 'text-left'}`;
        
        // Add animation classes based on message type
        const animationClass = type === 'user' ? 'slide-left' : 'slide-right';
        
        messageDiv.innerHTML = `
            <div class="flex items-start ${type === 'user' ? 'justify-end' : 'justify-start'}">
                <div class="${type === 'user' ? 'bg-blue-600 text-white' : 'bg-blue-100 text-gray-800'} 
                            rounded-lg p-3 max-w-[80%] ${animationClass}">
                    <p>${message}</p>
                </div>
            </div>
        `;
        
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Function to handle sending messages
    async function handleUserMessage(message) {
        // Show user message
        addMessage(message, 'user');
        
        // Clear input field
        chatInput.value = '';

        // Show loading indicator
        const loadingDiv = document.createElement('div');
        loadingDiv.className = 'bot-message mb-4';
        loadingDiv.innerHTML = `
            <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3">
                    <p class="text-gray-800">
                        <i class="fas fa-spinner fa-spin"></i> Mengetik...
                    </p>
                </div>
            </div>
        `;
        chatMessages.appendChild(loadingDiv);

        try {
            // Send message to backend
            const response = await fetch('<?php echo base_url("api/chat"); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message })
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            const data = await response.json();
            
            // Remove loading indicator
            loadingDiv.remove();
            
            // Show bot response
            addMessage(data.response, 'bot');

        } catch (error) {
            console.error('Error:', error);
            loadingDiv.remove();
            addMessage('Maaf, terjadi kesalahan. Silakan coba lagi.', 'bot');
        }
    }

    // Handle form submission
    chatForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        const message = chatInput.value.trim();
        
        if (!message) return;
        
        handleUserMessage(message);
    });

    // Add keypress event for better UX
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            chatForm.dispatchEvent(new Event('submit'));
        }
    });

    // Initialize chat
    chatMessages.innerHTML = createInitialChatContent();
    addSuggestionListeners();
});

// riview animasi
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('testimonialTrack');
    let currentIndex = 0;
    const slides = document.querySelectorAll('.testimonial-slide');
    const slideCount = slides.length;
    
    function nextSlide() {
        currentIndex = (currentIndex + 1) % slideCount;
        updateSlider();
    }
    
    function updateSlider() {
        const slideWidth = slides[0].offsetWidth + 32; // Width + gap
        track.style.transform = `translateX(-${currentIndex * slideWidth}px)`;
    }
    
    // Auto slide every 5 seconds
    setInterval(nextSlide, 4000);
    
    // Recalculate on window resize
    window.addEventListener('resize', updateSlider);
});
    </script>  

