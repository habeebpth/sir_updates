@extends('layouts.wrapper-admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">
            <i class="bi bi-building me-2"></i>
            Organization Representative Responses
        </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.organization-representative.export') }}"
                   class="btn btn-success d-flex align-items-center gap-2">
                    <i class="bi bi-file-earmark-excel"></i>
                    Export Excel
                </a>
            </div>
        </div>
    </div>
    @if($records->count() > 0)
        <div class="mb-4">
            <span class="badge bg-primary badge-custom">
                <i class="bi bi-file-earmark-text me-1"></i>
                Total Responses: {{ $records->total() }}
            </span>
        </div>
        @foreach($records as $record)
            <div class="record-card mb-4">
                <div class="record-header">
                    <div class="org-name">{{ $record->organization_name }}</div>
                    <div class="filled-by-info">
                        <div class="info-item">
                            <i class="bi bi-person-fill text-primary"></i>
                            <span><strong>Filled by:</strong> {{ $record->filled_by_name }}</span>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-telephone-fill text-success"></i>
                            <span>{{ $record->filled_by_mobile }}</span>
                        </div>
                        <div class="info-item">
                            <i class="bi bi-calendar-fill text-info"></i>
                            <span>{{ $record->created_at->format('M j, Y h:i A') }}</span>
                        </div>
                    </div>
                </div>
                <div class="record-body">
                    @foreach($districts as $districtKey => $districtName)
                        @php
                            $hasCoordinator1 = $record["{$districtKey}_coordinator1_name"] || $record["{$districtKey}_coordinator1_position"] || $record["{$districtKey}_coordinator1_phone"] || $record["{$districtKey}_coordinator1_whatsapp"];
                            $hasCoordinator2 = $record["{$districtKey}_coordinator2_name"] || $record["{$districtKey}_coordinator2_position"] || $record["{$districtKey}_coordinator2_phone"] || $record["{$districtKey}_coordinator2_whatsapp"];
                            $hasAnyCoordinator = $hasCoordinator1 || $hasCoordinator2;
                        @endphp
                        @if($hasAnyCoordinator)
                            <div class="district-section mb-3">
                                <div class="district-title">
                                    <i class="bi bi-geo-alt-fill me-2"></i>{{ $districtName }}
                                </div>
                                @if($hasCoordinator1)
                                    <div class="coordinator-card mb-2">
                                        <div class="coordinator-label">Coordinator 1</div>
                                        <div class="coordinator-details">
                                            @if($record["{$districtKey}_coordinator1_position"])
                                                <div class="detail-row">
                                                    <span class="detail-label">Position</span>
                                                    <span class="detail-value">{{ $record["{$districtKey}_coordinator1_position"] }}</span>
                                                </div>
                                            @endif
                                            @if($record["{$districtKey}_coordinator1_name"])
                                                <div class="detail-row">
                                                    <span class="detail-label">Name</span>
                                                    <span class="detail-value">{{ $record["{$districtKey}_coordinator1_name"] }}</span>
                                                </div>
                                            @endif
                                            @if($record["{$districtKey}_coordinator1_phone"])
                                                <div class="detail-row">
                                                    <span class="detail-label">Phone</span>
                                                    <span class="detail-value">
                                                        <a href="tel:{{ $record["{$districtKey}_coordinator1_phone"] }}" class="text-decoration-none">
                                                            {{ $record["{$districtKey}_coordinator1_phone"] }}
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif
                                            @if($record["{$districtKey}_coordinator1_whatsapp"])
                                                <div class="detail-row">
                                                    <span class="detail-label">WhatsApp</span>
                                                    <span class="detail-value">
                                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $record["{$districtKey}_coordinator1_whatsapp"]) }}" target="_blank" class="text-decoration-none">
                                                            {{ $record["{$districtKey}_coordinator1_whatsapp"] }}
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if($hasCoordinator2)
                                    <div class="coordinator-card mb-2">
                                        <div class="coordinator-label">Coordinator 2</div>
                                        <div class="coordinator-details">
                                            @if($record["{$districtKey}_coordinator2_position"])
                                                <div class="detail-row">
                                                    <span class="detail-label">Position</span>
                                                    <span class="detail-value">{{ $record["{$districtKey}_coordinator2_position"] }}</span>
                                                </div>
                                            @endif
                                            @if($record["{$districtKey}_coordinator2_name"])
                                                <div class="detail-row">
                                                    <span class="detail-label">Name</span>
                                                    <span class="detail-value">{{ $record["{$districtKey}_coordinator2_name"] }}</span>
                                                </div>
                                            @endif
                                            @if($record["{$districtKey}_coordinator2_phone"])
                                                <div class="detail-row">
                                                    <span class="detail-label">Phone</span>
                                                    <span class="detail-value">
                                                        <a href="tel:{{ $record["{$districtKey}_coordinator2_phone"] }}" class="text-decoration-none">
                                                            {{ $record["{$districtKey}_coordinator2_phone"] }}
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif
                                            @if($record["{$districtKey}_coordinator2_whatsapp"])
                                                <div class="detail-row">
                                                    <span class="detail-label">WhatsApp</span>
                                                    <span class="detail-value">
                                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $record["{$districtKey}_coordinator2_whatsapp"]) }}" target="_blank" class="text-decoration-none">
                                                            {{ $record["{$districtKey}_coordinator2_whatsapp"] }}
                                                        </a>
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-4">
            {{ $records->links() }}
        </div>
    @else
        <div class="empty-state">
            <i class="bi bi-inbox" style="font-size: 4rem; opacity: 0.3;"></i>
            <h3 class="mt-3">No Responses Yet</h3>
            <p>There are no organization representative responses submitted yet.</p>
        </div>
    @endif
</div>
<style>
    .page-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 2rem 0;
        margin-bottom: 2rem;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .record-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        margin-bottom: 1.5rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .record-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
    }
    .record-header {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        padding: 1.25rem 1.5rem;
        border-bottom: 2px solid #dee2e6;
    }
    .record-body {
        padding: 1.5rem;
    }
    .org-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }
    .filled-by-info {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        margin-top: 0.75rem;
    }
    .info-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #4a5568;
    }
    .district-section {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 1.25rem;
        margin-bottom: 1rem;
    }
    .district-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #667eea;
        margin-bottom: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid #e2e8f0;
    }
    .coordinator-card {
        background: white;
        border-radius: 6px;
        padding: 1rem;
        margin-bottom: 0.75rem;
        border-left: 3px solid #667eea;
    }
    .coordinator-label {
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }
    .coordinator-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 0.75rem;
    }
    .detail-row {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }
    .detail-label {
        font-size: 0.75rem;
        color: #718096;
        text-transform: uppercase;
        font-weight: 600;
    }
    .detail-value {
        color: #2d3748;
        font-size: 0.95rem;
    }
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: #718096;
    }
    .badge-custom {
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 500;
        font-size: 0.875rem;
    }
    @media (max-width: 768px) {
        .filled-by-info {
            gap: 1rem;
        }
        .coordinator-details {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection


































































































































































































































































































