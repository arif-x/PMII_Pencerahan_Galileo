<!DOCTYPE html>
<html lang="id">
<head>
  <title>PMII Rayon "Pencerahan" Galileo</title>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

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
          <li><a href="/article">Daftar Artikel</a></li>
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
            <a href="/event-pengkaderan" style="color: #000 !important;">
              Event Pengkaderan
            </a>
          </span>
          <span style="color: #000 !important;">
            >
          </span>
          <span style="color: #000 !important;">
            Event Pengkaderan Dibuka
          </span>

        </p>
        <h1 class="mb-0 bread">Event Pengkaderan Dibuka</h1>
      </div>
    </div>
  </div>

  <div class="container">
    @if ($message = Session::get('success'))
    <br>
    <div class="col-md-12 alert alert-info alert-block margin-tengah">      
      <button type="button" class="close" data-dismiss="alert">×</button>    
      <strong>{{ $message }}</strong>
    </div>
    @endif
  </div>

  <section class="ftco-section ftco-degree-bg">
    <div class="container">
      <div class="row">      
        <div class="col-lg-8 ftco-animate shadow">
          <hr class="hr-yellow">
          @foreach($events as $event)
          <div class="col-md-12">          
            <div class="row">
              <div class="col-md-12 d-flex ftco-animate">
                <div class="blog-entry align-self-stretch d-md-flex mb-3" style="width: 100% !important">
                  <div class="shadow align-middle block-20 mt-3 mb-3"><img src="{{ $event->thumbnail }}" style="max-width: 100% !important;">
                  </div>
                  <div class="text d-block pl-md-4 mt-1">
                    <h3><strong>{{ $event->nama_event }}</strong></h3>
                    <h5 style="text-align: justify !important;"><strong>Tanggal Pendaftaran Event:</strong> <br> {{ \Carbon\Carbon::parse($event->tgl_mulai_regist)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($event->tgl_akhir_regist)->format('d-m-Y') }}</h5>
                    <h5 style="text-align: justify !important;"><strong>Tanggal Pelaksanaan Event:</strong> <br> {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($event->tgl_akhir)->format('d-m-Y') }}</h5>

                    @guest
                    @if (Route::has('register'))
                    @endif
                    <p><a href="/login" class="btn btn-primary py-2 px-3">Login Untuk Ikutan</a></p>
                    @else
                    <input type="hidden" id="id{{ $event->id }}" value="{{ $event->id }}">

                    <?php
                    $date = new DateTime($event['tgl_akhir_regist']);
                    $now = new DateTime(); 

                    if($date > $now) {
                      echo '<p><a href="#" class="btn btn-primary py-2 px-3" data-toggle="modal" data-target="#eventRegistModal'. $event['id'] .'">Ikuti Event</a></p>

                      <div class="modal-lg fade" id="eventRegistModal'. $event['id'] .'" tabindex="-1" role="dialog" aria-labelledby="modalLabel'. $event['id'] .'" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="modalLabel'. $event['id'] .'">Konfirmasi</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                      </div>
                      <div class="modal-body">
                      Ingin Mengikuti '. $event['nama_event'] .'?
                      </div>
                      <div class="modal-footer">
                      <form method="POST" action="/event/join">
                      <input name="_token" value="' . csrf_token() . ' " type="hidden">
                      <input type="hidden" value="'. $event['id'] .'" name="event_id">
                      <input type="hidden" value="'. Auth::user()->id .'" name="user_id">
                      <button type="submit" class="btn btn-primary">Ikut</button>
                      </form>
                      </div>
                      </div>
                      </div>
                      </div>
                      ';
                    } elseif($date < $now) {
                      echo '<p><a href="#" class="btn btn-primary py-2 px-3">Event Telah Berakhir</a></p>';
                    }
                    ?>                    

                    @endguest
                  </div>
                </div>
              </div>
            </div>
            <hr class="hr-yellow">          
          </div>
          @endforeach          
          {{ $events->links() }}
        </div>
        <!-- .col-md-8 -->
        <div class="col-lg-4 sidebar ftco-animate shadow-sm" style="background-color: #ffc107 !important">
          <div class="sidebar-box shadow mt-3">
            <form action="#" class="search-form">
              <div class="form-group">
                <span class="icon ion-ios-search"></span>
                <input type="text" class="form-control" placeholder="Cari Event...">
              </div>
            </form>
          </div>
          
          <div class="sidebar-box ftco-animate shadow">
            <h3 class="heading">Kategori</h3>
            <ul class="categories">
              <li><a href="/event" class="tag-cloud-link">Event Umum</a></li>
              <ul>
                <li>
                  <a href="/event/dibuka" class="tag-cloud-link">Event Dibuka</a>
                </li>
                <li>
                  <a href="/event/ditutup" class="tag-cloud-link">Event Ditutup</a>
                </li>
              </ul>
              <hr>
              <li><a href="/event-pengkaderan" class="tag-cloud-link">Event Pengkaderan</a></li>
              <ul>
                <li>
                  <a href="/event-pengkaderan/dibuka" class="tag-cloud-link">Event Dibuka</a>
                </li>
                <li>
                  <a href="/event-pengkaderan/ditutup" class="tag-cloud-link">Event Ditutup</a>
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
    <script src="{{ asset('blog/js/main.js') }}"></script>z

  </body>
  </html>