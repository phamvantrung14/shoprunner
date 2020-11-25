@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="content-wraper mt-95">
        <div class="container-fluid">
            @if(!Auth::guard('cus')->check())

                <div class="row">
                    <div class="col-lg-12 col-xl-10 offset-xl-1">
                        <!-- coupon-area start -->
                        <div class="coupon-area mb-60">
                            <div class="coupon-accordion">
                                <h3>Returning customer? <a href="{{route("customer.login")}}" class="">Click here to login</a></h3>
                            </div>
                        </div>
                        <!-- coupon-area end -->
                    </div>
                </div>
                <!-- checkout-area start -->
            @else
                <div class="container">
                    <div class="row">
                        <div class="row">
                            <a href="{{route("get.checkout")}}"  class="btn btn-secondary"  id="ship_home" style="margin-right: 15px;">Cash Payment</a>
                        </div>
                    </div>
                </div>

                <div class="checkout-area area2 ">
                    <div class="row ">
                        <div class="col-lg-12 mb-90">
                            <form action="{{route("post.checkout.pay")}}" method="POST">
                                <div class="row">
                                    <div class="col-lg-6 offset-xl-1 col-xl-5 col-sm-12">
                                        @if(session('error'))
                                            <div class="header">
                                                <div class="alert alert-danger">
                                                    {{session('error')}}
                                                </div>
                                            </div>
                                        @endif
                                        @csrf
                                        @method("POST")
                                        <div class="checkbox-form">
                                            <h3 class="shoping-checkboxt-title">Online Payment</h3>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Consignee's name<span class="required">*</span></label>
                                                        <input type="text" name="order_name" class="@error("order_name") is-invalid  @enderror">
                                                        @error("order_name")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="email" readonly value="{{Auth::guard('cus')->user()->email}}" name="email">
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Phone number</label>
                                                        <input type="number" class="@error("phone_number") is-invalid  @enderror" name="phone_number">
                                                        @error("phone_number")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-form-row">
                                                        <label>Nation <span class="required">*</span></label><br>
                                                        <select id="area_id1" name="area_id" style="width: 100%;height: 42px;border: 1px solid #e5e5e5;padding: 0 0 0 10px;">
                                                            <option value="">Select Nation...</option>
                                                            @foreach($areas as $value)
                                                                <option value="{{$value->id}}">{{$value->name_area}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>City <span class="required">*</span></label><br>
                                                        <select id="city_id1" name="city_id" style="width: 100%;height: 42px;border: 1px solid #e5e5e5;padding: 0 0 0 10px;">
                                                            @foreach($citys as $value)
                                                                <option value="{{$value->id}}">{{$value->name_city}}</option>
                                                            @endforeach
                                                        </select>
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input type="text" name="address" class="@error("address") is-invalid  @enderror" placeholder="House number and street name">
                                                        @error("address")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </p>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="single-form-row ">
                                                        <label>
                                                            <input type="hidden" name="payment"  value="1">Payments<span class="required">*</span></label><br>
                                                        <input type="text" value="VN Pay" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <p class="single-form-row m-0">
                                                        <label>Order notes</label>
                                                        <textarea cols="5" rows="2" name="note" class="checkout-mess" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6  col-xl-5 col-sm-12">
                                        <div class="checkout-review-order">

                                            <h3 class="shoping-checkboxt-title">Your order</h3>
                                            <table class="checkout-review-order-table">
                                                <thead>
                                                <tr>
                                                    <th class="t-product-name">Product</th>
                                                    <th class="product-total">Total</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($carts as $value)
                                                    <tr class="cart_item">
                                                        <td class="t-product-name">{{$value->name}}<strong class="product-quantity">× {{$value->qty}}</strong></td>
                                                        <td class="t-product-price"><span>{{number_format($value->price * $value->qty)}}</span></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span>{{\Cart::subtotal()}}</span></td>
                                                </tr>
                                                <tr class="shipping">
                                                    <th>Shipping</th>
                                                    <td>Free shipping</td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    <td><strong><span>${{\Cart::subtotal()}}</span></strong></td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <div class="checkout-payment">
                                                <div class="payment_methods">
                                                    <p><label>PayPal Express Checkout <a href="#"><img src="{{asset("frontend/img/icon/pp-acceptance-small.png")}}" alt=""></a></label></p>
                                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.</p>
                                                </div>
                                                <button class="button-continue-payment" type="submit">Continue to payment</button>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        @endif
        <!-- checkout-area end -->
        </div>
    </div>
    <style>
        .an{
            display: none;
        }
    </style>
@endsection
@section("script")
    <script>
        $(document).ready(function () {
            // alert("ok");
            $("#area_id").change(function (event) {
                var area =$(this).val();

                $.get("../ajaxfrontend/area/"+area,function (data) {
                    $("#city_id").html(data);
                })
            });
            $("#area_id1").change(function (event) {
                var area =$(this).val();

                $.get("../ajaxfrontend/area/"+area,function (data) {
                    $("#city_id1").html(data);
                })
            });


        })
    </script>
@endsection

