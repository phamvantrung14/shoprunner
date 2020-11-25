@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route("Home")}}">Home</a></li>
                        <li class="breadcrumb-item active">Single Product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wraper mb-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 order-1 order-lg-1">
                    <!-- shop-top-bar start -->
                    <div class="shop-top-bar mt-95">
                        <div class="shop-bar-inner">
                            <div class="product-view-mode">
                                <!-- shop-item-filter-list start -->
                                <ul class="nav shop-item-filter-list" role="tablist">
                                    <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                    <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                                </ul>
                                <!-- shop-item-filter-list end -->
                            </div>
                            <div class="toolbar-amount">
                                <span><p>Showing 1-{{$products->lastPage()}} of {{$products->total()}} item(s)</p></span>
                            </div>
                        </div>
                        <!-- product-select-box start -->
                        <div class="product-select-box">
                            <div class="product-short">
                                <p>Sort By:</p>
                                <select class="nice-select" name="select" id="select_pp">
                                    <option value="0">Relevance</option>
                                    <option value="1">Name (A - Z)</option>
                                    <option value="2">Name (Z - A)</option>
                                    <option value="3">Price (Low &gt; High)</option>
                                    <option value="4">Price (Low < High)</option>
                                </select>
                            </div>
                        </div>
                        <!-- product-select-box end -->
                    </div>
                    <!-- shop-top-bar end -->

                    <div class="shop-products-wrapper">
                        <div class="tab-content">
                            <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                <div class="shop-product-area">
                                    <div class="row">
                                        @foreach($products  as $value)
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 mt-40">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="{{url("/product-detail/{$value->slug}")}}">
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
                                                        <div class="manufacturer"><a href="{{url("/product-detail/{$value->slug}")}}">{{$value->Categories->cate_name}}</a></div>
                                                        <div class="price-box">
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
                            <div id="list-view" class="tab-pane fade" role="tabpanel">
                                <div class="row">
                                    <div class="col">
                                        @foreach($products  as $value)
                                        <div class="row product-layout-list">
                                            <div class="col-lg-4 col-md-5 ">
                                                <div class="product-image">
                                                    <a href="single-product.html">
                                                        <img alt="" src="{{asset($value->avatar)}}" style="height: 250px!important;" class="primary-image">
                                                    </a>
                                                    @if($value->sale_price>1)
                                                        <div class="label-product">{{$value->number_price($value->price,$value->sale_price)}} </div>
                                                    @else
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-7">
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
                                                        <div class="manufacturer"><a href="{{url("/product-detail/{$value->slug}")}}">{{$value->Categories->cate_name}}</a></div>
                                                        <div class="price-box">
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
                                                        <div class="list-add-actions">
                                                            <ul>
                                                                <li class="add-cart"><a href="javascript:void(0);" onclick="addToCart({{$value->id}})">Add to cart</a></li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="paginatoin-area">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <p>Showing 1-{{$products->lastPage()}} of {{$products->total()}} item(s)</p>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        {!! $products->render("vendor.pagination.shop-run") !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 order-2 order-lg-2">
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box mt-95">
                        <div class="sidebar-title">
                            <h2>Categories</h2>
                        </div>
                        <!-- category-sub-menu start -->
                        <div class="category-sub-menu">
                            <ul>
                                @foreach($categories as $value)
                                    <li class="has-sub"><a href="{{url("product-cate/$value->slug")}}">{{$value->cate_name}}</a>
                                        <ul>
                                            <li><a href="{{url("product-cate/$value->slug")}}">All Products</a></li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                    <!--sidebar-categores-box end  -->
                    <!--sidebar-categores-box start  -->
                    <div class="sidebar-categores-box mt-95">
                        <div class="sidebar-title">
                            <h2>Brands</h2>
                        </div>
                        <!-- category-sub-menu start -->
                        <div class="category-sub-menu">
                            <ul>
                                @foreach($brands as $value)
                                    <li class="has-sub"><a href="{{url("product-brand/$value->id")}}">{{$value->brand_name}}</a>
                                        <ul>
                                            <li><a href="{{url("product-brand/$value->id")}}">All Products</a></li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                    <!--sidebar-categores-box end  -->

                    <!-- shop-banner start -->
                    <div class="shop-banner">
                        <div class="single-banner">
                            <a href="#"><img src="img/banner/shop-banner.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- shop-banner end -->
                </div>

            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        function addToCart(productId) {
            $.ajax({
                url: "{{url("cart/add")}}/" + productId,
            }).done(function (response) {
                $("body").empty();
                $("body").html(response);
                alertify.success('Đã Thêm Mới Sản Phẩm !!');
            })
        }
        $(document).ready(function () {

            $("#select_pp").change(function (event) {
                var _select =$(this).val();
                $.ajax({
                    url: "{{url("ajaxfrontend/search_pro")}}/"+ _select,
                }).done(function (response) {
                    $("body").empty();
                    $("body").html(response);
                })

            })
        })
    </script>
@endsection
