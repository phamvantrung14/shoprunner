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
            <div class="row">
                <div class="col-12">

                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="plantmore-product-remove">remove</th>
                                    <th class="plantmore-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="plantmore-product-price">Unit Price</th>
                                    <th class="plantmore-product-quantity">Size/Quantity</th>
                                    <th class="plantmore-product-quantity">Update</th>
                                    <th class="plantmore-product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($shopping as $key=> $value)
                                <tr>
{{--                                    {{asset("cart/delete/$key")}}--}}

{{--                                    <td class="plantmore-product-remove"><a href="{{asset("cart/delete/$key")}}" ><i class="fa fa-times"></i></a></td>--}}
                                    <td class="plantmore-product-remove"><a  ><i class="fa fa-times" data-id="{{$key}}"></i></a></td>
                                    <td class="plantmore-product-thumbnail"><a href="#"><img width="100px" src="{{asset($value->options->avatar)}}" alt=""></a></td>
                                    <td class="plantmore-product-name"><a href="#">{{$value->name}}<br></a></td>
                                    <td class="plantmore-product-price"><span class="amount">{{$value->price}}</span></td>
                                    <form action="{{url("cart/update/$key")}}" method="GET">
                                        <input type="hidden" value="{{$value->options->avatar}}" name="avatar">
                                        <input type="hidden" value="{{$value->options->cate}}" name="cate">
                                        @csrf
                                        @method("GET")
                                        <td class="plantmore-product-quantity " style="width: 260px;padding-right: 0px;padding-left: 0px">
                                            <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    @if(($value->options->cate==7)||($value->options->cate==8))
                                                    <?php
                                                    $arrtb_vl = \DB::table('product_arrtibutes')->where("product_id",$value->id)->pluck("arrtibute_value_id")->toArray();
                                                    ?>
                                                    <select class="form-control selectt2" required name="size" id="">
                                                        <option value="null">Size</option>
                                                    @foreach($size_shirt as $value1)
                                                        <option value="{{$value1->id}}" {{($value1->id==$value->options->size)?"selected":""}}  style="{{in_array($value1->id,$arrtb_vl)?"":"display:none;"}}">{{$value1->name_arrtb_value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                        @if(($value->options->cate==11)||($value->options->cate==12))
                                                            <?php
                                                            $arrtb_vl = \DB::table('product_arrtibutes')->where("product_id",$value->id)->pluck("arrtibute_value_id")->toArray();
                                                            ?>
                                                            <select class="form-control selectt" name="size" id="">
                                                                <option value="null">Size</option>
                                                            @foreach($size_short as $value1)
                                                                    <option value="{{$value1->id}}" {{($value1->id==$value->options->size)?"selected":""}}  style="{{in_array($value1->id,$arrtb_vl)?"":"display:none;"}}">{{$value1->name_arrtb_value }}</option>
                                                                @endforeach
                                                            </select>
                                                        @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <input value="{{$value->qty}}" class="form-control" name="qty" style="width: 100%" type="number">

                                                </div>

                                            </div>
                                            </div>
                                    </td>
                                        <td><button type="submit" class="btn btn-account">Update</button></td>
                                    </form>
                                    <td class="product-subtotal"><span class="amount">${{number_format($value->price * $value->qty)}}</span></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Cart totals</h2>
                                    <ul>
                                        <li>Subtotal <span>${{\Cart::subtotal(00)}}</span></li>
                                        <li>Total <span>${{\Cart::subtotal(00)}}</span></li>
                                    </ul>
                                    <a id="sub" href="{{route("get.checkout")}}">Proceed to checkout</a>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
<script>
    $(function () {
        $("#sub").click(function (event) {
            var select = $(".plantmore-product-quantity .form-control.selectt").val();
            var select2 = $(".plantmore-product-quantity .form-control.selectt2").val();
            if (select=="null"){
                $(this).attr("href","");
                alert("Please choose the size for product..!");
            }else if (select2=="null")
            {
                $(this).attr("href","");
                alert("Please choose the size for product..!");
            }


        })
        $(".plantmore-product-remove a i").click(function () {
            var id = $(this).data("id");
            // alert(id);
            $.ajax({
                url: "{{url("cart/delete")}}/" + id,
                type: 'GET',
            }).done(function (response) {
                $("body").empty();
                $("body").html(response);
                alertify.success('Successfully deleted the product !!');
            })
        })
    })
</script>

@endsection
