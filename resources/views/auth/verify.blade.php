@extends('layouts.cms')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifikasi Email Anda</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link untuk verifikasi email telah sampai, cek spam atau junk mail jika tidak terlihat di inbox.
                        </div>
                    @endif

                    Sebelum anda memiliki sebagian hak akses pada website ini, dimohon untuk verifikasi email yang telah didaftarkan.
                    <br>
                    <div class="text-center">
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Kirim ulang email.</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
