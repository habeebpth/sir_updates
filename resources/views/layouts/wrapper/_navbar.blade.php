<div class="container">
    <header class="border-bottom lh-1 py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-body-emphasis text-decoration-none d-flex align-items-center justify-content-center gap-2"
                   href="{{ route('main.index') }}">
                    <img src="{{ asset('assets/images/sir_logo.png') }}"
                         alt="SIR Logo"
                         class="header-logo">
                    <span class="header-title"></span>
                </a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                @auth
                    <div class="dropdown">
                        <a class="btn btn-sm btn-outline-primary dropdown-toggle gap-2 rounded-pill px-4 d-flex align-items-center"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                            {{ Auth::user()->name }}
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
                    {{-- <a class="btn btn-sm bg-primary text-white gap-2 rounded-pill px-4 d-flex align-items-center"
                        href="{{ route('login') }}">
                        <i class="bi bi-box-arrow-in-right"></i> Log in
                    </a> --}}
                @endauth
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-3 border-bottom">
        <nav class="nav nav-underline justify-content-between">
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('main.index') }}">Home</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('about.index') }}">About</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('contact.index') }}">Contact</a>
            <a class="nav-item nav-link link-body-emphasis" href="{{ route('faq.index') }}">FAQs</a>
        </nav>
    </div>
</div>

<style>
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

    /* Mobile Responsive */
    @media (max-width: 767.98px) {
        .header-logo {
            height: 35px;
            padding: 6px;
        }

        .header-title {
            font-size: 1.4rem;
        }

        /* Stack logo and title on very small screens */
        @media (max-width: 375px) {
            .blog-header-logo {
                flex-direction: column;
                gap: 0.5rem !important;
            }

            .header-logo {
                height: 30px;
                padding: 5px;
            }

            .header-title {
                font-size: 1.2rem;
            }
        }
    }

    /* Tablet */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .header-logo {
            height: 45px;
            padding: 7px;
        }

        .header-title {
            font-size: 1.75rem;
        }
    }
</style>
