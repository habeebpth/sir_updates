@extends('layouts.wrapper', ['title' => 'Frequently Asked Questions'])

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="text-center mb-5">
                <h1 class="display-4 fw-bold mb-3">Frequently Asked Questions</h1>
                <p class="lead text-muted">Find answers to common questions about our services</p>
            </div>

            @if($faqs->isEmpty())
                <div class="alert alert-info text-center" role="alert">
                    <i class="bi bi-info-circle me-2"></i>
                    No FAQs available at the moment. Please check back later.
                </div>
            @else
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $index => $faq)
                        <div class="accordion-item mb-3 border rounded shadow-sm">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }} fw-semibold" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse{{ $faq->id }}" 
                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                        aria-controls="collapse{{ $faq->id }}">
                                    <i class="bi bi-question-circle me-2"></i>
                                    {{ $faq->question }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" 
                                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                 aria-labelledby="heading{{ $faq->id }}" 
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="mb-0">{!! nl2br(e($faq->answer)) !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="text-center mt-5">
                <div class="card border-0 bg-light p-4">
                    <div class="card-body">
                        <h3 class="h5 mb-3">Still have questions?</h3>
                        <p class="text-muted mb-3">Can't find the answer you're looking for? Please get in touch with our support team.</p>
                        <a href="{{ route('contact.index') }}" class="btn btn-primary">
                            <i class="bi bi-envelope me-2"></i>Contact Us
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
    }
    
    .accordion-body {
        padding: 1.5rem;
        color: #6c757d;
        line-height: 1.8;
    }
</style>
@endpush
