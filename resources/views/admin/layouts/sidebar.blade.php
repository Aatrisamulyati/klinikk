<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo"></span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Maicit Dental</span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item">
            <a href="/dashboard" class="menu-link" @yield('menuDashboard')>
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        @if (Auth::user()->level == 'Admin')
        <!-- Data Pasien -->
        <li class="menu-item {{ request()->routeIs('data-pasien.index') || request()->routeIs('data-pasien.create') || request()->routeIs('data-pasien.edit') ? 'active' : '' }}">
            <a href="{{ route('data-pasien.index') }}" class="menu-link @yield('menuDataPasien')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Pasien</div>
            </a>
        </li>
        
        <!-- Data Dokter -->
        <li class="menu-item {{ request()->routeIs('data-dokter.index') || request()->routeIs('data-dokter.create') || request()->routeIs('data-dokter.edit') ? 'active' : '' }}">
            <a href="{{ route('data-dokter.index') }}" class="menu-link @yield('menuDataDokter')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Dokter</div>
            </a>
        </li>

        <!-- Data Services -->
        <li class="menu-item {{ request()->routeIs('data-services.index') || request()->routeIs('data-services.create') || request()->routeIs('data-services.edit') ? 'active' : '' }}">
            <a href="{{ route('data-services.index') }}" class="menu-link @yield('menuDataServices')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Services</div>
            </a>
        </li>

        <!-- Data Product -->
        <li class="menu-item {{ request()->routeIs('data-product.index') || request()->routeIs('data-product.create') || request()->routeIs('data-product.edit') ? 'active' : '' }}">
            <a href="{{ route('data-product.index') }}" class="menu-link @yield('menuDataProduct')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Product</div>
            </a>
        </li>
  
        <!-- Data Booking -->
        <li class="menu-item {{ request()->routeIs('data-booking.index') || request()->routeIs('data-booking.create') || request()->routeIs('data-booking.edit') ? 'active' : '' }}">
            <a href="{{ route('data-booking.index') }}" class="menu-link @yield('menuDataBooking')">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic">Data Booking</div>
            </a>
        </li>
        @endif

        @if ( Auth::user()->level == 'Dokter')
        <!-- Detail Booking -->
        <li class="menu-item {{ request()->routeIs('booking-detail.index') || request()->routeIs('data-detail.create') || request()->routeIs('data-detail.edit') ? 'active' : '' }}">
            <a href="{{ route('booking-detail.index') }}" class="menu-link @yield('menuDetailBooking')">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic">Detail Booking</div>
            </a>
        </li>
        @endif
    </ul>
</aside>
