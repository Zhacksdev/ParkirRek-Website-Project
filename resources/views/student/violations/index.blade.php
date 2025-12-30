@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-5 pt-3">

    <!-- Page Header -->
    <div class="mb-4">
        <h1 class="fw-bold mb-1 d-flex align-items-center gap-2">
            Parking Violations <i class="bi bi-exclamation-circle text-maroon opacity-75"></i>
        </h1>
        <p class="text-muted fs-6 mb-0">Your violation history and status</p>
    </div>

    <!-- Violation Card (Booking-style) -->
    <!-- Violation Card 1 -->
    <div class="violation-card mb-3">
        <div class="row align-items-center gy-2">
            <div class="col-md-3">
                <small class="text-muted">Violation</small>
                <div class="fw-semibold fs-6 text-maroon">Double Parking</div>
                <div class="text-muted small mt-1">
                    <i class="bi bi-car-front me-1"></i> Car
                </div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-car-front me-1"></i>Vehicle</small>
                <div class="fw-semibold fs-6">B 1234 XYZ</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Date</small>
                <div class="fw-semibold fs-6">22-12-2025</div>
            </div>

            <div class="col-md-3">
                <small class="text-muted"><i class="bi bi-clock me-1"></i>Time Reported</small>
                <div class="fw-semibold fs-6">14:01</div>
            </div>

            <div class="col-md-2 text-end pe-3">
                <span class="violation-points">+ 3 violation points</span>
            </div>
        </div>
    </div>

    <!-- Violation Card 2 -->
    <div class="violation-card mb-3">
        <div class="row align-items-center gy-2">
            <div class="col-md-3">
                <small class="text-muted">Violation</small>
                <div class="fw-semibold fs-6 text-maroon">Overtime Parking</div>
                <div class="text-muted small mt-1">
                    <i class="bi bi-car-front me-1"></i> Car
                </div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-car-front me-1"></i>Vehicle</small>
                <div class="fw-semibold fs-6">B 5678 ABC</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Date</small>
                <div class="fw-semibold fs-6">20-12-2025</div>
            </div>

            <div class="col-md-3">
                <small class="text-muted"><i class="bi bi-clock me-1"></i>Time Reported</small>
                <div class="fw-semibold fs-6">18:45</div>
            </div>

            <div class="col-md-2 text-end pe-3">
                <span class="violation-points">+ 2 violation points</span>
            </div>
        </div>
    </div>

    <!-- Violation Card 3 -->
    <div class="violation-card mb-3">
        <div class="row align-items-center gy-2">
            <div class="col-md-3">
                <small class="text-muted">Violation</small>
                <div class="fw-semibold fs-6 text-maroon">Wrong Slot</div>
                <div class="text-muted small mt-1">
                    <i class="bi bi-bicycle me-1"></i> Motorcycle
                </div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-bicycle me-1"></i>Vehicle</small>
                <div class="fw-semibold fs-6">L 1254 DF</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Date</small>
                <div class="fw-semibold fs-6">19-12-2025</div>
            </div>

            <div class="col-md-3">
                <small class="text-muted"><i class="bi bi-clock me-1"></i>Time Reported</small>
                <div class="fw-semibold fs-6">09:12</div>
            </div>

            <div class="col-md-2 text-end pe-3">
                <span class="violation-points">+ 1 violation points</span>
            </div>
        </div>
    </div>

    <!-- Violation Card 4 -->
    <div class="violation-card mb-3">
        <div class="row align-items-center gy-2">
            <div class="col-md-3">
                <small class="text-muted">Violation</small>
                <div class="fw-semibold fs-6 text-maroon">Blocking Access</div>
                <div class="text-muted small mt-1">
                    <i class="bi bi-car-front me-1"></i> Car
                </div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-car-front me-1"></i>Vehicle</small>
                <div class="fw-semibold fs-6">B 9012 JKL</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted"><i class="bi bi-calendar-event me-1"></i>Date</small>
                <div class="fw-semibold fs-6">18-12-2025</div>
            </div>

            <div class="col-md-3">
                <small class="text-muted"><i class="bi bi-clock me-1"></i>Time Reported</small>
                <div class="fw-semibold fs-6">12:30</div>
            </div>

            <div class="col-md-2 text-end pe-3">
                <span class="violation-points">+ 4 violation points</span>
            </div>
        </div>
    </div>


</div>
@endsection