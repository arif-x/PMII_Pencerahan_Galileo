@extends('layouts.app')

@section('content')      

<br>
<br>
<br>
<div class="container">
	@if ($message = Session::get('info'))
	<div class="col-md-12 alert alert-info alert-block margin-tengah">
		<button type="button" class="close" data-dismiss="alert">×</button>    
		<strong>{{ $message }}</strong>
	</div>
	@endif

	@if ($message = Session::get('error'))
	<div class="col-md-12 alert alert-info alert-block margin-tengah">
		<button type="button" class="close" data-dismiss="alert">×</button>    
		<strong>{{ $message }}</strong>
	</div>
	@endif
</div>

<div class="container bootstrap snippet">

	<div class="row">
		<div class="col-md-3 mb-1" style="padding-top: 10px;">
			<div class="card my-card-border">
				<div class="card-header my-card-header">
					@foreach($profiles as $g)
					<strong>{{ $g->name }}</strong>
					@endforeach
				</div>
				<div class="card-body">
					@foreach($profiles as $g)					
					<form method="POST" action="{{ route('kader.profile.photo.store') }}" enctype="multipart/form-data">
						@csrf

						<div class="col-md-12 mb-1">
							<img src="{{ asset('storage/foto/'.$g->photo) }}" class="img-fluid mx-auto d-block border-radius-10px" alt="img1" name="asli">
						</div>
						<br>
						<strong>Status Kaderisasi: {{ $g->status_kaderisasi }}</strong>
						<br><br>
						<label for="file" class="col-form-label mb-1">
							<strong>Ganti Foto</strong>
						</label>
						<input type="file" id="file" name="image" class="form-control mb-1">
						<label style="font-size: 12px;">*Ukuran Gambar Maksimum: 500Kb</label>

						<div class="mb-mb-1">
							<div class="margin-tengah">
								<button type="submit" class="btn btn-primary" style="width: 100%;">Ganti</button>
							</div>							
						</div>
					</form>
					@endforeach	
				</div>
			</div>
		</div>

		<div class="col-md-9 mb-1" style="padding-top: 10px;">
			<div class="card my-card-border">
				<div class="card-header my-card-header">
					<div class="panel-heading">
						<ul class="nav nav-tabs border-0">
							<li class="active card-header-padding"><a href="#pengkaderan" data-toggle="tab">Event Pengkaderan</a></li>
							<li class="card-header-padding">|</li>
							<li class="card-header-padding"><a href="#umum" data-toggle="tab">Event Umum</a></li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="tab-content">

							<div class="tab-pane in active" id="pengkaderan">
								<div>
									<a href="{{ route('publics.event-pengkaderan') }}" type="button" class="btn btn-warning text-white">Lihat & Ikuti Event</a>
								</div>
								<hr>
								@foreach($joins as $join)
								<div class="card mb-3">
									<div class="card-body">
										<div class="row">
											<div class="col-md-4">

											</div>
											<div class="col-md-8">
												<p>
													<strong style="font-size: 1.3rem;">
														{{ $join->nama_event }}
													</strong><br>
													<strong>Open Register:</strong> <br>
													{{ \Carbon\Carbon::parse($join->tgl_mulai_regist)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($join->tgl_akhir_regist)->format('d-m-Y') }} <br>
													<strong>Pelaksanaan:</strong> <br>
													{{ \Carbon\Carbon::parse($join->tgl_mulai)->format('d-m-Y') }} - {{ \Carbon\Carbon::parse($join->tgl_akhir)->format('d-m-Y') }}
												</p>
											</div>
										</div>
									</div>
								</div>
								<hr>
								@endforeach								
							</div>

							<div class="tab-pane in" id="umum">
								<p>Belum Ada</p>						
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection