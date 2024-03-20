@extends('layouts.user.user-master', ['title' => 'Verify'])
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex bg-dark text-white align-items-center justify-content-between">
                    <div>Silahkan Verifikasi Email Anda</div>
                    <div>{{Auth::user()->email}}</div>
                </div>
                
                <div class="card-body pb-5">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('Tautan verifikasi yang baru sudah dikirim ke email anda.') }}
                    </div>
                    @endif
                    
                    {{ __('Sebelum belanja, cek email kamu dulu yuk untuk verifikasi email.') }}
                    {{ __('Jika kamu belum terima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline custom__link">{{ __('Kirim ulang') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
