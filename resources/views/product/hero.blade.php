@php
    use App\Category;
    $categories = Category::get();
@endphp
<section class="hero">
  <div class="container">
      <div class="row">
          <div class="col-lg-3">
              <div class="hero__categories">
                  <div class="hero__categories__all">
                      <i class="fa fa-bars"></i>
                      <span>Kategori</span>
                  </div>
                  <ul>
                      @forelse ($categories as $category)
                      <li><a href="{{route('categories.show', $category->slug)}}">{{$category->category_name}}</a></li>
                      @empty
                      <li>Belum ada kategori.</li>
                      @endforelse
          
                  </ul>
              </div>
          </div>
          <div class="col-lg-9">
              <div class="hero__search">
                  <div class="hero__search__form">
                      <form action="#">
                          <input type="text" placeholder="Mau belanja apa hari ini?">
                          <button type="submit" class="site-btn">Cari</button>
                      </form>
                  </div>
              </div>
              <div class="hero__item set-bg mb-5" data-setbg="{{asset("assets/img/hero/banner.jpg")}}">
                  <div class="hero__text">
                      <span>FRUIT FRESH</span>
                      <h2>Vegetable <br />100% Organic</h2>
                      <p>Free Pickup and Delivery Available</p>
                      <a href="#" class="primary-btn">SHOP NOW</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>