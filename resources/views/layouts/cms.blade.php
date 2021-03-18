<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PMII Rayon "Pencerahan" Galileo</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <meta name="csrf-token" content="{{ csrf_token() }}">


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

  <link href="{{ asset('admin/lib/datatables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/lib/datatables/FixedColumns-3.3.2/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet">

  <script src="{{ URL::asset('admin/lib/datatables/jQuery-3.3.1/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ URL::asset('admin/lib/datatables/DataTables-1.10.23/js/jquery.dataTables.min.js') }}"></script>    
  <script src="{{ URL::asset('admin/lib/datatables/Bootstrap-4-4.1.1/js/bootstrap.min.js') }}"></script>
  <script src="{{ URL::asset('admin/lib/datatables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ URL::asset('admin/lib/datatables/FixedColumns-3.3.2/js/dataTables.fixedColumns.min.js') }}"></script>  

  <!-- Main Stylesheet File -->
  <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
  <style type="text/css">
    body {
      background-color: #fff !important;
    }
  </style>

  <link href="{{ URL::asset('lib/datepicker/datepicker.min.css') }}" rel="stylesheet">
  <script src="{{ URL::asset('lib/datepicker/datepicker.min.js') }}" type="text/javascript"></script> 

</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>ASD</span></a></h1> -->
        <a href="/" class="scrollto"><img src="{{ asset('img/pmiigalileo.png') }}" alt="" class="img-fluid"></a>
        <a href="/"><strong>PMII Rayon Pencerahan Galileo</strong></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="/#intro">Home</a></li>
          <li><a href="/cms/manage">Tulis Artikel</a></li>
          <li><a href="/my-events">Event Saya</a></li>
          <li><a href="/friends">Teman</a></li>
          <li><a href="/profile">Profil</a></li>
          <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
      </li>
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
<script src="{{ URL::asset('lib/mobile-nav/mobile-nav.js') }}"></script>
<script src="{{ URL::asset('lib/wow/wow.min.js') }}"></script>

</body>
</html>
