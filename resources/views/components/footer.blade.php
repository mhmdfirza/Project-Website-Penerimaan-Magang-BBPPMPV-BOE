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
                        <a href="https://www.facebook.com/p4tkboe.kemdikbud/"
                        target="_blank"
                        rel="noopener noreferrer" 
                        class="text-white hover:text-blue-200">
                            <i class="fab fa-facebook-f text-lg"></i>
                        </a>

                        <a href="https://www.instagram.com/bbppmpvboe"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-white hover:text-blue-200">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>

                        <a href="https://www.youtube.com/bbppmpvboe"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-white hover:text-blue-200">
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
                        <li><a href="{{ route('pendaftaran.form') }}" class="hover:text-blue-200">Pendaftaran</a></li>
                        <li><a href="{{ route('requirements') }}" class="hover:text-blue-200">Syarat PKL</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-blue-700 mt-8 pt-8 text-center">
                <p>&copy; 2023 BBPPMPV BOE Malang. All rights reserved.</p>
            </div>
        </div>
    </footer>