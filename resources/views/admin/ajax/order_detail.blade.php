<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Receiver: {{$order_find->Order->order_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body body1">
        <table class="table">
            <thead>
            <tr>
                <th>Avatar</th>
                <th>Name Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order_detail as $value)
                <tr>
                    <td><img src="{{asset($value->Product->getAvatar())}}" width="100px" alt=""></td>
                    <td>{{$value->Product->pro_name}}</td>
                    <td>{{$value->quantity}}</td>
                    <td>{{$value->getPrice()}}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="2" class="text-center">Total Price:</td>
                    <td colspan="2"  class="text-center">{{$order_find->Order->getTotalPrice()}}</td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="modal-footer">
        <div class="btn-group">
            <button type="button" class="badge badge-brand badge-pill">Action</button>
            <button type="button" class="badge badge-brand badge-pill dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{asset("admin/orders/status/0/{$order_find->Order->id}")}}" >Awaiting</a>
                <a class="dropdown-item" href="{{asset("admin/orders/status/1/{$order_find->Order->id}")}}">Confirmed</a>
                <a class="dropdown-item" href="{{asset("admin/orders/status/2/{$order_find->Order->id}")}}">Being transported</a>
                <a class="dropdown-item" href="{{asset("admin/orders/status/3/{$order_find->Order->id}")}}">Complete</a>
                <a class="dropdown-item" href="{{asset("admin/orders/status/4/{$order_find->Order->id}")}}">Cancel</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Separated link</a>
            </div>
        </div>

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
