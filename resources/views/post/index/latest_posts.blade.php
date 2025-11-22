@php
    /** @var \App\Models\Post $post */
@endphp

<div class="latest-posts-section">
    @if($posts->isNotEmpty())
        @php
            $featuredPost = $posts->first();
            $otherPosts = $posts->slice(1);
        @endphp

        <!-- Featured Post -->
        <div class="featured-post p-3 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary position-relative overflow-hidden">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="featured-content">
                        <span class="badge bg-primary mb-3">Featured</span>
                        <h1 class="fst-italic mb-3">
                            <a class="blog-header-logo text-body-emphasis text-decoration-none featured-title"
                                href="{{ route('post.show', $featuredPost->id) }}"
                                style="font-family: 'Playfair Display', serif; font-weight: 700;">
                                {{ $featuredPost->title }}
                            </a>
                        </h1>
                        <p class="lead my-3 text-muted">{{ $featuredPost->shortBody() }}</p>
                        <div class="d-flex align-items-center gap-3 mb-3 text-muted small">
                            <span><i class="bi bi-calendar me-1"></i>{{ $featuredPost->created_at->format('M j, Y') }}</span>
                            <span><i class="bi bi-tag me-1"></i>{{ $featuredPost->category->name ?? 'Uncategorized' }}</span>
                        </div>
                        <a href="{{ route('post.show', $featuredPost->id) }}"
                           class="btn btn-outline-primary rounded-pill px-4">
                            Read More <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <img src="{{ $featuredPost->preview_image_url }}"
                         class="img-fluid rounded shadow-sm featured-image"
                         alt="{{ $featuredPost->title }}"
                         loading="lazy">
                </div>
            </div>
        </div>

        <!-- Other Posts Grid -->
        @if($otherPosts->isNotEmpty())
        <div class="row g-3 g-md-4 mb-4">
            @foreach($otherPosts as $post)
                <div class="col-12 col-md-6 col-lg-4">
                    <article class="post-card h-100">
                        <div class="card border-0 shadow-sm h-100 overflow-hidden">
                            <!-- Image -->
                            <div class="post-image-wrapper">
                                <img src="{{ $post->preview_image_url }}"
                                     class="card-img-top post-image"
                                     alt="{{ $post->title }}"
                                     loading="lazy">
                                <div class="post-overlay">
                                    <a href="{{ route('post.show', $post->id) }}"
                                       class="btn btn-light btn-sm rounded-pill">
                                        <i class="bi bi-eye me-1"></i>View Post
                                    </a>
                                </div>
                            </div>

                            <!-- Content -->
                            <div class="card-body d-flex flex-column p-3 p-md-4">
                                <div class="mb-2">
                                    <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill">
                                        {{ $post->category->name ?? 'Uncategorized' }}
                                    </span>
                                </div>

                                <h3 class="post-title mb-3">
                                    <a href="{{ route('post.show', $post->id) }}"
                                       class="text-dark text-decoration-none">
                                        {{ $post->title }}
                                    </a>
                                </h3>

                                <div class="mb-3 text-muted small d-flex align-items-center gap-2 flex-wrap">
                                    <span><i class="bi bi-calendar me-1"></i>{{ $post->created_at->format('M j, Y') }}</span>
                                    <span class="d-none d-sm-inline">•</span>
                                    <span class="d-none d-sm-inline"><i class="bi bi-clock me-1"></i>{{ $post->created_at->diffForHumans() }}</span>
                                </div>

                                <p class="card-text mb-3 text-muted flex-grow-1">{{ $post->shortBody() }}</p>

                                <a href="{{ route('post.show', $post->id) }}"
                                   class="read-more-link align-self-start">
                                    Continue reading <i class="bi bi-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
        @endif

        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>

    @else
        <div class="empty-state text-center py-5">
            <i class="bi bi-inbox fs-1 text-muted mb-3"></i>
            <h2 class="text-muted h4">No posts available</h2>
            <p class="text-muted">Check back later for new content!</p>
        </div>
    @endif
</div>

<style>
    /* Featured Post Styles */
    .featured-post {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
        border: none;
        position: relative;
    }

    .featured-post::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
    }

    .featured-title {
        font-size: clamp(1.5rem, 4vw, 2.5rem);
        line-height: 1.2;
        transition: color 0.3s ease;
    }

    .featured-title:hover {
        color: #667eea !important;
    }

    .featured-image {
        max-height: 400px;
        object-fit: cover;
        width: 100%;
    }

    /* Post Card Styles */
    .post-card {
        transition: transform 0.3s ease;
    }

    .post-card:hover {
        transform: translateY(-8px);
    }

    .post-card .card {
        transition: box-shadow 0.3s ease;
    }

    .post-card:hover .card {
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
    }

    .post-image-wrapper {
        position: relative;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .post-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
        transition: transform 0.4s ease;
    }

    @media (min-width: 768px) {
        .post-image {
            height: 240px;
        }
    }

    .post-card:hover .post-image {
        transform: scale(1.1);
    }

    .post-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .post-card:hover .post-overlay {
        opacity: 1;
    }

    .post-title {
        font-size: clamp(1.1rem, 2vw, 1.35rem);
        font-family: 'Playfair Display', serif;
        font-weight: 600;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .post-title a {
        transition: color 0.3s ease;
    }

    .post-title a:hover {
        color: #667eea !important;
    }

    .card-text {
        font-size: 0.95rem;
        line-height: 1.6;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

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

    /* Empty State */
    .empty-state i {
        display: block;
    }

    /* Pagination Styles */
    .pagination {
        gap: 0.5rem;
    }

    .pagination .page-item .page-link {
        border-radius: 0.5rem;
        padding: 0.5rem 1rem;
        color: #667eea;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .pagination .page-item.active .page-link {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: #fff;
        border-color: transparent;
    }

    .pagination .page-item .page-link:hover {
        background-color: #667eea;
        color: #fff;
        border-color: #667eea;
        transform: translateY(-2px);
    }

    /* Mobile Responsive */
    @media (max-width: 767.98px) {
        .featured-post {
            padding: 1.5rem !important;
        }

        .featured-content .lead {
            font-size: 1rem;
        }

        .card-body {
            padding: 1rem !important;
        }

        .badge {
            font-size: 0.7rem;
        }

        .post-title {
            font-size: 1.1rem;
            margin-bottom: 0.75rem !important;
        }

        .card-text {
            font-size: 0.875rem;
            -webkit-line-clamp: 2;
        }
    }

    /* Tablet Optimizations */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .post-card .card-body {
            padding: 1.25rem !important;
        }
    }
</style>
