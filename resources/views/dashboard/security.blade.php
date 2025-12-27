@extends('layouts.dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/security.css') }}">
@endpush

@section('content')
<div class="container-fluid px-5 pt-3">

    <!-- Header -->
    <div class="mb-4">
        <h1 class="fw-bold mb-1">Security Dashboard</h1>
        <p class="text-muted fs-6 mb-0">Monitor parking activity and manage violations</p>
    </div>

    <!-- Stats Cards -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Vehicles Today</small>
                        <h2 class="fw-bold mb-0">287</h2>
                    </div>
                    <div class="stat-icon stat-icon--blue">
                        <i class="bi bi-p-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Active Bookings</small>
                        <h2 class="fw-bold mb-0">45</h2>
                    </div>
                    <div class="stat-icon stat-icon--green">
                        <i class="bi bi-check-circle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Violations</small>
                        <h2 class="fw-bold mb-0">12</h2>
                    </div>
                    <div class="stat-icon stat-icon--red">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-3">
            <div class="card stat-card h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Students</small>
                        <h2 class="fw-bold mb-0">2450</h2>
                    </div>
                    <div class="stat-icon stat-icon--purple">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row g-3">
        <div class="col-12 col-lg-6">
            <div class="card chart-card h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Vehicles by Hour</h5>
                    <div class="chart-wrap">
                        <canvas id="vehiclesByHour"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card chart-card h-100">
                <div class="card-body">
                    <h5 class="fw-bold mb-3">Violations Trend</h5>
                    <div class="chart-wrap">
                        <canvas id="violationsTrend"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Vehicles by Hour
    new Chart(document.getElementById('vehiclesByHour'), {
        type: 'bar',
        data: {
            labels: ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00'],
            datasets: [{
                data: [45,80,120,155,200,190,155,95],
                backgroundColor: '#7b1e2b',
                borderRadius: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });

    // Violations Trend
    new Chart(document.getElementById('violationsTrend'), {
        type: 'line',
        data: {
            labels: ['08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00'],
            datasets: [{
                data: [2,3,5,4,6,3,2,1],
                borderColor: '#dc3545',
                tension: 0.35,
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } }
        }
    });
</script>
@endsection
