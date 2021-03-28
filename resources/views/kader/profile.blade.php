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

	<?php echo $notif ?>
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
						<input type="file" id="file" name="image" class="form-control @error('mimes') is-invalid @enderror @error('max') is-invalid @enderror">
						@error('mimes')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						@error('max')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<label style="font-size: 12px;">*Ukuran Foto Maksimum: 500Kb</label>

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
							<li class="active card-header-padding"><a href="#profile" data-toggle="tab">Profil</a></li>
							<li class="card-header-padding">|</li>
							<li class="card-header-padding"><a href="#edit-biodata" data-toggle="tab">Edit Profil</a></li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<div class="col-md-12">
						<div class="tab-content">

							<div class="tab-pane in active" id="profile">			
								<form>
									<strong>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">NIM/NIK</label>
											<div class="col-md-9">
												<input type="text" id="nim" class="form-control" value="{{ Auth::user()->nim }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Email</label>
											<div class="col-md-9">
												<input type="text" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Tanggal Lahir</label>
											<div class="col-md-9">
												<input type="text" class="form-control" value="{{ \Carbon\Carbon::parse(Auth::user()->tanggal_lahir)->format('d-M-Y') }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Jenis Kelamin</label>
											<div class="col-md-9">
												<input type="text" id="jenis_kelamin" class="form-control" value="{{ Auth::user()->jenis_kelamin }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Jurusan</label>
											<div class="col-md-9">
												<input type="text" id="jurusan" class="form-control" value="{{ Auth::user()->jurusan }}" readonly>
											</div>
										</div>

										@if(Auth::user()->mhs_aktif == 'Ya')
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alamat Di Malang</label>
											<div class="col-md-9">
												<input type="text" id="alamat_di_malang" class="form-control" value="{{ Auth::user()->alamat_di_malang }}" readonly>
											</div>
										</div>
										@elseif(Auth::user()->mhs_aktif == 'Tidak')
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alamat Sekarang</label>
											<div class="col-md-9">
												<input type="text" id="alamat_sekarang" class="form-control" value="{{ Auth::user()->alamat_sekarang }}" readonly>
											</div>
										</div>
										@endif

										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alamat Asli</label>
											<div class="col-md-9">
												<input type="text" id="alamat_asli" class="form-control" value="{{ Auth::user()->alamat_asli }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Nama Ayah</label>
											<div class="col-md-9">
												<input type="text" id="nama_ayah" class="form-control" value="{{ Auth::user()->nama_ayah }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Nama Ibu</label>
											<div class="col-md-9">
												<input type="text" id="nama_ibu" class="form-control" value="{{ Auth::user()->nama_ibu }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Nomor HP</label>
											<div class="col-md-9">
												<input type="text" id="no_hp" class="form-control" value="{{ Auth::user()->no_hp }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Minat</label>
											<div class="col-md-9">
												<input type="text" id="minat" class="form-control" value="{{ Auth::user()->minat }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Bakat</label>
											<div class="col-md-9">
												<input type="text" id="bakat" class="form-control" value="{{ Auth::user()->bakat }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alasan</label>
											<div class="col-md-9">
												<input type="text" id="alasan" class="form-control" value="{{ Auth::user()->alasan }}" readonly>
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Target Ke Depan</label>
											<div class="col-md-9">
												<input type="text" id="target_ke_depan" class="form-control" value="{{ Auth::user()->target_ke_depan }}" readonly>
											</div>
										</div>
									</strong>
								</form>
							</div>

							<div class="tab-pane fade" id="edit-biodata">
								<form method="POST" action="{{ route('kader.profile.store') }}">
									@csrf
									<strong>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Tanggal Lahir</label>
											<div class="col-md-9">
												<input type="date" name="tanggal_lahir" class="form-control" value="{{ Auth::user()->tanggal_lahir }}" required>
											</div>
										</div>
										@if(Auth::user()->mhs_aktif == 'Ya')
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alamat Di Malang</label>
											<div class="col-md-9">
												<input type="text" id="alamat_di_malang" class="form-control" value="{{ Auth::user()->alamat_di_malang }}" required>
											</div>
										</div>
										@elseif(Auth::user()->mhs_aktif == 'Tidak')
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alamat Sekarang</label>
											<div class="col-md-9">
												<input type="text" id="alamat_sekarang" class="form-control" value="{{ Auth::user()->alamat_sekarang }}" required>
											</div>
										</div>
										@endif
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alamat Asli</label>
											<div class="col-md-9">
												<input type="text" id="alamat_asli" name="alamat_asli" class="form-control @error('alamat_asli') is-invalid @enderror" value="{{ Auth::user()->alamat_asli }}" required>
												@error('alamat_asli')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Nama Ayah</label>
											<div class="col-md-9">
												<input type="text" id="nama_ayah" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ Auth::user()->nama_ayah }}" required>
												@error('nama_ayah')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Nama Ibu</label>
											<div class="col-md-9">
												<input type="text" id="nama_ibu" name="nama_ibu" class="form-control @error('nama_ibu') is-invalid @enderror" value="{{ Auth::user()->nama_ibu }}">
												@error('nama_ibu')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Nomor HP</label>
											<div class="col-md-9">
												<input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ Auth::user()->no_hp }}">
												@error('no_hp')
												<span class="invalid-feedback" role="alert" required>
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Minat</label>
											<div class="col-md-9">
												<input type="text" id="minat" name="minat" class="form-control @error('minat') is-invalid @enderror" value="{{ Auth::user()->minat }}">
												@error('minat')
												<span class="invalid-feedback" role="alert" required>
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Bakat</label>
											<div class="col-md-9">
												<input type="text" id="bakat" name="bakat" class="form-control @error('bakat') is-invalid @enderror" value="{{ Auth::user()->bakat }}">
												@error('bakat')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Alasan Gabung PMII</label>
											<div class="col-md-9">
												<input type="text" id="alasan" name="alasan" class="form-control @error('alasan') is-invalid @enderror" value="{{ Auth::user()->alasan }}">
												@error('alasan')
												<span class="invalid-feedback" role="alert" required>
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
										<div class="form-group row">
											<label for="text" class="col-md-3 col-form-label">Target Ke Depan</label>
											<div class="col-md-9">
												<input type="text" id="target_ke_depan" name="target_ke_depan" class="form-control @error('target_ke_depan') is-invalid @enderror" value="{{ Auth::user()->target_ke_depan }}" required>
												@error('target_ke_depan')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
												@enderror
											</div>
										</div>
									</strong>
									<div class="form-group row mb-0">
										<div class="margin-tengah">
											<button type="submit" class="btn btn-primary">
												Edit Profil
											</button>
										</div>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection