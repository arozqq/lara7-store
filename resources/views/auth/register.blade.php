<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; LARA7 - STORE</title>

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
                        <h4 class="text-dark font-weight-normal">Welcome to <a href="/" class="font-weight-bold">LARA7 - STORE</a></h4>
                        <p class="text-muted">Sebelum kamu belanja, kamu harus login atau mendaftar terlebih dahulu jika belum memiliki akun.</p>
                       <x-alert></x-alert>
              <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="form-group">
                  <label for="name">Nama Lengkap</label>
                  <input type="text" class="form-control @error("name") is-invalid @enderror" name="name" value="{{old("name")}}" required autocomplete="name" autofocus>
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror  
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group row">
                <div class="col-md-6">
                  <label for="password">Password</label>
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <label for="password-confirm">Konfirmasi Password</label>
                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>


              <button type="submit" class="btn btn-success btn-lg mt-3 btn-block" tabindex="4">
                Sign up
              </button>
            </form>

            <a href="{{ url('auth/google') }}" style="margin-top: 20px;" class="btn btn-lg btn-light btn-block btn-icon">
              <img src="{{asset('assets/img/google-logo.svg')}}" alt="google icon" width="20" class="">
              <strong class="ml-3">Sign up with Google</strong>
            </a>  

            <a href="{{ url('auth/facebook') }}" style="margin-top: 20px;" class="btn btn-lg btn-primary btn-block">
              <i class="fab fa-facebook align-middle" style="font-size: 1.3rem"></i><strong class="ml-3">Sign up with Facebook</strong>
            </a> 

              <div class="mt-5 text-center">
                Sudah punya akun ? <a href="{{Route('login')}}">Login</a>
              </div>

            <div class="text-center mt-5 text-small">
              Copyright &copy; LARA7 STORE. Made with 💙 by Ajib Roziq with Stisla Template
              <div class="mt-2">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 position-relative overlay-gradient-bottom" data-background="../assets/img/unsplash/register-bg.jpg">
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
