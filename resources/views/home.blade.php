@extends('layouts.app')

@section('title', 'Sistem PKL - BOE Malang')

@section('content')

    <!-- Header -->
    <header id="navbar" class="fixed top-0 left-0 w-full z-[999] bg-transparent transition-all duration-300">
        <div class="w-full flex justify-between items-center px-5 py-5">
            <!-- Logo -->
            <img src="./src/img/logo-putih.png" alt="Logo" class="h-20" id="logo" />

            <!-- Navbar -->
            <nav class="hidden md:block">
                <ul class="flex space-x-8">
                    <li>
                        <a href="#" class="nav-link text-white font-medium hover:text-blue-200 transition">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('pendaftaran.form') }}"
                            class="nav-link text-white hover:text-blue-200 transition">
                            Daftar PKL 2025
                        </a>
                    </li>
                </ul>
            </nav>

            <!-- Hamburger -->
            <button class="md:hidden text-white">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </header>
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-800 to-blue-600 text-white pt-40 pb-16">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">
                Selamat Datang di Sistem Penerimaan Siswa/Mahasiswa PKL BBPPMPV BOE
                Malang
            </h2>
            <p class="text-lg md:text-xl max-w-3xl mx-auto mb-8">
                Pusat pengembangan mutu vokasi di bidang otomotif dan elektronika.
                Kami menyediakan program untuk siswa siswi dari seluruh Indonesia
                dengan fasilitas modern dan pembimbing yang berpengalaman.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#"
                    class="bg-white text-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300">
                    Program Kami
                </a>
                <a href="{{ route('pendaftaran.form') }}"
                    class="border-2 border-white text-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-blue-600 transition duration-300">
                    Daftar Sekarang
                </a>
            </div>

        </div>
    </section>

    <!-- Departments Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                Bidang Keahlian
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Teknik Mesin -->
                <div class="department-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-40 bg-blue-800 flex items-center justify-center">
                        <i class="fas fa-cogs text-5xl text-yellow-400"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Teknik Mesin</h3>
                        <p class="text-gray-600 mb-4">
                            Program keahlian yang memfokuskan pada perancangan, pembuatan,
                            dan pemeliharaan mesin industri. Siswa akan mempelajari teknik
                            manufacturing, CAD/CAM, dan pneumatik.
                        </p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                            Selengkapnya
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Listrik dan Elektronika -->
                <div class="department-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-40 bg-blue-800 flex items-center justify-center">
                        <i class="fas fa-bolt text-5xl text-yellow-400"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            Listrik dan Elektronika
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Program keahlian yang membahas instalasi listrik, sistem kontrol
                            elektronik, dan robotika. Siswa akan dilatih untuk menjadi
                            teknisi listrik dan elektronika yang kompeten.
                        </p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                            Selengkapnya
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Teknik Otomotif -->
                <div class="department-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-40 bg-blue-800 flex items-center justify-center">
                        <i class="fas fa-car text-5xl text-yellow-400"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            Teknik Otomotif
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Program keahlian yang fokus pada teknologi kendaraan bermotor.
                            Siswa akan mempelajari mesin kendaraan, sistem kelistrikan
                            otomotif, dan manajemen bengkel.
                        </p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                            Selengkapnya
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>

                <!-- Teknologi Informasi -->
                <div class="department-card bg-white rounded-xl shadow-md overflow-hidden transition duration-300">
                    <div class="h-40 bg-blue-800 flex items-center justify-center">
                        <i class="fas fa-laptop-code text-5xl text-yellow-400"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">
                            Teknologi Informasi
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Program keahlian yang mencakup pemrograman, jaringan komputer,
                            dan pengembangan perangkat lunak. Siswa akan dibekali kemampuan
                            IT yang dibutuhkan industri.
                        </p>
                        <a href="#" class="text-blue-600 font-medium hover:text-blue-800 flex items-center">
                            Selengkapnya
                            <i class="fas fa-arrow-right ml-2 text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="py-16 bg-blue-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                Fasilitas Unggulan
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-wifi text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        Fasilitas Modern
                    </h3>
                    <p class="text-gray-600">
                        Laboratorium dan workshop dilengkapi dengan peralatan terkini
                        untuk mendukung proses pembelajaran yang efektif.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-chalkboard-teacher text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">
                        Pembimbing Berpengalaman
                    </h3>
                    <p class="text-gray-600">
                        Instruktur yang kompeten dan berpengalaman di industri siap
                        membimbing siswa hingga mahir dalam bidangnya.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-home text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Asrama Siswa</h3>
                    <p class="text-gray-600">
                        Tersedia asrama yang nyaman bagi siswa dari berbagai daerah di
                        Indonesia dengan fasilitas lengkap.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Program Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                Program Pelatihan
            </h2>

            <div class="max-w-4xl mx-auto">
                <div class="bg-blue-50 p-6 rounded-lg mb-6">
                    <h3 class="text-xl font-bold text-blue-800 mb-3">
                        Program Regular
                    </h3>
                    <p class="text-gray-700 mb-4">
                        Program pelatihan jangka panjang untuk siswa SMK dan lulusan
                        SMA/sederajat yang ingin mengembangkan kompetensi vokasi di bidang
                        otomotif dan elektronika.
                    </p>
                    <ul class="list-disc list-inside text-gray-700 pl-4">
                        <li>Durasi: 6 bulan - 1 tahun</li>
                        <li>Teori dan praktik seimbang</li>
                        <li>Sertifikasi kompetensi</li>
                        <li>Magang industri</li>
                    </ul>
                </div>

                <div class="bg-blue-50 p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-blue-800 mb-3">
                        Program Khusus & Pelatihan Singkat
                    </h3>
                    <p class="text-gray-700 mb-4">
                        Program pelatihan singkat untuk guru, instruktur, dan profesional
                        yang ingin meningkatkan keterampilan atau mendapatkan sertifikasi
                        khusus.
                    </p>
                    <ul class="list-disc list-inside text-gray-700 pl-4">
                        <li>Durasi: 1 minggu - 3 bulan</li>
                        <li>Fokus pada keterampilan spesifik</li>
                        <li>Pelatihan berbasis kompetensi</li>
                        <li>Sertifikasi nasional</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">BBPPMPV BOE Malang</h3>
                    <p class="mb-4">
                        Pusat pengembangan mutu vokasi di bidang otomotif dan elektronika
                        yang menyediakan program pelatihan berkualitas dengan fasilitas
                        modern.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-white hover:text-blue-200">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-blue-200">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="text-white hover:text-blue-200">
                            <i class="fab fa-youtube text-lg"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-4">Kontak Kami</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Jl. Contoh Alamat No. 123, Malang, Jawa Timur</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-phone-alt mt-1 mr-3"></i>
                            <span>(0341) 123456</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-envelope mt-1 mr-3"></i>
                            <span>info@bbppmpvboe-malang.ac.id</span>
                        </li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-blue-200">Pendaftaran</a></li>
                        <li><a href="#" class="hover:text-blue-200">Program Studi</a></li>
                        <li><a href="#" class="hover:text-blue-200">Fasilitas</a></li>
                        <li><a href="#" class="hover:text-blue-200">Berita</a></li>
                        <li><a href="#" class="hover:text-blue-200">Galeri</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-700 mt-8 pt-8 text-center">
                <p>&copy; 2023 BBPPMPV BOE Malang. All rights reserved.</p>
            </div>
        </div>
    </footer>
@endsection

@push('scripts')
    <script>
        const navbar = document.getElementById("navbar");
        const links = document.querySelectorAll(".nav-link");
        const logo = document.getElementById("logo");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 50) {
                navbar.classList.remove("bg-transparent");
                navbar.classList.add("bg-blue-800", "shadow-md");

                links.forEach((link) => {
                    link.classList.remove("text-white", "hover:text-blue-200");
                    link.classList.add("text-white", "hover:text-yellow-300");
                });

                logo.src = "{{ asset('img/logo-putih.png') }}";
            } else {
                navbar.classList.remove("bg-blue-800", "shadow-md");
                navbar.classList.add("bg-transparent");

                links.forEach((link) => {
                    link.classList.remove("text-white", "hover:text-yellow-300");
                    link.classList.add("text-white", "hover:text-blue-200");
                });

                logo.src = "{{ asset('img/logo-putih.png') }}";
            }
        });
    </script>
@endpush
