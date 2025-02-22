@extends('layouts.isiBiodata')

@section('content')      

<br>
<br>
<br>
@if ($message = Session::get('info'))
<div class="col-md-11 alert alert-info alert-block margin-tengah">
	<button type="button" class="close" data-dismiss="alert">×</button>    
	<strong>{{ $message }}</strong>
</div>
@endif
<div class="col-md-7 margin-tengah">
	<div class="card my-card-border">
		<div class="card-body">
			<label class="col-md-12 col-form-label">
				<strong>Harap Isi Biodata Sebelum Mengakses Profil</strong>
			</label>
		</div>
	</div>
	<div class="card my-card-border mt-3">
		<div class="card-header my-card-header">
			<strong>Biodata</strong>
		</div>
		<div class="card-body">
			<div class="col-md-12">			
				<form method="POST" action="{{ route('kader.isi-biodata.store') }}">
					@csrf
					<strong>
						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">NIM</label>
							<div class="col-md-9">
								<input type="text" id="nim" name="nim" class="form-control" value="{{ Auth::user()->nim }}" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Email</label>
							<div class="col-md-9">
								<input type="text" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Tanggal Lahir</label>
							<div class="col-md-9">
								<input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ Auth::user()->tanggal_lahir }}">
								@error('tanggal_lahir')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Jenis Kelamin</label>
							<div class="col-md-9">
								<select id="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
									<option value="" disabled selected="true">Pilih...</option>
									<option value="Laki-laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								@error('jenis_kelamin')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Jurusan</label>
							<div class="col-md-9">
								<select id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan">
									<option value="" disabled selected="true">Pilih...</option>
									<option value="Biologi">Biologi</option>
									<option value="Fisika">Fisika</option>
									<option value="Kimia">Kimia</option>
									<option value="Matematika">Matematika</option>
									<option value="Teknik Arsitektur">Teknik Arsitektur</option>
									<option value="Teknik Informatika">Teknik Informatika</option>
									<option value="Perpustakaan & Ilmu Informasi">Perpustakaan & Ilmu Informasi</option>
								</select>
								@error('jurusan')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Mahasiswa Aktif?</label>
							<div class="col-md-9">
								<select id="mhs_aktif" class="form-control @error('mhs_aktif') is-invalid @enderror" name="mhs_aktif">
									<option value="" disabled selected="true">Pilih...</option>
									<option value="Ya">Ya</option>
									<option value="Tidak">Tidak</option>
								</select>
								@error('mhs_aktif')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div id="checkAktif">
							
						</div>

						<script type="text/javascript">
							$(document).ready(function(){
								$('#mhs_aktif').change(function(){									
									if($('#mhs_aktif option:selected').text() == "Ya"){
										$('#checkAktif').empty();
										$('#checkAktif').html('<div class="form-group row"><label for="text" class="col-md-3 col-form-label">Alamat Di Malang</label><div class="col-md-9"><input type="text" id="alamat_di_malang" name="alamat_di_malang" class="form-control" value="{{ Auth::user()->alamat_di_malang }}"></div></div>');
									} else if($('#mhs_aktif option:selected').text() == "Tidak"){
										$('#checkAktif').empty();
										$('#checkAktif').html('<div class="form-group row"><label for="text" class="col-md-3 col-form-label">Alamat Sekarang</label><div class="col-md-9"><input type="text" id="alamat_sekarang" name="alamat_sekarang" class="form-control" value="{{ Auth::user()->alamat_sekarang }}"></div></div><div class="form-group row"><label for="text" class="col-md-3 col-form-label">Pekerjaan</label><div class="col-md-9"><input type="text" id="pekerjaan" name="pekerjaan" class="form-control" value="{{ Auth::user()->pekerjaan }}"></div></div>');
									}
								})
							});
						</script>						

						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Alamat Asli</label>
							<div class="col-md-9">
								<input type="text" id="alamat_asli" name="alamat_asli" class="form-control @error('alamat_asli') is-invalid @enderror" value="{{ Auth::user()->alamat_asli }}">
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
								<input type="text" id="nama_ayah" name="nama_ayah" class="form-control @error('nama_ayah') is-invalid @enderror" value="{{ Auth::user()->nama_ayah }}">
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
								<span class="invalid-feedback" role="alert">
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
								<span class="invalid-feedback" role="alert">
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
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group row">
							<label for="text" class="col-md-3 col-form-label">Target Ke Depan</label>
							<div class="col-md-9">
								<input type="text" id="target_ke_depan" name="target_ke_depan" class="form-control @error('target_ke_depan') is-invalid @enderror" value="{{ Auth::user()->target_ke_depan }}">
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
								Submit
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection