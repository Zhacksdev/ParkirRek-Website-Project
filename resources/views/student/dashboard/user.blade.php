@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-5 pt-3">

    <!-- Header -->
    <div class="mb-3">
        <h1 class="fw-bold">Welcome back, {{ $studentName }}!</h1>
        <p class="text-muted fs-5 mb-0">Ready to go through your day?</p>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-3">
        <div class="col-12 col-md-6">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon me-3">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold">Total Vehicle</h6>
                    </div>
                    <h2 class="fw-bold mb-0">{{ $totalVehicles }}</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon me-3">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold">Violations</h6>
                    </div>
                    <h2 class="fw-bold mb-0">{{ $totalViolations }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Vehicle (full width, timestamp dihapus) -->
    <div class="row g-3 mt-1 mb-2">
        <div class="col-12">
            <div class="dash-mini-card addvehicle-card h-100">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="fw-bold mb-1">Add Vehicle</h6>
                        <small class="text-muted">Register a new vehicle with e-STNK</small>
                    </div>
                    <i class="bi bi-car-front text-maroon"></i>
                </div>

                <div class="mt-4">
                    <a href="{{ route('student.vehicles.create') }}" class="btn btn-outline-maroon w-100 btn-mini">
                        <i class="bi bi-plus-circle me-1"></i> Add Vehicle
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Your Logbook (TAB per kendaraan) -->
    <div class="logbook-panel mb-4 mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h4 class="fw-bold mb-0">Your Logbook</h4>
        </div>

        @if (count($logbookTabs) === 0)
            <div class="text-muted">Kamu belum punya kendaraan. Tambah kendaraan dulu ya.</div>
        @else
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" role="tablist">
                @foreach ($logbookTabs as $idx => $tab)
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link {{ $idx === 0 ? 'active' : '' }}"
                            data-bs-toggle="tab"
                            data-bs-target="#tab-vehicle-{{ $tab['kendaraan']->id }}"
                            type="button"
                            role="tab"
                        >
                            {{ $tab['kendaraan']->plat_no }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <!-- Tab content -->
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
                            <div class="logbook-day">
                                <div class="logbook-day-title">
                                    {{ $dayLabel }}
                                    <span class="text-maroon">
                                        {{ \Carbon\Carbon::parse($items->first()['time'])->format('d F Y') }}
                                    </span>
                                </div>

                                @foreach ($items as $item)
                                    <div class="logbook-item">
                                        <span class="time-pill">{{ \Carbon\Carbon::parse($item['time'])->format('H:i') }}</span>
                                        <span class="logbook-text">{{ $item['text'] }}</span>
                                        <span class="status-dot {{ $item['dot'] }}"></span>
                                    </div>
                                @endforeach
                            </div>
                        @empty
                            <div class="text-muted">Belum ada aktivitas untuk kendaraan ini.</div>
                        @endforelse
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>
@endsection
