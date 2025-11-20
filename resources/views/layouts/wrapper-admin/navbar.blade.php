<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white d-flex align-items-center gap-2"
       href="{{ route('admin.main.index') }}">
        <img src="{{ asset('assets/images/sir_logo.png') }}"
             alt="SIR Logo"
             class="admin-header-logo">
        <span>SIR Admin Panel</span>
    </a>

    <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                <svg class="bi">
                    <use xlink:href="#search"/>
                </svg>
            </button>
        </li>
        <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                <svg class="bi">
                    <use xlink:href="#list"/>
                </svg>
            </button>
        </li>
    </ul>

    <div id="navbarSearch" class="navbar-search w-100 collapse">
        <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
    </div>
</header>

<style>
    /* Admin Header Logo Styles */
    .admin-header-logo {
        height: 32px;
        width: auto;
        filter: brightness(0) invert(1); /* Makes logo white for dark navbar */
    }

    /* Mobile - smaller logo */
    @media (max-width: 767.98px) {
        .admin-header-logo {
            height: 24px;
        }

        .navbar-brand span {
            font-size: 0.875rem;
        }
    }
</style>
