@extends('layouts.app')

@section('title', 'Sistem PKL - BOE Malang')

@section('content')

    <!-- Hero Section -->
    <section class="relative flex justify-center items-center text-white overflow-hidden min-h-screen">
        <div 
            class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0"
            style="background-image: url('{{ asset('img/requirements.jpg') }}');"
        ></div>
        
        <!-- Overlay warna primary dengan opacity -->
        <div class="absolute inset-0 bg-primary z-10 opacity-60"></div>

        <!-- Content harus pakai relative z-20 -->
        <div class="relative z-20 mb-20">
            <div class="container mx-auto px-4 text-center">
                <!-- Heading dengan animasi -->
                <h2 class="text-3xl md:text-4xl font-bold mb-4 transform translate-y-8 opacity-0 animate-fade-in-up">
                    SYARAT PKL 
                </h2>

            </div>
        </div>
    </section>

    {{-- SYARAT PKL --}}
    <section id="syarat" class="py-16 bg-primary">
        <div class="container mx-auto px-4">

            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    SYARAT PKL
                </h2>
                <div class="w-40 h-3 rounded-2xl bg-white mx-auto"></div>
                <p class="text-white/80 text-lg mt-4 max-w-2xl mx-auto">
                    Persyaratan yang harus dipenuhi oleh siswa SMK untuk mengikuti program 
                    Praktik Kerja Lapangan (PKL) di BBPPMPV BOE Malang
                </p>
            </div>


            <div class="flex flex-col lg:flex-row gap-8 items-start mb-10">

                {{-- <!-- Persyaratan Umum --}}
                <div class="w-full lg:flex-1 bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-list-check text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Persyaratan Umum</h3>
                    </div>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Siswa aktif SMK kelas XI atau XII</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Bidang keahlian sesuai dengan program studi di BBPPMPV BOE</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Memiliki surat pengantar dari sekolah</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Mendapat persetujuan dari orang tua/wali</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Berbadan sehat (dibuktikan dengan surat keterangan sehat)</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Tidak sedang menjalani sanksi akademik atau non-akademik</span>
                        </li>
                    </ul>
                </div>

                {{-- <!-- Dokumen yang Diperlukan  --}}
                <div class="w-full lg:flex-1 bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-file-alt text-white text-xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800">Dokumen yang Diperlukan</h3>
                    </div>
                    
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-file-pdf text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Surat pengantar dari sekolah asal</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-file-pdf text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Fotokopi KK</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-file-pdf text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Surat keterangan sehat dari dokter</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-file-pdf text-red-500 mt-1 mr-3"></i>
                            <span class="text-gray-700">Pas foto 3x4 (2 lembar, background merah)</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Prosedur Pendaftaran -->
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-center mb-8">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                        <i class="fas fa-clipboard-list text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800">Prosedur Pendaftaran</h3>
                </div>

                <div class="grid md:grid-cols-4 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">1</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Registrasi Online</h4>
                        <p class="text-gray-600 text-sm">Isi formulir pendaftaran melalui website</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">2</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Upload Dokumen</h4>
                        <p class="text-gray-600 text-sm">Upload semua dokumen yang diperlukan</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">3</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Verifikasi</h4>
                        <p class="text-gray-600 text-sm">Tunggu verifikasi email dari admin</p>
                    </div>

                    <div class="text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-blue-600 font-bold text-xl">4</span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-2">Konfirmasi</h4>
                        <p class="text-gray-600 text-sm">Terima konfirmasi jadwal PKL</p>
                    </div>
                </div>

                <!-- CTA Button -->
                <div class="text-center mt-8">
                    <a href="{{ route('pendaftaran.form') }}" 
                    class="inline-flex items-center bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold transition duration-300 px-2">
                        <i class="fas fa-pen-to-square mr-2"></i>
                        Daftar PKL Sekarang
                    </a>
                    <p class="text-gray-600 text-sm mt-2">
                        Periode pendaftaran dibuka setiap semester
                    </p>
                </div>
            </div>

            <!-- Informasi Tambahan -->
            <div class="mt-8 text-center">
                <p class="text-white/80 text-sm">
                    Untuk informasi lebih lanjut, hubungi:
                    <span class="font-semibold">(0341) 1234567</span> atau 
                    <span class="font-semibold">pkl@bbppmpvboe.ac.id</span>
                </p>
            </div>
        </div>
    </section>


@endsection