<!DOCTYPE html>
<html lang="id">
<head>
  @foreach($datas as $posts)
  <title>{{ $posts->title }} | PMII Rayon "Pencerahan" Galileo</title>
  @endforeach
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="" name="keywords" />
  @foreach($datas as $posts)
  <meta content="{{ $posts->description }} | PMII Rayon Pencerahan Galileo" name="description" />
  @endforeach
  @foreach($datas as $posts)
  <meta name="author" content="{{ $posts->writer }}" />
  @endforeach

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.ico') }}" rel="icon">
  <link href="{{ URL::asset('img/apple-touch-icon.ico') }}" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('blog/css/open-iconic-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/animate.css') }}">

  <link rel="stylesheet" href="{{ asset('blog/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/magnific-popup.css') }}">

  <link href="{{ asset('blog/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('blog/css/aos.css') }}">

  <link rel="stylesheet" href="{{ asset('blog/css/ionicons.min.css') }}">

  <link rel="stylesheet" href="{{ asset('blog/css/bootstrap-datepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('blog/css/jquery.timepicker.css') }}">

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

  <div class="hero-wrap">
    <div class="container" style="padding-top: 70px !important;">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
         <p class="breadcrumbs" style="padding-top: 10px !important;">
          <span class="mr-2">
            <a href="/" style="color: #000 !important;">
              Home
            </a>
          </span>
          <span style="color: #000 !important;">
            >
          </span>
          <span style="color: #000 !important;">
            <a href="/article" style="color: #000 !important;">
              Article
            </a>
          </span>
          <span style="color: #000 !important;">
            >
          </span>
          @foreach($datas as $posts)
          <span style="color: #000 !important;">
            {{ $posts->title }}
          </span>
          @endforeach
        </p>
        @foreach($datas as $posts)
        <h1 class="mb-0 bread">{{ $posts->title }}</h1>
        @endforeach
      </div>
    </div>
  </div>
</div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ftco-animate shadow">
        <hr class="hr-yellow">
        <div class="mr-3 ml-3">
        @foreach($datas as $posts)
        <h2 class="mb-3 mt-4">{{ $posts->title }}</h2>
        <hr>
        <div class="img-content" style="text-align: justify;">
          <?php
          echo $posts->content
          ?>
        </div>      
        <div class="tag-widget post-tag-container mb-5 mt-5">
          <div class="tagcloud">
            Tag: <a href="/post/category/{{ $posts->category }}" class="tag-cloud-link">{{ $posts->category }}</a>
          </div>
        </div>
        <hr class="hr-yellow">

        <div class="about-author d-flex p-4 bg-light mb-3">
          <div class="row">
            <div class="col-lg-4">
              <div class="bio align-self-md-center mr-4">
                <img src="{{ asset('img/pmiigalileo.png') }}" alt="placeholder" class="img-fluid mb-4" style="max-width: 100% !important; height: auto;">
              </div>
            </div>
            <div class="col-lg-8">
              <div class="desc align-self-md-center">
                <h3>PMII Rayon "Pencerahan" Galileo</h3>
                <p>
                  Jl. Address <br>
                  <strong>Phone:</strong> +1 5589 55488 55<br>
                  <strong>Email:</strong> info@example.com<br>
                </p>
              </div>
            </div>
          </div>                    
        </div>
        @endforeach        
        </div>
      </div> <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate shadow" style="background-color: #ffc107 !important">
        <div class="sidebar-box shadow mt-3">
          <form action="#" class="search-form">
            <div class="form-group">
              <span class="icon ion-ios-search"></span>
              <input type="text" class="form-control" placeholder="Cari Post...">
            </div>
          </form>
        </div>
        <div class="sidebar-box ftco-animate shadow">
          <h3 class="heading">Kategori</h3>
          <ul class="categories">
            <li><a href="/post/kategori/kegiatan" class="tag-cloud-link">Kegiatan</a></li>
          </ul>
        </div>

        <!-- <div class="sidebar-box ftco-animate">
            
        </div> -->

        <div class="sidebar-box ftco-animate shadow">
          <h3 class="heading">Tag</h3>
          <div class="tagcloud">
            <a href="/post/kategori/kegiatan" class="tag-cloud-link">Kegiatan</a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section> <!-- .section -->

<!--==========================Footer============================-->
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
</div>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#18d36e"/></svg></div>
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
<script src="{{ asset('blog/js/main.js') }}"></script>

</body>
</html>