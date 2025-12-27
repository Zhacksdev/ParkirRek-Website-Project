@extends('layouts.auth')


@section('content')

<div class="login-card">


<h2 class="title">ParkiRek</h2>
<p class="subtitle">Student Login</p>


<form>
<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" class="form-control" placeholder="you@example.com">
</div>


<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" class="form-control">
</div>


<div class="options">
<div>
<input type="checkbox" id="remember">
<label for="remember">Remember me</label>
</div>
<a href="#" class="forgot">Forgot Password?</a>
</div>


<a href="/dashboard" class="btn-login d-block text-center">
    Sign In
</a>


<div class="divider">Don't have an account?</div>


<a href="/register" class="btn-outline">Create Account</a>


<p class="security">Security? <a href="#">Security login</a></p>
</form>
</div>
@endsection