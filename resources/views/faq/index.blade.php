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
                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-semibold faq-question"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}"
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                        aria-controls="collapse{{ $faq->id }}">
                                    <i class="bi bi-question-circle me-2 flex-shrink-0"></i>
                                    <span>{{ $faq->question }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}"
                                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                 aria-labelledby="heading{{ $faq->id }}"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body faq-answer">
                                    <p class="mb-0">{!! nl2br(e($faq->answer)) !!}</p>
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
                        <p class="text-muted mb-3 small-mobile">നിങ്ങൾക്ക് ആവശ്യമുള്ള ഉത്തരം കണ്ടെത്താൻ കഴിയുന്നില്ലേ? ദയവായി ഞങ്ങളുടെ സപ്പോർട്ട് ടീമുമായി ബന്ധപ്പെടുക.</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary btn-sm-mobile">
                            <i class="bi bi-envelope me-2"></i>ഞങ്ങളെ ബന്ധപ്പെടുക
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
    }

    /* Tablet Responsive Styles */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .faq-title {
            font-size: 1.75rem;
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
    }

    .accordion-button {
        padding: 1.25rem 1.5rem;
        text-align: left;
    }

    .accordion-body {
        padding: 1.5rem;
        color: #6c757d;
        line-height: 1.8;
    }

    /* Ensure proper text wrapping */
    .accordion-button span {
        word-wrap: break-word;
        overflow-wrap: break-word;
    }

    /* Better spacing for icon */
    .accordion-button i {
        margin-right: 0.75rem;
    }

    @media (max-width: 575.98px) {
        .accordion-button i {
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }
    }
</style>
@endpush
