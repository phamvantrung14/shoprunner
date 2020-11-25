@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Account Info</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.account.admin")}}" class="breadcrumb-link">List Account</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account info</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Account: {{$data->email}}</h5>
                                    <div class="card-body">
                                        <table class="table table-striped table-inverse ">
                                            <thead class="thead-inverse">
                                            <tr>
                                                <th>User Name: </th>
                                                <th>{{$data->user_name}}</th>
                                            </tr>
                                            <tr>
                                                <th>Phone number: </th>
                                                @if($data->phone_number!=null)
                                                <th>{{$data->phone_number}}</th>
                                                @else
                                                    <th>Updating...</th>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Address: </th>
                                                @if($data->address!=null)
                                                    <th>{{$data->address}}</th>
                                                @else
                                                    <th>Updating...</th>
                                                @endif
                                            </tr>
                                            <tr>
                                                <th>Grant Right: </th>
                                                <th>
                                                    <span class="{{$data->getRole($data->role)['class']}}">
                                                            {{$data->getRole($data->role)['name']}}
                                                    </span>
                                                </th>
                                            </tr>
                                            </thead>
                                        </table>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Update information:</h5>
                                    <div class="card-body">
                                        <form action="{{url("admin/account/info/$data->id")}}" id="basicform" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method("PUT")
                                            <div class="form-group">
                                                <label for="inputUserName">Phone number:*</label>
                                                <input  type="number"  name="phone_number" data-parsley-trigger="change" value="{{$data->phone_number?$data->phone_number:""}}" placeholder="Enter phone number" autocomplete="off" class="form-control @error("phone_number") is-invalid  @enderror">
                                                @error("phone_number")
                                                <span class="error invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUserName">Address:*</label>
                                                <input  type="text"  name="address" data-parsley-trigger="change" value="{{$data->address?$data->address:""}}" placeholder="Enter address" autocomplete="off" class="form-control @error("address") is-invalid  @enderror">
                                                @error("address")
                                                <span class="error invalid-feedback">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="inputUserName">Avatar*</label>
                                                <input id="inputipt" type="file" name="image" data-parsley-trigger="change" autocomplete="off" class="form-control">
                                            </div>
                                            <p class="text-left">
                                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Avatar Account</h5>
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
                                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{$data->getImage()}}" style="height: 350px!important;" alt="First slide">
                                            <div class="carousel-caption d-none d-md-block">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body border-top">
                                <h3>Action*</h3>
                                <p class="text-left">
                                    <a href="{{route("admin.account.admin")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Back</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

