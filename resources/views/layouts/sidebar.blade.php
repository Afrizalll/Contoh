<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">CRUD Perpustakaan</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item{{ request()->is('/') ? ' active' : '' }}">
        <a class="nav-link" href="/">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ request()->is('buku','jenisbuku','penulisbuku','penerbit') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-book-dead"></i>
        <span>Buku</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header ">Detail Buku</h6>
                <a class="collapse-item {{ request()->is('buku') ? 'active' : '' }}" href="/buku">Daftar Buku</a>
                <a class="collapse-item {{ request()->is('jenisbuku') ? 'active' : '' }}" href="/jenisbuku">Jenis Buku</a>
                <a class="collapse-item {{ request()->is('penulis') ? 'active' : '' }}" href="/penulis">Penulis</a>
                <a class="collapse-item {{ request()->is('penerbit') ? 'active' : '' }}" href="/penerbit">Penerbit</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ request()->is('rakbuku') ? ' active' :  '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Rak Buku</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Detail Rak Buku:</h6>
                <a class="collapse-item {{ request()->is('rakbuku') ? ' active' :  '' }}" href="/rakbuku">Rak Buku</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item {{ request()->is('peminjam') ? ' active' :  '' }}">
        <a class="nav-link" href="/peminjam">
            <i class="fas fa-fw fa-user"></i>
            <span>Peminjam</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>