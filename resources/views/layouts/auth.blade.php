<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>PMII Rayon "Pencerahan" Galileo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon">
  <link href="{{ URL::asset('img/apple-touch-icon.ico') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ URL::asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ URL::asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ URL::asset('css/auth.css') }}" rel="stylesheet">

  <!-- DatePicker Stylesheet File -->
  <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
  <link href="{{ URL::asset('lib/datepicker/datepicker.min.css') }}" rel="stylesheet">
  <script src="{{ URL::asset('lib/datepicker/datepicker.min.js') }}" type="text/javascript"></script> 

</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="/" class="scrollto"><img src="img/pmiigalileo.png" alt="" class="img-fluid"></a>
        <a href="/"><strong>PMII Rayon Pencerahan Galileo</strong></a>
    </div>

    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/login') }}">Login</a></li>
            <li><a href="{{ url('/register') }}">Daftar</a></li>
        </ul>
    </nav><!-- .main-nav -->
</div>
</header><!-- #header -->

<main class="py-4">
    @yield('content')
</main>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

    <!-- JavaScript Libraries -->
    <script src="{{ URL::asset('lib/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('lib/jquery/jquery-migrate.min.js') }}"></script>
    <script src="{{ URL::asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
    <script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ URL::asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ URL::asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('lib/lightbox/js/lightbox.min.js') }}"></script>
    <!-- Contact Form JavaScript File -->
    <script src="{{ URL::asset('contactform/contactform.js') }}"></script>

    <!-- Template Main Javascript File -->
    <script src="{{ URL::asset('js/main.js') }}"></script>

</body>
</html>
