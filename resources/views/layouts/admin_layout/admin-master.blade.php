<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta name="description" content="E-Commerce LARA7 STORE">
  <meta name="keywords" content="E-Commerce, Toko Online, LARA7 STORE">
  <meta name="author" content="Ajib Roziq, LARA7 STORE">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{$title ?? config('app.name')}}</title>
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> 
  <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
  
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset("assets/css/components.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">
  
  @stack('before-script')
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
</div>

  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg bg-success"></div>
      @include('layouts.admin_layout.admin-navbar')
      @include('layouts.admin_layout.admin-sidebar')
      <!-- Main Content -->
      <div class="main-content">
       <x-alert></x-alert>
        <section class="section">
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; {{date("Y")}} <div class="bullet"></div>Build By <a href="https://github.com/arozqq">Ajib Roziq</a> <div class="bullet"></div>Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
        </div>
        <div class="footer-right">
          LARA7 STORE
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> --}}
  <script src="{{asset("assets/js/stisla.js")}}"></script>

  <!-- JS Libraies -->
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{asset("assets/js/scripts.js")}}"></script>
  <script src="{{asset("assets/js/custom.js")}}"></script>
  

  <!-- Page Specific JS File -->
  @stack('after-script')
</body>
</html>
