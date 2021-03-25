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
    <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
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
        <a href="/"><strong>PMII Rayon Pencerahan Galileo</strong></a>
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
                <h2 class="mt-5">PMII<br>Rayon <nobr style="font-style: italic;">Pencerahan</nobr> Galileo</h2>
                <div>
                    @guest
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <a href="" type="button" class="btn-get-started scrollto" data-toggle="modal" data-target="#login">Login</a>  
                        </div>
                        <div class="col-md-2 mb-2">
                            <a href="" type="button" class="btn-services scrollto" data-toggle="modal" data-target="#daftar">Daftar</a> 
                        </div>
                    </div>                                                            

                    @else
                    <div class="row">
                        <div class="col-md-2 mb-2">
                            <a href="/profile" type="button" class="btn-get-started scrollto" data-toggle="modal">Profile</a>  
                        </div>
                        <div class="col-md-2 mb-2">
                            <a class="btn-services scrollto" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>  
                    @endguest
                </div>
            </div>

        </div>
    </section><!-- #intro -->

    @guest
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

    @endguest

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
                                <a href="/article/{{ $article->url }}">
                                    <img src="{{ $article->thumbnail }}">
                                </a>
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
            </header>            
            <div class="text-center mt-4">
                <h4>Event Umum</h4>
            </div>
            <div class="text-center">
                <a type="button" class="btn btn-secondary" href="{{ route('publics.event') }}">Lihat Semua Event Umum</a>
            </div>
            <div class="mt-4">
                <div class="row">
                    @foreach ($events as $event)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <img src="{{ $event->image }}">
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

            <div class="text-center mt-5">
                <h4>Event Pengkaderan</h4>
            </div>
            <div class="text-center">
                <a type="button" class="btn btn-secondary" href="{{ route('publics.event-pengkaderan') }}">Lihat Semua Event Pengkaderan</a>
            </div>
            <div class="mt-4">
                <div class="row">
                    @foreach ($pengkaderans as $event)
                    <div class="col-md-3">
                        <div class="card shadow">
                            <div class="card-header">
                                <img src="{{ $event->image }}">
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

            <div class="text-center">
                <a type="button" class="btn btn-secondary" href="{{ route('index.pengurus') }}">Lihat Semua Pengurus</a>
            </div>

            <!--Carousel Wrapper-->
            <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

                <!--Controls-->
                <div class="controls-top">
                    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
                    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
                        class="fas fa-chevron-right"></i></a>
                    </div>
                    <!--/.Controls-->

                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
                        <li data-target="#multi-item-example" data-slide-to="1"></li>

                    </ol>
                    <!--/.Indicators-->

                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">

                        <!--First slide-->
                        <div class="carousel-item active">

                            <div class="col-md-3" style="float:left">
                                @foreach($ketuas as $ketua)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$ketua->photo) }}" alt="Ketua Rayon" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $ketua->nama }}</h4>
                                            <p class="card-text">{{ $ketua->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-3" style="float:left">
                                @foreach($wakils as $wakil)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$wakil->photo) }}" alt="Wakil Ketua Rayon" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $wakil->nama }}</h4>
                                            <p class="card-text">{{ $wakil->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-3" style="float:left">
                                @foreach($sekretariss as $sekretaris)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$sekretaris->photo) }}" alt="Sekreataris Rayon" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $sekretaris->nama }}</h4>
                                            <p class="card-text">{{ $sekretaris->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-3" style="float:left">
                                @foreach($bendaharas as $bendahara)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$bendahara->photo) }}" alt="Bendahara Rayon" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $bendahara->nama }}</h4>
                                            <p class="card-text">{{ $bendahara->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <!--/.First slide-->

                        <!--Second slide-->
                        <div class="carousel-item">

                            <div class="col-md-3" style="float:left">
                                @foreach($kopris as $kopri)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$kopri->photo) }}" alt="Ketua KOPRI" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $kopri->nama }}</h4>
                                            <p class="card-text">{{ $kopri->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-3" style="float:left">
                                @foreach($sekretarisKopris as $sekretarisKopri)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$sekretarisKopri->photo) }}" alt="Sekretaris KOPRI" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $sekretarisKopri->nama }}</h4>
                                            <p class="card-text">{{ $sekretarisKopri->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-3" style="float:left">
                                @foreach($bendaharaKopris as $bendaharaKopri)
                                <div class="card mb-2">
                                    <div class="text-center">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('storage/foto/'.$bendaharaKopri->photo) }}" alt="Bendahara KOPRI" style="object-fit: cover;width:230px;height:230px;">
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">{{ $bendaharaKopri->nama }}</h4>
                                            <p class="card-text">{{ $bendaharaKopri->jabatan }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-md-3" style="float:left">
                                <div class="card mb-2">
                                    <a href="/pengurus">
                                        <img class="card-img-top shadow-sm"
                                        src="{{ asset('img/arrow.png') }}" alt="Pengurus Lainnya" style="object-fit: cover;width:230px;height:230px;">
                                    </a>
                                    <div class="card-body">
                                        <div class="text-center">
                                            <h4 class="card-title">Lihat Detail Semua Pengurus</h4>
                                            <a href="/pengurus" class=" text-white card-text btn btn-primary">Lihat Semua</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!--/.Second slide-->

                    </div>
                    <!--/.Slides-->

                </div>
                <!--/.Carousel Wrapper-->

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
                            <img src="https://avatars.githubusercontent.com/u/42700729?s=460&u=d7375aae2589ff3f3ac501b8812e83b698bee147&v=4" class="testimonial-img" alt="">
                            <h3>Wangga</h3>
                            <h4>System Designer</h4>
                            <p>
                                Text Here.
                            </p>
                        </div>

                        <div class="testimonial-item">
                            <img src="https://avatars.githubusercontent.com/u/42700729?s=460&u=d7375aae2589ff3f3ac501b8812e83b698bee147&v=4" class="testimonial-img" alt="">
                            <h3>Moh. Ariffudin</h3>
                            <h4>Developer</h4>
                            <p>
                                Lahir &#8614; Dolen &#8614; Sekolah &#8614; Kerjo &#8614; Rabi &#8614; Duwe Anak &#8614; Duwe Puthu &#8614; Syukur-Syukur Duwe Buyut &#8614; Mati
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
                        <iframe src="https://maps.google.com/maps?q=@-7.942778507664751,%20112.59824954632106&t=&z=19&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 450px;" allowfullscreen></iframe>
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

                    <div class="text-center">
                        <h4>Kirim Feedback</h4>
                    </div>

                    <div id="messageInfo" style="display: none;">
                        <br>
                        <div class="col-md-12 alert alert-info alert-block margin-tengah">      
                            <button type="button" class="close" data-dismiss="alert">×</button>    
                            <strong>Pesan Telah Terkirim. Terimakasih!</strong>
                        </div>
                    </div>                    

                    <div class="form">
                        <form id="feedbackForm">
                            @csrf
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
                            <div class="text-center"><button type="submit" id="submitForm" title="Kirim Pesan">Kirim Pesan</button></div>
                        </form>
                        <script>
                            $(function () {
                                $(document).on("click", "#submitForm", function(e) {
                                    e.preventDefault();
                                    $.ajax({
                                        data: $('#feedbackForm').serialize(),
                                        url: "{{ route('feedback.send') }}",
                                        type: "POST",
                                        dataType: 'json',
                                        success: function (data) {
                                            $('#messageInfo').css("display", "block");
                                            $('#feedbackForm').trigger("reset");            
                                        },
                                        error: function (data) {
                                            console.log('Error:', data);
                                        }
                                    });
                                });
                            });
                        </script>
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
                            <li><a href="/">Home</a></li>
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