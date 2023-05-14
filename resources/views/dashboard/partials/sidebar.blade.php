<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
      <!-- Brand logo -->
      <a class="navbar-brand text-center" href="./index.html">
        <img class="logo-brand" src="{{ asset('images/logos/main-logo.png') }}" alt="diskominfo sumut" style="
          width:80%"/>
      </a>

      <!-- Navbar nav -->
       <ul class="navbar-nav flex-column" id="sideNavbar">

        <li class="nav-item">
          <a class="nav-link has-arrow {{ Request::is('dashboard/home') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
            <i class="fa-regular nav-icon fa-house me-2 fa-fw"></i>
            Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link has-arrow {{ Request::is('dashboard/barang') ? 'active' : '' }}" href="/dashboard/barang">
            <i class="fa-solid fa-box-open me-2 fa-fw"></i>
            Barang
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link has-arrow {{ Request::is('dashboard/peminjaman') ? 'active' : '' }}" href="/dashboard/peminjaman">
            <i class="fa-solid fa-calendar-week me-2 fa-fw"></i>
            Peminjaman
          </a>
        </li>

        <li class="nav-item">
            <a class="nav-link has-arrow {{ Request::is('dashboard/laporan') ? 'active' : '' }}" href="/dashboard/laporan">
                <i class="fa-solid fa-book me-2 fa-fw"></i>
              Laporan
            </a>
          </li>

        <li class="nav-item px-5">
          <hr class=" nav-link text-white p-0">
        </li>

        <li class="nav-item">
          <a class="nav-link has-arrow {{ Request::is('dashboard/kategori') ? 'active' : '' }}" href="/dashboard/kategori">
            <i class="fa-regular nav-icon fa-list me-2 fa-fw"></i>
            Kategori
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link has-arrow {{ Request::is('dashboard/user') ? 'active' : '' }}" href="/dashboard/user">
            <i class="fa-solid fa-user me-2 fa-fw"></i>
            User
          </a>
        </li>

      </ul>
    </div>
  </nav>
