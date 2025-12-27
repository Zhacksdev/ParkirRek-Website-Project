@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-5 pt-3">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1">Parking Bookings</h1>
            <p class="text-muted fs-6 mb-0">View and manage your bookings</p>
        </div>

        <a href="#" class="btn btn-outline-maroon mt-5">
            <i class="bi bi-plus-circle"></i> Add Vehicle
        </a>

    </div>
    <br>

    <!-- Booking Card -->
    <div class="booking-card mb-3">
        <div class="row align-items-center gy-2">

            <div class="col-md-3">
                <small class="text-muted">Vehicle</small>
                <div class="fw-semibold fs-6">B 1234 XYZ</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted">Slot</small>
                <div class="fw-semibold fs-6 text-maroon">A-15</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted">
                    <i class="bi bi-calendar-event me-1"></i>Date
                </small>
                <div class="fw-semibold fs-6">2024-12-15</div>
            </div>

            <div class="col-md-3">
                <small class="text-muted">
                    <i class="bi bi-clock me-1"></i>Time
                </small>
                <div class="fw-semibold fs-6">09:00 - 11:00</div>
            </div>

            <div class="col-md-2 text-end pe-3">
                <span class="status-completed">
                    <i class="bi bi-check-circle-fill me-1"></i> Completed
                </span>
            </div>

        </div>
    </div>

    <div class="booking-card mb-3">
        <div class="row align-items-center gy-2">

            <div class="col-md-3">
                <small class="text-muted">Vehicle</small>
                <div class="fw-semibold fs-6">B 5678 ABC</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted">Slot</small>
                <div class="fw-semibold fs-6 text-maroon">B-22</div>
            </div>

            <div class="col-md-2">
                <small class="text-muted">
                    <i class="bi bi-calendar-event me-1"></i>Date
                </small>
                <div class="fw-semibold fs-6">2024-12-14</div>
            </div>

            <div class="col-md-3">
                <small class="text-muted">
                    <i class="bi bi-clock me-1"></i>Time
                </small>
                <div class="fw-semibold fs-6">14:00 - 16:00</div>
            </div>

            <div class="col-md-2 text-end pe-3">
                <span class="status-canceled">
                    <i class="bi bi-x-circle-fill me-1"></i> Canceled
                </span>
            </div>

        </div>
    </div>



</div>
@endsection