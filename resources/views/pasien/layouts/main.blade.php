<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Maicit Dental Care Aatrisa Mulyati</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- Livewire --}}

  @livewireStyles

  <!-- Favicons -->
  <link href="../frontend/img/hospitalwebp.webp" rel="icon">
  <link href="../frontend/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../frontend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="../frontend/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../frontend/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../frontend/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../frontend/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../frontend/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../frontend/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../frontend/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../frontend/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-instagram"></i> <a href="https://www.instagram.com/maicitdentalcare.official/">maicitdentalcare.official</a>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="https://api.whatsapp.com/send?phone=6282280670289&text=Halo+Dok%0ASaya+Ingin+Buat+Jaji+Temu" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
        <a href="https://www.facebook.com/photo/?fbid=200410255059799&set=a.130334625400696" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="https://www.instagram.com/maicitdentalcare.official/" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="https://www.tiktok.com/@maicit_dentalcare" class="tiktok"><i class="bi bi-tiktok"></i></a>

      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <!-- ======= Hero Section ======= -->
  
  @include('pasien.layouts.header')

  <!-- ======= End Header ======= -->
  {{-- <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Welcome to Maicit Dental </h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
    
  </section><!-- End Hero -->
  
  
  <main id="main"> --}}
    <!-- ======= Why Us Section ======= -->

  <!-- Clinic Details -->
  {{-- <div class="container clinic-details">
      <div class="clinic-header">
          <img src="{{ asset('frontend/img/logo .jpg') }}" alt="Dentacio Dental Clinic" class="clinic-logo">
          <div class="clinic-info">
              <h1>Dentacio Dental Clinic</h1>
              <p><i class="bi bi-geo-alt"></i> Dentacio Dental Care, Jalan Doktor Sutomo, Kubu Marapalam, Kota Padang, Sumatera Barat, Indonesia</p>
              <p><a href="#">Lihat daftar cabang rumah sakit/klinik lainnya.</a></p>
          </div>
      </div>
  </div> --}}


 

  @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('pasien.layouts.footer')
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../frontend/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../frontend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../frontend/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../frontend/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../frontend/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../frontend/js/main.js"></script>

  {{-- Script Livewire --}}
  @livewireScripts
  
</body>

</html>