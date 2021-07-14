@extends('frontEnd.master.master')
@section('title')
DESH BANGLA FISH & SHRIMP
@endsection

@section('body')


<!-- Hero section -->
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        @foreach ($banner as $ban)
        <div class="hs-item set-bg" data-setbg="{{$ban->image}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-7 text-white">
                        <span class="banner_font">{{$ban->product_name}}</span>
                        <h2 class="banner_font">{{$ban->title}}</h2>
                        <p class="banner_font">{{$ban->desp}} </p>
                        <a href="#feature" class="site-btn sb-line">DISCOVER</a>
                        <!--<a href="#" class="site-btn sb-white">ADD TO CART</a>-->
                    </div>
                </div>
                <a href="#" class="offer-card text-white">
                    <span>from</span>
                    <h3>TK 150</h3>
                    <p>SHOP NOW</p>
                </a>
            </div>
        </div>
        @endforeach

    </div>
    <div class="container">
        <div class="slide-num-holder" id="snh-1"></div>
    </div>
</section>
<!-- Hero section end -->



<!-- Features section -->

<!-- <section class="features-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="img/icons/1.png" alt="#">
                    </div>
                    <h2>Fast Secure Payments</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="img/icons/2.png" alt="#">
                    </div>
                    <h2>Premium Products</h2>
                </div>
            </div>
            <div class="col-md-4 p-0 feature">
                <div class="feature-inner">
                    <div class="feature-icon">
                        <img src="img/icons/3.png" alt="#">
                    </div>
                    <h2>Free & fast Delivery</h2>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Features section end -->


<!-- letest product section -->
<section class="top-letest-product-section" id="feature">
    <div class="container">
        <div class="section-title">
            <h2>Feature Product</h2>
        </div>
        <div class="product-slider owl-carousel">
            @foreach($feature_item as $item)
            <div class="product-item">
                <div class="pi-pic product-design">
                    <img src="{{asset('/')}}{{$item->image}}" alt="image">
                    <div class="pi-links">

                        <form action="{{ route('cart.store') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $item->product_slug }}" id="id" name="id">
                            <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                            <input type="hidden" value="{{ $item->sell_price }}" id="price" name="price">
                            <input type="hidden" value="{{ $item->image }}" id="img" name="img">

                            <input type="hidden" id="quantity" name="quantity"
                                class="quantity form-control input-number" value="1" min="1" max="100">

                            <button type="submit" class="add-card"><i class="fa fa-shopping-cart"></i>
                                <span>ADD TO CART</span></button>

                            <a href="{{route('wishlist', $item->id)}}" class="wishlist-btn"
                                data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart"
                                    aria-hidden="true"></i></a>
                        </form>

                        <!-- <a href="#" class="add-card"> <i class="fa fa-shopping-cart" aria-hidden="true"></i><span>ADD TO
                                CART</span></a> -->

                    </div>
                </div>
                <div class="pi-text">
                    <div class="row">
                        <div class="col-md-5 col-5">
                            <h6>{{$item->name}} </h6>

                        </div>
                        <div class="col-md-7 col-5">
                            <span>{{$item->sell_price}} TK</span> &nbsp;
                            <span style="float: right">{{$item->weight}} KG</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- letest product section end -->



<!-- Product filter section -->
<section class="product-filter-section">
    <div class="container">
        <div class="section-title">
            <h2>LATEST PRODUCTS</h2>
        </div>
        <ul class="product-filter-menu">
            @foreach ($category_fish as $item)
            <li><a href="{{route('cat_wise_all_product', $item->slug)}}">{{$item->name}}</a></li>
            @endforeach
        </ul>
        <div class="row">
            @foreach ($feature_item->shuffle()->take(8) as $item)
            <div class="col-lg-3 col-sm-6">
                <div class="product-item">
                    <div class="pi-pic product-design">
                        <img src="{{asset('/')}}{{$item->image}}" alt="image">
                        <div class="pi-links">
                            <form action="{{ route('cart.store') }}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{ $item->product_slug }}" id="id" name="id">
                                <input type="hidden" value="{{ $item->name }}" id="name" name="name">
                                <input type="hidden" value="{{ $item->sell_price }}" id="price" name="price">
                                <input type="hidden" value="{{ $item->image }}" id="img" name="img">

                                <input type="hidden" id="quantity" name="quantity"
                                    class="quantity form-control input-number" value="1" min="1" max="100">

                                <button type="submit" class="add-card"><i class="fa fa-shopping-cart"></i>
                                    <span>ADD TO CART</span></button>
                                <a href="{{route('wishlist', $item->id)}}" class="wishlist-btn"
                                    data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="fa fa-heart"
                                        aria-hidden="true"></i></a>
                            </form>

                        </div>
                    </div>
                    <div class="pi-text">
                        <div class="row">
                            <div class="col-md-5">
                                <h6>{{$item->name}} </h6>

                            </div>
                            <div class="col-md-7">
                                <span>{{$item->sell_price}} TK</span> &nbsp;
                                <span style="float: right">{{$item->weight}} KG</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center">
            <a href="{{route('all_products')}}" class="site-btn sb-line sb-dark">SEE ALL</a>
        </div>
    </div>
</section>
<!-- Product filter section end -->


<!-- Banner section -->
<section class="banner-section">
    <div class="container">
        <div class="banner set-bg" data-setbg="{{asset('/')}}{{$offer->image}}">
            <div class="tag-new">15% OFF</div>
            <span style="color:white">Stock Available</span>
            <h2 style="color:white">Deshi Fish</h2>
            <a href="#" class="site-btn">SHOP NOW</a>
        </div>
    </div>
</section>
<!-- Banner section end  -->

@endsection