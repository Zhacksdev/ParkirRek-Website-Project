@extends('layouts.auth')

@section('content')
<div class="auth-bg">
    <!-- Top Right Nav -->
    <div class="auth-topnav">
        <a href="/" class="auth-toplink">Home</a>
        <a href="#" class="auth-toplink">Features</a>
    </div>

    <!-- Card -->
    <div class="auth-card">
        <div class="text-center mb-4">
            <h2 class="auth-title mb-1">ParkirRek</h2>
            <p class="auth-subtitle mb-0">Student Login</p>
        </div>

        <form>
            <!-- Email -->
            <div class="mb-3">
                <label class="form-label auth-label">
                    <i class="bi bi-envelope me-2"></i>Email Address
                </label>
                <input type="email" class="form-control auth-input" placeholder="you@example.com">
            </div>

            <!-- Password -->
            <div class="mb-2">
                <label class="form-label auth-label">
                    <i class="bi bi-lock me-2"></i>Password
                </label>
                <input type="password" class="form-control auth-input" placeholder="">
            </div>

            <!-- Options -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember">
                    <label class="form-check-label auth-remember" for="remember">
                        Remember me
                    </label>
                </div>
                <a href="/forgot-password" class="auth-forgot">Forgot Password?</a>
            </div>

            <!-- Sign In -->
            <a href="/dashboard" class="btn auth-btn-primary w-100 mb-3">
                Sign In
            </a>


            <div class="auth-divider my-3">
                <span>Don’t have an account?</span>
            </div>

            <!-- Create Account -->
            <a href="/register" class="btn auth-btn-outline w-100">
                Create Account
            </a>


            <div class="auth-footer text-center mt-4">
                <small class="text-muted">Security? <span class="auth-security">Security Login</span></small>
            </div>
        </form>
    </div>
</div>
@endsection