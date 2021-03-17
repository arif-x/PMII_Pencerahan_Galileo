@extends('layouts.auth')

@section('content')
<div class="register-container">
    <div class="card card-login mx-auto text-center w3-animate-left">
        <div class="card-header mx-auto">
            <span class="logo-title text-center di">DAFTAR</span>

        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="nim">NIM</label>
                <div class="form-group">
                    <input id="nim" type="number" class="form-control" name="nim" required autocomplete="nim" autofocus>
                </div>

                <label for="angakatan">Angkatan</label>
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

                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                
                <button type="submit" class="btn btn-primary" style="width: 100%;">
                    Daftar
                </button>

            </form>
        </div>
    </div>
</div>
@endsection