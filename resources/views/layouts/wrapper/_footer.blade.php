<div class="mt-4">
    <footer class="bg-dark-gradient py-3">
        <div class="container">
            <div class="row">
                <footer class="d-flex flex-wrap justify-content-between align-items-start py-2">
                    <div class="col-lg-4 col-md-12 mb-3">
                        <span class="fs-4 fw-bold text-white" style="font-family: 'Playfair Display', serif;">
                            <strong>SIR Updates</strong>
                        </span>
                        <p class="text-secondary mt-1 mb-0" style="font-size: 0.9rem;">Your trusted source for the latest updates.</p>
                    </div>

                    {{-- <div class="col-6 col-md-3 mb-3">
                        <h6 class="text-white mb-2">Navigation</h6>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-1">
                                <a href="{{ route('main.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-chevron-right"></i> Home
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ route('about.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-chevron-right"></i> About
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ route('faq.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-chevron-right"></i> FAQs
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="{{ route('contact.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-chevron-right"></i> Contact
                                </a>
                            </li>
                        </ul>
                    </div> --}}

                    {{-- <div class="col-6 col-md-3 mb-3">
                        <h6 class="text-white mb-2">Social</h6>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-1">
                                <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-github me-2"></i>GitHub
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-linkedin me-2"></i>LinkedIn
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-twitter-x me-2"></i>Twitter
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link" style="font-size: 0.9rem;">
                                    <i class="bi bi-instagram me-2"></i>Instagram
                                </a>
                            </li>
                        </ul>
                    </div> --}}

                </footer>
            </div>

            <div class="border-top border-dark pt-2 mt-2 text-center">
                <p class="text-secondary mb-0" style="font-size: 0.85rem;">
                    © {{ date('Y') }} IT Wing. All rights reserved.
                </p>
            </div>
        </div>
    </footer>
</div>

<!-- Mobile App-like Bottom Navigation -->
<nav class="bottom-nav">
    <div class="container-fluid px-2">
        <div class="d-flex justify-content-around align-items-center">
            <!-- Home -->
            <a href="{{ route('main.index') }}" 
               class="nav-item-btn {{ Request::routeIs('main.index') ? 'active' : '' }}"
               aria-label="Home">
                <i class="bi bi-house-door-fill"></i>
                <span>Home</span>
            </a>
            
            <!-- FAQs -->
            <a href="{{ route('faq.index') }}" 
               class="nav-item-btn {{ Request::routeIs('faq.index') ? 'active' : '' }}"
               aria-label="FAQs">
                <i class="bi bi-question-circle-fill"></i>
                <span>FAQs</span>
            </a>
            
            <!-- Contact -->
            <a href="{{ route('contact.index') }}" 
               class="nav-item-btn {{ Request::routeIs('contact.index') ? 'active' : '' }}"
               aria-label="Contact">
                <i class="bi bi-envelope-fill"></i>
                <span>Contact</span>
            </a>
        </div>
    </div>
</nav>

<style>
    .bg-dark-gradient {
        background: linear-gradient(160deg, #1a1a1a 0%, #0d0d0d 100%);
        padding: 1rem 0;
        margin-top: 2rem !important;
        width: 100%;
    }
    
    /* Footer Link Hover Effect */
    .footer-link {
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .footer-link:hover {
        color: #667eea !important;
        transform: translateX(5px);
    }
    
    /* Mobile App-like Bottom Navigation - Much Smaller */
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 -2px 15px rgba(0, 0, 0, 0.25);
        padding: 0.4rem 0;
        z-index: 1050;
        backdrop-filter: blur(10px);
    }
    
    .nav-item-btn {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: rgba(255, 255, 255, 0.65);
        text-decoration: none;
        padding: 0.3rem 0.8rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border-radius: 12px;
        position: relative;
        overflow: hidden;
        flex: 1;
        max-width: 100px;
    }
    
    .nav-item-btn:hover,
    .nav-item-btn.active {
        color: white;
        background: rgba(255, 255, 255, 0.2);
        transform: translateY(-2px);
    }
    
    .nav-item-btn i {
        font-size: 1.1rem;
        margin-bottom: 0.15rem;
        transition: all 0.3s ease;
    }
    
    .nav-item-btn.active i {
        transform: scale(1.1);
        filter: drop-shadow(0 1px 3px rgba(0, 0, 0, 0.2));
    }
    
    .nav-item-btn span {
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        text-transform: uppercase;
    }
    
    /* Active indicator dot - smaller */
    .nav-item-btn.active::before {
        content: '';
        position: absolute;
        top: 3px;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 4px;
        background: white;
        border-radius: 50%;
        box-shadow: 0 0 8px rgba(255, 255, 255, 0.8);
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0%, 100% {
            opacity: 1;
            transform: translateX(-50%) scale(1);
        }
        50% {
            opacity: 0.5;
            transform: translateX(-50%) scale(1.2);
        }
    }
    
    /* Ripple effect */
    .nav-item-btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.5s, height 0.5s;
    }
    
    .nav-item-btn:active::after {
        width: 80px;
        height: 80px;
    }
    
    /* Add padding to body to prevent content from being hidden behind bottom nav */
    body {
        padding-bottom: 55px;
    }
    
    /* Hide bottom nav on desktop */
    @media (min-width: 992px) {
        .bottom-nav {
            display: none;
        }
        
        body {
            padding-bottom: 0;
        }
    }
    
    /* Tablet adjustments */
    @media (max-width: 991.98px) and (min-width: 768px) {
        .nav-item-btn {
            padding: 0.35rem 0.9rem;
        }
        
        .nav-item-btn i {
            font-size: 1.15rem;
        }
        
        .nav-item-btn span {
            font-size: 0.68rem;
        }
        
        .bottom-nav {
            padding: 0.45rem 0;
        }
        
        body {
            padding-bottom: 58px;
        }
    }
    
    /* Mobile adjustments - even smaller */
    @media (max-width: 767.98px) {
        .nav-item-btn span {
            font-size: 0.6rem;
        }
        
        .nav-item-btn i {
            font-size: 1rem;
        }
        
        .nav-item-btn {
            padding: 0.28rem 0.7rem;
        }
        
        .bottom-nav {
            padding: 0.38rem 0;
        }
        
        body {
            padding-bottom: 52px;
        }
    }
    
    /* Small mobile adjustments - smallest size */
    @media (max-width: 375px) {
        .nav-item-btn {
            padding: 0.25rem 0.6rem;
        }
        
        .nav-item-btn i {
            font-size: 0.95rem;
            margin-bottom: 0.12rem;
        }
        
        .nav-item-btn span {
            font-size: 0.58rem;
        }
        
        .bottom-nav {
            padding: 0.35rem 0;
        }
        
        body {
            padding-bottom: 50px;
        }
    }
    
    /* Extra small devices */
    @media (max-width: 320px) {
        .nav-item-btn {
            padding: 0.22rem 0.5rem;
        }
        
        .nav-item-btn i {
            font-size: 0.9rem;
            margin-bottom: 0.1rem;
        }
        
        .nav-item-btn span {
            font-size: 0.55rem;
        }
        
        .bottom-nav {
            padding: 0.32rem 0;
        }
        
        body {
            padding-bottom: 48px;
        }
    }
</style>