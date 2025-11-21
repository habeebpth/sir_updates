<!-- Top Header Bar -->
<div class="top-header-bar border-bottom">
    <div class="container">
        <header class="lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <!-- Mobile Menu Toggle -->
                <div class="col-4 d-flex align-items-center d-lg-none">
                    <button class="btn btn-link p-0 text-dark" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#mobileMenu" aria-controls="mobileMenu">
                        <i class="bi bi-list fs-3"></i>
                    </button>
                </div>

                <!-- Desktop Spacer -->
                <div class="col-4 d-none d-lg-block"></div>

                <!-- Logo - Center -->
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none d-flex align-items-center justify-content-center gap-2"
                       href="{{ route('main.index') }}">
                        <img src="{{ asset('assets/images/sir_logo.png') }}"
                             alt="SIR Logo"
                             class="header-logo">
                        <span class="header-title d-none d-sm-inline"></span>
                    </a>
                </div>

                <!-- User Menu - Right -->
                <div class="col-4 d-flex justify-content-end align-items-center">
                    @auth
                        <div class="dropdown">
                            <a class="btn btn-sm btn-outline-primary dropdown-toggle rounded-pill px-3 px-md-4 d-flex align-items-center gap-1 gap-md-2"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg rounded-3">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2"
                                        href="{{ route('personal.main.index') }}">
                                        <i class="bi bi-person"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2">
                                            <i class="bi bi-box-arrow-right"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        {{-- <a class="btn btn-sm bg-primary text-white gap-2 rounded-pill px-3 px-md-4 d-flex align-items-center"
                            href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <span class="d-none d-md-inline">Log in</span>
        </a> --}}
                    @endauth
                </div>
            </div>
        </header>
    </div>
</div>

<!-- Desktop Navigation Bar - Full Width -->
<div class="main-navigation-bar border-bottom d-none d-lg-block">
    <div class="container">
        <div class="nav-scroller py-1 mb-3">
            <nav class="nav nav-underline justify-content-center">
                <a class="nav-item nav-link link-body-emphasis {{ request()->routeIs('main.index') ? 'active' : '' }}"
                   href="{{ route('main.index') }}">Home</a>
            <a class="nav-item nav-link link-body-emphasis {{ request()->routeIs('about.index') ? 'active' : '' }}"
               href="{{ route('about.index') }}">About</a>
            <a class="nav-item nav-link link-body-emphasis {{ request()->routeIs('poster.index') ? 'active' : '' }}"
               href="{{ route('poster.index') }}">Posters</a>
            <a class="nav-item nav-link link-body-emphasis {{ request()->routeIs('faq.index') ? 'active' : '' }}"
                   href="{{ route('faq.index') }}">FAQs</a>
            </nav>
        </div>
    </div>
</div><!-- Mobile Offcanvas Menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="mobileMenuLabel">
            <i class="bi bi-list-ul me-2"></i>Menu
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body p-0">
        <nav class="nav flex-column">
            <a class="nav-link px-4 py-3 border-bottom {{ request()->routeIs('main.index') ? 'active bg-light' : '' }}"
               href="{{ route('main.index') }}">
                <i class="bi bi-house-door me-2"></i>Home
            </a>
            <a class="nav-link px-4 py-3 border-bottom {{ request()->routeIs('about.index') ? 'active bg-light' : '' }}"
               href="{{ route('about.index') }}">
                <i class="bi bi-info-circle me-2"></i>About
            </a>
            <a class="nav-link px-4 py-3 border-bottom {{ request()->routeIs('poster.index') ? 'active bg-light' : '' }}"
               href="{{ route('poster.index') }}">
                <i class="bi bi-file-earmark-image me-2"></i>Posters
            </a>
            <a class="nav-link px-4 py-3 border-bottom {{ request()->routeIs('faq.index') ? 'active bg-light' : '' }}"
               href="{{ route('faq.index') }}">
                <i class="bi bi-question-circle me-2"></i>FAQs
            </a>
        </nav>
    </div>
</div>

<style>
    /* Top Header Bar */
    .top-header-bar {
        background-color: #fff;
    }

    /* Main Navigation Bar - Full Width */
    .main-navigation-bar {
        background-color: #fff;
        width: 100%;
    }

    .main-navigation-bar .nav {
        gap: 2rem;
    }

    .main-navigation-bar .nav-link {
        font-size: 1.05rem;
        font-weight: 500;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
    }

    /* Header Logo Styles */
    .header-logo {
        height: 50px;
        width: auto;
        transition: transform 0.3s ease;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 8px;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    .header-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.95rem;
        line-height: 1;
    }

    .blog-header-logo:hover .header-logo {
        transform: scale(1.05);
    }

    /* Navigation Active State */
    .nav-link.active {
        color: #667eea !important;
        font-weight: 600;
        border-bottom: 2px solid #667eea;
    }

    /* Mobile Offcanvas */
    .offcanvas {
        max-width: 280px;
    }

    .offcanvas .nav-link {
        color: #212529;
        font-size: 1.05rem;
        transition: all 0.2s ease;
    }

    .offcanvas .nav-link:hover {
        background-color: #f8f9fa;
        color: #667eea;
    }

    .offcanvas .nav-link.active {
        color: #667eea;
        font-weight: 600;
        border-left: 4px solid #667eea;
    }

    /* Mobile Responsive */
    @media (max-width: 575.98px) {
        .header-logo {
            height: 40px;
            padding: 6px;
        }

        .header-title {
            font-size: 1.3rem;
        }
    }

    /* Tablet */
    @media (min-width: 576px) and (max-width: 991.98px) {
        .header-logo {
            height: 45px;
            padding: 7px;
        }

        .header-title {
            font-size: 1.6rem;
        }
    }

    /* Touch Targets for Mobile */
    @media (max-width: 991.98px) {
        .btn-link {
            min-height: 44px;
            min-width: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
</style>
