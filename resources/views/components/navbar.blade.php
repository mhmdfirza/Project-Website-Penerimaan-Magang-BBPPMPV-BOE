<header id="navbar" class="fixed top-0 left-0 w-full z-[999] bg-transparent transition-all duration-300">
    <div class="w-full flex justify-between items-center px-4 py-2 md:px-5 md:py-1">

        {{-- <!-- Logo --> --}}
        <img src="{{ asset('img/logo-putih.png') }}" alt="Logo" 
             class="h-15 md:h-24 w-auto transition-all duration-300" id="logo" />

        {{-- <!-- Desktop Navbar --> --}}
        <nav class="hidden md:block">
            <ul class="flex space-x-8">
                <li>
                    <a href="{{ route('home') }}" class="nav-link text-white font-medium hover:text-blue-200 transition">
                        Beranda
                    </a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="nav-link text-white font-medium hover:text-blue-200 transition">
                        Tentang
                    </a>
                </li>
                <li>
                    <a href="{{ route('requirements') }}" class="nav-link text-white font-medium hover:text-blue-200 transition">
                        Syarat PKL  
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

        {{-- <!-- Hamburger Button --> --}}
        <button id="hamburger-btn" class="md:hidden text-white z-50">
        <i class="fas fa-bars text-xl cursor-pointer" id="hamburger-icon"></i>
        </button>
        {{-- <!-- Mobile Menu --> --}}
        <div id="mobile-menu" class="md:hidden fixed top-0 left-0 w-full h-0 bg-primary/95 backdrop-blur-sm overflow-hidden transition-all duration-300 z-40">
            <div class="container mx-auto px-4 pt-20 pb-6">
                
                {{-- <!-- Mobile Navnar --> --}}
                <nav class="mt-6">
                    <ul class="space-y-4 text-center">
                        <li>
                            <a href="{{ route('home') }}" class="block text-white text-lg font-medium hover:text-blue-200 transition py-2">
                                Beranda
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="block text-white text-lg font-medium hover:text-blue-200 transition py-2">
                                Tentang
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('requirements') }}" class="block text-white text-lg font-medium hover:text-blue-200 transition py-2">
                                Syarat PKL  
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('pendaftaran.form') }}"
                                class="block text-white text-lg font-medium hover:text-blue-200 transition py-2">
                                Daftar PKL 2025
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const hamburgerBtn = document.getElementById('hamburger-btn');
  const hamburgerIcon = document.getElementById('hamburger-icon');
  const mobileMenu = document.getElementById('mobile-menu');
  const body = document.body;
  let isOpen = false;

  hamburgerBtn.addEventListener('click', function() {
    if (!isOpen) {
      mobileMenu.style.height = '100vh';
      body.style.overflow = 'hidden';
      hamburgerIcon.classList.remove('fa-bars');
      hamburgerIcon.classList.add('fa-times');
      isOpen = true;
    } else {
      mobileMenu.style.height = '0';
      body.style.overflow = 'auto';
      hamburgerIcon.classList.remove('fa-times');
      hamburgerIcon.classList.add('fa-bars');
      isOpen = false;
    }
  });

  // Tutup menu saat link diklik
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.style.height = '0';
      body.style.overflow = 'auto';
      hamburgerIcon.classList.remove('fa-times');
      hamburgerIcon.classList.add('fa-bars');
      isOpen = false;
    });
  });

  // Tutup dengan tombol Escape
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && isOpen) {
      mobileMenu.style.height = '0';
      body.style.overflow = 'auto';
      hamburgerIcon.classList.remove('fa-times');
      hamburgerIcon.classList.add('fa-bars');
      isOpen = false;
    }
  });
});

    // Scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const logo = document.getElementById('logo');
        
        if (window.scrollY > 50) {
            navbar.classList.add('bg-primary', 'shadow-lg', 'py-2');
            navbar.classList.remove('bg-transparent');
            
            if (window.innerWidth < 768) { 
                logo.classList.add('h-11');
                logo.classList.remove('h-12');
            } else { 
                logo.classList.add('h-16');
                logo.classList.remove('h-20');
            }
            
        } else {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('bg-white', 'shadow-lg', 'py-2');
            
            if (window.innerWidth < 768) { 
                logo.classList.remove('h-10');
                logo.classList.add('h-12');
            } else { // Desktop
                logo.classList.remove('h-18');
                logo.classList.add('h-20');
            }
            
            // Revert text color
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.classList.remove('text-gray-800');
                link.classList.add('text-white');
            });
        }
    });
</script>