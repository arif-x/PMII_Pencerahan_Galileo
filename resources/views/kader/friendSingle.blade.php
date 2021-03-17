@extends('layouts.friendSingle')

@section('content')      

<br>
<br>
<br>
<br>
@if ($message = Session::get('info'))
<div class="col-md-11 alert alert-info alert-block margin-tengah">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="container bootstrap snippet">
    <div class="row">
        
        <div class="col-md-3 mb-1">
            @foreach($all as $data)
            <div class="card my-card-border">
                <div class="card-header my-card-header">
                    <strong>{{ $data->name }}</strong>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <img src="{{ asset('storage/foto/'.$data->photo) }}" class="img-fluid mx-auto d-block border-radius-10px" alt="img1" name="asli">
                    </div>                     
                    <br>
                </div>
            </div>
            @endforeach
        </div>        
        <div class="col-md-9 mb-1">
            @foreach($all as $data)
            <div class="card my-card-border">
                <div class="card-header my-card-header"><strong>Personal Info</strong></div>
                <div class="card-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Lengkap</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="nama" type="text" value="{{ $data->name }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis Kelamin</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="jk" type="text" value="{{ $data->jenis_kelamin }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Tanggal Lahir</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="{{ $data->tanggal_lahir }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jurusan</label>
                            <div class="col-lg-12">
                                <input class="form-control" name="jur" type="text" value="{{ $data->jurusan }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat_di_malang" class="col-lg-3 control-label">Alamat di Malang</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="al_mal" value="{{ $data->alamat_di_malang }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat_asli" class="col-lg-3 control-label">Alamat Asli</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="al_as" value="{{ $data->alamat_asli }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah" class="col-lg-3 control-label">Nama Ayah</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="na" value="{{ $data->nama_ayah }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu" class="col-lg-3 control-label">Nama Ibu</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="ni" value="{{ $data->nama_ibu }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-lg-3 control-label">Nomor HP</label>
                            <div class="col-lg-12">
                                <input type="number" class="form-control" name="no" value="{{ $data->no_hp }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="minat" class="col-lg-3 control-label">Minat</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="min" value="{{ $data->minat }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bakat" class="col-lg-3 control-label">Bakat</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="bak" value="{{ $data->bakat }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alasan" class="col-lg-3 control-label">Alasan</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="ala" value="{{ $data->alasan }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="target_ke_depan" class="col-lg-3 control-label">Target ke Depan</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" name="target" value="{{ $data->target_ke_depan }}" readonly>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection