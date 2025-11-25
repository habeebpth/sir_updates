@extends('layouts.wrapper', ['title' => 'പതിവ് ചോദ്യങ്ങൾ'])

@section('content')
<div class="container py-3 py-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10">
            <div class="mb-4 mb-md-5">
                <!-- Desktop Layout -->
                <div class="d-none d-md-flex justify-content-between align-items-start mb-4">
                    <div class="flex-grow-1">
                        <h1 class="faq-title fw-bold mb-2 mb-md-3">SIR മായി ബന്ധപ്പെട്ട് ആളുകൾക്ക് പൊതുവായി ഉണ്ടാകുന്ന സംശയങ്ങളും മറുപടികളും</h1>
                        <p class="lead text-muted mb-0">നിങ്ങളുടെ സംശയങ്ങൾക്ക് ഉത്തരം കണ്ടെത്തുക</p>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                        <x-share-button :url="route('faq.index')" :title="'SIR FAQs - പതിവ് ചോദ്യങ്ങൾ'" :simple="true" />
                    </div>
                </div>
                <!-- Mobile Layout -->
                <div class="d-block d-md-none">
                    <div class="faq-header-mobile mb-2">
                        <h1 class="faq-title fw-bold mb-0">SIR മായി ബന്ധപ്പെട്ട് ആളുകൾക്ക് പൊതുവായി ഉണ്ടാകുന്ന സംശയങ്ങളും മറുപടികളും</h1>
                        <div class="share-button-wrapper">
                            <x-share-button :url="route('faq.index')" :title="'SIR FAQs - പതിവ് ചോദ്യങ്ങൾ'" :simple="true" />
                        </div>
                    </div>
                    <p class="lead text-muted text-start mb-0">നിങ്ങളുടെ സംശയങ്ങൾക്ക് ഉത്തരം കണ്ടെത്തുക</p>
                </div>
            </div>

            @if(session('doubt_success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('doubt_success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                                <button class="accordion-button collapsed fw-semibold faq-question"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $faq->id }}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{ $faq->id }}">
                                    <span class="faq-number">{{ $index + 1 }}</span>
                                    <span class="faq-question-text">{{ $faq->question }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}"
                                 class="accordion-collapse collapse"
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

            <!-- <div class="text-center mt-4 mt-md-5">
                <div class="card border-0 bg-light p-3 p-md-4">
                    <div class="card-body">
                        <h3 class="h5 h6-mobile mb-3">ഇനിയും സംശയങ്ങൾ ഉണ്ടോ?</h3>
                        <p class="text-muted mb-3 small-mobile">നിങ്ങൾക്ക് ആവശ്യമുള്ള ഉത്തരം കണ്ടെത്താൻ കഴിയുന്നില്ലേ? ദയവായി ഞങ്ങളുടെ പോസ്റ്ററുകൾ പരിശോധിക്കുക.</p>
                        <a href="{{ route('poster.index') }}" class="btn btn-primary btn-sm-mobile">
                            <i class="bi bi-file-earmark-image me-2"></i>പോസ്റ്ററുകൾ കാണുക
                        </a>
                    </div>
                </div>
            </div> -->

            <div class="mt-4 mt-md-5" id="doubt-form">
                <div class="card border-0 bg-light">
                    <div class="card-body p-3 p-md-4">
                        <h3 class="h5 mb-3 text-center text-md-start">ഇനിയും സംശയങ്ങൾ ഉണ്ടോ? നിങ്ങളുടെ സംശയം പങ്കിടുക</h3>
                        <p class="text-muted small-mobile mb-4 text-center text-md-start">നിങ്ങളുടെ സംശയങ്ങൾ താഴെയുള്ള ഫോം വഴി അയക്കുക. പരമാവധി വേഗം മറുപടി നൽകാൻ ശ്രമിക്കുന്നതാണ്.</p>
                        <form action="{{ route('faq.doubts.store') }}" method="POST" class="faq-doubt-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label for="doubt-name" class="form-label">പേര്</label>
                                    <input type="text"
                                           name="name"
                                           id="doubt-name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="നിങ്ങളുടെ പേര്">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="doubt-phone" class="form-label">WhatsApp Number</label>
                                    <input type="text"
                                           name="phone"
                                           id="doubt-phone"
                                           class="form-control @error('phone') is-invalid @enderror"
                                           value="{{ old('phone') }}"
                                           placeholder="നമ്പർ ടൈപ്പ് ചെയ്യുക">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="doubt-message" class="form-label">സംശയം</label>
                                    <textarea
                                        name="doubt"
                                        id="doubt-message"
                                        rows="4"
                                        class="form-control @error('doubt') is-invalid @enderror"
                                        placeholder="നിങ്ങളുടെ സംശയം ഇവിടെ രേഖപ്പെടുത്തുക">{{ old('doubt') }}</textarea>
                                    @error('doubt')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-gradient px-4 py-2">
                                    <i class="bi bi-send me-2"></i>സംശയം സമർപ്പിക്കുക
                                </button>
                            </div>
                            </div>
                        </form>
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
        /* Ensure mobile layout is visible */
        .d-block.d-md-none {
            display: block !important;
        }

        .d-none.d-md-flex {
            display: none !important;
        }

        .faq-title {
            font-size: 1.25rem;
            line-height: 1.4;
            padding: 0;
            margin: 0;
        }

        /* Mobile header alignment */
        .faq-header-mobile {
            display: flex !important;
            align-items: flex-start !important;
            gap: 0.5rem !important;
            width: 100% !important;
            position: relative !important;
            z-index: 1 !important;
            margin-bottom: 0.5rem !important;
        }

        .faq-header-mobile .faq-title {
            flex: 1 !important;
            min-width: 0 !important;
            max-width: calc(100% - 50px) !important;
            word-wrap: break-word !important;
            overflow-wrap: break-word !important;
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
        }

        .faq-header-mobile .share-button-wrapper {
            flex-shrink: 0 !important;
            margin-top: 0 !important;
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            position: relative !important;
            z-index: 10 !important;
            width: auto !important;
            min-width: 36px !important;
        }

        .faq-header-mobile .share-btn {
            padding: 0.3rem 0.5rem !important;
            font-size: 0.7rem !important;
            display: inline-flex !important;
            visibility: visible !important;
            border-radius: 0.375rem !important;
            min-width: 36px !important;
            height: 36px !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .faq-header-mobile .share-btn span {
            display: none !important;
        }

        .faq-header-mobile .share-btn i {
            font-size: 0.8rem !important;
            display: inline-block !important;
            margin: 0 !important;
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

    .faq-doubt-form .form-label {
        font-weight: 600;
        color: #4a5568;
    }

    .faq-doubt-form .form-control {
        border-radius: 0.5rem;
        border: 1px solid #e2e8f0;
        padding: 0.75rem 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .faq-doubt-form .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.15);
    }

    .btn-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: #fff;
        border: none;
        border-radius: 999px;
        font-weight: 600;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-1px);
        box-shadow: 0 8px 18px rgba(118, 75, 162, 0.3);
        color: #fff;
    }
</style>
@endpush