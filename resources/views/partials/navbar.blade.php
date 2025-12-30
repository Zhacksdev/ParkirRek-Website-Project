<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-maroon" href="/dashboard">
            <span class="logo-circle">P</span> ParkiRek
        </a>

        <div class="collapse navbar-collapse justify-content-center">
            <ul class="navbar-nav gap-4">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                        <i class="bi bi-house-door me-1"></i> Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('vehicles*') ? 'active' : '' }}" href="/vehicles">
                        <i class="bi bi-car-front me-1"></i> My Vehicles
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('violations*') ? 'active' : '' }}" href="/violations">
                        <i class="bi bi-exclamation-triangle me-1"></i> Violations
                    </a>
                </li>
            </ul>
        </div>

        <div class="dropdown">
            <button class="btn btn-outline-maroon dropdown-toggle d-flex align-items-center"
<<<<<<< HEAD
                type="button" data-bs-toggle="dropdown">
=======
                    type="button" data-bs-toggle="dropdown">
>>>>>>> admin-meefol
                <div class="avatar-circle me-2">S</div>
                <span>Jingga</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-person me-2"></i> Profile
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#">
                        <i class="bi bi-gear me-2"></i> Settings
                    </a>
                </li>
<<<<<<< HEAD
                <li>
                    <hr class="dropdown-divider">
                </li>
=======
                <li><hr class="dropdown-divider"></li>
>>>>>>> admin-meefol
                <li>
                    <a class="dropdown-item text-danger" href="/">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
<<<<<<< HEAD
</nav>
=======
</nav>
>>>>>>> admin-meefol
