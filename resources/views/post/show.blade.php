@extends('layouts.wrapper', ['title' => $post->title])

@push('styles')
<style>
    /* Back Button */
    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #667eea;
        text-decoration: none;
        font-weight: 500;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        transition: all 0.3s ease;
        margin-bottom: 1rem;
    }

    .back-button:hover {
        background-color: #f8f9fa;
        color: #764ba2;
    }

    .back-button i {
        font-size: 1.25rem;
    }

    /* Post Detail Page Styles */
    .post-detail-container {
        max-width: 900px;
    }

    .post-header {
        padding: 2rem 0;
    }

    .post-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.75rem, 5vw, 2.75rem);
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 1.5rem;
        color: #1a202c;
    }

    .post-meta {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.25rem;
        border-radius: 0.75rem;
        border-left: 4px solid #667eea;
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        align-items: center;
    }

    .post-meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.95rem;
    }

    .post-meta-item i {
        color: #667eea;
        font-size: 1.1rem;
    }

    .featured-image-wrapper {
        position: relative;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
        margin-bottom: 3rem;
    }

    .featured-image-wrapper img {
        width: 100%;
        height: auto;
        display: block;
    }

    .post-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #2d3748;
    }

    .post-content p {
        margin-bottom: 1.5rem;
    }

    .post-content h2,
    .post-content h3,
    .post-content h4 {
        font-family: 'Playfair Display', serif;
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #1a202c;
    }

    .post-content img {
        max-width: 100%;
        height: auto;
        border-radius: 0.5rem;
        margin: 2rem 0;
    }

    .post-content blockquote {
        border-left: 4px solid #667eea;
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: #4a5568;
    }

    .tags-section {
        padding: 2rem 0;
        border-top: 1px solid #e2e8f0;
        border-bottom: 1px solid #e2e8f0;
    }

    .tag-badge {
        display: inline-block;
        padding: 0.5rem 1rem;
        margin: 0.25rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border-radius: 2rem;
        font-size: 0.875rem;
        font-weight: 500;
        text-decoration: none;
        transition: transform 0.2s ease;
    }

    .tag-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(102, 126, 234, 0.3);
    }

    .like-section {
        background: linear-gradient(135deg, #fff5f5 0%, #ffe5e5 100%);
        padding: 2rem;
        border-radius: 1rem;
        border: 2px solid #feb2b2;
    }

    .like-button {
        min-width: 120px;
        padding: 0.75rem 1.5rem;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }

    .like-button:hover {
        transform: scale(1.05);
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 700;
        color: #1a202c;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .comment-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
    }

    .comment-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transform: translateY(-2px);
    }

    .comment-author {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1rem;
    }

    .comment-author-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.25rem;
    }

    .comment-form {
        background: linear-gradient(135deg, #f7fafc 0%, #edf2f7 100%);
        padding: 2rem;
        border-radius: 1rem;
        border: 1px solid #e2e8f0;
    }

    .form-control {
        border: 2px solid #e2e8f0;
        border-radius: 0.75rem;
        padding: 0.875rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .related-posts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .related-post-card {
        border-radius: 0.75rem;
        overflow: hidden;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }

    .related-post-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .related-post-card img {
        width: 100%;
        height: 180px;
        object-fit: cover;
    }

    .related-post-title {
        padding: 1rem;
        font-family: 'Playfair Display', serif;
        font-size: 1.1rem;
        font-weight: 600;
        color: #1a202c;
    }

    .related-post-title:hover {
        color: #667eea;
    }

    /* Mobile Responsive */
    @media (max-width: 767.98px) {
        .post-header {
            padding: 1rem 0;
        }

        .post-title {
            font-size: 1.75rem;
            margin-bottom: 1rem;
        }

        .post-meta {
            padding: 1rem;
            gap: 0.75rem;
        }

        .post-meta-item {
            font-size: 0.85rem;
        }

        .featured-image-wrapper {
            margin-bottom: 2rem;
            border-radius: 0.5rem;
        }

        .post-content {
            font-size: 1rem;
            line-height: 1.7;
        }

        .like-section {
            padding: 1.5rem;
        }

        .like-button {
            width: 100%;
            justify-content: center;
        }

        .comment-card {
            padding: 1rem;
        }

        .comment-form {
            padding: 1.5rem;
        }

        .related-posts-grid {
            grid-template-columns: 1fr;
        }

        .tag-badge {
            font-size: 0.8rem;
            padding: 0.4rem 0.8rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        .related-posts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }
</style>
@endpush

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-12 col-lg-10 mx-auto post-detail-container">
            <!-- Back Button -->
            <a href="javascript:history.back()" class="back-button">
                <i class="bi bi-arrow-left"></i>
                <span class="d-none d-sm-inline">Back</span>
            </a>

            <!-- Post Header -->
            <article class="post-header">
                <h1 class="post-title">{{ $post->title }}</h1>

                <div class="post-meta">
                    <div class="post-meta-item">
                        <i class="bi bi-calendar3"></i>
                        <span>{{ $date->day }} {{ $date->translatedFormat('F') }} {{ $date->year }}</span>
                    </div>
                    <div class="post-meta-item">
                        <i class="bi bi-clock"></i>
                        <span>{{ $date->format('H:i') }}</span>
                    </div>
                    <div class="post-meta-item">
                        <i class="bi bi-chat-dots"></i>
                        <span>{{ $post->comments->count() }} {{ $post->comments->count() == 1 ? 'comment' : 'comments' }}</span>
                    </div>
                    @if($post->category)
                    <div class="post-meta-item">
                        <i class="bi bi-folder"></i>
                        <span>{{ $post->category->name }}</span>
                    </div>
                    @endif
                </div>
            </article>

            <!-- Featured Image -->
            <div class="featured-image-wrapper">
                <img src="{{ $post->main_image_url }}" alt="{{ $post->title }}" loading="lazy">
            </div>

            <!-- Post Content -->
            <div class="post-content mb-5">
                {!! $post->content !!}
            </div>

            <!-- Tags -->
            @if($post->tags && $post->tags->count() > 0)
            <div class="tags-section mb-5">
                <h5 class="mb-3 fw-semibold"><i class="bi bi-tags me-2"></i>Tags</h5>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($post->tags as $tag)
                        <span class="tag-badge">{{ $tag->title }}</span>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Like Section -->
            <div class="like-section mb-5">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                    <div class="d-flex align-items-center gap-3">
                        @auth()
                            <form action="{{ route('post.likes.store', $post->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger like-button rounded-pill d-flex align-items-center gap-2 shadow">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="bi bi-heart-fill fs-5"></i>
                                    @else
                                        <i class="bi bi-heart fs-5"></i>
                                    @endif
                                    <span class="fw-semibold">{{ $post->liked_users_count }}</span>
                                </button>
                            </form>
                        @else
                            <div class="d-flex align-items-center gap-2 like-button btn btn-outline-danger rounded-pill">
                                <i class="bi bi-heart fs-5"></i>
                                <span class="fw-semibold">{{ $post->liked_users_count }}</span>
                            </div>
                        @endauth
                    </div>
                    <div class="text-center text-md-end">
                        <span class="text-muted fw-medium">
                            <strong>{{ $post->liked_users_count }}</strong> {{ $post->liked_users_count == 1 ? 'person likes' : 'people like' }} this post
                        </span>
                    </div>
                </div>
            </div>

            <!-- Related Posts -->
            @if(isset($relatedPosts) && $relatedPosts->count() > 0)
            <section class="mb-5">
                <h2 class="section-title">Related Posts</h2>
                <div class="related-posts-grid">
                    @foreach($relatedPosts as $relatedPost)
                        <a href="{{ route('post.show', $relatedPost->id) }}" class="related-post-card text-decoration-none">
                            <img src="{{ $relatedPost->main_image_url ?? $relatedPost->preview_image_url }}"
                                 alt="{{ $relatedPost->title }}"
                                 loading="lazy">
                            <h5 class="related-post-title">{{ $relatedPost->title }}</h5>
                        </a>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Comments Section -->
            <section class="mb-5">
                <h2 class="section-title">Comments ({{ $post->comments->count() }})</h2>

                @forelse($post->comments as $comment)
                    <div class="comment-card">
                        <div class="comment-author">
                            <div class="comment-author-icon">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div>
                                <div class="fw-bold">{{ $comment->user->name }}</div>
                                <div class="text-muted small">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ $comment->created_at ? $comment->created_at->diffForHumans() : 'Just now' }}
                                </div>
                            </div>
                        </div>
                        <p class="mb-0">{{ $comment->message }}</p>
                    </div>
                @empty
                    <div class="text-center py-4 text-muted">
                        <i class="bi bi-chat-square-dots fs-1 d-block mb-2"></i>
                        <p>No comments yet. Be the first to comment!</p>
                    </div>
                @endforelse
            </section>

            <!-- Add Comment Section -->
            @auth()
            <section class="mb-5">
                <h2 class="section-title">Add Your Comment</h2>
                <div class="comment-form">
                    <form action="{{ route('post.comments.store', $post->id) }}" method="post">
                        @csrf
                        <div class="mb-4">
                            <label for="comment" class="form-label fw-semibold">
                                <i class="bi bi-pencil-square me-2"></i>Your Thoughts
                            </label>
                            <textarea name="message"
                                      id="comment"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Share your thoughts about this post..."
                                      required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 d-flex align-items-center gap-2 shadow">
                                <i class="bi bi-send-fill"></i>
                                <span>Post Comment</span>
                            </button>
                        </div>
                    </form>
                </div>
            </section>
            @else
            <div class="alert alert-info rounded-pill text-center">
                <i class="bi bi-info-circle me-2"></i>
                Please <a href="{{ route('login') }}" class="alert-link fw-bold">login</a> to leave a comment
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
