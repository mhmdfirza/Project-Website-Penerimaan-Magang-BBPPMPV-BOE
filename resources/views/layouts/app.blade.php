<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Aplikasi PKL')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: "Inter", sans-serif;
        }

        /* Animasi Keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(200px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Class Animasi */
        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out forwards;
        }

        /* Animation Delays */
        .animation-delay-500 {
            animation-delay: 0.5s;
        }

        .animation-delay-700 {
            animation-delay: 0.7s;
        }

        /* Pastikan elemen hidden sampai animasi dimulai */
        .transform {
            will-change: transform, opacity;
        }


        .department-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>

<body class="bg-gray-50">
    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    @stack('scripts')
</body>

</html>
