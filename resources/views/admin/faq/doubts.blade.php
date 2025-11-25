@extends('layouts.wrapper-admin', ['title' => 'SIR Doubts'])

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">SIR Doubts</h1>
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
                    <th style="width: 3%;">#</th>
                    <th style="width: 15%;">Name</th>
                    <th style="width: 12%;">Phone</th>
                    <th style="width: 35%;">Doubt</th>
                    <th style="width: 12%;">Submitted</th>
                    <th style="width: 8%;">Status</th>
                    <th style="width: 15%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doubts as $doubt)
                    <tr>
                        <td>{{ $doubt->id }}</td>
                        <td>{{ $doubt->name }}</td>
                        <td>
                            <a href="tel:{{ $doubt->phone }}" class="text-decoration-none">{{ $doubt->phone }}</a>
                        </td>
                        <td>{{ Str::limit($doubt->doubt, 150) }}</td>
                        <td>{{ $doubt->created_at?->format('M d, Y h:i A') }}</td>
                        <td>
                            @if($doubt->is_reviewed)
                                <span class="badge bg-success">Replied</span>
                            @else
                                <span class="badge bg-warning text-dark">New</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1 align-items-center justify-content-center">
                                @php
                                    $phoneNumber = preg_replace('/[^0-9]/', '', $doubt->phone);
                                    $whatsappUrl = 'https://wa.me/' . $phoneNumber . '?text=' . urlencode('നമസ്‌കാരം ' . $doubt->name . ', SIR സംബന്ധിച്ച താങ്കളുടെ സംശയം സംബന്ധിച്ച്: ' . Str::limit($doubt->doubt, 50));
                                @endphp
                                <a href="{{ $whatsappUrl }}" 
                                   target="_blank" 
                                   class="btn btn-sm btn-success action-btn" 
                                   title="Reply via WhatsApp">
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                                @if(!$doubt->is_reviewed)
                                    <form action="{{ route('admin.faq.doubts.update', $doubt->id) }}" 
                                          method="POST" 
                                          class="d-inline m-0"
                                          onsubmit="return confirm('Mark this doubt as replied?');">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-sm btn-primary action-btn" title="Mark as Replied">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </form>
                                @else
                                    <button type="button" class="btn btn-sm btn-outline-secondary action-btn" disabled title="Already Replied">
                                        <i class="bi bi-check-circle-fill"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No doubts submitted yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center">
        {{ $doubts->links() }}
    </div>
@endsection

@push('styles')
<style>
    .table td {
        vertical-align: middle;
    }
    
    /* Icon-only buttons - clean and compact */
    .table .action-btn {
        padding: 0.5rem !important;
        font-size: 0 !important;
        white-space: nowrap !important;
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
        line-height: 1 !important;
        border-radius: 0.375rem !important;
        transition: all 0.2s ease;
        height: 2.25rem !important;
        width: 2.25rem !important;
        vertical-align: middle;
        border: 1px solid transparent !important;
        min-height: 2.25rem !important;
        min-width: 2.25rem !important;
        text-decoration: none !important;
    }
    
    /* Icon styling - perfectly centered */
    .table .action-btn i.bi {
        font-size: 1.1rem !important;
        line-height: 1 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin: 0 !important;
        padding: 0 !important;
        vertical-align: 0 !important;
        height: 1em !important;
        width: 1em !important;
        position: relative !important;
        top: 0 !important;
    }
    
    .table .action-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .table .action-btn:active {
        transform: translateY(0);
    }
    
    .table .action-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    /* Ensure form buttons align properly */
    .table form.d-inline {
        display: inline-block !important;
        margin: 0 !important;
        padding: 0 !important;
        vertical-align: middle !important;
    }
</style>
@endpush


