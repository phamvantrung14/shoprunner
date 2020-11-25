@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Order Detail</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Order Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Orders: </h5>

                        @if(session('success'))
                            <div class="header">
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="header">
                                <div class="alert alert-danger">
                                    {{session('error')}}
                                </div>
                            </div>
                        @endif

                        <div class="card-body">
                            <table class="table table-striped table-inverse ">
                                <thead class="thead-inverse">
                                <tr>
                                    <th>Receiver: </th>
                                    <th>{{$order_find->order_name}}</th>
                                </tr>
                                <tr>
                                    <th>Email: </th>
                                    <th>{{$order_find->email}}</th>
                                </tr>
                                <tr>
                                    <th>Address: </th>
                                    <th>{{$order_find->address}}</th>
                                </tr>
                                <tr>
                                    <th>Phone number: </th>
                                    <th>{{$order_find->phone_number}}</th>
                                </tr>
                                <tr>
                                    <th>City: </th>
                                    <th>{{$order_find->City->name_city}}</th>
                                </tr>
                                <tr>
                                    <th>Contry: </th>
                                    <th>{{$order_find->City->Area->name_area}}</th>
                                </tr>
                                <tr>
                                    <th>Payment: </th>
                                    @if($order_find->payment==1)
                                    <th>Online</th>
                                    @else
                                        <th>COD</th>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Status: </th>
                                    <th><span class="{{$order_find->statusOrder($order_find->status)['class']}}">
                                            {{$order_find->statusOrder($order_find->status)['name']}}</span></th>
                                </tr>
                                <tr>
                                    <th>Created at: </th>
                                    <th>{{$order_find->created_at}}</th>
                                </tr>
                                <tr>
                                    <th>Note: </th>
                                    <th>{{$order_find->note}}</th>
                                </tr>
                                </thead>
                            </table>

                        </div>

                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Update Status:</h5>
                    <div class="card-body">
                        <form action="{{url("admin/orders/order_detail/$order_find->id")}}" method="POST">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="">Status*</label>
                                <select class="form-control" name="status" id="">
                                    @if(($order_find->status)==0)
                                    <option value="0" {{($order_find->status)==0?"selected":""}}>Awaiting</option>
                                    <option value="1" {{($order_find->status)==1?"selected":""}}>Confirmed</option>
                                    <option value="2" {{($order_find->status)==2?"selected":""}}>Being transported</option>
                                    <option value="3" {{($order_find->status)==3?"selected":""}}>Complete</option>
                                    <option value="4" {{($order_find->status)==4?"selected":""}}>Cancel</option>
                                    @elseif(($order_find->status)==1)
                                        <option value="1" {{($order_find->status)==1?"selected":""}}>Confirmed</option>
                                        <option value="2" {{($order_find->status)==2?"selected":""}}>Being transported</option>
                                        <option value="3" {{($order_find->status)==3?"selected":""}}>Complete</option>
                                        <option value="4" {{($order_find->status)==4?"selected":""}}>Cancel</option>
                                    @elseif(($order_find->status)==2)
                                        <option value="2" {{($order_find->status)==2?"selected":""}}>Being transported</option>
                                        <option value="3" {{($order_find->status)==3?"selected":""}}>Complete</option>
                                        <option value="4" {{($order_find->status)==4?"selected":""}}>Cancel</option>
                                    @elseif(($order_find->status)==3)
                                        <option value="3" readonly="true" {{($order_find->status)==3?"selected":""}}>Complete</option>
                                    @elseif(($order_find->status)==4)
                                        <option value="4" readonly="true" {{($order_find->status)==4?"selected":""}}>Cancel</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            @if(($order_find->status)==3 || ($order_find->status)==1)
                                <a href="{{url("admin/orders/bill/$order_find->id")}}" class="btn btn-secondary">Print the invoice</a>
                            @endif
                            <a href="{{route("admin.orders")}}" class="btn btn-secondary">Back List Orders</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List's Order Product</h5>
                    <div class="card-body">
                        <table class="table table-striped">
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
                                <td colspan="2"  class="text-center">{{$order_find->getTotalPrice()}}</td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->



@endsection

