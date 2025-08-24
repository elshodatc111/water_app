<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center text-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <span class="d-block d-lg-none">WG</span>
            <span class="d-none d-lg-block">Water GO</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <!-- Notifications -->
            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" href="javascript:void(0)" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">Sizda 3 ta yangi bildirishnoma mavjud</li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-check-circle text-success"></i> Yangi buyurtma qabul qilindi</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-x-circle text-danger"></i> Bir buyurtma bekor qilindi</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle text-warning"></i> Hisobot yangilandi</a></li>
                </ul>
            </li>

            <!-- Profile Dropdown -->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-person-circle" style="font-size: 25px;"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header text-center">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->email }}</span>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Chiqish</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        @if(auth()->user()->type === 'admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs(['admin_company','admin_company_create']) ? '' : 'collapsed' }}" data-bs-target="#company-nav" data-bs-toggle="collapse" href="javascript:void(0)">
                    <i class="bi bi-building"></i><span>Kompaniya</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="company-nav" class="nav-content collapse {{ request()->routeIs(['admin_company','admin_company_create']) ? 'show' : '' }}" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="{{ route('admin_company') }}" class="{{ request()->routeIs('admin_company') ? 'active' : '' }}">
                            <i class="bi bi-circle"></i><span>Barcha kompaniyalar</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin_company_create') }}" class="{{ request()->routeIs('admin_company_create') ? 'active' : '' }}">
                            <i class="bi bi-plus-circle"></i><span>Yangi qo‘shish</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#orders-nav" data-bs-toggle="collapse" href="javascript:void(0)">
                    <i class="bi bi-basket"></i><span>Buyurtmalar</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="orders-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="#"><i class="bi bi-circle"></i><span>Aktiv buyurtmalar</span></a></li>
                    <li><a href="#"><i class="bi bi-circle"></i><span>Tugallanganlar</span></a></li>
                    <li><a href="#"><i class="bi bi-circle"></i><span>Bekor qilinganlar</span></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-people"></i>
                    <span>Foydalanuvchilar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="javascript:void(0)">
                    <i class="bi bi-file-earmark-text"></i><span>Hisobotlar</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="report-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="#"><i class="bi bi-envelope"></i><span>SMS hisobot</span></a></li>
                    <li><a href="#"><i class="bi bi-journal-text"></i><span>Barcha hisobotlar</span></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-bar-chart"></i>
                    <span>Statistika</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-gear"></i>
                    <span>Sozlamalar</span>
                </a>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-cart"></i>
                    <span>Maxsulotlar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-basket"></i>
                    <span>Buyurtmalar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-people"></i>
                    <span>Hodimlar</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-credit-card"></i>
                    <span>Balans</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#">
                    <i class="bi bi-bar-chart"></i>
                    <span>Statistika</span>
                </a>
            </li>
        @endif
    </ul>
</aside>

<!-- Main Content -->
<main id="main" class="main">
    @yield('content')
</main>

<!-- Footer -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; {{ date('Y') }} <strong><span>Water GO</span></strong>. Barcha huquqlar himoyalangan.
    </div>
    <div class="credits">
        <strong><span>CodeStart</span></strong> Dev Center
    </div>
</footer>

<a href="#" class="back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
</a>
