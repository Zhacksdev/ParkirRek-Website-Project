<nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
    <div class="container-fluid">

        {{-- Brand --}}
        <a class="navbar-brand fw-bold text-maroon d-flex align-items-center gap-2"
            href="{{ route('student.dashboard') }}">
            <span class="logo-circle">P</span>
            <span>ParkiRek</span>
        </a>

        {{-- Hamburger (mobile) --}}
        <button class="navbar-toggler border-0 p-2" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#studentNavbar"
            aria-controls="studentNavbar"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="studentNavbar">
            <ul class="navbar-nav ms-lg-auto align-items-lg-center gap-lg-4 mt-3 mt-lg-0">

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1
                        {{ request()->routeIs('student.dashboard') ? 'active fw-semibold' : '' }}"
                        href="{{ route('student.dashboard') }}">
                        <i class="bi bi-house-door"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1
                        {{ request()->routeIs('student.vehicles.*') ? 'active fw-semibold' : '' }}"
                        href="{{ route('student.vehicles.index') }}">
                        <i class="bi bi-car-front"></i>
                        <span>My Vehicles</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-1
                        {{ request()->routeIs('student.violations.*') ? 'active fw-semibold' : '' }}"
                        href="{{ route('student.violations.index') }}">
                        <i class="bi bi-exclamation-triangle"></i>
                        <span>Violations</span>
                    </a>
                </li>

                {{-- Divider khusus mobile --}}
                <li class="nav-item d-lg-none my-2">
                    <hr class="dropdown-divider">
                </li>

            </ul>
        </div>
    </div>
</nav>
