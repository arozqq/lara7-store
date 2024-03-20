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

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.min.css")}}" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("assets/css/elegant-icons.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/nice-select.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/jquery-ui.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/owl.carousel.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/slicknav.min.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/ogani-style.css")}}" type="text/css">
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}" type="text/css">
    
     <!-- Package css-->
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    
<!-- Humberger Begin -->
 <div class="humberger__menu__overlay"></div>
 <div class="humberger__menu__wrapper pt-3">
     <div class="row mb-3">
        @guest
        <a href="{{route('register')}}" class="text-success ml-3 mr-2"> Daftar</a> |
        <a href="{{route('login')}}" class="text-success ml-2"> Login</a>
        @else
        <img src="{{Auth::user()->profile->TakeAvatar}}" alt="" class="rounded-circle ml-3" width="50">
        <div class="col my-auto">
            <a href="{{route('profile')}}" class="custom__link"><i class="fas fa-edit mr-2"></i>Ubah Profile</a>
        </div>
        @endguest
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="/">Home</a></li>
             <li><a href="#">My Account</a>
                 <ul class="header__menu__dropdown">
                     @if (Auth::user() !== 'user')
                     <li><a href="/dashboard" target="_blank">Dashboard</a></li>
                     @endif
                     <li><a href="{{route("profile")}}">Profile</a></li>
                 </ul>
             </li>
             <li><a href="#">Shop</a></li>
             <li><a href="#">Pages</a>
                 <ul class="header__menu__dropdown">
                     <li><a href="#">Shop Details</a></li>
                     <li><a href="#">Shoping Cart</a></li>
                     <li><a href="#">Check Out</a></li>
                     <li><a href="#">Blog Details</a></li>
                 </ul>
             </li>
             <li><a href="#">Blog</a></li>
             <li><a href="#">Contact</a></li>
         </ul>
     </nav>
     <div id="mobile-menu-wrap"></div>
     @auth
     <a class="btn btn-secondary" href="{{ route('logout') }}"
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
     Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
    </form>
     @endauth
     <div class="humberger__menu__contact">
         <ul>
             <li><i class="fa fa-envelope"></i> ajibroziq21@gmail.com</li>
         </ul>
     </div>
 </div>
 <!-- Humberger End -->

<header class="header">
  <div class="header__top">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 col-md-6">
                  <div class="header__top__left">
                      <ul>
                          <li><i class="fa fa-envelope"></i> ajibroziq21@gmail.com</li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-6 col-md-6">
                  <div class="header__top__right">
                      <div class="header__top__right__language">
                          
                        @auth
                        <div class="text-white">
                            <img src="{{Auth::user()->profile->TakeAvatar}}" alt="" class="rounded-circle" width="35">
                            Hi, {{Auth::user()->name}}
                        </div>    
                        <span class="arrow_carrot-down"></span>
                        <ul class="m-3 dd-navbar shadow">
                            @if(Auth::user()->role !== 'user')
                            <li><a class="dropdown-item" href="/dashboard" target="_blank">Dashboard</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{route('profile')}}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                        @endauth
                        @guest
                        <a href="{{route('register')}}" class="text-white mr-2">Daftar</a>| 
                        <a href="{{route('login')}}" class="text-white ml-2">Login</a>
                        @endguest
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-lg-8">
              <div class="header__logo">
                  <a href="/"><img src="{{asset("assets/img/logo.png")}}" alt=""></a>
              </div>
          </div>
        
          <div class="col-lg-3 ml-auto">
              <div class="header__cart">
                  <ul>
                      <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                      <li><a href="#"><i class="fa fa-shopping-cart"></i> 
                        <span>0</span>
                    </a>
                  </li>
                  </ul>
              </div>
          </div>
      </div>
      <div class="humberger__open">
          <i class="fa fa-bars"></i>
      </div>
  </div>
</header>