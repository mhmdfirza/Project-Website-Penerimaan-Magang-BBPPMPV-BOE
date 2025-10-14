@extends('layouts.app')

@section('title', 'Sistem PKL - BOE Malang')

@section('content')

    <!-- Hero Section -->
    <section class="relative flex justify-center items-center text-white overflow-hidden min-h-screen">
        <div 
            class="absolute inset-0 bg-cover bg-center bg-no-repeat z-0"
            style="background-image: url('{{ asset('img/about.jpg') }}');"
        ></div>
        
        <!-- Overlay warna primary dengan opacity -->
        <div class="absolute inset-0 bg-primary z-10 opacity-60"></div>

        <!-- Content harus pakai relative z-20 -->
        <div class="relative z-20 mb-20">
            <div class="container mx-auto px-4 text-center">
                <!-- Heading dengan animasi -->
                <h2 class="text-3xl md:text-4xl font-bold mb-4 transform translate-y-8 opacity-0 animate-fade-in-up">
                    TENTANG BBPPMPV BOE MALANG
                </h2>

            </div>
        </div>
    </section>


    {{-- Identitas lembaga --}}
    <section class="py-16 bg-primary">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">
                    IDENTITAS LEMBAGA
                </h2>
                <div class="w-24 h-1 bg-white mx-auto"></div>
            </div>

            <div class="flex flex-col lg:flex-row items-center gap-8 lg:gap-12">
 
                <div class="lg:w-1/2 order-2 lg:order-1">
                    <div class="relative bg-white py-3 px-3">
                        <img 
                            src="{{ asset('img/logo.png') }}" 
                            alt="BBPPMPV BOE MALANG" 
                            class="w-full h-auto rounded-lg shadow-2xl object-cover"
                        >
                    </div>
                </div>

            <div class="lg:w-1/2 order-1 lg:order-2 text-white">
                <p class="text-lg mb-6 leading-relaxed break-words overflow-wrap-anywhere">
                    BBPPMPV BOE Malang adalah singkatan dari Balai Besar Pengembangan
                    Penjaminan Mutu Pendidikan Vokasi Bidang Otomotif dan Elektronika.
                    Lembaga ini merupakan Unit Pelaksana Teknis (UPT) yang berada
                    di bawah naungan Direktorat Jenderal Pendidikan Vokasi,
                    Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi
                    (Kemendikbudristek).
                </p>
                <p class="text-lg mb-3 leading-relaxed break-words overflow-wrap-anywhere">
                    BBPPMPV BOE Malang memiliki peran strategis dalam meningkatkan mutu 
                    pendidikan vokasi, khususnya di bidang otomotif dan elektronika. 
                    Lembaga ini menjadi pusat pengembangan tenaga pendidik, tenaga kependidikan, 
                    serta program dan kebijakan terkait peningkatan kompetensi SMK dan lembaga vokasi 
                    lainnya di Indonesia.
                </p>

                <p class="text-lg mb-6 leading-relaxed break-all">
                    <a href="https://bbppmpvboe.kemendikdasmen.go.id/bbppmpvboe/halaman/detail/sejarah" 
                    target="_blank" 
                    rel="noopener noreferrer"
                    class="text-white hover:underline transition duration-300 break-all text-lg leading-relaxed">
                        https://bbppmpvboe.kemendikdasmen.go.id/bbppmpvboe/halaman/detail/sejarah
                    </a>
                </p>

                    
                    {{-- <!-- Features -->
                    <div class="space-y-3 mt-6">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-400 mr-3"></i>
                            <span>Fasilitas laboratorium modern</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-400 mr-3"></i>
                            <span>Instruktur industri berpengalaman</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-400 mr-3"></i>
                            <span>Program PKL terstruktur</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-yellow-400 mr-3"></i>
                            <span>Sertifikasi kompetensi</span>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- VISI MISI TUJUAN --}}
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <!-- Visi -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                    VISI
                </h2>
                <div class="w-40 h-3 rounded-2xl bg-gradient-to-r from-[#078BF5] to-[#005C97] mx-auto mb-8"></div>
                <p class="text-xl md:text-2xl text-gray-700 leading-relaxed max-w-4xl mx-auto italic">
                    "Menjadi pusat unggulan dalam pengembangan dan penjaminan mutu pendidikan vokasi di bidang otomotif 
                    dan elektronika untuk mewujudkan sumber daya manusia yang kompeten dan berdaya saing global"
                </p>
            </div>

            <!-- Misi -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                    MISI
                </h2>
                <div class="w-40 h-3 rounded-2xl bg-gradient-to-r from-[#078BF5] to-[#005C97] mx-auto mb-8"></div>
                
                <div class="max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-8 rounded-2xl shadow-sm">
                        <ul class="text-left space-y-6 text-gray-700">
                            <li class="flex items-start">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                                    <i class="fas fa-chalkboard-teacher text-white text-sm"></i>
                                </div>
                                <span class="pt-1">Menyelenggarakan pelatihan dan pengembangan kompetensi pendidik dan tenaga kependidikan bidang otomotif dan elektronika.</span>
                            </li>
                            <li class="flex items-start">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                                    <i class="fas fa-file-alt text-white text-sm"></i>
                                </div>
                                <span class="pt-1">Menyusun standar, pedoman, dan model pembelajaran yang inovatif sesuai perkembangan teknologi dan kebutuhan industri.</span>
                            </li>
                            <li class="flex items-start">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                                    <i class="fas fa-award text-white text-sm"></i>
                                </div>
                                <span class="pt-1">Melakukan penjaminan mutu dan pengembangan program vokasi agar sesuai dengan standar nasional dan internasional.</span>
                            </li>
                            <li class="flex items-start">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                                    <i class="fas fa-handshake text-white text-sm"></i>
                                </div>
                                <span class="pt-1">Menjalin kerjasama dengan dunia usaha, dunia industri, dan lembaga pendidikan untuk mendukung pendidikan vokasi yang relevan dan berkualitas.</span>
                            </li>
                            <li class="flex items-start">
                                <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center flex-shrink-0 mr-4">
                                    <i class="fas fa-graduation-cap text-white text-sm"></i>
                                </div>
                                <span class="pt-1">Mendorong terwujudnya lulusan vokasi yang kompetitif, produktif, dan siap bersaing di era globalisasi.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Tujuan -->
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-black mb-4">
                    TUJUAN
                </h2>
                <div class="w-40 h-3 rounded-2xl bg-gradient-to-r from-[#078BF5] to-[#005C97] mx-auto mb-8"></div>
                
                <div class="max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-blue-50 to-blue-100 p-8 rounded-2xl shadow-sm">
                        <ul class="text-left space-y-4 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                <span>Meningkatkan kompetensi guru dan instruktur SMK.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                <span>Menyediakan program pelatihan yang berbasis industri 4.0.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                <span>Menjadi pusat sertifikasi dan standardisasi kompetensi pendidikan vokasi.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-blue-600 mt-1 mr-3"></i>
                                <span>Meningkatkan kualitas pembelajaran SMK agar selaras dengan kebutuhan dunia kerja.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection