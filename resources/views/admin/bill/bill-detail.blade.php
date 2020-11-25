@extends("components.admin.layout")
@section("content")
<div class="container-fluid dashboard-content body mt-60 mb-60" >
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: grey">
            <div class="page-header">
                <div class="page-breadcrumb text-center pt-4">
                    <img src="{{url("backend")}}/images/logoadmin.png"  alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="background-color: #ffffff">
            <div class="page-header">
                <h2 class="pageheader-title pt-4 text-center">***** Payment Order *****</h2>
            </div>
            <div class="page-breadcrumb ">
                <table class="table">
                    <thead>
                    <tr>
                        <th width="50%" class=""><h4>Receiver: </h4></th>
                        <th class="text-right"><h4>{{$bill->order_name}}</h4></th>
                    </tr>
                    <tr>
                        <th width="50%" class=""><h4>Address: </h4></th>
                        <th class="text-right"><h4>{{$bill->address}} - {{$bill->City->name_city}} - {{$bill->City->Area->name_area}}</h4></th>
                    </tr>
                    <tr>
                        <th width="50%" class=""><h4>Email: </h4></th>
                        <th class="text-right"><h4>{{$bill->email}}</h4></th>
                    </tr>
                    <tr >
                        <th width="50%" class="">Payment: </th>
                        @if($bill->payment==1)
                            <th class="text-right">Online</th>
                        @else
                            <th class="text-right">COD</th>
                        @endif
                    </tr>
                </table>
            </div>
        </div>

    <table class="table" style="background-color: #ffffff">
        <thead>
        <tr>
            <th>##</th>
            <th>Name Products</th>
            <th>Quantity</th>
            <th>Size</th>
            <th>Unit Price</th>
            <th>Into Many</th>
        </tr>
        </thead>
        <tbody>
        @foreach($order_detail as $value)
            <?php

                $size = \DB::table("arrtibute_values")->where("id",$value->size)->first();
            ?>
        <tr>
            <td scope="row">{{$loop->index+1}}</td>
            <td>{{$value->Product->pro_name}}</td>
            <td>{{$value->quantity}}</td>
            @if(isset($size))
            <td>{{$size->name_arrtb_value }}</td>
            @else
                <td></td>
            @endif

            <td>{{$value->getPrice()}}</td>
            <td>{{$value->getPrice()}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4" class="text-center">Total Price</td>
            <td colspan="2" class="text-center">{{$bill->getTotalPrice()}}</td>
        </tr>
        </tbody>
    </table>
    </div>

</div>
<button onclick="window.print()">Print</button>

<style>
    table tbody tr td {
        font-size: 20px;
        line-height: 2.5;
    }
</style>
@endsection
