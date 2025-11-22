<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="description" content="SIR Updates - Stay informed with the latest updates and insights">
        <title>{{ $title ?? 'SIR Updates' }}</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap"
                rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NCQ18XVGY2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NCQ18XVGY2');
</script>
        @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

        @include('layouts.wrapper._navbar')

        <main class="flex-grow-1">
                @yield('content')
        </main>

        @include('layouts.wrapper._footer')

        <!-- Mobile Bottom Navigation -->
        <nav class="mobile-bottom-nav d-lg-none">
            <a href="{{ route('main.index') }}" class="nav-item {{ request()->routeIs('main.index') ? 'active' : '' }}">
                <i class="bi bi-house-door"></i>
                <span>Home</span>
            </a>
            <a href="{{ route('poster.index') }}" class="nav-item {{ request()->routeIs('poster.index') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-image"></i>
                <span>Posters</span>
            </a>
            <a href="{{ route('faq.index') }}" class="nav-item {{ request()->routeIs('faq.index') ? 'active' : '' }}">
                <i class="bi bi-question-circle"></i>
                <span>FAQs</span>
            </a>
        </nav>

        <style>
            /* Mobile Bottom Navigation */
            .mobile-bottom-nav {
                position: fixed;
                bottom: 0;
                left: 0;
                right: 0;
                background: #ffffff;
                border-top: 1px solid #e5e7eb;
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 0.3rem 0;
                z-index: 1000;
            }

            .mobile-bottom-nav .nav-item {
                display: flex;
                flex-direction: column;
                align-items: center;
                gap: 0.1rem;
                padding: 0.25rem 0.5rem;
                text-decoration: none;
                color: #6b7280;
                transition: all 0.3s ease;
                flex: 1;
                position: relative;
            }

            .mobile-bottom-nav .nav-item i {
                font-size: 1.1rem;
                transition: all 0.3s ease;
            }

            .mobile-bottom-nav .nav-item span {
                font-size: 0.65rem;
                font-weight: 500;
            }

            .mobile-bottom-nav .nav-item.active {
                color: #667eea;
            }

            .mobile-bottom-nav .nav-item.active i {
                transform: scale(1.1);
            }

            .mobile-bottom-nav .nav-item:active {
                transform: scale(0.95);
            }

            /* Add padding to body to prevent content from being hidden behind bottom nav */
            @media (max-width: 991.98px) {
                body {
                    padding-bottom: 50px;
                }
            }
        </style>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"></script>

        @stack('scripts')
</body>

</html>
