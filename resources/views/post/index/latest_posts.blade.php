@php
    /** @var \App\Models\Post $post */
@endphp

<div class="latest-posts-section">
    @if($posts->isNotEmpty())
        <!-- Posts List -->
        <div class="row g-3 g-md-4">
            @foreach($posts as $post)
                <div class="col-12 col-lg-6">
                    <article class="post-list-item h-100">
                        <a href="{{ route('post.show', $post->id) }}" class="card border-0 shadow-sm text-decoration-none d-block h-100">
                            <div class="row g-0 h-100">
                                <!-- Image -->
                                <div class="col-4 col-md-3">
                                    <div class="post-list-image-wrapper">
                                        <img src="{{ $post->preview_image_url }}"
                                             class="post-list-image"
                                             alt="{{ $post->title }}"
                                             loading="lazy">
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="col-8 col-md-9">
                                    <div class="card-body p-3 p-md-4">
                                        <div class="mb-2">
                                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill small">
                                                {{ $post->category->name ?? 'Uncategorized' }}
                                            </span>
                                        </div>

                                        <h3 class="post-list-title mb-2 mb-md-3 text-dark" style="font-family: 'Playfair Display', serif;">
                                            {{ $post->title }}
                                        </h3>

                                        <div class="mb-2 text-muted small d-flex align-items-center gap-2">
                                            <i class="bi bi-calendar2"></i>
                                            <span>{{ $post->created_at->format('M j, Y') }}</span>
                                        </div>

                                        <p class="card-text text-muted small mb-0 d-none d-md-block post-excerpt">
                                            {{ $post->shortBody() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </article>
                </div>
            @endforeach
        </div>

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
    /* Post List Item Styles */
    .post-list-item .card {
        transition: all 0.3s ease;
        border-radius: 0.75rem;
        overflow: hidden;
    }

    .post-list-item .card:hover {
        transform: translateY(-4px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    .post-list-image-wrapper {
        height: 100%;
        min-height: 120px;
        overflow: hidden;
        background-color: #f8f9fa;
    }

    .post-list-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        transition: transform 0.4s ease;
    }

    .post-list-item .card:hover .post-list-image {
        transform: scale(1.1);
    }

    .post-list-title {
        font-size: clamp(1rem, 2.5vw, 1.25rem);
        font-weight: 600;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: color 0.3s ease;
    }

    .post-list-item .card:hover .post-list-title {
        color: #667eea !important;
    }

    .post-excerpt {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        line-height: 1.5;
    }

    /* Responsive adjustments */
    @media (min-width: 768px) {
        .post-list-image-wrapper {
            min-height: 150px;
        }

        .post-list-title {
            -webkit-line-clamp: 3;
        }
    }

    @media (max-width: 575.98px) {
        .post-list-image-wrapper {
            min-height: 100px;
        }

        .post-list-item .card-body {
            padding: 0.75rem !important;
        }
    }

    /* Empty State */
    .empty-state {
        min-height: 400px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

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
</style>
