
    <style>
        /* Chat animations */
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .animate-gradient {
            background: linear-gradient(-45deg, #3b82f6, #4f46e5, #2563eb, #1e40af);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }

        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .glass-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .pricing-card {
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.98);
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.1);
        }

        body {
            background: linear-gradient(135deg, #f0f7ff 0%, #ffffff 100%);
        }

        /* Image Modal Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeOut {
            from { opacity: 1; }
            to { opacity: 0; }
        }
        
        .poster-image {
            transition: transform 0.3s ease;
        }
        
        .poster-image:hover {
            transform: scale(1.02);
        }

        .modal-open {
            overflow: hidden;
        }

        #imageModal {
            transition: opacity 0.3s ease-in-out;
        }

        #modalImage {
            max-height: 90vh;
            object-fit: contain;
        }

        .zoom-in {
            animation: zoomIn 0.3s ease-out;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.95);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }
        /* Image Modal Styles */
#modalImage {
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    transition: transform 0.3s ease-out;
}

.zoom-in {
    animation: zoomIn 0.3s ease-out;
}

@keyframes zoomIn {
    from {
        transform: scale(0.95);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

.modal-content {
    position: relative;
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(10px);
    border-radius: 0.5rem;
    overflow: hidden;
}

#imageModal .shadow-2xl {
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
}
    </style>
</head>

<body class="h-full">

<!-- Modal untuk popup gambar -->
<div id="imageModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black bg-opacity-75 transition-opacity"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="relative max-w-4xl w-auto"> <!-- Ubah w-full menjadi w-auto -->
            <!-- Tombol close -->
            <button id="closeModal" class="absolute -top-10 right-0 text-white hover:text-gray-300 transition-colors">
            
            </button>
            <!-- Gambar -->
            <div class="relative inline-block"> <!-- Tambahkan inline-block -->
                <img id="modalImage" src="" alt="Poster Seminar" 
                     class="max-h-[85vh] object-contain rounded-lg shadow-2xl zoom-in border-4 border-white/20">
                <div class="absolute inset-0 rounded-lg ring-4 ring-white/10 ring-offset-2 ring-offset-black/20"></div>
            </div>
        </div>
    </div>
</div>
<!-- Content -->
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
    <section class="py-8 bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="<?php echo base_url('user/home/index'); ?>" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-6 gap-2">
                    <!-- Search Bar -->
                    <div class="col-span-2">
                        <div class="relative">
                            <input type="text" name="search" placeholder="Cari seminar..."
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
                            Ada <span class="text-blue-600"><?php echo count($available_seminars); ?></span> seminar mendatang
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
                                     class="w-full h-48 object-cover rounded-t-xl cursor-pointer hover:opacity-90 transition-opacity poster-image"
                                     alt="<?php echo $seminar->nama_seminar; ?>"
                                     data-src="<?php echo base_url('uploads/poster/' . $seminar->lampiran); ?>"
                                     onclick="showImage(this)">
                                
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
                                                <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-600 rounded-lg cursor-not-allowed w-full" disabled>
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
                    <!-- Poster Seminar dengan popup -->
                    <img src="<?php echo base_url('uploads/poster/' . $seminar->lampiran); ?>"
                         class="w-full h-48 object-cover rounded-t-xl cursor-pointer hover:opacity-90 transition-opacity poster-image"
                         alt="<?php echo $seminar->nama_seminar; ?>"
                         data-src="<?php echo base_url('uploads/poster/' . $seminar->lampiran); ?>"
                         onclick="showImage(this)">
                    
                    <div class="p-6">
                        <h3 class="font-semibold text-lg mb-2 line-clamp-2">
                            <?php echo $seminar->nama_seminar; ?>
                        </h3>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Fungsi untuk popup gambar
const imageModal = document.getElementById('imageModal');
const modalImage = document.getElementById('modalImage');
const closeModal = document.getElementById('closeModal');

function showImage(element) {
    const imageSrc = element.getAttribute('data-src');
    
    // Preload gambar untuk mendapatkan dimensi asli
    const img = new Image();
    img.src = imageSrc;
    
    img.onload = function() {
        modalImage.src = imageSrc;
        imageModal.classList.remove('hidden');
        
        // Sesuaikan ukuran gambar dengan aspect ratio asli
        const viewportHeight = window.innerHeight * 0.85; // 85vh
        const aspectRatio = this.width / this.height;
        
        if (this.height > viewportHeight) {
            modalImage.style.height = `${viewportHeight}px`;
            modalImage.style.width = `${viewportHeight * aspectRatio}px`;
        } else {
            modalImage.style.height = `${this.height}px`;
            modalImage.style.width = `${this.width}px`;
        }
        
        // Tambahkan animasi
        imageModal.style.animation = 'fadeIn 0.3s ease-in-out';
        modalImage.classList.add('zoom-in');
        
        // Prevent scroll pada body
        document.body.classList.add('modal-open');
        document.body.style.overflow = 'hidden';
    };
}
// Tutup modal dengan tombol close
closeModal.addEventListener('click', () => {
    closeImageModal();
});

// Tutup modal ketika klik di luar gambar
imageModal.addEventListener('click', (e) => {
    if (e.target.closest('#modalImage')) return;
    closeImageModal();
});

// Tutup modal dengan tombol ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        closeImageModal();
    }
});

function closeImageModal() {
    // Tambahkan animasi fade out
    imageModal.style.animation = 'fadeOut 0.3s ease-in-out';
    modalImage.classList.remove('zoom-in');
    
    setTimeout(() => {
        imageModal.classList.add('hidden');
        // Kembalikan scroll pada body
        document.body.classList.remove('modal-open');
        document.body.style.overflow = 'auto';
    }, 250);
}

// Pendaftaran Seminar
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

// Scroll horizontal untuk seminar cards
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

// Filter functions
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
</script>