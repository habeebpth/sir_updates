@extends('layouts.wrapper', ['title' => 'SIR Updates'])

@section('content')
    <div class="container-lg">
        <!-- Banner Section -->
        <div class="sir-banner my-3 my-md-4 p-3 p-md-4 rounded-3 shadow-sm">
            <div class="d-flex gap-2 gap-md-3 justify-content-center">
                @if(isset($sirPost))
                <a href="{{ route('post.show', $sirPost->id) }}" class="btn btn-primary rounded-pill flex-fill">
                    <i class="bi bi-info-circle me-1 me-md-2"></i>
                    <span class="btn-text">എന്താണ് SIR ?</span>
                </a>
                @endif
                <a href="{{ route('faq.index') }}" class="btn btn-outline-primary rounded-pill flex-fill">
                    <i class="bi bi-question-circle me-1 me-md-2"></i>
                    <span class="btn-text">FAQ</span>
                </a>
            </div>
        </div>

        @include('post.index.latest_posts')

    </div>

    <style>
        .sir-banner {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border: 1px solid #e2e8f0;
            position: relative;
            overflow: hidden;
        }

        .sir-banner::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .sir-banner .btn {
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            font-size: 0.85rem;
            padding: 0.6rem 1rem;
            max-width: 200px;
        }

        .sir-banner .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border: none;
        }

        .sir-banner .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        .sir-banner .btn-outline-primary {
            border: 2px solid #667eea;
            color: #667eea;
        }

        .sir-banner .btn-outline-primary:hover {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-color: transparent;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        /* Mobile responsive */
        @media (max-width: 575.98px) {
            .sir-banner .btn {
                font-size: 0.75rem;
                padding: 0.5rem 0.75rem;
            }

            .sir-banner .btn i {
                font-size: 0.9rem;
            }
        }

        /* Desktop */
        @media (min-width: 768px) {
            .sir-banner .btn {
                font-size: 1rem;
                padding: 0.75rem 1.5rem;
                max-width: 250px;
            }
        }
    </style>
@endsection
