<section class="categories">
  <div class="container">
      <div class="row">
          <div class="categories__slider owl-carousel">
            @foreach ($brands as $brand)                  
            <div class="col-lg-3">
                <div class="categories__item set-bg" data-setbg="{{asset('/storage/'. $brand->logo)}}">
                    <h5><a href="{{route('brand.show', $brand->slug)}}">{{$brand->brand_name}}</a></h5>
                </div>
            </div>
            @endforeach
          </div>
      </div>
  </div>
</section>