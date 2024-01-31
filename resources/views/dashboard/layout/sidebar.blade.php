<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-book-reader"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Bang Reno Property</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/admin/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        MENU
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/tentang">
            <i class="fas fa-fw fa-book"></i>
            <span>Tentang</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/keunggulan">
            <i class="fas fa-fw fa-book"></i>
            <span>Keunggulan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/jasa">
            <i class="fas fa-fw fa-book"></i>
            <span>Jasa</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/rating">
            <i class="fas fa-fw fa-book"></i>
            <span>Rating</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/kontak">
            <i class="fas fa-fw fa-book"></i>
            <span>Kontak</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/kerjasama">
            <i class="fas fa-fw fa-book"></i>
            <span>Kerjasama</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/portofolio">
            <i class="fas fa-fw fa-book"></i>
            <span>Portofolio</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/artikel">
            <i class="fas fa-fw fa-book"></i>
            <span>Artikel</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/logactivity">
            <i class="fas fa-fw fa-book"></i>
            <span>Log Activity</span>
        </a>
    </li>
    
    @if(auth()->user()->role == "admin")
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Admin Menu
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="/admin/listuser">
            <i class="fas fa-fw fa-book"></i>
            <span>User</span>
        </a>
    </li>
    @endif
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>