@extends('layouts.auth')

@section('content')
<div class="auth-bg">

    <div class="auth-topnav">
        <a href="/" class="auth-toplink">Home</a>
        <a href="#" class="auth-toplink">Help</a>
    </div>

    <div class="auth-card">
        <div class="text-center mb-4">
            <h2 class="auth-title mb-1 text-dark">ParkiRek</h2>
            <p class="auth-subtitle mb-0">Security & Staff Portal</p>
        </div>

        {{-- flash error message (opsional, kalau LoginController pakai session error) --}}
        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        {{-- Laravel validation errors (opsional) --}}
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- ✅ AUTH yang benar: POST ke /login --}}
        <form action="{{ route('login.attempt') }}" method="POST">
            @csrf

            {{-- penanda bahwa ini login admin (sesuaikan di LoginController) --}}
            <input type="hidden" name="login_as" value="admin">

            <div class="mb-3">
                <label class="form-label auth-label">
                    <i class="bi bi-shield-lock me-2"></i>Staff Email / ID
                </label>
                <input
                    type="email"
                    name="email"
                    class="form-control auth-input"
                    placeholder="admin@parkirek.com"
                    value="{{ old('email', 'admin@parkirek.com') }}"
                    required
                >
            </div>

            <div class="mb-2">
                <label class="form-label auth-label">
                    <i class="bi bi-key me-2"></i>Password
                </label>
                <input
                    type="password"
                    name="password"
                    class="form-control auth-input"
                    placeholder="••••••••"
                    value="{{ old('password', 'password') }}"
                    required
                >
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_admin" name="remember" value="1" checked>
                    <label class="form-check-label auth-remember" for="remember_admin">
                        Remember me
                    </label>
                </div>
                <a href="#" class="auth-forgot">Forgot?</a>
            </div>

            <button type="submit" class="btn auth-btn-primary w-100 mb-3"
                style="background-color: #9F1421; border-color: #9F1421;">
                Login as Admin
            </button>

            <div class="auth-divider my-3">
                <span>New Staff Member?</span>
            </div>

            {{-- ini view register admin kamu sebelumnya route-nya admin.auth.register (bukan admin.register) --}}
            <a href="{{ route('admin.auth.register') }}" class="btn auth-btn-outline w-100">
                Register New Admin
            </a>

            <div class="auth-footer text-center mt-4">
                <small class="text-muted">
                    Not an admin?
                    <a href="{{ route('student.auth.login') }}" class="auth-security" style="color: #9F1421;">
                        Student Login Here
                    </a>
                </small>
            </div>
        </form>
    </div>
</div>
@endsection
