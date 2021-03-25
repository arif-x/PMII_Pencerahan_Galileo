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
            <li class="active"><a href="/#intro">Home</a></li>
            <li><a href="/#about">Tentang Kami</a></li>
            <li><a href="/#services">Fitur</a></li>
            <li><a href="/#article">Artikel</a></li>
            <li><a href="/#event">Event</a></li>
            <li><a href="/#team">Pengurus</a></li>
            <li><a href="/#contact">Kontak Kami</a></li>
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
        Team Section
        ============================-->
        <section id="team">
            <div class="container mt-5">
                <div class="section-header">
                    <h3>Pengurus</h3>
                    <p>Pengurus PMII Rayon <nobr style="font-style: italic;"> Pencerahan </nobr> Galileo</p>
                </div>

                <div class="text-center">
                    <h4 style="font-style: italic;">Ketua & Wakil Ketua Rayon</h4>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        @foreach($ketuas as $ketua)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$ketua->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                    <div class="col-md-3">
                        @foreach($wakils as $wakil)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$wakil->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                    <div class="col-md-3"></div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Sekretaris & Wakil Sekretaris Rayon</h4>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        @foreach($sekretariss as $sekretaris)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$sekretaris->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                    <div class="col-md-3">
                        @foreach($wakilSekretariss as $wakilSekretaris)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$wakilSekretaris->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $wakilSekretaris->nama }}</h4>
                                    <p class="card-text">{{ $wakilSekretaris->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Bendahara & Wakil Bendahara Rayon</h4>
                </div>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-3">
                        @foreach($bendaharas as $bendahara)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$bendahara->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                    <div class="col-md-3">
                        @foreach($wakilBendaharas as $wakilBendahara)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$wakilBendahara->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $wakilBendahara->nama }}</h4>
                                    <p class="card-text">{{ $wakilBendahara->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Biro Pengkaderan</h4>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @foreach($coPengkaderans as $coPengkaderan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coPengkaderan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coPengkaderan->nama }}</h4>
                                    <p class="card-text">{{ $coPengkaderan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaPengkaderans as $anggotaPengkaderan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaPengkaderan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaPengkaderan->nama }}</h4>
                                    <p class="card-text">{{ $anggotaPengkaderan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Biro Gerakan</h4>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @foreach($coGerakans as $coGerakan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coGerakan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coGerakan->nama }}</h4>
                                    <p class="card-text">{{ $coGerakan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaGerakans as $anggotaGerakan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaGerakan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaGerakan->nama }}</h4>
                                    <p class="card-text">{{ $anggotaGerakan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Biro Keislaman</h4>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @foreach($coKeislamans as $coKeislaman)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coKeislaman->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coKeislaman->nama }}</h4>
                                    <p class="card-text">{{ $coKeislaman->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaKeislamans as $anggotaKeislaman)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaKeislaman->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaKeislaman->nama }}</h4>
                                    <p class="card-text">{{ $anggotaKeislaman->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Biro Pengembangan Wawasan</h4>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @foreach($coPengembanganWawasans as $coPengembanganWawasan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coPengembanganWawasan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coPengembanganWawasan->nama }}</h4>
                                    <p class="card-text">{{ $coPengembanganWawasan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaPengembanganWawasans as $anggotaPengembanganWawasan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaPengembanganWawasan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaPengembanganWawasan->nama }}</h4>
                                    <p class="card-text">{{ $anggotaPengembanganWawasan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">Biro FKE</h4>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @foreach($coFKEs as $coFKE)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coFKE->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coFKE->nama }}</h4>
                                    <p class="card-text">{{ $coFKE->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaFKEs as $anggotaFKE)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaFKE->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaFKE->nama }}</h4>
                                    <p class="card-text">{{ $anggotaFKE->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">FPJ</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($fpjMatematikas as $fpjMatematika)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjMatematika->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjMatematika->nama }}</h4>
                                    <p class="card-text">{{ $fpjMatematika->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach($fpjBiologis as $fpjBiologi)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjBiologi->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjBiologi->nama }}</h4>
                                    <p class="card-text">{{ $fpjBiologi->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach($fpjFisikas as $fpjFisika)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjFisika->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjFisika->nama }}</h4>
                                    <p class="card-text">{{ $fpjFisika->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach($fpjKimias as $fpjKimia)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjKimia->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjKimia->nama }}</h4>
                                    <p class="card-text">{{ $fpjKimia->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach($fpjTeknikInformatikas as $fpjTeknikInformatika)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjTeknikInformatika->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjTeknikInformatika->nama }}</h4>
                                    <p class="card-text">{{ $fpjTeknikInformatika->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach($fpjTeknikArsitekturs as $fpjTeknikArsitektur)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjTeknikArsitektur->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjTeknikArsitektur->nama }}</h4>
                                    <p class="card-text">{{ $fpjTeknikArsitektur->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        @foreach($fpjPerpustakaans as $fpjPerpustakaan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$fpjPerpustakaan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $fpjPerpustakaan->nama }}</h4>
                                    <p class="card-text">{{ $fpjPerpustakaan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">BSO KOPRI</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($kopris as $kopri)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$kopri->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                    <div class="col-md-3">
                        @foreach($sekretarisKopris as $sekretarisKopri)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$sekretarisKopri->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                    <div class="col-md-3">
                        @foreach($bendaharaKopris as $bendaharaKopri)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$bendaharaKopri->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
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
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">BSO Biro Internal</h4>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        @foreach($coInternals as $coInternal)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coInternal->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coInternal->nama }}</h4>
                                    <p class="card-text">{{ $coInternal->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaInternals as $anggotaInternal)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaInternal->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaInternal->nama }}</h4>
                                    <p class="card-text">{{ $anggotaInternal->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">BSO Biro Eksternal</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($coEksternals as $coEksternal)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$coEksternal->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $coEksternal->nama }}</h4>
                                    <p class="card-text">{{ $coEksternal->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($anggotaEksternals as $anggotaEksternal)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaEksternal->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaEksternal->nama }}</h4>
                                    <p class="card-text">{{ $anggotaEksternal->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">LSO Jurnalistik</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($direkturJurnalistiks as $direkturJurnalistik)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$direkturJurnalistik->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $direkturJurnalistik->nama }}</h4>
                                    <p class="card-text">{{ $direkturJurnalistik->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($sekretarisJurnalistiks as $sekretarisJurnalistik)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$sekretarisJurnalistik->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $sekretarisJurnalistik->nama }}</h4>
                                    <p class="card-text">{{ $sekretarisJurnalistik->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        @foreach($anggotaJurnalistiks as $anggotaJurnalistik)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaJurnalistik->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaJurnalistik->nama }}</h4>
                                    <p class="card-text">{{ $anggotaJurnalistik->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">LSO GAPALA</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($direkturGAPALAs as $direkturGAPALA)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$direkturGAPALA->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $direkturGAPALA->nama }}</h4>
                                    <p class="card-text">{{ $direkturGAPALA->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($sekretarisGAPALAs as $sekretarisGAPALA)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$sekretarisGAPALA->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $sekretarisGAPALA->nama }}</h4>
                                    <p class="card-text">{{ $sekretarisGAPALA->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        @foreach($anggotaGAPALAs as $anggotaGAPALA)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaGAPALA->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaGAPALA->nama }}</h4>
                                    <p class="card-text">{{ $anggotaGAPALA->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">LSO Kewirausahaan</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($direkturKewirausahaans as $direkturKewirausahaan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$direkturKewirausahaan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $direkturKewirausahaan->nama }}</h4>
                                    <p class="card-text">{{ $direkturKewirausahaan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($sekretarisKewirausahaans as $sekretarisKewirausahaan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$sekretarisKewirausahaan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $sekretarisKewirausahaan->nama }}</h4>
                                    <p class="card-text">{{ $sekretarisKewirausahaan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        @foreach($anggotaKewirausahaans as $anggotaKewirausahaan)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaKewirausahaan->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaKewirausahaan->nama }}</h4>
                                    <p class="card-text">{{ $anggotaKewirausahaan->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-5">
                    <h4 style="font-style: italic;">LSO TEGAL</h4>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        @foreach($direkturTEGALs as $direkturTEGAL)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$direkturTEGAL->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $direkturTEGAL->nama }}</h4>
                                    <p class="card-text">{{ $direkturTEGAL->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>                    
                    <div class="col-md-3">
                        @foreach($sekretarisTEGALs as $sekretarisTEGAL)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$sekretarisTEGAL->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $sekretarisTEGAL->nama }}</h4>
                                    <p class="card-text">{{ $sekretarisTEGAL->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-3">
                        @foreach($anggotaTEGALs as $anggotaTEGAL)
                        <div class="card mb-2">
                            <div class="text-center">
                                <img class="card-img-top shadow-sm"
                                src="{{ asset('storage/foto/'.$anggotaTEGAL->photo) }}" alt="Pengurus" style="object-fit: cover;width:230px;height:230px;">
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <h4 class="card-title">{{ $anggotaTEGAL->nama }}</h4>
                                    <p class="card-text">{{ $anggotaTEGAL->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>


        </section><!-- #team -->

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