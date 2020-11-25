@extends("components.frontend.layout")
@section("content")
    <div class="container mt-5 mb-5" style="">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item1 " aria-disabled="true">
                        <img src="{{asset(Auth::guard('cus')->user()->getImage())}}" width="50px" alt="">
                        <span>{{Auth::guard('cus')->user()->customer_name}}</span>
                    </li>
                    <li class="list-group-item1">
                        <a href="{{route("customer.profile",['customer'=>Auth::guard('cus')->user()->id])}}">
                            <i class="fas fa-user-circle" aria-hidden="true" style="color: red;padding-right: 5px">
                            </i>  My Account</a>
                    </li>
                    <li class="list-group-item1">
                        <a href=""><i class="fa fa-book" aria-hidden="true" style="color: blue; padding-right: 5px"></i> Purchase Order</a>
                    </li>
                    <li class="list-group-item1">
{{--                        <a href="{{route("customer.favorite.index",Auth::guard('cus')->user()->id)}}"><i class="fas fa-star" aria-hidden="true" style="color: green; padding-right: 5px"></i> Favorite</a>--}}
                        <a href="javascript:void(0);" onclick="getFavorite({{Auth::guard('cus')->user()->id}})"><i class="fas fa-star" aria-hidden="true" style="color: green; padding-right: 5px"></i> Favorite</a>
                    </li>

                </ul>
            </div>
            <div class="col-md-9 content-order-account">
                <div class="menu">
                    <ul class=" menu-ul nav nav-pills nav-fill" style="padding-top: 10px;padding-bottom: 10px">
                        <li class="nav-item nav-item-a">
                            <a class="nav-link nav-donmua active1" onclick="orderAll({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">All</a>
                        </li>
                        {{--                    {{route("customer.donmua.choxacnhan",["customer"=>Auth::guard('cus')->user()->id])}}--}}
                        <li class="nav-item">
                            <a class="nav-link nav-donmua" onclick="orderDangCho({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Wait For Confirmation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-donmua" onclick="orderLayHang({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);" >Confirm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-donmua" onclick="orderDangGiao({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Delivery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-donmua" onclick="orderHoanThanh({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Conplete</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-donmua" onclick="orderDaHuy({{Auth::guard('cus')->user()->id}});" href="javascript:void(0);">Cancel</a>
                        </li>
                    </ul>
                </div>
                <div class="body1">
                    @foreach($order as $value)
                        <div class="body mt-4">
                            <div class="col-md-12 content-order">
                                <div class="header">
                                    <div class="row">
                                        <h4>
                                            Receiver: <span style="padding-left: 15px">{{$value->order_name}}</span>
                                        </h4>
                                        <p class="status-h">{{$value->getStatus()}}</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <?php
                                        $order_detail = DB::table("order_detail")
                                            ->join('products', 'product_id', '=', 'products.id')
                                            ->join('orders', 'orders.id', '=', 'order_id')
                                            ->where("order_id",$value->id)->get();
                                    ?>
                                    <table>
                                        @foreach($order_detail as $value1)
                                            <div class="col-md-12 pb-3 pt-3" style=" border-bottom: 1px solid rgba(204, 204, 204, 0.35)">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <a href=""><img src="{{asset($value1->avatar)}}" width="90px" alt=""></a>
                                                        <span>{{$value1->pro_name}}</span>
                                                    </div>
                                                    <div class="col-md-3 text-right">
                                                        <p>$ {{number_format($value1->price,2)}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <tr>
                                            <td>Total Price:</td>
                                            <td>{{$value->getTotalPrice()}}</td>
                                        </tr>
                                    </table>
                                    @if($value->status==0 || $value->status==1)
                                        <input type="hidden" name="status" id="sthuydon" value="4" >
                                        <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">
                                        <button type="button" onclick="clickHuyDon({{$value->id}});" class="btn btn-info mt-2">Cancel</button>
                                @endif

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <hr>

            </div>
        </div>
    </div>
    <style>
        body{
            background-color: #F5F5F5;
        }

        .content-order-account .menu{
            margin-top: 30px !important;
            background-color: white;
            /*border: 1px solid gray;*/
        }
        .content-order-account .menu a{
            color: #1b4b72;
        }
        .content-order-account .body .content-order{
            background-color: white;
        }
        .body .content-order .header{
            color: #555;
            padding: 20px;
            position: relative;
            border-bottom: 1px solid rgba(204, 204, 204, 0.35);
        }
        .body .content-order .header h4{
            margin: 0;
            font-size: 15px;
            font-weight: bold;
            color: #111;
        }
        .content-order .header .status-h{
            position: absolute;
            top: 20px;
            right: 15px;
            list-style: none;
            color: rgba(227, 74, 13, 0.93);
        }
        .list-group-item1{
            position: relative;
            display: block;
            padding: .75rem 1.25rem;
            margin-bottom: -1px;
            /*background-color: #fff;*/
            /*border: 1px solid rgba(0,0,0,.125);*/
        }
        .list-group-item1 a{
            color: gray;
        }
        .list-group-item1 img{
            width: 50px;
            margin-right: 15px;
            border-radius: 50%;
        }
        .active1{
            color: red;
            /*border-bottom: red;*/
        }
        .nav-item-a{
            border-bottom: 3px solid #e55430;
        }
        .nav-pills .nav-link.active1, .nav-pills .show>.nav-link {
            color: #e55430;
            /*border-bottom: #e55430;*/
            /*text-decoration: underline;*/
            /*background-color: #ff00a1;*/
        }
        .btn-1{
            display: inline;
            padding: .2em .6em .3em;
            font-size: 75%;
            font-weight: bold;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            /*border-radius: .25em;*/
            border: 0px;
        }
        .btn-ct {
            color: #fff;
            background-color: #17a2b8;

        }
        .btn-ct:hover{
            color: #fff;
            background-color: #138496;

        }
        .content-order .content{
            padding-top: 10px;
            padding-bottom: 20px;
        }
    </style>

@endsection
@section("script")
    <script type="text/javascript">
        $(function () {
            $(".nav-donmua").click(function (event) {
                $(".menu-ul .nav-donmua").removeClass("active1");
                $(this).addClass("active1");

            })
        })
        $(function () {
            $(".nav-item").click(function (event) {
                $(".menu-ul .nav-item").removeClass("nav-item-a");
                $(this).addClass("nav-item-a");


            })
        })
        function orderAll(customer) {
            $.ajax({
                url:"{{url("ajaxfrontend/orderall")}}/"+customer,
                method:"GET",
            })
                .done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
            })
        }
        function orderDangCho(customer) {
            $.ajax({
                url:"{{url("ajaxfrontend/awaiting")}}/"+customer,
                method:"GET",
            })
                .done(function (response) {
                    // console.log(response);
                    $(".content-order-account .body1").empty();
                    $(".content-order-account .body1").html(response);
                })
        }
        function orderLayHang(customer) {
            $.ajax({
                url:"{{url("ajaxfrontend/confirmed")}}/"+customer,
                method:"GET",
            })
                .done(function (response) {
                    // console.log(response);
                    $(".content-order-account .body1").empty();
                    $(".content-order-account .body1").html(response);
                })
        }
        function orderDangGiao(customer) {
            $.ajax({
                url:"{{url("ajaxfrontend/beingtransported")}}/"+customer,
                method:"GET",
            })
                .done(function (response) {
                    // console.log(response);
                    $(".content-order-account .body1").empty();
                    $(".content-order-account .body1").html(response);
                })
        }
        function orderHoanThanh(customer) {
            $.ajax({
                url:"{{url("ajaxfrontend/complete")}}/"+customer,
                method:"GET",
            })
                .done(function (response) {
                    // console.log(response);
                    $(".content-order-account .body1").empty();
                    $(".content-order-account .body1").html(response);
                })
        }
        function orderDaHuy(customer) {
            $.ajax({
                url:"{{url("ajaxfrontend/cancel")}}/"+customer,
                method:"GET",
            })
                .done(function (response) {
                    // console.log(response);
                    $(".content-order-account .body1").empty();
                    $(".content-order-account .body1").html(response);
                })
        }
        function getFavorite(customer) {
            $.ajax({
                url:"{{url("customer/favorite")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                $(".content-order-account ").empty();
                $(".content-order-account").html(response);
            })
        }
        function clickHuyDon(id) {
            var _status = $("#sthuydon").val();
            var token = $("#token").val();
            console.log(token);
            $.ajax({
                url:"{{url("customer/huydon")}}/"+id,
                method:"GET",
                data:{
                    status :_status,
                    _token:token,
                    _method: "GET"
                }
            }).done(function (response) {
                // console.log(response);
                $(".content-order-account .body1").empty();
                $(".content-order-account .body1").html(response);
                alertify.success('Order canceled successfully!!');
            })
        }
    </script>


@endsection
