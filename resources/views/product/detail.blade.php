@include('layouts.front_layout.front-header')
@include('product.hero')
    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset('/storage/'.$product->thumbnail)}}" alt="{{$product->product_name . " Images"}}">
                        </div>
                        {{-- <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="img/product/details/product-details-2.jpg"
                                src="img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-3.jpg"
                                src="img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-5.jpg"
                                src="img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="img/product/details/product-details-4.jpg"
                                src="img/product/details/thumb-4.jpg" alt="">
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <x-alert></x-alert>
                    <div class="product__details__text">
                        <h3>{{$product->product_name}}</h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">@rupiah($product->harga)</div>

                        <form action="{{route('product.addToCart')}}" method="POST" id="cart-form">
                            @csrf
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="quantity" id="quantity">
                                </div>
                            </div>
                        </div>
                        <a href="{{route('product.addToCart')}}" class="primary-btn" onclick="event.preventDefault(); document.getElementById('cart-form').submit();">Tambah Ke Keranjang</a>
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                        </form>   

                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Stock</b> <span>{{$product->stok === 0 ? "Stok Habis" : "tersisa ".$product->stok." buah"}}</span></li>
                            @if ($product->gender)
                             <li><b>Gender</b> <span>{{$product->gender}}</span></li>   
                            @endif
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Deskripsi</a>
                            </li>
                       
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$product->deskripsi}}.</p>
                                       
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Buat Review Pengguna</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
              @foreach ($related as $r)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset('/storage/'.$r->thumbnail)}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text pb-3">
                            <h6><a href="{{route("product.show", $r->slug)}}">{{$r->product_name}}</a></h6>
                            <h5>@rupiah($r->harga)</h5>
                        </div>
                    </div>
                </div>   
              @endforeach

            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    @include('layouts.front_layout.front-footer')