<!-- Front Header-->
@include('layouts.front_layout.front-header')
@include('product.hero')
<!-- User Content-->
<section>
  <div class="container">
      @yield('content')
  </div>
</section>
<!-- Front Footer-->
@include('layouts.front_layout.front-footer')