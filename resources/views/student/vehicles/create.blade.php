@extends('layouts.dashboard')

@section('content')
<div class="container-fluid px-5 pt-3">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">

            <div class="vehicle-form-card">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h4 class="fw-bold mb-0">Add New Vehicle</h4>
                    <i class="bi bi-pencil-square text-maroon"></i>
                </div>

                <form>
                    <!-- License Plate -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">License plate number</label>
                        <input type="text" class="form-control form-soft" placeholder="ex. B 1234 XYZ">
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
                        <input type="text" class="form-control form-soft" placeholder="ex. Toyota Avanza 2022">
                    </div>

                    <!-- STNK Photo -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">STNK Photo</label>
                        <label class="upload-box">
                            <input type="file" hidden>
                            <div class="upload-inner">
                                <i class="bi bi-upload upload-icon"></i>
                                <div class="upload-text">Click to upload STNK photo</div>
                                <div class="upload-subtext">PNG, JPG up to 5MB</div>
                            </div>
                        </label>
                    </div>

                    <!-- Vehicle Photo -->
                    <div class="mb-3">
                        <label class="form-label small text-muted">Vehicle Photo</label>
                        <label class="upload-box">
                            <input type="file" hidden>
                            <div class="upload-inner">
                                <i class="bi bi-upload upload-icon"></i>
                                <div class="upload-text">Click to upload Vehicle photo</div>
                                <div class="upload-subtext">PNG, JPG up to 5MB</div>
                            </div>
                        </label>
                    </div>

                    <!-- Note -->
                    <div class="note-box mb-3">
                        <strong>Note:</strong> All vehicle information must match your STNK documents.
                        Photos will be verified by admin.
                    </div>

                    <!-- Button -->
                    <a href="/vehicles" class="btn btn-maroon w-100">
                        Add vehicle
                    </a>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection