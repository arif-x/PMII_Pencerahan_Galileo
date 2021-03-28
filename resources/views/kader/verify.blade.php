@extends('layouts.isiBiodata')

@section('content')      

<br>
<br>
<br>
@if ($message = Session::get('info'))
<div class="col-md-6 alert alert-info alert-block margin-tengah">
	<button type="button" class="close" data-dismiss="alert">×</button>    
	<strong>{{ $message }}</strong>
</div>
@endif
<div class="col-md-6 margin-tengah">
	<div class="card my-card-border">
		<div class="card-header my-card-header">
			<strong>Verifikasi Data</strong>
		</div>
		<div class="card-body">
			<div class="col-md-12">			
				<form method="POST" action="/verify/submit" enctype="multipart/form-data">
					@csrf
					<strong>
						<div class="form-group">
							<label for="pasphoto" class="col-md-12 col-form-label">
								<strong>Pasfoto Resmi</strong>
							</label>							
							<div class="col-md-12">
								<label style="font-size: 12px;">*Ukuran Gambar Maksimum: 500Kb</label>
								<input type="file" id="pasphoto" name="pasphoto" class="form-control @error('max') is-invalid @enderror">
								@error('max')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
						<div class="form-group">
							<label for="ktm" class="col-md-12 col-form-label">
								<strong>KTM/KTP</strong>
							</label>							
							<div class="col-md-12">
								<label style="font-size: 12px;">*Ukuran Gambar Maksimum: 500Kb</label>
								<input type="file" id="ktm" name="ktm" class="form-control @error('max') is-invalid @enderror">
								@error('max')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>
					</strong>
					<div class="margin-tengah">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary" style="width: 100%;">
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