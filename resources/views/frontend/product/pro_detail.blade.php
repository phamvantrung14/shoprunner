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

    <div class="content-wraper mt-95">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row single-product-area">
                        <div class="col-xl-4  col-lg-6 offset-xl-1 col-md-5 col-sm-12">
                            <div class="single-product-tab">
                                <div class="zoomWrapper">
                                    <div id="img-1" class="zoomWrapper single-zoom">
                                        <a href="#">
                                            <img id="zoom1" src="{{asset($product_detail->avatar)}}" data-zoom-image="{{asset($product_detail->avatar)}}" alt="big-1">
                                        </a>
                                    </div>
                                    <div class="single-zoom-thumb">
                                        <ul class="s-tab-zoom single-product-active owl-carousel owl-loaded owl-drag" id="gallery_01">
                                            <div class="owl-stage-outer">
                                                <div class="owl-stage" style="transform: translate3d(-411px, 0px, 0px); transition: all 0s ease 0s; width: 1511px;">
                                                    <div class="owl-item cloned" style="width: 122.333px; margin-right: 15px;">
                                                        <li class="">
                                                            <a href="#" class="elevatezoom-gallery" data-image="{{asset($product_detail->avatar)}}" data-zoom-image="{{asset($product_detail->avatar)}}">
                                                                <img src="{{asset($product_detail->avatar)}}" alt="ex-big-3">
                                                            </a>
                                                        </li>
                                                    </div>
                                                    @foreach($pd_image as $value)
                                                    <div class="owl-item cloned" style="width: 122.333px; margin-right: 15px;">
                                                        <li class="">
                                                            <a href="#" class="elevatezoom-gallery" data-image="{{asset($value->image)}}" data-zoom-image="{{asset($value->image)}}">
                                                                <img src="{{asset($value->image)}}" style="background-size: cover;" alt="ex-big-3">
                                                            </a>
                                                        </li>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="owl-nav">
                                                <button type="button" role="presentation" class="owl-prev">
                                                    <i class="fa fa-angle-left"></i>
                                                </button>
                                                <button type="button" role="presentation" class="owl-next">
                                                    <i class="fa fa-angle-right"></i>
                                                </button>
                                            </div>
                                            <div class="owl-dots disabled">

                                            </div>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6 col-md-7 col-sm-12">
                            <!-- product-thumbnail-content start -->
                            <div class="quick-view-content">
                                <div class="product-info">
                                    <h2>{{$product_detail->pro_name}} - ({{$product_detail->ma_sp}})</h2>
                                    <div class="rating-box">
                                        @if(($product_detail->rating)==1)
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                            </ul>
                                        @elseif(($product_detail->rating)==2)
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li ><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                            </ul>
                                        @elseif(($product_detail->rating)==3)
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                            </ul>
                                        @elseif(($product_detail->rating)==4)
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li class="no-star"><i class="fa fa-star"></i></li>
                                            </ul>
                                        @elseif(($product_detail->rating)==5)
                                            <ul class="rating">
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                            </ul>
                                        @endif
                                    </div>
                                    <form class="modal-cart" method="GET" action="{{url("cart/add/$product_detail->id")}}">
                                        @csrf
                                        @method("GET")
                                    @if(($product_detail->sale_price)>1)
                                    <div class="price-box">
                                        <span class="new-price">{{$product_detail->getSalePrice()}}</span>
                                        <span class="old-price">{{$product_detail->getPrice()}}</span>
                                    </div>
                                    @else
                                        <div class="price-box">
                                            <span class="new-price">{{$product_detail->getPrice()}}</span>
                                        </div>
                                    @endif
                                    <p>Made in: {{ $product_detail->made_from }}</p>
                                        @foreach($pro_endow as $value)
                                            <p><i class="fas fa-gift" style="margin-right: 15px;font-size: 25px;color: red"></i>{{$value->Endows->endow_name}}</p>
                                        @endforeach
                                    <div class="modal-size pt-4">
                                        @if(($product_detail->cate_id)==7 || ($product_detail->cate_id)==8 )
                                        <h4>Size</h4>
                                        <select name="size_shirt">
                                            @foreach($size_shirt as $value)
                                                @if(in_array($value->id,$arrtb_vl)!=null)
                                            <option title="S" value="{{$value->id}} " style="{{in_array($value->id,$arrtb_vl)?"":"display:none;margin-right:0px;overflow: hidden"}}">{{$value->name_arrtb_value}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @endif
                                        @if(($product_detail->cate_id)==11 || ($product_detail->cate_id)==12 )
                                            <h4>Size</h4>
                                            <select name="size_shirt">
                                                @foreach($size_short as $value)
                                                    @if(in_array($value->id,$arrtb_vl)!=null)
                                                        <option title="S" value="{{$value->id}} " style="{{in_array($value->id,$arrtb_vl)?"":"display:none;margin-right:0px;overflow: hidden"}}">{{$value->name_arrtb_value}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="quick-add-to-cart">
                                            <div class="quantity">
                                                <label>Quantity:</label>
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" style="" name="qty" type="text" value="1">
                                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div></div>
                                            </div>
                                            <button class="add-to-cart" type="submit">Add to cart</button>
                                        @if(Auth::guard('cus')->check())
                                            <?php
                                                if (isset(Auth::guard('cus')->user()->id))
                                                    {
                                                        $data1=DB::table("favorites")
                                                            ->where('product_id',$product_detail->id)->where("customer_id",Auth::guard('cus')->user()->id)
                                                            ->first();
                                                    }
                                            ?>
                                        @if(isset($data1))
                                            @if($data1->product_id == $product_detail->id)
                                                @endif
                                                @else
{{--                                                    <a href="{{route("customer.add.favorite",$product_detail->slug)}}" class="add-to-cart" type="submit">Favorite</a>--}}
                                                    <a href="javascript:void(0);" class="add-to-cart" onclick="addFavorite({{$product_detail->id}})" type="submit">Favorite</a>
                                                @endif
                                        @endif
{{--                                            <a href="{{asset("cart/add/".$product_detail->slug)}}" class="add-to-cart" type="submit">Add to cart</a>--}}

                                    </div>

                                    </form>
                                </div>
                            </div>
                            <!-- product-thumbnail-content end -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-info-review">
                <div class="row">
                    <div class="col">
                        <div class="product-info-detailed">
                            <div class="discription-tab-menu">
                                <?php
                                $count_reviews = DB::table("reviews")->where("product_id",$product_detail->id)->get();
                                ?>
                                <ul role="tablist" class="nav">
                                    <li class="active"><a href="#description" data-toggle="tab" class="active show">Description</a></li>
                                    <li><a href="#review" data-toggle="tab">Reviews ({{count($count_reviews)}})</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="discription-content">
                            <div class="tab-content">
                                <div class="tab-pane fade in active show" id="description">
                                    <div class="description-content">
                                        {!! $product_detail->description !!}
                                        @if(isset($technical))
                                        <h6 class="pt-4">Technical:</h6>
                                        <div class="col-md-6">
                                        <table class="table table-striped table-inverse">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>Speed:</th>
                                                <th>{{$technical->speed}}</th>
                                            </tr>
                                            <tr>
                                                <th>Incline:</th>
                                                <th>{{$technical->incline}}</th>
                                            </tr>
                                            <tr>
                                                <th>Running floor size:</th>
                                                <th>{{$technical->running_floor_size}}</th>
                                            </tr>
                                            <tr>
                                                <th>Size Product:</th>
                                                <th>{{$technical->size_pro}}</th>
                                            </tr>
                                            <tr>
                                                <th>Weight withstand:</th>
                                                <th>{{$technical->weight_withstand}}</th>
                                            </tr>
                                            <tr>
                                                <th>Weight product:</th>
                                                <th>{{$technical->weight}}</th>
                                            </tr>
                                            </thead>

                                        </table>
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <div id="review" class="tab-pane fade">
                                    <?php
//                                    Auth::guard('cus')->user()->email;
                                    ?>
                                        @if(Auth::guard('cus')->check())
                                    <form class="form-review" action="{{url("reviews/add/$product_detail->id/".Auth::guard('cus')->user()->id)}}" method="POST">
                                        @csrf
                                        @method("POST")
                                        <div class="review-wrap">
                                            <h2>Write a review</h2>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label class="control-label">Your Review</label>
                                                    <textarea class="form-control" required name="content"></textarea>
                                                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col">
                                                    <label class="control-label">Rating</label>
                                                    &nbsp;&nbsp;&nbsp; Bad&nbsp;
                                                    <input type="radio" value="1" name="number">
                                                    &nbsp;
                                                    <input type="radio" value="2" name="number">
                                                    &nbsp;
                                                    <input type="radio" value="3" name="number">
                                                    &nbsp;
                                                    <input type="radio" value="4" name="number">
                                                    &nbsp;
                                                    <input type="radio" value="5" name="number">
                                                    &nbsp;Good
                                                </div>
                                            </div>
                                        </div>
                                        <div class="buttons clearfix">
                                            <div class="pull-right">
                                                <button class="button-review" type="submit">Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                        @else
                                            <h5>Write Reviews? <a href="{{route("customer.login")}}" class="">Click here to login</a></h5>
                                        @endif
                                        <div class="form-review">
                                        <div class="review">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                <?php
                                                    $reviews = DB::table("reviews")->where("product_id",$product_detail->id)->orderby("updated_at","DESC")->limit(3)->get();
                                                    $reviews2 = DB::table("reviews")->where("product_id",$product_detail->id)->orderby("updated_at","DESC")->paginate(5);
                                                ?>

                                                @foreach($reviews2 as $value)
                                                    <tr>
                                                        <?php
                                                        $cus = DB::table("customers")->where("id",$value->customer_id)->first();
                                                        ?>
                                                        <td class="table-name"><strong>{{$cus->customer_name}}</strong>
                                                            @if($value->customer_id==isset(Auth::guard('cus')->user()->id))
                                                            <a href="{{asset("reviews/delete/$value->id")}}">(delete)</a></td>
                                                            @else

                                                            @endif
                                                        <td class="text-right">{{$value->created_at}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="rating-box">
                                                            <p>{{$value->content}}</p>

                                                            @if($value->number==1)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif($value->number==2)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif($value->number==3)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif($value->number==4)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @elseif($value->number==5)
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                </ul>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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

    <div class="product-area ptb-95">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="section-title-3">
                        <h2>Same Category:</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="product-active-3 owl-carousel owl-loaded owl-drag">
                    <?php
                        $product_cate = \DB::table("products")->where("status",2)->where("cate_id",$product_detail->cate_id)->limit(6)->get();
                    ?>
                    <div class="owl-stage-outer">
                        <div class="owl-stage" style="transform: translate3d(-1377px, 0px, 0px); transition: all 0s ease 0s; width: 5164px;">
                            @foreach($product_cate as $value)
                            <div class="owl-item cloned" style="width: 344.25px;">
                                <div class="col">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img class="primary-image" src="{{asset($value->avatar)}}" style="height: 300px!important;" alt="">
                                            </a>
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
                                                <?php
                                                    $cate_name = \DB::table("categories")->where("id",$value->cate_id)->first();
                                                ?>
                                                <div class="manufacturer"><a href="{{route("home.productCate",$cate_name->slug)}}">{{$cate_name->cate_name}}</a></div>
                                                @if(($value->sale_price)>1)
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($value->sale_price,2)}} $</span>
                                                        <span class="old-price">{{number_format($value->price,2)}} $</span>
                                                    </div>
                                                @else
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($value->price,2)}} $</span>
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
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="owl-nav">
                        <button type="button" role="presentation" class="owl-prev">
                            <i class="fa fa-angle-left"></i>
                        </button>
                        <button type="button" role="presentation" class="owl-next">
                            <i class="fa fa-angle-right"></i>
                        </button>
                    </div>
                    <div class="owl-dots disabled">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("script")
    <script >

        function addFavorite(slug) {
            $.ajax({
                url:"{{url("customer/add_favorite")}}/"+slug,
                method:"GET"
            }).done(function (response) {
                $("body").empty();
                $("body").html(response);
                alertify.success('Added to favorites!!');
            })
        }
    </script>
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
