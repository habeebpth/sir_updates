<div class="mt-auto">
    <footer class="bg-dark-gradient py-5">
        <div class="container">
            <div class="row g-4">
                <!-- Brand Section -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="mb-4">
                        <h3 class="fs-3 fw-bold text-white mb-2" style="font-family: 'Playfair Display', serif;">
                            SIR Updates
                        </h3>
                        <p class="text-secondary mb-0">
                            Stay informed with the latest updates and insights.
                        </p>
                    </div>
                </div>

                <!-- Navigation Section -->
                <div class="col-6 col-md-3 col-lg-2">
                    <h5 class="text-white mb-3 fw-semibold">Navigation</h5>
                    <ul class="nav flex-column gap-2">
                        <li class="nav-item">
                            <a href="{{ route('main.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link">
                                <i class="bi bi-house-door me-1"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('about.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link">
                                <i class="bi bi-info-circle me-1"></i>About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('poster.index') }}" class="nav-link p-0 link-light link-offset-2 footer-link">
                                <i class="bi bi-file-earmark-image me-1"></i>Posters
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Social Section -->
                <div class="col-6 col-md-3 col-lg-2">
                    <h5 class="text-white mb-3 fw-semibold">Social</h5>
                    <ul class="nav flex-column gap-2">
                        <li class="nav-item">
                            <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link"
                               target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-github me-1"></i>GitHub
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link"
                               target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-linkedin me-1"></i>LinkedIn
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link p-0 link-light link-offset-2 footer-link"
                               target="_blank" rel="noopener noreferrer">
                                <i class="bi bi-twitter-x me-1"></i>Twitter
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Extra Space for larger screens -->
                <div class="col-lg-4 d-none d-lg-block"></div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-top border-secondary pt-4 mt-4">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <p class="text-secondary mb-0">
                            © {{ date('Y') }} IT Wing. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<style>
    .bg-dark-gradient {
        background: linear-gradient(160deg, #1a1a1a 0%, #0d0d0d 100%);
        position: relative;
        overflow: hidden;
    }

    .bg-dark-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg,
            transparent,
            rgba(102, 126, 234, 0.3),
            transparent
        );
    }

    .footer-link {
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        font-size: 0.95rem;
    }

    .footer-link:hover {
        color: #667eea !important;
        transform: translateX(4px);
    }

    .footer-link i {
        transition: all 0.3s ease;
    }

    .footer-link:hover i {
        transform: scale(1.2);
    }

    /* Mobile Responsive Adjustments */
    @media (max-width: 767.98px) {
        .bg-dark-gradient {
            padding: 2rem 0 !important;
        }

        footer h3 {
            font-size: 1.75rem !important;
        }

        footer h5 {
            font-size: 1.1rem !important;
            margin-bottom: 0.75rem !important;
        }

        .footer-link {
            font-size: 0.9rem;
            padding: 0.25rem 0 !important;
        }

        footer .border-top {
            margin-top: 2rem !important;
            padding-top: 2rem !important;
        }
    }

    /* Touch Targets */
    @media (max-width: 767.98px) {
        .footer-link {
            min-height: 44px;
            display: flex;
            align-items: center;
        }
    }
</style>
