@extends('layouts.wrapper-admin', ['title' => 'Edit FAQ'])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit FAQ</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.faq.index') }}" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to FAQs
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label for="question" class="form-label">Question <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('question') is-invalid @enderror"
                           id="question"
                           name="question"
                           value="{{ old('question', $faq->question) }}"
                           required>
                    @error('question')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="answer" class="form-label">Answer <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('answer') is-invalid @enderror"
                              id="answer"
                              name="answer"
                              rows="6"
                              required>{{ old('answer', $faq->answer) }}</textarea>
                    @error('answer')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="order" class="form-label">Display Order</label>
                    <input type="number"
                           class="form-control @error('order') is-invalid @enderror"
                           id="order"
                           name="order"
                           value="{{ old('order', $faq->order) }}"
                           min="0">
                    @error('order')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Lower numbers appear first</div>
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input"
                               type="checkbox"
                               id="is_published"
                               name="is_published"
                               value="1"
                               {{ old('is_published', $faq->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_published">
                            Published
                        </label>
                    </div>
                    <div class="form-text">Only published FAQs will be visible on the public page</div>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Update FAQ</button>
                    <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>

            <div class="mt-3">
                <form action="{{ route('admin.faq.delete', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Delete FAQ
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
