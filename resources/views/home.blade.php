@extends('layouts.app')

@section('title', 'Sistem PKL - BOE Malang')

@section('content')
    <!-- Hero Section -->
    <section class="relative flex justify-center items-center text-white overflow-hidden min-h-screen">
        <div 
            class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0"
            style="background-image: url('{{ asset('img/homepage.jpg') }}');"
        ></div>
        
        <!-- Overlay warna primary dengan opacity -->
        <div class="absolute inset-0 bg-primary z-10 opacity-60"></div>

        <!-- Content harus pakai relative z-20 -->
        <div class="relative z-20 mb-20">
            <div class="container mx-auto px-4 text-center">
                <!-- Heading dengan animasi -->
                <h2 class="text-3xl md:text-4xl font-bold mb-4 transform translate-y-8 opacity-0 animate-fade-in-up">
                    SELAMAT DATANG DI SISTEM PKL <br>
                    BBPPMPV-BOE MALANG
                </h2>
                
                <!-- Buttons dengan animasi delayed -->
                <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('pendaftaran.form') }}"
                        class="border-2 border-white text-white px-6 py-3 rounded-lg font-medium hover:bg-white hover:text-primary transition duration-300 transform translate-y-8 opacity-0 animate-fade-in-up animation-delay-500">
                        Daftar Sekarang
                    </a>
                    <a href="{{ route('requirements') }}"
                        class="bg-white text-primary px-6 py-3 rounded-lg font-medium hover:bg-gray-100 transition duration-300 transform translate-y-8 opacity-0 animate-fade-in-up animation-delay-700">
                        Syarat PKL
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Departments Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 mb-16">
            <div class="max-w-4xl mx-auto text-center">
                <h3 class="text-3xl md:text-4xl font-bold text-primary mb-6">
                    BBPPMPV BOE Malang
                </h3>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-10">
                    adalah pusat pengembangan mutu vokasi di bidang otomotif dan elektronika.
                    Kami menyediakan program PKL untuk siswa SMK dari seluruh Indonesia dengan 
                    fasilitas modern dan pembimbing yang berpengalaman.
                </p>
            </div>
        </div>

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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Facilities Section -->
    <section class="py-16 bg-blue-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">
                Fasilitas
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
                        <i class="fas fa-leaf text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Lingkungan Asri dan Bersih</h3>
                    <p class="text-gray-600">
                        Lingkungan yang hijau dan terjaga kebersihannya, 
                        ideal untuk mendukung proses belajar praktik siswa.
                    </p>
                </div>
            </div>
        </div>
    </section>
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
