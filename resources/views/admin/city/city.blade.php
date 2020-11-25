@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">City </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List City</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List City</h5>
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
                            <form action="{{route("admin.city.search")}}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="row">

                                    <div class="form-group col-md-3">
                                        <label for="">Name Area/Country</label>
                                        <select class="form-control" name="area_id" id="">
                                            <option value="">--choice--</option>
                                            @foreach($areas as $value)
                                            <option value="{{$value->id}}">{{$value->name_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Name City</label>
                                        <input type="text" class="form-control" name="name_city" id="" aria-describedby="helpId" placeholder="Enter Area">
                                    </div>
                                    <div class="form-group col-md-5" style="padding-top: 22px">
                                        <button type="submit" class="btn btn-primary" style="">Search</button>
                                         <a href="{{route("admin.city.index")}}" type="submit" class="btn btn-success" style="color: #fff">All City</a>
                                    </div>
                                </div>
                            </form>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name City</th>
                                <th scope="col">Area</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($city as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->name_city}}</td>
                                    <td>{{$value->Area->name_area}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{url("admin/city/edit/$value->slug")}}" class="badge badge-primary badge-pill">Edit</a>
                                        <a href="{{url("admin/city/delete/$value->slug")}}"  class="badge badge-danger badge-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $city->links() !!}
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add New City</h5>
                    <div class="card-body">
                        <form action="{{route("admin.city.save")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">City name*</label>
                                <input id="inputUserName" type="text" name="name_city" data-parsley-trigger="change" placeholder="Enter city name" autocomplete="off" class="form-control @error("name_city") is-invalid  @enderror">
                                @error("name_city")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Area*</label>
                                <select class="form-control" name="area_id" id="">
                                    @foreach($areas as $value)
                                    <option value="{{$value->id}}">{{$value->name_area}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status*</label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="custom-control custom-radio mr-3" >
                                            <input type="radio" class="custom-control-input is-valid" value="1" checked id="customControlValidation3" name="status" >
                                            <label class="custom-control-label" for="customControlValidation3">Show up</label>
                                        </div>
                                        <div class="custom-control custom-radio mf-3">
                                            <input type="radio" class="custom-control-input is-invalid" value="2" id="customControlValidation4" name="status" >
                                            <label class="custom-control-label" for="customControlValidation4">hide</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


