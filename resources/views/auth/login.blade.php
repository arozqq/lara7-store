<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; LARA 7 - STORE</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <h4 class="text-dark font-weight-normal">Welcome to <a href="/" class="font-weight-bold">LARA7 STORE</a></h4>
                        <p class="text-muted">Sebelum kamu belanja, kamu harus login atau mendaftar terlebih dahulu jika belum memiliki akun.</p>
                        <x-alert></x-alert>
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf
              <div class="form-group">
                <label for="login">Email atau Username</label>
                <input id="login" type="text" class="form-control {{$errors->has('username') || $errors->has('email') ? 'is-invalid' : ''}}" name="login" value="{{ old('email') ?? old('username') }}" required autofocus>
                @if ($errors->has('email') ?? $errors->has('useraname'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') ?? $errors->first('username')}}</strong>
                </span>
                @endif
              </div>

              <div class="form-group">
                  <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>

                @if (Route::has('password.request'))
                <a class="btn btn-link m-0 p-0" href="{{route('password.request')}}">
                    {{ __('Forgot Your Password?') }}
                </a>
              @endif

                <button type="submit" class="btn btn-success btn-lg mt-3 btn-block" tabindex="4">
                  Sign in
                </button>
              </form>

              <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-light btn-block">
                <img src="{{asset('assets/img/google-logo.svg')}}" alt="google icon" width="20" class="">
                <strong class="ml-3">Sign in with Google</strong>
              </a> 

              <a href="{{ url('auth/facebook') }}" style="margin-top: 20px;" class="btn btn-lg btn-primary btn-block">
                <i class="fab fa-facebook align-middle" style="font-size: 1.3rem"></i><strong class="ml-3">Sign in with Facebook</strong>
              </a> 


              <div class="mt-5 text-center">
                Belum punya akun ? <a href="{{Route('register')}}">Buat akun</a>
              </div>

            <div class="text-center mt-5 text-small">
              Copyright &copy; LARA7 STORE. Made with 💙 by Ajib Roziq with Stisla Template
              <div class="mt-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="pb-3">
                <h1 class="font-weight-normal text-muted-transparent">Thrifty Shopping During a <b>Pandemic</b></h1>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/P3pI6xzovu0">Clark Street</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->    

  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
