<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-maroon" href="/">
            <span class="logo-circle">P</span> ParkiRek
        </a>

        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link active" href="/dashboard">
                        <i class="bi bi-house-door me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-calendar-check me-1"></i> Book Parking
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-car-front me-1"></i> My Vehicles
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-clock-history me-1"></i> History
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-exclamation-triangle me-1"></i> Violations
                    </a>
                </li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-outline-maroon dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                <div class="avatar-circle me-2">S</div>
                <span>Student Name</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="/"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>