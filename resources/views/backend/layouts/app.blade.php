<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sand Mining Management System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="d-flex align-items-center justify-content-between">
                <div class="sidebar-profile">
                    <img src="profile.jpg" alt="Admin Profile" class="rounded-circle"
                        style="width: 55px; height: 55px; border: 2px solid rgba(255, 255, 255, 0.3);">
                </div>
                <div class="sidebar-title">
                    <h3>Sand Mining Admin</h3>
                </div>
                <button class="btn btn-sm text-white" id="sidebarCloseBtn" style="display: none;">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
        </div>

        <div class="sidebar-menu">
            <a href="#" class="sidebar-item active">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>

            <a href="#riverPointsSubmenu" class="sidebar-item" id="riverPointsToggle">
                <i class="bi bi-geo-alt"></i>
                <span>River Points</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="riverPointsSubmenu">

                <a href="{{route('river-points.index')}}" class="sidebar-item">
                    <i class="bi bi-list"></i>
                    <span>All Points</span>
                </a>
                <a href="{{route('river-points.create')}}" class="sidebar-item">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Point</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="sandTypesToggle">
                <i class="bi bi-collection"></i>
                <span>Sand Types</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="sandTypesSubmenu">
                <a href="{{route('sand-types.index')}}" class="sidebar-item">
                    <i class="bi bi-list"></i>
                    <span>All Types</span>
                </a>
                <a href="{{route('sand-types.create')}}" class="sidebar-item">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Type</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-star"></i>
                    <span>Quality Grades</span>
                </a>
            </div>

            <a href="{{ route('sand_stocks.index') }}" class="sidebar-item" id="sandStocksToggle">
                <i class="bi bi-box-seam"></i>
                <span>Sand Stocks</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="sandStocksSubmenu">
                <a href="{{ route('sand_stocks.index') }}" class="sidebar-item">
                    <i class="bi bi-currency-dollar"></i>
                    <span> Stock</span>
                </a>
                <a href="{{ route('sand_stocks_history') }}" class="sidebar-item">
                    <i class="bi bi-currency-dollar"></i>
                    <span>Current Stock</span>
                </a>
                <a href="" class="sidebar-item">
                    <i class="bi bi-clock-history"></i>
                    <span>Stock History</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="tendersToggle">
                <i class="bi bi-file-earmark-text"></i>
                <span>Tenders</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="tendersSubmenu">
                <a href="{{route('tenders.index')}}" class="sidebar-item">
                    <i class="bi bi-list-ul"></i>
                    <span>Active Tenders</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Tender</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-archive"></i>
                    <span>Tender History</span>
                </a>
                <a href="{{ route('tender-owners.index') }}" class="sidebar-item">
                    <i class="bi bi-people"></i>
                    <span>Tender Owners</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="salesToggle">
                <i class="bi bi-cart-check"></i>
                <span>Sales</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="salesSubmenu">
                <a href="{{ route('sand_sales.index') }}" class="sidebar-item">
                    <i class="bi bi-receipt"></i>
                    <span>Sales Records</span>
                </a>
                <a href="{{ route('sand_sales.create') }}" class="sidebar-item">
                    <i class="bi bi-plus-circle"></i>
                    <span>New Sale</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-file-earmark-text"></i>
                    <span> ces</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-cash"></i>
                    <span>Payments</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="vehiclesToggle">
                <i class="bi bi-truck"></i>
                <span>Vehicles</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="vehiclesSubmenu">
                <a href="{{ route('vehicles.index') }}" class="sidebar-item">
                    <i class="bi bi-list"></i>
                    <span>Fleet</span>
                </a>
                <a href="{{ route('vehicles.create') }}" class="sidebar-item">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Vehicle</span>
                </a>
                <a href="{{ route('vehicle-trips.create') }}" class="sidebar-item">
                    <i class="bi bi-signpost-split"></i>
                    <span>Trips</span>
                </a>
                <a href="" class="sidebar-item">
                    <i class="bi bi-wrench"></i>
                    <span>Maintenance</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="workersToggle">
                <i class="bi bi-person-badge"></i>
                <span>Workers</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="workersSubmenu">
                <a href="{{ route('workers.index') }}" class="sidebar-item">
                    <i class="bi bi-people"></i>
                    <span>All Workers</span>
                </a>
                <a href="{{ route('workers.create') }}" class="sidebar-item">
                    <i class="bi bi-person-plus"></i>
                    <span>Add Worker</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-calendar-check"></i>
                    <span>Attendance</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-cash-stack"></i>
                    <span>Wages</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="majhiToggle">
                <i class="bi bi-person-workspace"></i>
                <span>Majhi</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="majhiSubmenu">
                <a href="{{ route('majhis.index') }}" class="sidebar-item">
                    <i class="bi bi-people"></i>
                    <span>All Majhi</span>
                </a>
                <a href="{{ route('majhis.create') }}" class="sidebar-item">
                    <i class="bi bi-person-plus"></i>
                    <span>Add Majhi</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-boat"></i>
                    <span>Boat Assignments</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="equipmentToggle">
                <i class="bi bi-tools"></i>
                <span>Equipment</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="equipmentSubmenu">
                <a href="{{ route('equipments.index') }}" class="sidebar-item">
                    <i class="bi bi-list"></i>
                    <span>All Equipment</span>
                </a>
                <a href="{{ route('equipments.create') }}" class="sidebar-item">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Equipment</span>
                </a>
                <a href="" class="sidebar-item">
                    <i class="bi bi-clock"></i>
                    <span>Usage</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-wrench"></i>
                    <span>Maintenance</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="reportsToggle">
                <i class="bi bi-file-earmark-bar-graph"></i>
                <span>Reports</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="reportsSubmenu">
                <a href="#" class="sidebar-item">
                    <i class="bi bi-cart"></i>
                    <span>Sales Reports</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-box-seam"></i>
                    <span>Stock Reports</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-cash-stack"></i>
                    <span>Financial Reports</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Custom Reports</span>
                </a>
            </div>

            <a href="#" class="sidebar-item" id="settingsToggle">
                <i class="bi bi-gear"></i>
                <span>Settings</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <div class="sidebar-submenu" id="settingsSubmenu">
                <a href="#" class="sidebar-item">
                    <i class="bi bi-globe"></i>
                    <span>General</span>
                </a>
                <a href="{{route('roles.index')}}" class="sidebar-item">
                    <i class="bi bi-people"></i>
                    <span>Roles</span>
                </a>
                <a href="{{route('users.index')}}" class="sidebar-item">
                    <i class="bi bi-people"></i>
                    <span>Users</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-shield-lock"></i>
                    <span>Permissions</span>
                </a>
                <a href="#" class="sidebar-item">
                    <i class="bi bi-bell"></i>
                    <span>Notifications</span>
                </a>
            </div>

            <a href="#" class="sidebar-item">
                <i class="bi bi-question-circle"></i>
                <span>Help & Support</span>
            </a>
        </div>
    </div>

    <!-- Header -->
    <header class="header" id="header">
        <button class="menu-toggle" id="menuToggle">
            <i class="bi bi-list"></i>
        </button>

        <div class="header-search position-relative">
            <i class="bi bi-search search-icon"></i>
            <input type="text" class="form-control" placeholder="Search river points, tenders, sales...">
        </div>

        <div class="header-nav ms-auto">
            <div class="header-nav-item">
                <a href="#" class="header-nav-link">
                    <i class="bi bi-bell"></i>
                    <span class="badge">3</span>
                </a>
            </div>

            <div class="header-nav-item">
                <a href="#" class="header-nav-link">
                    <i class="bi bi-envelope"></i>
                    <span class="badge">5</span>
                </a>
            </div>

            <div class="user-dropdown" id="userDropdown">
                <img src="https://picsum.photos/seed/admin123/40/40.jpg" alt="User">
                <span>Admin</span>
                <i class="bi bi-chevron-down ms-2"></i>

                <div class="user-dropdown-menu" id="userDropdownMenu">
                    <a href="#">
                        <i class="bi bi-person-circle"></i>
                        <span>My Profile</span>
                    </a>
                    <a href="#">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                    <a href="#">
                        <i class="bi bi-bell"></i>
                        <span>Notifications</span>
                    </a>
                    <div class="divider"></div>
                    <a href="#">
                        <i class="bi bi-question-circle"></i>
                        <span>Help & Support</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content" id="mainContent">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer" id="footer">
        <div>
            <span class="text-muted">© 2023 Sand Mining Management System. All rights reserved.</span>
        </div>
        <div>
            <span class="text-muted">Version 1.0.0</span>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{asset('assets/js/script.js')}}"></script>
    @stack('scripts')
</body>

</html>