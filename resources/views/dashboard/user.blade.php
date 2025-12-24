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
                    <h2 class="fw-bold mb-0">12</h2>
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

    <!-- Main Content -->
    <div class="row">
        <!-- Recent Activity -->
        <div class="col-lg-7 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">Recent Activity</h5>
                        <a href="#" class="text-maroon text-decoration-none fw-semibold">View All</a>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Activity Item -->
                    <div class="activity-item border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="activity-icon me-3">
                                <i class="bi bi-arrow-left-right"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-semibold mb-1">Parking Session Completed</h6>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-clock me-1"></i> Today • In - Out : 13:00 – 16:34
                                </p>
                            </div>
                            <a href="#" class="text-maroon text-decoration-none">
                                See Details <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="activity-item border-bottom pb-3 mb-3">
                        <div class="d-flex align-items-center">
                            <div class="activity-icon booking me-3">
                                <i class="bi bi-calendar-plus"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-semibold mb-1">New Booking Created</h6>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-clock me-1"></i> Yesterday • 09:15 AM
                                </p>
                            </div>
                            <a href="#" class="text-maroon text-decoration-none">
                                See Details <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Activity Item -->
                    <div class="activity-item">
                        <div class="d-flex align-items-center">
                            <div class="activity-icon vehicle me-3">
                                <i class="bi bi-car-front-fill"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-semibold mb-1">Vehicle Registered</h6>
                                <p class="text-muted mb-0">
                                    <i class="bi bi-clock me-1"></i> Dec 12 • 14:30 PM
                                </p>
                            </div>
                            <a href="#" class="text-maroon text-decoration-none">
                                See Details <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logbook Section -->
        <div class="col-lg-5 mb-4">
            <div class="card h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="fw-bold mb-0">Your Logbook</h5>
                </div>
                <div class="card-body">
                    <!-- Tabs -->
                    <ul class="nav nav-pills mb-4" id="logbookTab" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link active w-100" id="violations-tab" data-bs-toggle="tab" data-bs-target="#violations" type="button">
                                <i class="bi bi-exclamation-triangle me-2"></i> Violations
                            </button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                            <button class="nav-link w-100" id="history-tab" data-bs-toggle="tab" data-bs-target="#history" type="button">
                                <i class="bi bi-clock-history me-2"></i> Booking History
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content">
                        <!-- Violations Tab -->
                        <div class="tab-pane fade show active" id="violations" role="tabpanel">
                            <div class="text-center py-4">
                                <div class="violation-count mb-2">12</div>
                                <p class="text-muted">Total Violations</p>
                            </div>
                            
                            <div class="violation-list">
                                <div class="d-flex align-items-center justify-content-between p-3 border rounded-2 mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="violation-icon me-3">
                                            <i class="bi bi-clock"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-0">Overtime Parking</h6>
                                            <small class="text-muted">Dec 15, 2024</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-danger">Overdue</span>
                                </div>
                                
                                <div class="d-flex align-items-center justify-content-between p-3 border rounded-2">
                                    <div class="d-flex align-items-center">
                                        <div class="violation-icon me-3">
                                            <i class="bi bi-x-circle"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-semibold mb-0">Wrong Slot</h6>
                                            <small class="text-muted">Nov 28, 2024</small>
                                        </div>
                                    </div>
                                    <span class="badge bg-success">Resolved</span>
                                </div>
                            </div>
                        </div>

                        <!-- History Tab (Empty for now) -->
                        <div class="tab-pane fade" id="history" role="tabpanel">
                            <div class="text-center py-5">
                                <i class="bi bi-clock-history display-4 text-muted mb-3"></i>
                                <p class="text-muted">No booking history yet</p>
                            </div>
                        </div>
                    </div>

                    <!-- Add Vehicle Card -->
                    <div class="add-vehicle-card mt-4 p-4 border rounded-3">
                        <div class="d-flex align-items-center">
                            <div class="add-icon me-3">
                                <i class="bi bi-plus-circle"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-bold mb-1">Add Vehicle</h6>
                                <p class="text-muted mb-0 small">Register a new vehicle with e-STNK</p>
                            </div>
                            <button class="btn btn-maroon btn-sm">
                                <i class="bi bi-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection