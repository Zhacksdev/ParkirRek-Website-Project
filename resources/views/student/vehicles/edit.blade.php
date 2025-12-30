@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-5 pt-3">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">

            <div class="vehicle-form-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h4 class="fw-bold mb-0">Edit Vehicle</h4>
                        <small class="text-muted">Update your vehicle information</small>
                    </div>
                    <i class="bi bi-pencil-square text-maroon"></i>
                </div>

                <form>
                    <!-- License Plate -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">License plate number</label>
                        <input type="text" class="form-control form-soft" value="B 1234 XYZ">
                    </div>

                    <!-- Vehicle Type -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">Vehicle Type</label>
                        <select class="form-select form-soft">
                            <option selected>Car</option>
                            <option>Motorcycle</option>
                        </select>
                    </div>

                    <!-- Brand & Model -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">Brand & Model</label>
                        <input type="text" class="form-control form-soft" value="Toyota Avanza 2022">
                    </div>

                    <!-- STNK Photo -->
                    <div class="mb-3">
                        <label class="form-label small text-muted d-flex justify-content-between align-items-center">
                            <span>STNK Photo</span>
                            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3">
                                Verified
                            </span>
                        </label>

                        <label class="upload-box">
                            <input type="file" hidden>
                            <div class="upload-inner">
                                <i class="bi bi-upload upload-icon"></i>
                                <div class="upload-text">Replace STNK photo (optional)</div>
                                <div class="upload-subtext">PNG, JPG up to 5MB</div>
                            </div>
                        </label>

                        <div class="text-muted small mt-2">
                            Current file: <span class="fw-semibold">stnk_b1234xyz.jpg</span>
                        </div>
                    </div>

                    <!-- Vehicle Photo -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">Vehicle Photo</label>

                        <label class="upload-box">
                            <input type="file" hidden>
                            <div class="upload-inner">
                                <i class="bi bi-upload upload-icon"></i>
                                <div class="upload-text">Replace vehicle photo (optional)</div>
                                <div class="upload-subtext">PNG, JPG up to 5MB</div>
                            </div>
                        </label>

                        <div class="text-muted small mt-2">
                            Current file: <span class="fw-semibold">car_b1234xyz.jpg</span>
                        </div>
                    </div>

                    <!-- Note -->
                    <div class="note-box mb-4">
                        <strong>Note:</strong> Changes may require re-verification by admin.
                        Make sure the info matches your STNK.
                    </div>

                    <!-- Actions -->
                    <div class="d-flex gap-2">
                        <a href="/vehicles" class="btn btn-outline-maroon w-100">
                            Cancel
                        </a>
                        <a href="/vehicles" class="btn btn-maroon w-100">
                            Save Changes
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
