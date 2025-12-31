@extends('layouts.auth')

@section('content')
<div class="auth-bg">
    <!-- Top Right Nav -->
    <div class="auth-topnav">
        <a href="{{ route('student.dashboard') }}" class="auth-toplink">Home</a>
        <a href="#" class="auth-toplink">Features</a>
    </div>

    <!-- Card -->
    <div class="auth-card">
        <div class="text-center mb-4">
            <h2 class="auth-title mb-1">Create Account</h2>
            <p class="auth-subtitle mb-0">Student Registration</p>
        </div>

        <form>
            <!-- Full Name -->
            <div class="mb-3">
                <label class="form-label auth-label">Full Name</label>
                <div class="auth-inputgroup">
                    <span class="auth-inputicon"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control auth-input auth-input--withicon" placeholder="Name">
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label auth-label">Email Address</label>
                <div class="auth-inputgroup">
                    <span class="auth-inputicon"><i class="bi bi-envelope"></i></span>
                    <input type="email" class="form-control auth-input auth-input--withicon" placeholder="you@example.com">
                </div>
            </div>

            <!-- Phone -->
            <div class="mb-3">
                <label class="form-label auth-label">Phone Number</label>
                <div class="auth-inputgroup">
                    <span class="auth-inputicon"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control auth-input auth-input--withicon" placeholder="+62 8XX XXXX XXXX">
                </div>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label auth-label">Password</label>
                <div class="auth-inputgroup">
                    <span class="auth-inputicon"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control auth-input auth-input--withicon" placeholder="••••••••">
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label auth-label">Confirm Password</label>
                <div class="auth-inputgroup">
                    <span class="auth-inputicon"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control auth-input auth-input--withicon" placeholder="••••••••">
                </div>
            </div>

            <!-- Terms -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="terms">
                <label class="form-check-label auth-remember" for="terms">
                    I agree to the terms and conditions
                </label>
            </div>

            <!-- Create Account -->
            <a href="/login" class="btn auth-btn-primary w-100 mb-3">
                Create Account
            </a>


            <div class="text-center">
                <small class="text-muted">
                    Already have an account?
                    <a href="/login" class="auth-link-strong">Sign In</a>
                </small>
            </div>
        </form>
    </div>
</div>
@endsection