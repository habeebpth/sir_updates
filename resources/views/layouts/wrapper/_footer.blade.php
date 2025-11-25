<div class="mt-auto">
    <footer class="bg-dark-gradient py-3 py-md-4">
        <div class="container">
            <div class="row g-2 justify-content-center">
                <!-- Brand Section -->
                <div class="col-12 text-center">
                    <div class="mb-2 mb-md-3">
                        <h3 class="fs-4 fs-md-3 fw-bold text-white mb-1 mb-md-2" style="font-family: 'Playfair Display', serif;">
                            SIR Watch Kerala
                        </h3>
                        <p class="text-secondary mb-0 small">
                            Stay informed with the latest updates and insights.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-top border-secondary pt-2 pt-md-3 mt-2 mt-md-3">
                <div class="row align-items-center">
                    <div class="col-12 text-center">
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
            padding: 1.5rem 0 !important;
        }

        footer h3 {
            font-size: 1.5rem !important;
        }

        footer h5 {
            font-size: 1rem !important;
            margin-bottom: 0.5rem !important;
        }

        .footer-link {
            font-size: 0.85rem;
            padding: 0.25rem 0 !important;
        }

        footer .border-top {
            margin-top: 1rem !important;
            padding-top: 1rem !important;
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
