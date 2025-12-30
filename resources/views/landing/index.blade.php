@extends('layouts.app')

@section('content')

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-maroon" href="{{ url('/') }}">
            <span class="logo-circle">P</span> ParkiRek
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="hero-section text-center">
    <div class="container">
        <h1 class="hero-title">
            Smart Parking for <span>Telkom University</span>
        </h1>

        <p class="hero-subtitle">
            Book parking slots online, get instant QR tickets, and enjoy seamless entry/exit.
            No more searching, no more waiting.
        </p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('student.login') }}" class="btn btn-maroon px-4">Student Login</a>
            <a href="{{ route('admin.login') }}" class="btn btn-outline-maroon px-4">Security Portal</a>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="features-section">
    <div class="container">
        <div class="row g-4 justify-content-center">

            <div class="col-md-5">
                <div class="feature-card text-center">
                    <div class="parking-icon">
                        <span>P</span>
                    </div>
                    <h5>Quick Reservation</h5>
                    <p>Select time & slot instantly</p>
                </div>
            </div>

            <div class="col-md-5">
                <div class="feature-card text-center">
                    <div class="qr-icon">
                        <i class="bi bi-qr-code"></i>
                    </div>
                    <h5 class="mt-3 fw-bold">Digital QR Ticket</h5>
                    <p class="text-muted">Unique code for each booking</p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- FEATURES FULL SECTION -->
<section id="features" class="features-full-section">
    <div class="container">

        <div class="text-center mb-5">
            <h2 class="fw-bold">Powerful Features</h2>
            <p class="text-muted">
                Everything you need for efficient campus parking management
            </p>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">P</div>
                    <h5>Easy Booking</h5>
                    <p>Reserve parking slots with simple calendar selection, just like booking a movie ticket</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">▢▢</div>
                    <h5>Digital Tickets</h5>
                    <p>Get unique QR/barcode for instant entry and exit at parking gates</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">⚡</div>
                    <h5>Fast Entry</h5>
                    <p>No manual paperwork – quick scan and go system</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">🛡</div>
                    <h5>Secure System</h5>
                    <p>Role-based access with encrypted vehicle data and STNK uploads</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">📊</div>
                    <h5>Real-time Reports</h5>
                    <p>Admin dashboard with parking analytics and violation tracking</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="feature-box">
                    <div class="feature-icon">🔒</div>
                    <h5>Data Protection</h5>
                    <p>All transactions secured with modern encryption standards</p>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container choose-role-section" id="for-you">
    <h2 class="text-center fw-bold mb-5">Choose Your Role</h2>

    <div class="row justify-content-center g-4">
        <!-- STUDENT -->
        <div class="col-md-5">
            <div class="role-card">
                <h4 class="fw-bold mb-3">For Students</h4>

                <ul class="role-list">
                    <li>Register and manage your vehicles</li>
                    <li>Upload STNK and vehicle photos</li>
                    <li>Book parking slots anytime, anywhere</li>
                    <li>Get instant QR barcode tickets</li>
                    <li>View booking history and status</li>
                    <li>Receive booking confirmations</li>
                    <li>Track parking violations</li>
                </ul>

                <a href="{{ route('student.login') }}" class="btn btn-student w-100 mt-3">
                    Register as Student
                </a>
            </div>
        </div>

        <!-- SECURITY -->
        <div class="col-md-5">
            <div class="role-card">
                <h4 class="fw-bold mb-3">For Security</h4>

                <ul class="role-list">
                    <li>Admin access to all parking data</li>
                    <li>Verify student bookings at entry</li>
                    <li>Scan QR codes for entry/exit</li>
                    <li>Record vehicle entry and exit</li>
                    <li>Manage violation records</li>
                    <li>Track vehicle movements</li>
                    <li>Generate parking reports</li>
                </ul>

                <a href="{{ route('admin.login') }}" class="btn btn-security w-100 mt-3">
                    Security Login
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
