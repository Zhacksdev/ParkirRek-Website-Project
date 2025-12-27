@extends('layouts.dashboard')

@section('content')
<div class="container-fluid pt-3">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="fw-bold">Welcome back, Student!</h1>
        <p class="text-muted fs-5">Ready to go through your day?</p>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon me-3">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold">Active Bookings</h6>
                    </div>
                    <h2 class="fw-bold mb-0">2</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon me-3">
                            <i class="bi bi-car-front"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold">Total Vehicle</h6>
                    </div>
                    <h2 class="fw-bold mb-0">1</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon me-3">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold">Violations</h6>
                    </div>
                    <h2 class="fw-bold mb-0">4</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="stat-icon me-3">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <h6 class="mb-0 fw-semibold">History</h6>
                    </div>
                    <h2 class="fw-bold mb-0">24</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section (Timestamp + Add Vehicle + Logbook) -->
    <div class="row mt-3">
        <!-- Left Cards -->
        <div class="col-lg-6 mb-4">
            <div class="dash-mini-card timestamp-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="fw-bold mb-1">Timestamp</h6>
                        <small class="text-muted">In - Out : 13:00 - 16:34</small>
                    </div>
                    <i class="bi bi-clock text-maroon"></i>
                </div>

                <div class="mt-4">
                    <a href="#" class="btn btn-maroon w-100 btn-mini">
                        See Details <i class="bi bi-chevron-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="dash-mini-card addvehicle-card">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h6 class="fw-bold mb-1">Add Vehicle</h6>
                        <small class="text-muted">Register a new vehicle with e-STNK</small>
                    </div>
                    <i class="bi bi-car-front text-maroon"></i>
                </div>

                <div class="mt-4">
                    <button class="btn btn-outline-maroon w-100 btn-mini" type="button">
                        <i class="bi bi-plus-circle me-1"></i> Add Vehicle
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Your Logbook -->
    <div class="logbook-panel mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
            <h4 class="fw-bold mb-0">Your Logbook</h4>

            <div class="logbook-search">
                <input type="text" class="form-control" placeholder="Searching for something specific?">
            </div>
        </div>

        <!-- Today -->
        <div class="logbook-day">
            <div class="logbook-day-title">
                Today <span class="text-maroon">12 December 2025</span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">13:03</span>
                <span class="logbook-text">Parking In</span>
                <span class="status-dot dot-blue"></span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">16:34</span>
                <span class="logbook-text">Parking Out</span>
                <span class="status-dot dot-green"></span>
            </div>
        </div>

        <!-- Yesterday -->
        <div class="logbook-day">
            <div class="logbook-day-title">
                Yesterday <span class="text-maroon">11 December 2025</span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">15:32</span>
                <span class="logbook-text">Parking In</span>
                <span class="status-dot dot-blue"></span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">16:06</span>
                <span class="logbook-text">Violations Reported</span>
                <span class="status-dot dot-red"></span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">18:29</span>
                <span class="logbook-text">Parking Out</span>
                <span class="status-dot dot-green"></span>
            </div>
        </div>

        <!-- Monday -->
        <div class="logbook-day">
            <div class="logbook-day-title">
                Monday <span class="text-maroon">8 December 2025</span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">08:43</span>
                <span class="logbook-text">Registered New Vehicle</span>
                <span class="status-dot dot-orange"></span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">09:47</span>
                <span class="logbook-text">Registering In Progress of Verification</span>
                <span class="status-dot dot-orange"></span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">10:03</span>
                <span class="logbook-text">Register Approved</span>
                <span class="status-dot dot-orange"></span>
            </div>

            <div class="logbook-item">
                <span class="time-pill">10:03</span>
                <span class="logbook-text">Register Completed! (B 1234 XYZ)</span>
                <span class="status-dot dot-orange"></span>
            </div>
        </div>
    </div>


</div>
@endsection