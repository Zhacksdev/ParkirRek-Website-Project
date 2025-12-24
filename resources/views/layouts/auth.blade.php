<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ParkiRek | Student Login</title>


<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


<!-- Auth CSS -->
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>


<nav class="auth-navbar">
<div class="container d-flex justify-content-between">
<span class="brand">ParkiRek</span>
<div class="nav-links">
<a href="/">Home</a>
<a href="/">Features</a>
</div>
</div>
</nav>


<main class="auth-wrapper">
@yield('content')
</main>


</body>
</html>