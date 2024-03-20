    <!-- Header Section Begin -->
   @include('layouts.front_layout.front-header')
   <!-- Header Section End -->
    <x-alert></x-alert>
   <!-- Hero Section Begin -->
   @include('product.hero')
   <!-- Hero Section End -->
   
   <!-- Categories Section Begin -->
   @include('product.brands')
    <!-- Categories Section End -->

    <!-- product Section Begin -->
   @include('product.product')
   <!-- product Section End -->

    <!-- Banner Begin -->
    {{-- @include('product.bannerBottom') --}}
    <!-- Banner End -->


    <!-- Footer Section Begin -->
  @include('layouts.front_layout.front-footer')
    <!-- Footer Section End -->

   