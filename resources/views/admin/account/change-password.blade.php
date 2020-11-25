@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Change Password Account Admin</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account admin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Account: {{$data->email}}</h5>
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
                        <form action="{{url("admin/account/change-password/$data->id")}}" id="basicform" method="POST" >
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Old password*</label>
                                <input id="inputipt" type="password"  name="password_old" data-parsley-trigger="change" value="" placeholder="Enter old password" autocomplete="off" class="form-control">

                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Enter your new password*</label>
                                <input id="inputipt" type="password"  name="password" data-parsley-trigger="change" value="" placeholder="Enter new password" autocomplete="off" class="form-control @error("password") is-invalid  @enderror">
                                @error("password")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputUserName">Password confirmation*</label>
                                <input id="inputipt" type="password"  name="password_cf" data-parsley-trigger="change" value="" placeholder="Enter confirm password" autocomplete="off" class="form-control @error("password_cf") is-invalid  @enderror">
                                @error("password_cf")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
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
@endsection
