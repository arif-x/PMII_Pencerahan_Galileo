<!DOCTYPE html>
<html lang="id">
<head>
  <title>PMII Rayon "Pencerahan" Galileo</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta name="description" content="Daftar Event Umum dan Pengkaderan PMII Rayon Pencerahan Galileo"/>
  <link rel="canonical" href="{{ asset('img/favicon.ico') }}" />
  <meta property="og:locale" content="id_ID" />
  <meta property="og:type" content="article" />
  <meta property="og:title" content="Artikel | PMII Rayon Pencerahan Galileo" />
  <meta property="og:description" content="Daftar Event Umum dan Pengkaderan PMII Rayon Pencerahan Galileo" />
  <meta property="og:url" content="{{URL::asset('/article') }}" />
  <meta property="og:site_name" content="PMII Rayon Pencerahan Galileo" />
  <meta property="article:publisher" content="https://www.facebook.com/goodnewsfrompmii/" />
  <meta property="article:published_time" content="{{ \Carbon\Carbon::now() }}" />
  <meta property="article:modified_time" content="{{ \Carbon\Carbon::now() }}" />
  <meta property="og:updated_time" content="{{ \Carbon\Carbon::now() }}" />
  <meta property="og:image" content="{{ asset('img/favicon.ico') }}" />
  <meta property="og:image:secure_url" content="{{ asset('img/favicon.ico') }}" />
  <meta property="og:image:width" content="1200" />
  <meta property="og:image:height" content="694" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:description" content="Daftar Event Umum dan Pengkaderan PMII Rayon Pencerahan Galileo" />

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon">
  <link href="{{ URL::asset('img/apple-touch-icon.ico') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('blog/css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <link rel="stylesheet" href="{{ asset('blog/css/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('blog/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/magnific-popup.css') }}">

  <link href="{{ asset('blog/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('blog/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('blog/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('blog/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/icomoon.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">  
  
</head>
<body>

  <header id="header" class="shadow-sm">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <a href="/" class="scrollto"><img src="{{ asset('img/pmiigalileo.png') }}" alt="" class="img-fluid"></a>
        <a href="/">PMII Rayon "Pencerahan" Galileo</a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="/">Kembali Ke Home</a></li>
          <li><a href="/event">Event Umum</a></li>
          <li><a href="/event-pengkaderan">Event Pengkaderan</a></li>
          <li><a href="/article">Artikel</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  @yield('content')

  <div class="col-lg-4 sidebar ftco-animate shadow-sm" style="background-color: #ffc107 !important">

    <div class="sidebar-box ftco-animate shadow mt-3">
      <h3 class="heading">Kategori</h3>
      <ul class="categories">
        <li><a href="/event" class="tag-cloud-link">Event Umum</a></li>
        <ul>
          <li>
            <a href="/event/dibuka" class="tag-cloud-link">Pendaftaran Dibuka</a>
          </li>
          <li>
            <a href="/event/ditutup" class="tag-cloud-link">Pendaftaran Ditutup</a>
          </li>
        </ul>
        <hr>
        <li><a href="/event-pengkaderan" class="tag-cloud-link">Event Pengkaderan</a></li>
        <ul>
          <li>
            <a href="/event-pengkaderan/dibuka" class="tag-cloud-link">Pendaftaran Dibuka</a>
          </li>
          <li>
            <a href="/event-pengkaderan/ditutup" class="tag-cloud-link">Pendaftaran Ditutup</a>
          </li>
        </ul>
      </ul>
    </div>
  </div>        

</div>
</div>
</section> <!-- .section -->

<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6 footer-info">
          <h3>PMII RAYON <nobr style="font-style: italic;"> PENCERAHAN </nobr> GALILEO</h3>
          <p>Universitas Islam Negeri Maulana Malik Ibrahim Malang</p>
        </div>

        <div class="col-lg-2 col-md-6 footer-links">
          <h4>Link</h4>
          <ul>
            <li><a href="/">Home</li>
              <li><a href="/#about">Tentang Kami</a></li>
              <li><a href="/#services">Fitur</a></li>
              <li><a href="/#article">Aktikel</a></li>          
              <li><a href="/#team">Pengurus</a></li>          
              <li><a href="/#contact">Kontak Kami</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Kontak kami</h4>
            <strong>Alamat: </strong><br>
            Jl. Joyo Tamansari 1 No. 67 Gg. II RT.06 RW.06 Merjosari Lokowaru Malang<br><br>
            <strong>Telpon:</strong>
            <ul>
              <li>+6285850987734</li>
            </ul>
            <strong>Email:</strong>
            <ul>
              <li>sahabatgalileo@gmail.com</li>
              <li>admin@pmiigalileo.or.id</li>
            </ul>
            <br>
            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Subscribe</h4>
            <p>Notifikasi Email</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>PMII Rayon<nobr style="font-style: italic;"> Pencerahan </nobr>Galileo</strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://github.com/Arif-X" target="_blank">Arif-X</a>
      </div>
    </div>
  </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#007bff"/></svg></div>


  <script src="{{ asset('blog/js/jquery.min.js') }}"></script>
  <script src="{{ asset('blog/js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('blog/js/popper.min.js') }}"></script>
  <script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('blog/js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('blog/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('blog/js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('blog/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('blog/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('blog/js/aos.js') }}"></script>
  <script src="{{ asset('blog/js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('blog/js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('blog/js/scrollax.min.js') }}"></script>
  <script src="{{ asset('blog/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('blog/lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('blog/lib/waypoints/waypoints.min.js') }}"></script>
  <script src="{{ asset('blog/lib/counterup/counterup.min.js') }}"></script>
  <script src="{{ asset('blog/lib/isotope/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('blog/lib/touchSwipe/jquery.touchSwipe.min.js') }}"></script>  
  <!-- Template Main Javascript File -->
  <script src="{{ asset('blog/js/mains.js') }}"></script>
  <script src="{{ asset('blog/js/main.js') }}"></script>z

</body>
</html>