<section class="featured spad">
<div class="container">
 <!-- Featured Section Begin -->
 <div class="row">
  <div class="col-lg-12">
      <div class="section-title">
        @isset($category)
    <h2>{{$category->category_name}}</h2>
      @endisset 

      @isset($brand)
      <h2>{{$brand->brand_name}}</h2>
        @endisset 

      @if (!isset($brand) && !isset($category))
          <h2>Produk Unggulan</h2>
      @endif
      </div>
    </div>
  </div>
        <div class="scrolling-pagination">
          <div class="row featured__filter">
              @forelse ($products as $product)
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="featured__item">
                      <div class="featured__item__pic">
                        <img src="{{asset('/storage/'.$product->thumbnail)}}" alt="product-image">
                          <ul class="featured__item__pic__hover">
                              <li title="Tambah Ke Favorit"><a href="#"><i class="fa fa-heart"></i></a></li>
                          </ul>
                      </div>
                      <div class="featured__item__text pb-3">
                          <h6><a href="{{route("product.show", $product->slug)}}">{{$product->product_name}}</a></h6>
                          <h5>@rupiah($product->harga)</h5>
                      </div>
                  </div>
              </div>
              {{ $products->links() }}
              @empty
              <div class="col">
                  <div class="alert alert-info text-center" role="alert">
                      <strong>Empty Products.</strong> Please check products data field!
                  </div>
              </div>
              @endforelse
              
          </div>
        </div>
        </div>
  </section>
  <!-- Featured Section End -->

  <!-- Loading More Data-->
   <div class="load-wrapp d-none">
      <div class="load-3">
          <p>Please Wait</p>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
      </div>
    </div>
  

@push('after-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script>
 $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            loadingHtml: "<div class=\"load-wrapp\"><div class=\"load-3\"><p>Please Wait</p><div class=\"line\"></div><div class=\"line\"></div><div class=\"line\"></div></div></div>",
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
    </script>
@endpush
