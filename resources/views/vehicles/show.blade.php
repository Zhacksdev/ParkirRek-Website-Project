@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-5 pt-3">

    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="fw-bold mb-1 d-flex align-items-center gap-2">
                My Vehicles
                <i class="bi bi-car-front-fill text-maroon"></i>
            </h1>
            <p class="text-muted fs-6 mb-0">Manage your registered vehicles</p>
        </div>


        <a href="#" class="btn btn-outline-maroon mt-5">
            <i class="bi bi-plus-circle"></i> Add Vehicle
        </a>
    </div>

    <!-- Vehicles List -->
    <div class="vehicle-list">

        <div class="vehicle-card">
            <div class="vehicle-left">
                <h5 class="vehicle-name mb-1">Toyota Avanza</h5>
                <div class="vehicle-plate mb-2">B 1234 XYZ</div>
                <div class="vehicle-meta text-muted">
                    <i class="bi bi-car-front me-1"></i> Car
                </div>
            </div>

            <div class="vehicle-mid">
                <small class="text-muted">STNK Status</small>
                <div class="mt-2">
                    <span class="badge badge-soft badge-verified">Verified</span>
                </div>
            </div>

            <div class="vehicle-mid">
                <small class="text-muted">Parking Status</small>
                <div class="mt-2">
                    <span class="badge badge-soft badge-parked">Parked</span>
                </div>
            </div>

            <div class="vehicle-actions">
                <button class="icon-btn" type="button" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="icon-btn danger" type="button" title="Delete">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>

        <div class="vehicle-card">
            <div class="vehicle-left">
                <h5 class="vehicle-name mb-1">BYD Sealion 7</h5>
                <div class="vehicle-plate mb-2">L 4321 ZYX</div>
                <div class="vehicle-meta text-muted">
                    <i class="bi bi-car-front me-1"></i> Car
                </div>
            </div>

            <div class="vehicle-mid">
                <small class="text-muted">STNK Status</small>
                <div class="mt-2">
                    <span class="badge badge-soft badge-pending">Pending</span>
                </div>
            </div>

            <div class="vehicle-mid">
                <small class="text-muted">Parking Status</small>
                <div class="mt-2">
                    <span class="badge badge-soft badge-notparked">Not Parked</span>
                </div>
            </div>

            <div class="vehicle-actions">
                <button class="icon-btn" type="button" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="icon-btn danger" type="button" title="Delete">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>

        <div class="vehicle-card">
            <div class="vehicle-left">
                <h5 class="vehicle-name mb-1">Honda Stylo</h5>
                <div class="vehicle-plate mb-2">L 1254 DF</div>
                <div class="vehicle-meta text-muted">
                    <i class="bi bi-bicycle me-1"></i> Motorcycle
                </div>
            </div>

            <div class="vehicle-mid">
                <small class="text-muted">STNK Status</small>
                <div class="mt-2">
                    <span class="badge badge-soft badge-verified">Verified</span>
                </div>
            </div>

            <div class="vehicle-mid">
                <small class="text-muted">Parking Status</small>
                <div class="mt-2">
                    <span class="badge badge-soft badge-notparked">Not Parked</span>
                </div>
            </div>

            <div class="vehicle-actions">
                <button class="icon-btn" type="button" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </button>
                <button class="icon-btn danger" type="button" title="Delete">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>

    </div>
</div>
@endsection