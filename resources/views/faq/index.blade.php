@extends('layouts.wrapper', ['title' => 'പതിവ് ചോദ്യങ്ങൾ'])

@section('content')
<div class="container py-3 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="text-center mb-4 mb-md-5">
                <h1 class="faq-title fw-bold mb-2 mb-md-3">SIR മായി ബന്ധപ്പെട്ട് ആളുകൾക്ക് പൊതുവായി ഉണ്ടാകുന്ന സംശയങ്ങളും മറുപടികളും</h1>
                <p class="lead text-muted d-none d-md-block">നിങ്ങളുടെ സംശയങ്ങൾക്ക് ഉത്തരം കണ്ടെത്തുക</p>
            </div>

            @if($faqs->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    ഇപ്പോൾ FAQ കൾ ലഭ്യമല്ല. ദയവായി പിന്നീട് വീണ്ടും പരിശോധിക്കുക.
                </div>
            @else
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-2 mb-md-3 border rounded shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button {{ $index !== 0 ? '' : '' }} fw-semibold faq-question"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $faq->id }}">
                                    <span class="faq-number">{{ $index + 1 }}</span>
                                    <span class="faq-question-text">{{ $faq->question }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}"
                                 class="accordion-collapse collapse {{ $index === 0 ? '' : '' }}"
                                 aria-labelledby="heading{{ $faq->id }}"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body faq-answer">
                                    {{-- <p class="mb-0">{!! nl2br(e($faq->answer)) !!}</p> --}}
                                    <p class="mb-0">{!! $faq->answer !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-4 mt-md-5">
                <div class="card border-0 bg-light p-3 p-md-4">
                    <div class="card-body">
                        <h3 class="h5 h6-mobile mb-3">ഇനിയും സംശയങ്ങൾ ഉണ്ടോ?</h3>
                        <p class="text-muted mb-3 small-mobile">നിങ്ങൾക്ക് ആവശ്യമുള്ള ഉത്തരം കണ്ടെത്താൻ കഴിയുന്നില്ലേ? ദയവായി ഞങ്ങളുടെ പോസ്റ്ററുകൾ പരിശോധിക്കുക.</p>
                        <a href="{{ route('poster.index') }}" class="btn btn-primary btn-sm-mobile">
                            <i class="bi bi-file-earmark-image me-2"></i>പോസ്റ്ററുകൾ കാണുക
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    /* Title Styling - Desktop */
    .faq-title {
        font-size: 2rem;
        line-height: 1.3;
        color: #2c3e50;
    }

    /* FAQ Number Badge Styling */
    .faq-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 36px;
        height: 36px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 10px;
        font-weight: 700;
        font-size: 1rem;
        margin-right: 1rem;
        flex-shrink: 0;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        transition: all 0.3s ease;
    }

    .accordion-button:not(.collapsed) .faq-number {
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .faq-question-text {
        flex: 1;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* Mobile Responsive Styles */
    @media (max-width: 767.98px) {
        .faq-title {
            font-size: 1.25rem;
            line-height: 1.4;
            padding: 0 10px;
        }

        .h6-mobile {
            font-size: 1rem;
        }

        .small-mobile {
            font-size: 0.875rem;
        }

        .btn-sm-mobile {
            font-size: 0.875rem;
            padding: 0.5rem 1rem;
        }

        .faq-question {
            font-size: 0.95rem;
            padding: 0.875rem 1rem;
        }

        .faq-answer {
            font-size: 0.9rem;
            padding: 1rem;
        }

        .faq-number {
            min-width: 30px;
            height: 30px;
            font-size: 0.875rem;
            margin-right: 0.75rem;
            border-radius: 8px;
        }
    }

    /* Tablet Responsive Styles */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .faq-title {
            font-size: 1.75rem;
        }

        .faq-number {
            min-width: 34px;
            height: 34px;
            font-size: 0.95rem;
            margin-right: 0.875rem;
        }
    }

    /* Small Mobile */
    @media (max-width: 575.98px) {
        .faq-number {
            min-width: 28px;
            height: 28px;
            font-size: 0.8rem;
            margin-right: 0.6rem;
            border-radius: 7px;
        }
    }

    /* Accordion Styling */
    .accordion-button:not(.collapsed) {
        background-color: #f8f9fa;
        color: #0d6efd;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0,0,0,.125);
    }

    .accordion-item {
        border: 1px solid rgba(0,0,0,.125);
        transition: all 0.3s ease;
    }

    .accordion-item:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,.1) !important;
        transform: translateY(-2px);
    }

    .accordion-button {
        padding: 1.25rem 1.5rem;
        text-align: left;
        display: flex;
        align-items: center;
    }

    .accordion-body {
        padding: 1.5rem;
        color: #6c757d;
        line-height: 1.8;
    }
</style>
@endpush