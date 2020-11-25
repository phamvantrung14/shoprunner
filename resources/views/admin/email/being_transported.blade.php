<div style="width: 100%;max-width: 600px;margin: 0 auto">
    <div style="height: 55px;background: #2F333A; padding: 10px">
        <img src="{{ $message->embed($pathToFile) }}" height="55px" alt="">
    </div>
    <h4>Hi: {{$name}}!</h4>
    <p>Your order is being shipped to the requested address, We will contact you soon...</p>
    <p>Thank you..!</p>
    <p style="font-weight: bold">Your order includes: </p>
    <table style="width: 100%;border-collapse:collapse; " >
        <thead class="thead-inverse">
        <tr style="border-bottom:1px solid gray;padding-bottom:5px;  ">
            <th style="width: 30%">Image Product</th>
            <th style="width: 20%">Name</th>
            <th style="width: 10%">Size</th>
            <th style="width: 20%">Qty</th>
            <th style="width: 20%">Price</th>
        </tr>
        </thead>
        <tbody  >
        @foreach($data as $value)
            <tr style="border-bottom:1px solid gray;padding-bottom:5px;padding-top:5px; ">
                <td scope="row"><img src="{{ $message->embed($value->Product->avatar)}}" width="100px" alt=""></td>
                <td style="text-align: center">{{$value->Product->pro_name}}</td>
                <?php
                if (isset($value->size)){
                    $data_size = DB::table("arrtibute_values")->where("id",$value->size)->first();
                }
                ?>
                @if(isset($data_size))
                    <td style="text-align: center">{{$data_size->name_arrtb_value}}</td>
                @else
                    <td></td>
                @endif
                <td style="text-align: center">{{$value->quantity}}</td>
                <td style="text-align: center">$ {{number_format($value->price * $value->quantity)}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" style="text-align: center">Total Products:</td>
            <td style="text-align: center;">{{count($data)}}</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">Total:</td>
            <td style="text-align: center;">$ {{number_format($total_price)}}</td>
        </tr>
        </tbody>
    </table>
</div>
