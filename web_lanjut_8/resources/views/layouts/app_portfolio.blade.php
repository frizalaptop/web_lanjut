<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portofolio' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        /* Animasi untuk navbar */
        .navbar {
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        .navbar.scrolled {
            background-color: #343a40 !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar.scrolled a {
            color: white !important;
        }

        /* Efek hover untuk menu navbar */
        .navbar-nav .nav-link {
            position: relative;
            color: #000;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #007bff;
        }
        .navbar.scrolled .navbar-brand {
            color: white !important;
        }
        .navbar-nav .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #007bff;
            bottom: 0;
            left: 0;
            transition: width 0.3s ease;
        }
        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        /* Animasi untuk judul halaman */
        @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }
        .page-title {
            animation: fadeIn 1s ease-in-out;
        }

        /* Efek hover untuk card di portfolio */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Animasi untuk tombol */
        .btn-primary {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Animasi untuk teks */
        @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
        }
        .fadeInUp {
            : fadeInUp 1s ease-in-out;
        }

        /* Efek hover untuk card */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Styling untuk ikon */
        .fas {
            color: #007bff;
        }
    </style>
</head>


<body>

<!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top py-3">
        <div class="container">
            <a class="navbar-brand" href="/"><strong>MyPortfolio</strong></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" databs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle
            navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3 font-bold">
                        <a class="nav-link" href="{{asset ('/')}}">Home</a>
                    </li>
                        <li class="nav-item me-3">
                        <a class="nav-link" href="{{asset ('/about')}}">About</a>
                    </li>
                        <li class="nav-item me-3">
                        <a class="nav-link" href="{{asset ('/contact')}}">Contact</a>
                    </li>
                        <li class="nav-item me-3">
                        <a class="nav-link" href="{{asset ('/portfolio')}}">Portfolio</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- Konten Utama -->
    <div class="container mt-5 pt-5 h-100">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>
                &copy; {{ date('Y') }} <strong>Copyright by Muhammad Friza</strong> || 220511017. All rights reserved. | 
                <a href="#">Privacy Policy</a>
            </p>
        </div>
    </footer>

<!-- Script untuk animasi navbar saat di-scroll -->
    <script>
        window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
        } else {
        navbar.classList.remove('scrolled');
        }
        });
    </script>
    <scriptsrc="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>