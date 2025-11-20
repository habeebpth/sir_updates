@extends('layouts.wrapper-admin', ['title' => 'FAQs'])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">FAQs</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('admin.faq.create') }}" class="btn btn-sm btn-primary">
                <i class="bi bi-plus-circle"></i> Add New FAQ
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="width: 5%">ID</th>
                    <th style="width: 5%">Order</th>
                    <th style="width: 30%">Question</th>
                    <th style="width: 40%">Answer</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 10%">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                    <tr>
                        <td>{{ $faq->id }}</td>
                        <td>{{ $faq->order }}</td>
                        <td>{{ Str::limit($faq->question, 50) }}</td>
                        <td>{{ Str::limit($faq->answer, 80) }}</td>
                        <td>
                            @if($faq->is_published)
                                <span class="badge bg-success">Published</span>
                            @else
                                <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm" role="group">
                                <a href="{{ route('admin.faq.show', $faq->id) }}" class="btn btn-outline-primary" title="View">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-outline-success" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.faq.delete', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No FAQs found. <a href="{{ route('admin.faq.create') }}">Create one now</a></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $faqs->links() }}
    </div>
@endsection
