@php
    /** @var \App\Models\Post $likedPost */
@endphp

<div class="liked-posts-section">
    @if($likedPosts && $likedPosts->count() > 0)
    <!-- Liked Posts Header -->
    <div class="row mb-4 mt-5">
        <div class="col-12 text-center">
            <div class="section-header d-inline-block position-relative">
                <h2 class="section-title mb-2" style="font-family: 'Playfair Display', serif;">
                    <i class="bi bi-heart-fill text-danger me-2"></i>Liked Posts
                </h2>
                <p class="text-muted mb-0">Popular content loved by our readers</p>
            </div>
        </div>
    </div>

    <!-- Liked Posts Grid -->
    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 g-3 g-md-4">
        @foreach($likedPosts as $likedPost)
            <div class="col">
                <article class="liked-post-card h-100">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden">
                        <!-- Image with Overlay -->
                        <div class="liked-image-wrapper position-relative">
                            <img src="{{ $likedPost->preview_image_url }}"
                                 class="card-img-top liked-image"
                                 alt="{{ $likedPost->title }}"
                                 loading="lazy">
                            <div class="image-overlay">
                                <div class="overlay-content">
                                    <a href="{{ route('post.show', $likedPost->id) }}"
                                       class="btn btn-light btn-sm rounded-pill">
                                        <i class="bi bi-eye me-1"></i>Read Post
                                    </a>
                                </div>
                            </div>
                            <!-- Like Badge -->
                            <div class="like-badge position-absolute top-0 end-0 m-3">
                                <span class="badge bg-danger bg-opacity-90 rounded-pill px-3 py-2">
                                    <i class="bi bi-heart-fill me-1"></i>{{ $likedPost->liked_users_count ?? 0 }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body d-flex flex-column p-3 p-md-4">
                            <!-- Category Badge -->
                            <div class="mb-2">
                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill">
                                    {{ $likedPost->category->name ?? 'Uncategorized' }}
                                </span>
                            </div>

                            <!-- Title -->
                            <h5 class="liked-title mb-3" style="font-family: 'Playfair Display', serif;">
                                <a class="text-dark text-decoration-none"
                                   href="{{ route('post.show', $likedPost->id) }}">
                                    {{ $likedPost->title }}
                                </a>
                            </h5>

                            <!-- Meta Info -->
                            <div class="mb-3 text-muted small d-flex align-items-center gap-2 flex-wrap">
                                <span><i class="bi bi-calendar me-1"></i>{{ $likedPost->created_at->format('M j') }}</span>
                                <span>•</span>
                                <span><i class="bi bi-clock me-1"></i>{{ $likedPost->created_at->diffForHumans() }}</span>
                            </div>

                            <!-- Excerpt -->
                            <p class="card-text text-muted mb-3 flex-grow-1">{{ $likedPost->shortBody() }}</p>

                            <!-- Read More Link -->
                            <a href="{{ route('post.show', $likedPost->id) }}"
                               class="read-more-link mt-auto">
                                Continue reading <i class="bi bi-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
    @endif
</div>

<style>
    /* Section Header */
    .section-header {
        padding-bottom: 1rem;
    }

    .section-header::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .section-title {
        font-size: clamp(1.75rem, 3vw, 2.25rem);
        font-weight: 700;
        color: #1a202c;
    }

    /* Liked Post Card */
    .liked-post-card {
        transition: transform 0.3s ease;
    }

    .liked-post-card:hover {
        transform: translateY(-8px);
    }

    .liked-post-card .card {
        transition: box-shadow 0.3s ease;
    }

    .liked-post-card:hover .card {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }

    /* Image Wrapper */
    .liked-image-wrapper {
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .liked-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    @media (min-width: 768px) {
        .liked-image {
            height: 240px;
        }
    }

    .liked-post-card:hover .liked-image {
        transform: scale(1.1);
    }

    /* Image Overlay */
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .liked-post-card:hover .image-overlay {
        opacity: 1;
    }

    .overlay-content {
        transform: translateY(10px);
        transition: transform 0.3s ease;
    }

    .liked-post-card:hover .overlay-content {
        transform: translateY(0);
    }

    /* Like Badge */
    .like-badge {
        z-index: 2;
    }

    .like-badge .badge {
        font-size: 0.85rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    /* Title */
    .liked-title {
        font-size: clamp(1.1rem, 2vw, 1.25rem);
        font-weight: 600;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 2.8em;
    }

    .liked-title a {
        transition: color 0.3s ease;
    }

    .liked-title a:hover {
        color: #667eea !important;
    }

    /* Card Text */
    .card-text {
        font-size: 0.9rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Read More Link */
    .read-more-link {
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .read-more-link:hover {
        color: #5568d3;
        gap: 0.5rem;
    }

    .read-more-link i {
        transition: transform 0.3s ease;
    }

    .read-more-link:hover i {
        transform: translateX(4px);
    }

    /* Mobile Responsive */
    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.5rem;
        }

        .liked-image {
            height: 200px;
        }

        .card-body {
            padding: 1rem !important;
        }

        .liked-title {
            font-size: 1.1rem;
            margin-bottom: 0.75rem !important;
        }

        .card-text {
            font-size: 0.875rem;
            -webkit-line-clamp: 2;
        }

        .like-badge .badge {
            font-size: 0.75rem;
            padding: 0.35rem 0.65rem !important;
        }
    }

    /* Tablet Optimizations */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .card-body {
            padding: 1.25rem !important;
        }
    }
</style>
