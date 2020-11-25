<header>
    <!-- header-top start -->
    <div class="header-top bg-black sticky-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-3 md-custom-12">
                    <!-- logo start -->
                    <div class="logo">
                        <a href="{{route("Home")}}"><img src="{{asset("frontend/img/logo/logorun3.png")}}" alt=""></a>
                    </div>
                    <!-- logo end -->
                </div>
                <div class="col-lg-10 col-md-9 md-custom-12">
                    <div class="row">
                        <div class="col-lg-7 d-none d-lg-block">
                            <!-- main-menu-area start -->
                            <div class="main-menu-area">
                                <nav>
                                    <ul>
                                        <li class=""><a href="{{route("Home")}}">Home </a>

                                        </li>
                                        <li><a href="#">Products<i class="ion-ios-arrow-down"></i></a>
                                            <ul class="mega-menu">
                                                <li style="margin-right: 15px"><a href="#">Categories</a>
                                                    <ul>
                                                        @foreach($categories as $value)
                                                        <li><a href="{{url("product-cate/$value->slug")}}">{{$value->cate_name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a href="#">Brands </a>
                                                    <ul>
                                                        @foreach($brands as $value)
                                                            <li><a href="{{url("product-brand/$value->id")}}">{{$value->brand_name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                        <li><a href="{{route("home.shopAll")}}">Shop</a></li>
                                        <li><a href="{{route("home.blog.index")}}">Blog</a></li>
                                        <li><a href="{{route("home.store.index")}}">Store</a>

                                        </li>
                                        <li><a href="{{route("home.about.us")}}">About us</a></li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- main-menu-area end -->
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <!-- full-setting-area start -->
                            <div class="full-setting-area setting-style-3">
                                <div class="top-dropdown">
                                    <ul>
                                        @if(Auth::guard('cus')->check())
                                        <li class="drodown-show"><a href="#"> {{Auth::guard('cus')->user()->email}} <i class="fa fa-angle-down"></i></a>
                                            <ul class="open-dropdown setting">
                                                <li><a href="my-account.html">My account</a></li>
                                                <li><a href="{{url("customer/purchase-order/")."/".Auth::guard('cus')->user()->id}}">Purchase Order</a></li>
                                                <li><a href="{{route("customer.logout")}}">logout</a></li>
                                            </ul>
                                        </li>
                                        @else
                                            <li><a href="{{route("customer.login")}}">Login</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <!-- full-setting-area end -->
                        </div>
                    </div>
                </div>

            </div>
            <div class="mobile-menu-style-2 row">
                <div class="col-lg-12 d-block d-lg-none">
                    <!-- Mobile Menu Area Start -->
                    <div class="mobile-menu-area">
                        <div class="mobile-menu">
                            <nav id="mobile-menu-active">
                                <ul>
                                    <li class=""><a href="{{route("Home")}}">Home </a>
                                    <li><a href="#">Products<i class="ion-ios-arrow-down"></i></a>
                                        <ul class="mega-menu">
                                            <li style="margin-right: 15px"><a href="#">Categories</a>
                                                <ul>
                                                    @foreach($categories as $value)
                                                        <li><a href="{{url("product-cate/$value->slug")}}">{{$value->cate_name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="#">Brands </a>
                                                <ul>
                                                    @foreach($brands as $value)
                                                        <li><a href="{{url("product-brand/$value->id")}}">{{$value->brand_name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>

                                    <li><a href="{{route("home.shopAll")}}">Shop</a></li>
                                    <li><a href="{{route("home.blog.index")}}">Blog</a></li>
                                    <li><a href="{{route("home.store.index")}}">Store</a>

                                    </li>
                                    <li><a href="{{route("home.about.us")}}">About us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu Area End -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-top end -->
    <!-- header-mid-area start -->
    <div class="header-mid-area header-mid-style-3 bg-black">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <!-- hot-line-area start -->
                    <div class="hot-line-area">
                        <div class="phone">
                            Customer Support: <span>(012) 800 456 789-987 </span>
                        </div>
                    </div>
                    <!-- hot-line-area end -->

                    <!-- shopping-cart-box start -->
                    <div class="shopping-cart-box white-cart-box">
                        <ul>

                            <li>
                                <a href="{{route("shoppingcart.index")}}">
                                                <span class="item-cart-inner">
                                                    <span class="item-cont">{{\Cart::count()}}</span>
                                                    My Cart
                                                </span>
                                    <div class="item-total">$237.00</div>
                                </a>
                                <ul class="shopping-cart-wrapper">
                                    @foreach($cart as $key=> $value)
                                    <li>
                                        <div class="shoping-cart-image">
                                            <a href="#">
                                                <img src="{{asset($value->options->avatar)}}" width="80px" alt="">
                                                <span class="product-quantity">{{$value->qty}}x</span>
                                            </a>
                                        </div>
                                        <div class="shoping-product-details">
                                            <h3><a href="#">{{$value->name}}</a></h3>
                                            <div class="price-box">
                                                <span>$
                                                    {{number_format($value->price)}}</span>
                                            </div>
                                            <div class="sizeandcolor">
                                                <?php
                                                    $data_size = DB::table("arrtibute_values")->where("id",$value->options->size)->first();
                                                ?>
                                                    @if(isset($data_size))
                                                        <span>Size: {{$data_size->name_arrtb_value}}</span>
                                                    @else
                                                <span>{{$value->options->size}}</span>
                                                    @endif

                                            </div>
                                            <div class="remove">
                                                <a href="javascript:void(0);" title="Remove"><i class="ion-android-delete" data-id="{{$key}}"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                    <li>
                                        <div class="cart-subtotals">
                                            <h5>Subtotal<span class="float-right">${{\Cart::subtotal(00)}}</span></h5>
                                            <h5> Total<span class="float-right">${{\Cart::subtotal(00)}}</span></h5>
                                        </div>
                                    </li>
                                    <li class="shoping-cart-btn">
                                        <a class="checkout-btn" href="{{route("shoppingcart.index")}}">checkout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- shopping-cart-box start -->

                    <!-- searchbox start -->
                    <div class="searchbox">
                        <form action="{{route("home.search.cate.pro")}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="search-form-input">
                                <select id="select" name="cate_id" class="nice-select">
                                    <option value="0">All Categories</option>
                                    @foreach($categories as $value)
                                    <option value="{{$value->id}}">{{$value->cate_name}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="pro_name" placeholder="Enter Products your search key ... ">
                                <button class="top-search-btn" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                    <!-- searchbox end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header-mid-area end -->
</header>





