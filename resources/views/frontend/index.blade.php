@extends("components.frontend.layout")
@section("content")
<!-- slider-main-area start -->
<div class="slider-main-area">
    <div class="slider-active owl-carousel">
        <!-- slider-wrapper start -->
        @foreach($slide_homes as $value)
        <div class="slider-wrapper" style="background-image:url({{$value->image}})">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="slider-text-info style-2 text-center slider-text-animation">
                            <h1 class="title1"><span class="text">{!! $value->title !!}</span></h1>
                            <p>{!! $value->content !!}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- slider-main-area end -->

<!-- banner-area start -->


<!-- banner-area end -->

<!-- product-area start -->
<div class="product-area product-two-inner pt-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <!-- product-tabs-list start -->
                    <div class="product-tabs-list">
                        <ul role="tablist" class="nav">
                            <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="new-arrivals" href="#new-arrivals" class="active show" aria-selected="true">New Arrival</a></li>
                            <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="on-sellers" href="#on-sellers"> Featured Products</a></li>
                        </ul>
                    </div>
                    <!-- product-tabs-list end -->
                </div>
            </div>
            <div class="col-lg-12">
                <div class="section-title-dic">
                    <p>Our store is more than just another average online retailer. We sell not only top quality products, but give our customers a positive online shopping experience.</p>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div id="new-arrivals" class="tab-pane active show" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel col-md-12">
{{--                    <div class="col-md-12">--}}
                        @foreach($pro_treadmill_hot as $value)

                        <div class="col">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{url("/product-detail/{$value->slug}")}}">
                                        <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 250px!important;" alt="">
{{--                                        @foreach($pd_image2 as $value2)--}}
                                        <img class="secondary-image" src="" style="height: 250px!important;" alt="">
{{--                                        <img class="secondary-image" src="{{asset("frontend/img/product/1.jpg")}}" alt="">--}}
{{--                                        @endforeach--}}
                                    </a>

{{--                                    @if(isset($price))--}}
{{--                                    <div class="label-product">{{round($price)}} %</div>--}}
                                    @if($value->sale_price>1)
                                    <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                    @else
                                    @endif
{{--                                    @endif--}}
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="rating-box">
                                            @if(($value->rating)==1)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==2)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li ><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==3)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==4)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==5)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            @endif
                                        </div>
                                        <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                        <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>

                                            @if(($value->sale_price)>1)
                                            <div class="price-box">
                                                <span class="new-price">{{$value->getSalePrice()}}</span>
                                                <span class="old-price">{{$value->getPrice()}}</span>
                                            </div>
                                             @else
                                                <div class="price-box">
                                                    <span class="new-price">{{$value->getPrice()}}</span>
                                                </div>
                                            @endif
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})"><i class="ion-android-cart"></i> Add to cart</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                </div>
            </div>
            <div id="on-sellers" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($pro_hot as $value)
                            @if($value->cate_id != 1)
                        <div class="col">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="{{url("/product-detail/{$value->slug}")}}">
                                        <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 250px!important;" alt="">
{{--                                        <img class="secondary-image" src="{{asset("frontend/img/product/3.jpg")}}" alt="">--}}
                                    </a>
                                    @if($value->sale_price>1)
                                        <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                    @else
                                    @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="rating-box">
                                            @if(($value->rating)==1)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==2)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li ><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==3)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==4)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                </ul>
                                            @elseif(($value->rating)==5)
                                                <ul class="rating">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                            @endif
                                        </div>
                                        <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                        <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>

                                        @if(($value->sale_price)>1)
                                            <div class="price-box">
                                                <span class="new-price">{{$value->getSalePrice()}}</span>
                                                <span class="old-price">{{$value->getPrice()}}</span>
                                            </div>
                                        @else
                                            <div class="price-box">
                                                <span class="new-price">{{$value->getPrice()}}</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})" ><i class="ion-android-cart"></i> Add to cart</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- single-product-wrap end -->
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-area end -->

<!-- banner-area start -->
<div class="banner-area ptb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="single-banner-box-2">
                    @if(isset($slide_shoes->image))
                    <a href="javascript:void(0);"><img src="{{asset($slide_shoes->image)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner-area end -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Treadmill new</h2>
                            <div class="product-tabs-list-2">
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active"><a aria-selected="true" class="active show" href="#for-men" aria-controls="for-men" role="tab" data-toggle="tab">Treadmill</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">
                                        @foreach($pro_treadmill_new as $value)
                                            <div class="col">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="{{url("/product-detail/{$value->slug}")}}">
                                                            <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 300px!important;" alt="">
                                                        </a>
                                                    </div>
                                                    @if($value->sale_price>1)
                                                        <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                                    @else
                                                    @endif
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="rating-box">
                                                                @if(($value->rating)==1)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==2)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li ><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==3)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==4)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==5)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @endif
                                                            </div>
                                                            <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                                            <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>

                                                            @if(($value->sale_price)>1)
                                                                <div class="price-box">
                                                                    <span class="new-price">{{$value->getSalePrice()}}</span>
                                                                    <span class="old-price">{{$value->getPrice()}}</span>
                                                                </div>
                                                            @else
                                                                <div class="price-box">
                                                                    <span class="new-price">{{$value->getPrice()}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})"><i class="ion-android-cart"></i> Add to cart</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-area start -->
<div class="product-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Shoes new</h2>
                            <div class="product-tabs-list-2">
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active"><a aria-selected="true" class="active show" href="#for-men" aria-controls="for-men" role="tab" data-toggle="tab">For men</a></li>
                                    <li role="presentation"><a href="#for-women" aria-controls="for-women" role="tab" data-toggle="tab">For women</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="for-men" class="tab-pane active show" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">
                                        @foreach($for_men as $value)
                                        <div class="col">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{url("/product-detail/{$value->slug}")}}">
                                                        <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 300px!important;" alt="">
                                                    </a>
                                                </div>
                                                @if($value->sale_price>1)
                                                    <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                                @else
                                                @endif
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="rating-box">
                                                            @if(($value->rating)==1)
                                                            <ul class="rating">
                                                                <li><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                            </ul>
                                                            @elseif(($value->rating)==2)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li ><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==3)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==4)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==5)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @endif
                                                        </div>
                                                        <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                                        <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>

                                                        @if(($value->sale_price)>1)
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getSalePrice()}}</span>
                                                                <span class="old-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @else
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})"><i class="ion-android-cart"></i> Add to cart</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div id="for-women" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">
                                        @foreach($for_women as $value)
                                        <div class="col">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{url("/product-detail/{$value->slug}")}}">
                                                        <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 300px!important;" alt="">
                                                    </a>
                                                </div>
                                                @if($value->sale_price>1)
                                                    <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                                @else
                                                @endif
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="rating-box">
                                                            @if(($value->rating)==1)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==2)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li ><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==3)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==4)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif(($value->rating)==5)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @endif
                                                        </div>
                                                        <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                                        <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>

                                                        @if(($value->sale_price)>1)
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getSalePrice()}}</span>
                                                                <span class="old-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @else
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})"><i class="ion-android-cart"></i> Add to cart</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-area end -->

<!-- product-area start -->
<div class="product-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <div class="section-title-3">
                            <h2>Jogging outfit new</h2>
                            <div class="product-tabs-list-2">
                                <ul class="nav" role="tablist">
                                    <li role="presentation" class="active"><a aria-selected="true" class="active show" href="#cat-tb-1" aria-controls="cat-tb-1" role="tab" data-toggle="tab">For Men</a></li>
                                    <li role="presentation"><a href="#cat-tb-2" aria-controls="cat-tb-2" role="tab" data-toggle="tab">For Women</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="tab-content">
                            <div id="cat-tb-1" class="tab-pane active show" role="tabpanel">
                                <div class="row">

                                    <div class="product-active-3 owl-carousel">
                                        @foreach($products_shirst_men as $value)
                                        <div class="col">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 250px!important;" alt="">
                                                    </a>
                                                    @if($value->sale_price>1)
                                                        <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                                    @else
                                                    @endif
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @if(($value->rating)==1)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==2)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li ><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==3)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==4)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==5)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                                        <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>

                                                        @if(($value->sale_price)>1)
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getSalePrice()}}</span>
                                                                <span class="old-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @else
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})" ><i class="ion-android-cart"></i> Add to cart</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                            <div id="cat-tb-2" class="tab-pane" role="tabpanel">
                                <div class="row">
                                    <div class="product-active-3 owl-carousel">
                                        @foreach($products_shirst_wonmen as $value)
                                        <div class="col">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 250px!important;" alt="">

                                                    </a>
                                                    @if($value->sale_price>1)
                                                        <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                                    @else
                                                    @endif
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @if(($value->rating)==1)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==2)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li ><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==3)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==4)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @elseif(($value->rating)==5)
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    </ul>
                                                                @endif
                                                            </ul>
                                                        </div>
                                                        <h4><a class="product_name" href="{{url("/product-detail/{$value->slug}")}}">{{$value->pro_name}}</a></h4>
                                                        <div class="manufacturer"><a href="{{url("product-cate/{$value->Categories->slug}")}}">{{$value->Categories->cate_name}}</a></div>
                                                        @if(($value->sale_price)>1)
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getSalePrice()}}</span>
                                                                <span class="old-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @else
                                                            <div class="price-box">
                                                                <span class="new-price">{{$value->getPrice()}}</span>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})" ><i class="ion-android-cart"></i> Add to cart</a></li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product-area end -->
<div class="banner-area ptb-95 mt-40">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-custom-4 col">
                <!--single-banner-box start -->
                <div class="single-banner-box mb-20">
                    <a href="{{route("home.blog.detail",$news_recruiment->id)}}"><img src="{{asset($news_recruiment->image)}}" alt=""></a>
                </div>
                <!--single-banner-box end -->
                <!--single-banner-box start -->
                <div class="single-banner-box">
                    <a href="{{route("home.blog.detail",$news_runningMachine->id)}}"><img src="{{asset($news_runningMachine->image)}}" alt=""></a>
                </div>
                <!--single-banner-box end -->
            </div>
            <div class="col-lg-4 centeritem col">
                <!--single-banner-box start -->
                <div class="single-banner-box">
                    <a href="{{route("home.blog.detail",$news_default->id)}}"><img src="{{asset($news_default->image)}}" alt=""></a>
                </div>
                <!--single-banner-box end -->
            </div>
            <div class="col-lg-4 col-custom-4 col">
                <!--single-banner-box start -->
                <div class="single-banner-box mb-20">
                    <a href="{{route("home.blog.detail",$news_shoes->id)}}"><img src="{{asset($news_shoes->image)}}" alt=""></a>
                </div>
                <!--single-banner-box end -->
                <!--single-banner-box start -->
                <div class="single-banner-box">
                    <a href="{{route("home.blog.detail",$news_outfist->id)}}"><img src="{{asset($news_outfist->image)}}" alt=""></a>
                </div>
                <!--single-banner-box end -->
            </div>
        </div>
    </div>
</div>
<!-- newsletter-area start -->

<!-- newsletter-area end -->
<!-- Modal start-->

<!-- Modal end-->
@endsection
@section("script")
    <script>
        function addToCart(productId) {
            $.ajax({
                url: "{{url("cart/add")}}/" + productId,
            }).done(function (response) {
                $("body").empty();
                $("body").html(response);
                alertify.success('Added new product to cart !!');
            })
        }

    </script>

@endsection

