@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">List Stores </h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Stores</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Function</h5>
                    <div class="card-body" style="padding-left: 0px;padding-right: 0px">
                        <form action="{{route("admin.store.search")}}" method="POST">
                            @method("POST")
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Name Store*</label>
                                        <input type="text"
                                               class="form-control" name="name_store" id="s_pro_name" aria-describedby="helpId"
                                               placeholder="Enter Name Product">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Status *</label>
                                        <select class="form-control" name="status" id="s_status">
                                            <option value="2">Show Up</option>
                                            <option value="1">Hidden</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Area*</label>
                                        <select class="form-control" name="area_id" id="area_id">
                                            <option value="">--choice--</option>
                                            @foreach($area as $value)
                                            <option value="{{$value->id}}">{{$value->name_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">City*</label>
                                        <select class="form-control" name="city_id" id="city_id">
                                            @foreach($city as $value)
                                            <option value="{{$value->id}}">{{$value->name_city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2" style="padding-top: 25px">
                                        <button type="submit"  class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <a type="submit" href="{{route("admin.store.index")}}" style="color: #fff;cursor: pointer" class="btn btn-success">All Store</a>
                                <a type="submit" href="{{route("admin.store.add")}}" style="color: #fff;cursor: pointer" class="btn btn-brand">Add New Store</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List Stores</h5>
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
                                <th scope="col">Name Store</th>
                                <th scope="col">City/Area</th>
                                <th scope="col">Status</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>

                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($store as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->name_store}}<br>
                                        ({{$value->ma_store}})
                                    </td>
                                    <td>{{$value->City->name_city}} - {{$value->City->area->name_area}}</td>
                                    <td><span class="{{$value->getStatus1($value->status)['class']}}">
                                            {{$value->getStatus1($value->status)['name']}}</span></td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->phone}}</td>
                                    <td>
                                        <a href="{{url("admin/stores/edit/$value->slug")}}" class="badge badge-primary badge-pill">Edit</a>
                                        <a href="{{url("admin/stores/delete/$value->slug")}}"  class="badge badge-danger badge-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        $(document).ready(function () {
            $("#area_id").change(function (event) {
                var area =$(this).val();
                $.get("../admin/ajax/area/"+area,function (data) {
                    $("#city_id").html(data);
                })
            })
        })
    </script>
@endsection



