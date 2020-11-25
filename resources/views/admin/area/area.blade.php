@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Areas </h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Area/Country</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List Areas</h5>
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
                            <form action="{{route("admin.area.search")}}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="row">
                                    <div class="form-group col-md-5">
                                        <label for="">Name Area/Country</label>
                                        <input type="text" class="form-control" name="name_area" id="" aria-describedby="helpId" placeholder="Enter Area">
                                    </div>
                                    <div class="form-group col-md-5" style="padding-top: 22px">
                                        <button type="submit" class="btn btn-primary" style="">Search</button>
{{--                                        <a type="submit" class="btn btn-success" style="color: #fff">All Area/Contry</a>--}}
                                    </div>
                                </div>
                            </form>

                            <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name Area</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($area as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->name_area}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{url("admin/area/edit/$value->slug")}}" class="badge badge-primary badge-pill">Edit</a>
                                        <a href="{{url("admin/area/delete/$value->slug")}}"  class="badge badge-danger badge-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $area->links() !!}
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add New Area</h5>
                    <div class="card-body">
                        <form action="{{route("admin.area.save")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Area name*</label>
                                <input id="inputUserName" type="text" name="name_area" data-parsley-trigger="change" required="" placeholder="Enter area name" autocomplete="off" class="form-control @error("name_area") is-invalid  @enderror">
                                @error("name_area")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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


