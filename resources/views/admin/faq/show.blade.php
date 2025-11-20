@extends('layouts.wrapper-admin', ['title' => 'FAQ Details'])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">FAQ Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-sm btn-outline-primary">
                    <i class="bi bi-pencil"></i> Edit
                </a>
                <a href="{{ route('admin.faq.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Back to FAQs
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th style="width: 150px;">ID</th>
                                <td>{{ $faq->id }}</td>
                            </tr>
                            <tr>
                                <th>Question</th>
                                <td>{{ $faq->question }}</td>
                            </tr>
                            <tr>
                                <th>Answer</th>
                                <td>{{ $faq->answer }}</td>
                            </tr>
                            <tr>
                                <th>Display Order</th>
                                <td>{{ $faq->order }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($faq->is_published)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $faq->created_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $faq->updated_at->format('Y-m-d H:i:s') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-primary">Edit FAQ</a>
                <a href="{{ route('admin.faq.index') }}" class="btn btn-secondary">Back to List</a>
                <form action="{{ route('admin.faq.delete', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
