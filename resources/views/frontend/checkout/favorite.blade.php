
    <div class="body mt-4">
        <div class="col-md-12 content-order">
            <div class="header">
                <div class="row">
                    <h4>
                        Favorite products: <span style="padding-left: 15px"></span>
                    </h4>
                    <p class="status-h"></p>
                </div>
            </div>
            <div class="content">

                <table>
                    @foreach($products as $value)
                        <div class="col-md-12 pb-3 pt-3" style=" border-bottom: 1px solid rgba(204, 204, 204, 0.35)">
                            <div class="row">
                                <div class="col-md-9">
                                    <a href="{{url("/product-detail/{$value->slug}")}}"><img src="{{asset($value->avatar)}}" width="90px" alt=""></a>
                                    <span>{{$value->pro_name}}</span>
                                </div>
                                <div class="col-md-3 text-right ">
                                    <a href="{{route("customer.delete.favorite",$value->id)}}" class="add-to-cart" type="submit">Delete Favorites</a>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

