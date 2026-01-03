@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-3 px-md-5 pt-3">

    {{-- Header --}}
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
        <div>
            <h1 class="fw-bold mb-1">Hi, {{ $studentName }} 👋</h1>
            <p class="text-muted mb-0">Here’s your parking summary today.</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('student.vehicles.create') }}" class="btn btn-maroon">
                <i class="bi bi-plus-circle me-1"></i> Add Vehicle
            </a>
            <a href="{{ route('student.vehicles.index') }}" class="btn btn-outline-maroon">
                <i class="bi bi-car-front me-1"></i> Manage
            </a>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6">
            <div class="card dash-card h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small mb-1">Total Vehicles</div>
                        <div class="display-6 fw-bold mb-0">{{ $totalVehicles }}</div>
                    </div>
                    <div class="dash-icon bg-maroon-soft text-maroon">
                        <i class="bi bi-car-front"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="{{ route('student.vehicles.index') }}" class="dash-link">
                        View vehicles <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card dash-card h-100">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-muted small mb-1">Violations</div>
                        <div class="display-6 fw-bold mb-0">{{ $totalViolations }}</div>
                    </div>
                    <div class="dash-icon bg-warning-soft text-warning">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="{{ route('student.violations.index') }}" class="dash-link">
                        View violations <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Logbook --}}
    <div class="card dash-card mb-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-3">
                <div>
                    <h5 class="fw-bold mb-1">Your Logbook</h5>
                    <p class="text-muted small mb-0">Entry/Exit activity per vehicle.</p>
                </div>
            </div>

            @if (count($logbookTabs) === 0)
                <div class="empty-state">
                    <div class="empty-icon"><i class="bi bi-qr-code"></i></div>
                    <div class="fw-semibold">No vehicles yet</div>
                    <div class="text-muted small mb-3">Add a vehicle to start tracking entry/exit logs.</div>
                    <a href="{{ route('student.vehicles.create') }}" class="btn btn-maroon">
                        <i class="bi bi-plus-circle me-1"></i> Add Vehicle
                    </a>
                </div>
            @else
                {{-- Tabs --}}
                <ul class="nav nav-pills dash-tabs mb-3" role="tablist">
                    @foreach ($logbookTabs as $idx => $tab)
                        <li class="nav-item" role="presentation">
                            <button
                                class="nav-link {{ $idx === 0 ? 'active' : '' }}"
                                data-bs-toggle="tab"
                                data-bs-target="#tab-vehicle-{{ $tab['kendaraan']->id }}"
                                type="button"
                                role="tab"
                            >
                                <i class="bi bi-car-front me-1"></i>
                                {{ $tab['kendaraan']->plat_no }}
                            </button>
                        </li>
                    @endforeach
                </ul>

                {{-- Content --}}
                <div class="tab-content">
                    @foreach ($logbookTabs as $idx => $tab)
                        @php($kendaraan = $tab['kendaraan'])
                        @php($grouped = $tab['grouped'])

                        <div
                            class="tab-pane fade {{ $idx === 0 ? 'show active' : '' }}"
                            id="tab-vehicle-{{ $kendaraan->id }}"
                            role="tabpanel"
                        >
                            @forelse($grouped as $dayLabel => $items)
                                <div class="log-day">
                                    <div class="log-day-head">
                                        <div class="fw-semibold">{{ $dayLabel }}</div>
                                        <div class="text-muted small">
                                            {{ \Carbon\Carbon::parse($items->first()['time'])->format('d F Y') }}
                                        </div>
                                    </div>

                                    <div class="log-list">
                                        @foreach ($items as $item)
                                            <div class="log-item">
                                                <span class="time-pill">
                                                    {{ \Carbon\Carbon::parse($item['time'])->format('H:i') }}
                                                </span>

                                                <span class="log-text">{{ $item['text'] }}</span>

                                                <span class="status-dot {{ $item['dot'] }}"></span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @empty
                                <div class="text-muted">No activity for this vehicle yet.</div>
                            @endforelse
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Minimal CSS --}}
<style>
    /* Cards */
    .dash-card{
        border: 1px solid rgba(0,0,0,.06);
        border-radius: 16px;
        box-shadow: 0 10px 26px rgba(0,0,0,.06);
    }

    /* Icons */
    .dash-icon{
        width: 48px; height: 48px;
        border-radius: 14px;
        display:flex; align-items:center; justify-content:center;
        font-size: 22px;
    }
    .bg-maroon-soft{ background: rgba(159, 20, 33, .10); }
    .text-maroon{ color:#9F1421; }
    .bg-warning-soft{ background: rgba(255, 193, 7, .18); }

    /* Links */
    .dash-link{
        text-decoration:none;
        font-weight:600;
        color:#111827;
    }
    .dash-link:hover{ color:#9F1421; }

    /* Tabs */
    .dash-tabs .nav-link{
        border-radius: 999px;
        padding: 8px 12px;
        font-weight: 700;
        color:#6b7280;
        background: #f8f9fa;
        border: 1px solid rgba(0,0,0,.06);
    }
    .dash-tabs .nav-link.active{
        color:#9F1421;
        background: rgba(159, 20, 33, .10);
        border-color: rgba(159, 20, 33, .18);
    }

    /* Empty state */
    .empty-state{
        border: 1px dashed rgba(0,0,0,.12);
        border-radius: 16px;
        padding: 24px;
        text-align:center;
        background: #fff;
    }
    .empty-icon{
        width: 56px; height:56px;
        border-radius: 18px;
        display:inline-flex; align-items:center; justify-content:center;
        background: rgba(159, 20, 33, .10);
        color:#9F1421;
        font-size: 26px;
        margin-bottom: 10px;
    }

    /* Logbook */
    .log-day{
        border: 1px solid rgba(0,0,0,.06);
        border-radius: 14px;
        padding: 14px;
        background:#fff;
        margin-bottom: 12px;
    }
    .log-day-head{
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:12px;
        margin-bottom: 10px;
    }
    .log-list{ display:flex; flex-direction:column; gap:8px; }

    .log-item{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:12px;
        padding: 10px 12px;
        border-radius: 12px;
        background: #f8f9fa;
        border: 1px solid rgba(0,0,0,.05);
    }

    .time-pill{
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        font-size: 12px;
        color:#374151;
        background:#fff;
        border: 1px solid rgba(0,0,0,.08);
        padding: 4px 8px;
        border-radius: 999px;
        flex: 0 0 auto;
    }
    .log-text{
        flex: 1 1 auto;
        font-weight: 600;
        color:#111827;
        min-width: 0;
    }
    .status-dot{
        width:10px; height:10px; border-radius:999px;
        flex: 0 0 auto;
    }
    /* Sesuaikan class dot kamu: success / danger / etc */
    .status-dot.success{ background:#22c55e; box-shadow: 0 0 0 4px rgba(34,197,94,.12); }
    .status-dot.danger{ background:#ef4444; box-shadow: 0 0 0 4px rgba(239,68,68,.12); }
    .status-dot.warning{ background:#f59e0b; box-shadow: 0 0 0 4px rgba(245,158,11,.12); }

    /* Mobile spacing */
    @media (max-width: 576px){
        .display-6{ font-size: 2rem; }
        .log-day-head{ flex-direction: column; align-items: flex-start; }
    }
</style>
@endsection
