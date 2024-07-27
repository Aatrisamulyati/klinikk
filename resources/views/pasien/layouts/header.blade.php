<header id="header" class="fixed-top">
  <div class="container d-flex align-items-center">
    <a href="/" class="logo me-auto">
      <img src="\frontend\img\logo .jpg">
      <span>Maicit Dental</span>
    </a>
    
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto @yield('menuBeranda')" href="/">Home</a></li>
        <li>
          <a class="nav-link @yield('menuBooking')" href="{{route('booking.index')}}">Booking</a>
        </li>
        <li>
          <a class="nav-link @yield('menuMyBooking')" href="{{route('my-booking.index')}}">My Booking</a>
        </li>
      
        <li><a class="nav-link scrollto" href="/dokter/index">Doctors</a></li>
        <li><a class="nav-link scrollto" href="/dokter/index">Services</a></li>
        
        {{-- <li class="dropdown">
          <a href="/layanan/index"><span>Services</span> <i class="bi bi-chevron-down"></i></a>
          <ul>
            <li><a href="#">Gigi Berlubang</a></li>
            <li><a href="#">Cabut Gigi</a></li>
            <li><a href="#">Scalling</a></li>
            <li><a href="#">Blaching</a></li>
            <li><a href="#">Behel</a></li>
          </ul>
        </li> --}}
        <li><a class="nav-link scrollto" href="/about/index">About</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->
    
    <a href="/login" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>
    
  </div>
</header><!-- End Header -->
