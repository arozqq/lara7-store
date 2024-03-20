<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=7">
  <meta name="description" content="E-Commerce LARA7 STORE">
  <meta name="keywords" content="E-Commerce, Toko Online, LARA7 STORE">
  <meta name="author" content="Ajib Roziq, LARA7 STORE">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
  <title><?php echo e($title ?? config('app.name')); ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/bootstrap.min.css")); ?>" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/elegant-icons.css")); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/nice-select.css")); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/jquery-ui.min.css")); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/owl.carousel.min.css")); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/slicknav.min.css")); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/ogani-style.css")); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/custom.css")); ?>" type="text/css">
    
     <!-- Package css-->
    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert2.min.css')); ?>">
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
        <?php if(auth()->guard()->guest()): ?>
        <a href="<?php echo e(route('register')); ?>" class="text-success ml-3 mr-2"> Daftar</a> |
        <a href="<?php echo e(route('login')); ?>" class="text-success ml-2"> Login</a>
        <?php else: ?>
        <img src="<?php echo e(Auth::user()->profile->TakeAvatar); ?>" alt="" class="rounded-circle ml-3" width="50">
        <div class="col my-auto">
            <a href="<?php echo e(route('profile')); ?>" class="custom__link"><i class="fas fa-edit mr-2"></i>Ubah Profile</a>
        </div>
        <?php endif; ?>
     </div>
     <nav class="humberger__menu__nav mobile-menu">
         <ul>
             <li class="active"><a href="/">Home</a></li>
             <li><a href="#">My Account</a>
                 <ul class="header__menu__dropdown">
                     <?php if(Auth::user() !== 'user'): ?>
                     <li><a href="/dashboard" target="_blank">Dashboard</a></li>
                     <?php endif; ?>
                     <li><a href="<?php echo e(route("profile")); ?>">Profile</a></li>
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
     <?php if(auth()->guard()->check()): ?>
     <a class="btn btn-secondary" href="<?php echo e(route('logout')); ?>"
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
     Logout</a>
    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
    <?php echo csrf_field(); ?>
    </form>
     <?php endif; ?>
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
                          
                        <?php if(auth()->guard()->check()): ?>
                        <div class="text-white">
                            <img src="<?php echo e(Auth::user()->profile->TakeAvatar); ?>" alt="" class="rounded-circle" width="35">
                            Hi, <?php echo e(Auth::user()->name); ?>

                        </div>    
                        <span class="arrow_carrot-down"></span>
                        <ul class="m-3 dd-navbar shadow">
                            <?php if(Auth::user()->role !== 'user'): ?>
                            <li><a class="dropdown-item" href="/dashboard" target="_blank">Dashboard</a></li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout</a></li>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </ul>
                        <?php endif; ?>
                        <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('register')); ?>" class="text-white mr-2">Daftar</a>| 
                        <a href="<?php echo e(route('login')); ?>" class="text-white ml-2">Login</a>
                        <?php endif; ?>
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
                  <a href="/"><img src="<?php echo e(asset("assets/img/logo.png")); ?>" alt=""></a>
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
</header><?php /**PATH C:\xampp\htdocs\PROJEK-LARAVEL\lara7-store\resources\views/layouts/front_layout/front-header.blade.php ENDPATH**/ ?>