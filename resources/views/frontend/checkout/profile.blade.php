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
                            </i>  My Account</a></li>
                    <li class="list-group-item1">
                        <a href="{{url("customer/purchase-order/")."/".Auth::guard('cus')->user()->id}}">
                        <i class="fa fa-book" aria-hidden="true" style="color: blue; padding-right: 5px">
                        </i> Purchase Order</a></li>
                    <li class="list-group-item1">
{{--                        <a href="{{route("customer.favorite.index",Auth::guard('cus')->user()->id)}}"><i class="fas fa-star" aria-hidden="true" style="color: green; padding-right: 5px"></i> Favorite</a>--}}
                        <a href="javascript:void(0);" onclick="getFavorite({{Auth::guard('cus')->user()->id}})"><i class="fas fa-star" aria-hidden="true" style="color: green; padding-right: 5px"></i> Favorite</a>

                    </li>
                </ul>
            </div>
            <div class="col-md-9 content-order-account">

                <div class="body mt-4">
                    <div class="col-md-12 content-order">
                        <div class="header">
                            <div class="row">
                                <h5>
                                    My Profile
                                </h5>
                            </div>
                        </div>
                        <div class="content">
                            <form class="" action="{{url("customer/profile/$data->id")}}" method="post" id="contactForm" novalidate="novalidate" enctype="multipart/form-data">
                                @csrf
                                @method("POST")
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group col-md-12">
                                            <label for="first" style="padding-right: 10px">Email *</label>
                                            <span>{{$data->email}}</span>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="company">User Name *</label>
                                            <input type="text" class="form-control" id="company" name="customer_name" value="{{$data->customer_name}}" placeholder="Nhập tên người dùng">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="address">Address *</label>
                                            <input type="text" class="form-control" id="address" required value="{{$data->address}}" name="address" placeholder="Nhập địa chỉ">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="address">Phone Number *</label>
                                            <input type="text" class="form-control" id="address" required value="{{$data->phone_number}}" name="phone_number" placeholder="Nhập SĐT">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">

                                            <div class="card-md " >
                                                <img src="{{asset(Auth::guard('cus')->user()->getImage())}}" width="200px" class="card-img-top" alt="...">
                                                <div class="card-body mt-3">
                                                    <input href="#" type="file" name="image" class="" placeholder="Image">
                                                    <p>Choose Photo</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

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
        .col-md-4 .row .card-md img{
            border-radius: 50%;
            margin: 0px 25%;
            width: 100px;
        }
    </style>

@endsection
@section("script")
    <script>
        function getFavorite(customer) {
            $.ajax({
                url:"{{url("customer/favorite")}}/"+customer,
                method:"GET",
            }).done(function (response) {
                $(".content-order-account ").empty();
                $(".content-order-account").html(response);
            })
        }
    </script>
@endsection
