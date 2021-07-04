<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 text-center text-lg-left">
                    <!-- logo -->
                    <a style="margin-left: -23px;" href="{{route('index')}}" class="site-logo">
                        <img src="{{asset('/')}}{{$logo->image}}" alt="image">
                    </a>
                </div>
                <div class="col-xl-6 col-lg-5">
                    <form method="get" action="{{route('search')}}" class="header-search-form">
                        <input name="search" type="text" placeholder="Search fish ....">
                        <button><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="user-panel">
                        <div class="up-item">
                            <i class="fa fa-user-o" aria-hidden="true"></i>
                            @if(Auth::guest())
                            <a class="small_screen_a" href="{{route('customer_dashoard_login')}}">Sign In or Create
                                account </a>

                           
                            @else
                            <a class="small_screen_a" href="{{route('user_pending_order')}}">{{$currentuser->name}}</a>
                            @endif
                        </div>
                        <div class="up-item">
                            <div class="shopping-card">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                <span>{{ Cart::getContent()->count()}}</span>
                            </div>
                            <a href="{{route('cart.index')}}">Shopping Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <!-- for small screen -->

        <a href="{{route('index')}}" class="site-logo small_screen_logo">
            <img src="{{asset('/')}}{{$logo->image}}" alt="image">
        </a>
        <div class="small_screen_cart">
            <a style="color:black" class="site-logo small_screen_icon href=" href="{{route('cart.index')}}"><i
                    class="fa fa-shopping-cart" aria-hidden="true"></i>
                <sup>{{ Cart::getContent()->count()}}</sup>
            </a>
            &nbsp;
            <i style="color:black" class="fa fa-search search_icon" aria-hidden="true"></i>
        </div>

        <!-- for small screen -->
        <div class="container">
            <!-- menu -->
            <ul class="main-menu">
                <li><a href="{{route('index')}}">Home</a></li>

                <li><a href="#">Category</a>
                    <ul class="sub-menu">
                        @foreach ($nav_category as $categories)
                        <li><a href="{{route('cat_wise_all_product', $categories->slug)}}">{{$categories->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>

                <li><a href="#">Shop</a>
                    <ul class="sub-menu">
                        <li><a href="{{route('all_products')}}">All products</a></li>
                        <li><a href="{{route('cart.index')}}">Cart<sup>{{ Cart::getContent()->count()}}</sup></a></li>
                        <li>
                            @if(Auth::check() && Auth::user()->role_id == 2)
                            <a class="" href="{{route('wishlist_detail')}}">Wishlist
                                <sup>{{ $wishlist}}</sup></a>
                            @else
                            <a class="" href="{{route('customer_dashoard_login')}}">Wishlist<sup>0</sup></a>
                            @endif
                        </li>


                    </ul>
                </li>
                <li><a href="#contact">Contact</a> </li>
                <li><a href="#">Blog</a></li>
                @if(Auth::guest())
                
                <li>
                    <a class="small_screen_a" href="{{route('customer_dashoard_login')}}">Sign In or Create
                        account </a>

                </li>
                @else
                <li>
                    <a class="small_screen_a" href="{{route('user_pending_order')}}">{{$currentuser->name}}</a>
                </li>
                <li>
                    <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <!-- <li><a href="#"></a></li> -->
                @endif
               
            </ul>
        </div>
    </nav>

    <div class="col-12 small_screen_search">
        <form method="get" action="{{route('search')}}" class="header-search-form">
            <input name="search" type="text" placeholder="Search fish ....">
            <button><i style="color: #2c976b;" class="fa fa-search" aria-hidden="true"></i></button>
        </form>
    </div>
</header>