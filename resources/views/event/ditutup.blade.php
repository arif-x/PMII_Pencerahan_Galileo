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
          <a href="/event" style="color: #000 !important;">
            Event Umum
          </a>
        </span>
        <span style="color: #000 !important;">
          >
        </span>
        <span style="color: #000 !important;">
          Pendaftaran Ditutup
        </span>

      </p>
      <h1 class="mb-0 bread">Pendaftaran Ditutup</h1>
    </div>
  </div>
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

                  <p><a href="#" class="btn btn-primary py-2 px-3">Pendaftaran Ditutup</a></p>
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