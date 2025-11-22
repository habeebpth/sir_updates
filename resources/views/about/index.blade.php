@extends('layouts.wrapper', ['title' => 'About'])

@section('content')
    <div class="container-lg py-4 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">
                <div class="about-card p-4 p-md-5 rounded-3 shadow-sm bg-white">
                    <!-- Header -->
                    <div class="text-center mb-4 mb-md-5">
                        <div class="author-icon mx-auto mb-4">
                            <i class="bi bi-building"></i>
                        </div>
                        <h1 class="about-title mb-3" style="font-family: 'Playfair Display', serif;">
                            About SIR Updates
                        </h1>
                        <p class="lead text-muted mb-0">Get to know the team behind the posts</p>
                        <div class="title-underline mx-auto mt-3"></div>
                    </div>

                    <!-- Content -->
                    <div class="about-content">
                        <div class="content-section mb-4">
                            <h3 class="section-heading mb-3">
                                <i class="bi bi-info-circle me-2 text-primary"></i>Who We Are
                            </h3>
                            <p class="text-muted lh-lg">
                                Welcome to <strong>sirwatchkerala.com</strong> – your trusted source for the latest updates,
                                insights, and information. We are committed to delivering high-quality content
                                that keeps you informed and engaged.
                            </p>
                        </div>

                        <div class="content-section mb-4">
                            <h3 class="section-heading mb-3">
                                <i class="bi bi-bullseye me-2 text-primary"></i>Our Mission
                            </h3>
                            <p class="text-muted lh-lg">
                                Our mission is to provide accurate, timely, and relevant information to our readers.
                                We strive to create content that matters and makes a difference in your daily life.
                            </p>
                        </div>

                        <div class="content-section">
                            <h3 class="section-heading mb-3">
                                <i class="bi bi-envelope-heart me-2 text-primary"></i>Get in Touch
                            </h3>
                            <p class="text-muted lh-lg mb-4">
                                Have questions or feedback? We'd love to hear from you! Feel free to reach out
                                through our contact page.
                            </p>
                            <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                <a href="{{ route('poster.index') }}" class="btn btn-primary rounded-pill px-4 py-2">
                                    <i class="bi bi-file-earmark-image me-2"></i>View Posters
                                </a>
                                <a href="{{ route('main.index') }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                                    <i class="bi bi-house me-2"></i>Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .about-card {
            border: 1px solid #e2e8f0;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
        }

        .author-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        .about-title {
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 700;
            color: #1a202c;
        }

        .title-underline {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
        }

        .section-heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.25rem, 2.5vw, 1.5rem);
            font-weight: 600;
            color: #2d3748;
        }

        .content-section {
            padding: 1.5rem;
            border-left: 3px solid #667eea;
            background: white;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
        }

        .content-section:hover {
            transform: translateX(8px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        @media (max-width: 767.98px) {
            .about-card {
                padding: 2rem 1.5rem !important;
            }

            .author-icon {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
            }

            .about-title {
                font-size: 2rem;
            }

            .section-heading {
                font-size: 1.25rem;
            }

            .content-section {
                padding: 1rem;
            }
        }
    </style>
@endsection
