<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PMII Rayon "Pencerahan Galileo"</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
</head>

<body>

    <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="#intro" class="scrollto"><img src="img/pmiigalileo.png" alt="" class="img-fluid"></a>
        <a href="/"><strong>Portal Kader PMII RPG</strong></a>
    </div>

    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
            <li class="active"><a href="#intro">Home</a></li>
            <li><a href="#about">Tentang Kami</a></li>
            <li><a href="#services">Fitur</a></li>
            <li><a href="#article">Artikel</a></li>
            <li><a href="#event">Event</a></li>
            <li><a href="#team">Pengurus</a></li>
            <li><a href="#contact">Kontak Kami</a></li>
            @guest
            @if (Route::has('register'))
            @endif

            @else
            <li class="drop-down"><a href="">Menu</a>
                <ul>
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
            @endguest
        </ul>
    </nav><!-- .main-nav -->

</div>
</header><!-- #header -->

    <!--==========================
    Intro Section
    ============================-->
    <section id="intro" class="clearfix">
        <div class="container">

            <div class="intro-img">
                <img src="img/intro.png" class="top-img" alt="">
            </div>

            <div class="intro-info">
                <h2>WEB Portal<br>Kader PMII<br>Rayon <nobr style="font-style: italic;">Pencerahan</nobr> Galileo</h2>
                <div>
                    @guest
                    <a href="" class="btn-get-started scrollto" data-toggle="modal" data-target="#login">Login</a>
                    <a href="" class="btn-services scrollto" data-toggle="modal" data-target="#daftar">Daftar</a>
                    @else
                    <a class="btn-services scrollto" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endguest
                </div>
            </div>

        </div>
    </section><!-- #intro -->

    <div class="modal login-modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label for="email">Email</label>
                        <div class="input-group form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <label for="password">Password</label>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md">
                                <div class="form-check">
                                    <label class="form-check-label" for="remember">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Ingatkan Login
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="form-group row mb-0">
                            <div class="col-md">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa Password?
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal register-modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="daftar" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="nim">NIM</label>  
                                <div class="form-group">
                                    <input id="nim" type="number" class="form-control" name="nim" required autocomplete="nim" autofocus>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="angkatan">Angkatan</label>
                                <div class="form-group">
                                    <select class="form-control" name="angkatan">
                                        <option selected="true" disabled>Angkatan Mapaba</option>
                                        <option value="2019">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                        <option value="2014">2014</option>
                                        <option value="2013">2013</option>
                                        <option value="2012">2012</option>
                                        <option value="2011">2011</option>
                                    </select>                                                           
                                </div>
                            </div>
                        </div>

                        <label for="name">Nama Lengkap</label>
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="email">Email</label>
                        <div class="input-group form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="password">{{ __('Password') }}</label>
                        <div class="form-group">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <label for="password-confirm">Konfirmasi Password</label>
                        <div class="form-group">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <main id="main">

        <!--==========================
      About Us Section
      ============================-->
      <section id="about">
        <div class="container">

            <header class="section-header">
                <h3>Tentang Kami</h3>
                <p>PMII Rayon   Galileo</p>
            </header>

            <div class="row about-container">

                <div class="col-lg-6 content order-lg-1 order-2">

                    <div class="icon-box wow fadeInUp">
                        <div class="icon"><i class="fa fa-clipboard"></i></div>
                        <h4 class="title"><a href="">Tujuan PMII</a></h4>
                        <br />
                        <p class="text-center">Terbentuknya pribadi muslim Indonesia yang bertaqwa kepada Allah SWT. Berbudi luhur, Berilmu, Cakap dan bertanggung jawab dalam mengamalkan ilmunya serta komitmen memperjuangkan cita-cita kemerdekaan Indonesia
                        </p>
                    </div>

                </div>

                <div class="col-lg-6 background order-lg-2 order-1 wow fadeInUp">
                    <img src="/img/pmiigalileo.png" class="img-fluid" alt="">
                </div>
            </div>

        </div>
    </section><!-- #about -->

        <!--==========================
      Services Section
      ============================-->
      <section id="services" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3>Fitur</h3>
                <p>Fitur Dari Website Ini</p>
            </header>

            <div class="row">

                <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="">UGC (User-Generated Content)</a></h4>
                        <p class="description"></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon"><i class="ion-ios-bookmarks-outline" style="color: #e9bf06;"></i></div>
                        <h4 class="title"><a href="">Event</a></h4>
                        <p class="description"></p>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #services -->

        <!--==========================
      Why Us Section
      ============================-->
      <section id="why-us" class="wow fadeIn">
        <div class="container">
            <header class="section-header">
                <h3>Anggota</h3>
                <p>Daftar Anggota PMII Rayon <nobr style="font-style: italic;"> Pencerahan </nobr> Galileo</p>
            </header>

            <div class="row counters">

                <div class="col-md-3 col-3 text-center">
                    <span data-toggle="counter-up">100</span>
                    <p>Seluruh Anggota</p>
                </div>

                <div class="col-md-3 col-3 text-center">
                    <span data-toggle="counter-up">100</span>
                    <p>Anggota Mapaba</p>
                </div>

                <div class="col-md-3 col-3 text-center">
                    <span data-toggle="counter-up">100</span>
                    <p>Anggota PKD</p>
                </div>

                <div class="col-md-3 col-3 text-center">
                    <span data-toggle="counter-up">100</span>
                    <p>Anggota PKL</p>
                </div>

            </div>

        </div>
    </section>

    <section id="article" class="wow fadeIn">
        <div class="container">
            <header class="section-header">
                <h3>Artikel</h3>
                <p>Kumpulan Artikel Karya Kader PMII Rayon <nobr style="font-style: italic;"> Pencerahan </nobr> Galileo</p>
                <div class="text-center">
                    <a type="button" class="btn btn-secondary" href="{{ route('publics.article') }}">Lihat Semua Artikel</a>
                </div>
            </header>
            <div class="text-center">

            </div>
            <div class="mt-4">
                <div class="row">
                    @foreach ($articles as $article)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <img src="{{ $article->thumbnail }}">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="/article/{{ $article->url }}">{{ $article->title }}</a>
                                </div>
                                <div class="text-center">
                                    {{ $article->description }}
                                </div>
                            </div>
                        </div>    
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section id="event" class="wow fadeIn">
        <div class="container">
            <header class="section-header">
                <h3>Event</h3>
                <p>Event PMII Rayon <nobr style="font-style: italic;"> Pencerahan </nobr> Galileo</p>
                <div class="text-center">
                    <a type="button" class="btn btn-secondary" href="{{ route('publics.event') }}">Lihat Semua Event</a>
                </div>
            </header>
            <div class="text-center">

            </div>
            <div class="mt-4">
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <img src="{{ $event->thumbnail }}">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <strong><a href="/event">{{ $event->nama_event }}</a></strong>
                                </div>
                                <div class="text-center">
                                    <strong>Open Register:</strong> <br>
                                    {{ \Carbon\Carbon::parse($event->tgl_mulai_regist)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($event->tgl_akhir_regist)->format('d-m-Y') }} <br>
                                    <strong>Pelaksanaan:</strong> <br>
                                    {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($event->tgl_akhir)->format('d-m-Y') }}
                                </div>
                            </div>
                        </div>    
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



        <!--==========================
      Team Section
      ============================-->
      <section id="team">
        <div class="container">
            <div class="section-header">
                <h3>Pengurus</h3>
                <p>Pengurus PMII Rayon <nobr style="font-style: italic;"> Pencerahan </nobr> Galileo</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 wow fadeInUp">
                    <div class="member">
                        <img src="img/team-1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Walter White</h4>
                                <span>Chief Executive Officer</span>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="member">
                        <img src="img/team-2.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Sarah Jhonson</h4>
                                <span>Product Manager</span>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="member">
                        <img src="img/team-3.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>William Anderson</h4>
                                <span>CTO</span>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="member">
                        <img src="img/team-4.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>Amanda Jepson</h4>
                                <span>Accountant</span>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #team -->

    <!--==========================
      Clients Section
      ============================-->
      <section id="testimonials" class="section-bg-1">
        <div class="container">

            <header class="section-header">
                <h3>Tim</h3>
            </header>

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="owl-carousel testimonials-carousel wow fadeInUp">

                        <div class="testimonial-item">
                            <img src="img/testimonial-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/testimonial-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                            <p>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <img src="img/testimonial-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                            <p>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                            </p>
                        </div>

                    </div>

                </div>
            </div>


        </div>
    </section><!-- #testimonials -->

        <!--==========================
      Clients Section
      ============================-->
      <section id="clients" class="section-bg">

        <div class="container">

            <div classs="section-header">
                <h3>Sahabat PMII</h3>
            </div>

            <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="img/clients/client-1.PNG" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo">
                        <img src="img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>

    </section>

        <!--==========================
      Contact Section
      ============================-->
      <section id="contact">
        <div class="container-fluid">

            <div class="section-header">
                <h3>Kontak Kami</h3>
            </div>

            <div class="row wow fadeInUp">

                <div class="col-lg-6">
                    <div class="map mb-4 mb-lg-0">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15805.774526433857!2d112.6085879!3d-7.9530225!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x686e24d74c50ca36!2sPMII%20Rayon%20%22Pencerahan%22%20Galileo%20(Tempat%20Baru)!5e0!3m2!1sid!2sid!4v1571913739953!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-5 info">
                            <i class="ion-ios-location-outline"></i>
                            <p>Jl. Joyo Tamansari 1 No. 67 Gg. II RT.06 RW.06 Merjosari Lokowaru Malang</p>
                        </div>
                        <div class="col-md-4 info">
                            <i class="ion-ios-email-outline"></i>
                            <p>
                                sahabatgalileo@gmail.com<br>
                                admin@pmiigalileo.or.id
                            </p>
                        </div>
                        <div class="col-md-3 info">
                            <i class="ion-ios-telephone-outline"></i>
                            <p>+6285850987734</p>
                        </div>
                    </div>

                    <div class="form">
                        <div id="sendmessage">Pesan Telah Terkirim. Terimakasih!</div>
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Lengkap" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subjek" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Tulis Sesuatu"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit" title="Kirim Pesan">Kirim Pesan</button></div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #contact -->

</main>

    <!--==========================
    Footer
    ============================-->
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
                                <li><a href="#about">Tentang Kami</a></li>
                                <li><a href="#services">Fitur</a></li>
                                <li><a href="#team">Pengurus</a></li>          
                                <li><a href="#contact">Kontak Kami</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-contact">            
                            <h4 style="">Kontak kami</h4>
                            <!-- <p> -->
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
                                <!-- </p> -->

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
            </div>
        </footer><!-- #footer -->

        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <!-- Uncomment below i you want to use a preloader -->
        <!-- <div id="preloader"></div> -->

        <!-- JavaScript Libraries -->
        <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/mobile-nav/mobile-nav.js') }}"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
        <!-- Contact Form JavaScript File -->
        <script src="{{ asset('contactform/contactform.js') }}"></script>

        <!-- Template Main Javascript File -->
        <script src="{{ asset('js/main.js') }}"></script>

    </body>

    </html>