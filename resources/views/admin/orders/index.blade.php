@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">List's Order</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Order</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <form action="{{route("admin.order.search")}}" method="POST">
                            @csrf
                        <h5 class="text-muted">Awaiting</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">{{count($awaiting)}}</h1>
                        </div>
                            <input type="hidden" name="status" value="0">
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small text-success "></span><button class="badge badge-cyan badge-pill"  type="submit" style="border: 0px">Detail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <form action="{{route("admin.order.search")}}" method="POST">
                            @csrf
                            <h5 class="text-muted">Confirmed</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($confirmed)}}</h1>
                            </div>
                            <input type="hidden" name="status" value="1">
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small text-success"></span><button class="badge badge-indigo badge-pill" style="border: 0px">Detail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <form action="{{route("admin.order.search")}}" method="POST">
                            @csrf
                            <h5 class="text-muted">Being transported</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($beingTransported)}}</h1>
                            </div>
                            <input type="hidden" name="status" value="2">
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                                <span class="icon-circle-small  text-success "></span><button class="badge badge-secondary badge-pill" style="border: 0px">Detail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                <div class="card border-3 border-top border-top-primary">
                    <div class="card-body">
                        <form action="{{route("admin.order.search")}}" method="POST">
                            @csrf
                            <h5 class="text-muted">Complete</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{count($complete)}}</h1>
                            </div>
                            <input type="hidden" name="status" value="3">
                            <div class="metric-label d-inline-block float-right text-danger font-weight-bold">
                                <span class="icon-circle-small text-danger  "></span><button class="badge badge-success badge-pill " style="border: 0px">Detail</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end total orders  -->
            <!-- ============================================================== -->
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Function</h5>
                    <div class="card-body" style="padding-left: 0px;padding-right: 0px">
                        <form action="{{route("admin.order.search.city")}}" method="POST">
                            @method("POST")
                            @csrf
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="form-group col-md-2">
                                        <label for="">Area*</label>
                                        <select class="form-control" name="area_id" id="area_id">
                                            <option value="">--choice--</option>
                                            @foreach($areas as $value)
                                            <option value="{{$value->id}}">{{$value->name_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">City*</label>
                                        <select class="form-control" name="city_id" id="city_id">

                                            @foreach($citys as $value)
                                                <option value="{{$value->id}}">{{$value->name_city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Status *</label>
                                        <select class="form-control" name="status" id="s_status">
                                            <option value="0">Awaiting</option>
                                            <option value="1">Confirmed</option>
                                            <option value="2">Being transported</option>
                                            <option value="3">Complete</option>
                                            <option value="4">Cancel</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5" style="padding-top: 25px">
                                        <button type="submit"  class="btn btn-primary">Search</button>
                                        <a type="submit" href="{{route("admin.orders")}}" style="color: #fff;cursor: pointer" class="btn btn-success">All Orders</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List's Order</h5>
                    <div class="card-body">
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Receiver</th>
                                <th scope="col">Address</th>
                                <th scope="col">Area</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
{{--                                <th scope="col">Update Status</th>--}}

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
{{--                                    <th scope="row">{{$value->id}}</th>--}}
                                    <td>{{$value->order_name}}<br>
                                        (<span style="font-size: 12px">Total: {{$value->getTotalPrice()}}</span>)
                                    </td>
                                    <td>{{$value->address}}</td>
                                    <td>(<span style="font-size: 12px">{{$value->City->name_city}}</span>) - {{$value->City->Area->name_area}}</td>
                                    <td>
                                        <span class="{{$value->statusOrder($value->status)['class']}}">
                                            {{$value->statusOrder($value->status)['name']}}</span>
                                    </td>
                                    <td>
{{--                                        <a style="color: #fff;cursor: pointer" onclick="modalOrder({{$value->id}})" data-toggle="modal" data-target="#exampleModalCenter" class="badge badge-success badge-pill">Check</a>--}}
                                        <a style="color: #fff;cursor: pointer" href="{{asset("admin/orders/order_detail/$value->id")}}" class="badge badge-success badge-pill">Check</a>
                                        <a href="{{url("admin/orders/delete_order/$value->id")}}" class="badge badge-danger badge-pill">Delete</a>

                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        {!! $order->links() !!}
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 650px!important;" role="document">
                    <div class="modal-content" >

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->

@endsection
@section("script")
    <script>
        function modalOrder(id) {
            $.ajax({
                url:"{{url("admin/ajax/order_detail")}}/"+id,
                method:"GET",
            }).done(function (response) {
                $(".modal-dialog .modal-content ").empty();
                $(".modal-dialog .modal-content ").html(response);
            })
        }
        $(document).ready(function () {
            $(".upstatus").change(function (event) {
                var id= $(".id_order_input").val();
                var status = $(this).val();
                alert(id);
                // var area =$(this).val();
                // $.get("../ajax/area/"+area,function (data) {
                //     $("#city_id").html(data);
                // })
            })
        })
        $(document).ready(function () {
            $("#area_id").change(function (event) {
                var area =$(this).val();
                $.get("../../admin/ajax/area/"+area,function (data) {
                    $("#city_id").html(data);
                })
            })
        })
    </script>
@endsection
