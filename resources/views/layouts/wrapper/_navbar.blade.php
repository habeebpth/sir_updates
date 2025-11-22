<style>
    /* Modern Header Styles */
    .modern-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.15);
        padding: 0.5rem 0;
        position: sticky;
        top: 0;
        z-index: 1000;
    }
    
    .header-container {
        background: rgba(255, 255, 255, 0.95);
        border-radius: 12px;
        padding: 0.6rem 1rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    /* Header Logo Styles */
    .header-logo {
        height: 40px;
        width: auto;
        transition: transform 0.3s ease;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 6px;
        border-radius: 10px;
        box-shadow: 0 3px 12px rgba(102, 126, 234, 0.4);
    }

    .header-title {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        font-size: 1.75rem;
        line-height: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .blog-header-logo:hover .header-logo {
        transform: scale(1.08) rotate(2deg);
    }
    
    /* User Dropdown Button */
    .user-dropdown-btn {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white !important;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        padding: 0.4rem 1rem !important;
    }
    
    .user-dropdown-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.5);
    }
    
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }
    
    .dropdown-item {
        transition: all 0.3s ease;
    }
    
    .dropdown-item:hover {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }
    
    /* Navigation Scroller - Hidden on mobile (we'll use bottom nav) */
    .nav-scroller {
        display: none;
    }
    
    @media (min-width: 992px) {
        .nav-scroller {
            display: block;
        }
    }

    /* Mobile Responsive */
    @media (max-width: 767.98px) {
        .modern-header {
            padding: 0.4rem 0;
        }
        
        .header-container {
            padding: 0.5rem 0.8rem;
        }
        
        .header-logo {
            height: 32px;
            padding: 5px;
        }

        .header-title {
            font-size: 1.3rem;
        }

        /* Stack logo and title on very small screens */
        @media (max-width: 375px) {
            .blog-header-logo {
                flex-direction: column;
                gap: 0.5rem !important;
            }

            .header-logo {
                height: 28px;
                padding: 4px;
            }

            .header-title {
                font-size: 1.1rem;
            }
        }
    }

    /* Tablet */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .header-logo {
            height: 38px;
            padding: 6px;
        }

        .header-title {
            font-size: 1.6rem;
        }
    }
</style>

<div class="modern-header">
    <div class="container">
        <div class="header-container">
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
                            <a class="btn btn-sm user-dropdown-btn dropdown-toggle gap-2 rounded-pill px-4 d-flex align-items-center"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i>
                                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg rounded-3">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2 py-2"
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
                                        <button type="submit" class="dropdown-item d-flex align-items-center gap-2 py-2">
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
        </div>

        <!-- Desktop Navigation - Hidden on mobile -->
        <div class="nav-scroller py-2 mt-2">
            <nav class="nav nav-underline justify-content-center gap-4">
                <a class="nav-item nav-link link-body-emphasis fw-semibold text-white {{ Request::routeIs('main.index') ? 'active' : '' }}" 
                   href="{{ route('main.index') }}">
                    <i class="bi bi-house-door-fill me-1"></i> Home
                </a>
                <a class="nav-item nav-link link-body-emphasis fw-semibold text-white {{ Request::routeIs('faq.index') ? 'active' : '' }}" 
                   href="{{ route('faq.index') }}">
                    <i class="bi bi-question-circle-fill me-1"></i> FAQs
                </a>
                <a class="nav-item nav-link link-body-emphasis fw-semibold text-white {{ Request::routeIs('contact.index') ? 'active' : '' }}" 
                   href="{{ route('contact.index') }}">
                    <i class="bi bi-envelope-fill me-1"></i> Contact
                </a>
            </nav>
        </div>
    </div>
</div>