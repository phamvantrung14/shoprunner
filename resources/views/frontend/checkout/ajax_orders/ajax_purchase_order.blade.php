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
                        <td>Tổng Tiền:</td>
                        <td>{{$value->getTotalPrice()}}</td>
                    </tr>
                </table>
                @if($value->status==0 || $value->status==1)
                    <input type="hidden" name="status" id="sthuydon" value="4" >
                    <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">
                    <button type="button" onclick="clickHuyDon({{$value->id}});" class="btn btn-info mt-2">Hủy</button>
                @endif

            </div>
        </div>
    </div>
@endforeach
