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

        <a href="/vehicles/create" class="btn btn-outline-maroon mt-5">
            <i class="bi bi-plus-circle"></i> Add Vehicle
        </a>
    </div>

    <!-- Vehicles List -->
    <div class="vehicle-list">

        <!-- VEHICLE 1 -->
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
                <a href="/vehicles/edit" class="icon-btn" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Delete Trigger -->
                <button
                    class="icon-btn danger"
                    type="button"
                    title="Delete"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteVehicleModal"
                    data-vehicle-name="Toyota Avanza"
                    data-vehicle-plate="B 1234 XYZ"
                >
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>

        <!-- VEHICLE 2 -->
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
                <a href="/vehicles/edit" class="icon-btn" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Delete Trigger -->
                <button
                    class="icon-btn danger"
                    type="button"
                    title="Delete"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteVehicleModal"
                    data-vehicle-name="BYD Sealion 7"
                    data-vehicle-plate="L 4321 ZYX"
                >
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>

        <!-- VEHICLE 3 -->
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
                <a href="/vehicles/edit" class="icon-btn" title="Edit">
                    <i class="bi bi-pencil-square"></i>
                </a>

                <!-- Delete Trigger -->
                <button
                    class="icon-btn danger"
                    type="button"
                    title="Delete"
                    data-bs-toggle="modal"
                    data-bs-target="#deleteVehicleModal"
                    data-vehicle-name="Honda Stylo"
                    data-vehicle-plate="L 1254 DF"
                >
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>

    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteVehicleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content delete-modal">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold">
                    <i class="bi bi-exclamation-triangle-fill text-danger me-2"></i>
                    Delete Vehicle
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body pt-0">
                <p class="mb-2 text-muted">
                    Are you sure you want to delete this vehicle?
                </p>

                <div class="delete-preview">
                    <div class="fw-bold" id="delVehicleName">Vehicle Name</div>
                    <div class="text-maroon fw-semibold" id="delVehiclePlate">Plate</div>
                </div>

                <small class="text-muted d-block mt-3">
                    This action cannot be undone.
                </small>
            </div>

            <div class="modal-footer border-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cancel
                </button>

                <!-- Dummy delete (UI only) -->
                <a href="/vehicles" class="btn btn-danger">
                    Delete
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Script: fill modal content -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const modalEl = document.getElementById('deleteVehicleModal');
    if (!modalEl) return;

    modalEl.addEventListener('show.bs.modal', function (event) {
        const btn = event.relatedTarget;
        const name = btn.getAttribute('data-vehicle-name') || 'Vehicle';
        const plate = btn.getAttribute('data-vehicle-plate') || '-';

        document.getElementById('delVehicleName').textContent = name;
        document.getElementById('delVehiclePlate').textContent = plate;
    });
});
</script>
@endsection
