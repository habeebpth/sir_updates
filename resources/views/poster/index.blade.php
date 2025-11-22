@extends('layouts.wrapper', ['title' => 'Posters'])

@section('content')
<div class="container-lg py-4">
    @if($posters->count() > 0)
    <!-- Posters List -->
    <div class="row">
        <div class="col-12">
            <div class="list-group">
                @foreach($posters as $poster)
                <a href="{{ route('post.show', $poster->id) }}" class="list-group-item list-group-item-action poster-list-item border-0 mb-3 shadow-sm text-decoration-none">
                    <div class="d-flex w-100 align-items-center gap-3 justify-content-start">
                        <i class="bi bi-file-earmark-text fs-4 text-primary d-none d-md-inline"></i>
                        <h5 class="poster-list-title mb-0 flex-grow-1" style="font-family: 'Playfair Display', serif; text-align: left !important;">
                            {{ $poster->title }}
                        </h5>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            {{ $posters->links() }}
        </div>
    </div>

    @else
    <!-- Empty State -->
    <div class="empty-state text-center py-5">
        <i class="bi bi-file-earmark-image fs-1 text-muted mb-3 d-block"></i>
        <h2 class="text-muted h4 mb-2">No posts available</h2>
        <p class="text-muted">Check back later for new content!</p>
    </div>
    @endif
</div>

<style>
    /* Section Header */
    .section-header {
        padding-bottom: 1rem;
    }

    .title-underline {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #667eea, #764ba2);
        border-radius: 2px;
    }

    .section-title {
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-weight: 700;
        color: #1a202c;
    }

    /* Poster List Item */
    .poster-list-item {
        background: white;
        border-radius: 0.75rem;
        padding: 1.5rem;
        transition: all 0.3s ease;
        border: 1px solid #e2e8f0;
    }

    .poster-list-item:hover {
        transform: translateX(8px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        border-color: #667eea;
    }

    .poster-list-title {
        font-size: clamp(1.1rem, 2vw, 1.35rem);
        font-weight: 600;
        color: #1a202c;
        transition: color 0.3s ease;
        text-align: left !important;
        width: 100%;
    }

    .poster-list-item:hover .poster-list-title {
        color: #667eea;
    }

    /* Modal Image */
    .modal-body img {
        max-height: 70vh;
        object-fit: contain;
        background-color: #f8f9fa;
    }

    /* Empty State */
    .empty-state {
        min-height: 400px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    /* Mobile Responsive */
    @media (max-width: 575.98px) {
        .section-title {
            font-size: 1.75rem;
        }

        .poster-list-item {
            padding: 1rem;
        }

        .poster-list-item .d-flex.w-100 {
            align-items: flex-start !important;
        }

        .poster-list-item .d-flex.gap-2 {
            margin-top: 1rem;
            margin-left: 0 !important;
            width: 100%;
        }

        .poster-list-item .btn {
            flex: 1;
        }

        .poster-list-title {
            font-size: 1.1rem;
            text-align: left !important;
        }
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
        .poster-list-item {
            padding: 1.25rem;
        }
    }
</style>
@endsection
