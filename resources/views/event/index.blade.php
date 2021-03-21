@extends('layouts.event')
@section('content')

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
          Event Umum
        </span>

      </p>
      <h1 class="mb-0 bread">Daftar Event Umum</h1>
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
        <h1 class="text-center mt-3">{{ $notFound }}</h1>
        @foreach($events as $event)
        <div class="col-md-12">          
          <div class="row">
            <div class="col-md-12 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch d-md-flex mb-3" style="width: 100% !important">
                <div class="shadow align-middle block-20 mt-3 mb-3"><img src="{{ $event->image }}" style="max-width: 100% !important;">
                </div>
                <div class="text d-block pl-md-4 mt-1">
                  <h3><strong>{{ $event->nama_event }}</strong></h3>
                  <h5 style="text-align: justify !important;"><strong>Tanggal Pendaftaran Event:</strong> <br> {{ \Carbon\Carbon::parse($event->tgl_mulai_regist)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($event->tgl_akhir_regist)->format('d-m-Y') }}</h5>
                  <h5 style="text-align: justify !important;"><strong>Tanggal Pelaksanaan Event:</strong> <br> {{ \Carbon\Carbon::parse($event->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($event->tgl_akhir)->format('d-m-Y') }}</h5>
                  <h5 style="text-align: justify !important;"><strong>Tempat:</strong> <br> {{ $event->tempat }}</h5>
                  @guest
                  @if (Route::has('register'))
                  @endif
                  <p><a href="#" class="btn btn-primary py-2 px-3" data-toggle="modal" data-target="#eventRegistGuestModal{{$event->id}}">Ikuti Event</a></p>
                  <div class="modal-lg fade" id="eventRegistGuestModal{{$event->id}}" tabindex="-1" role="dialog" aria-labelledby="modalGusestLabel{{$event->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="modalGuestLabel{{$event->id}}">Konfirmasi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          Ingin Mengikuti {{$event->nama_event}}?
                        </div>
                        <div class="modal-footer">
                          <form method="POST" action="/event/guest/join">
                            @csrf
                            <input type="hidden" value="{{$event->id}}" name="event_id">
                            <div class="mt-2">
                              <label for="email">Email</label>
                              <input id="email" type="text" class="form-control" value="" name="email">
                            </div>
                            <div class="mt-2">
                              <label for="nama">Nama</label>
                              <input id="nama" type="text" class="form-control" value="" name="nama">
                            </div>
                            <div class="mt-2">
                              <label for="rayon">Rayon</label>
                              <input id="rayon" type="text" class="form-control" value="" name="rayon">
                            </div>
                            <div class="mt-4">
                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" style="width:100% !important">Ikut</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @else
                  <input type="hidden" id="id{{ $event->id }}" value="{{ $event->id }}">

                  <?php
                  $date = \Carbon\Carbon::parse($event->tgl_mulai)->format('d-m-Y');
                  $now = \Carbon\Carbon::today()->toDateString();

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
                    <form method="POST" action="/event/authed/join">
                    <input name="_token" value="' . csrf_token() . ' " type="hidden">
                    <input type="hidden" value="'. $event['id'] .'" name="event_id">
                    <button type="submit" class="btn btn-primary">Ikut</button>
                    </form>
                    </div>
                    </div>
                    </div>
                    </div>
                    ';
                  } elseif($date < $now) {
                    echo '<p><a href="#" class="btn btn-primary py-2 px-3">Pendaftaran Ditutup</a></p>';
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

@endsection