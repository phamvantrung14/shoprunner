@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">List's Account Admin</h2>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Arrtibutes Values</li>
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
                        <form action="{{route("admin.account.searchuser")}}" method="POST">
                            @method("POST")
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Email*</label>
                                        <input type="text"
                                               class="form-control" name="email" id="s_pro_name" aria-describedby="helpId"
                                               placeholder="Enter email search">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Role *</label>
                                        <select class="form-control" name="role" id="s_status">
                                            <option value="0">Close</option>
                                            <option value="1">Active</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5" style="padding-top: 25px">

                                        {{--                                            <label for="">Categories*</label>--}}
                                        <button type="submit"  class="btn btn-primary">Search</button>
                                        <a type="submit" href="{{route("admin.account.admin")}}" style="color: #fff;cursor: pointer" class="btn btn-success">All Users</a>
{{--                                        <a type="submit" href="{{route("admin.product.index")}}" style="color: #fff;cursor: pointer" class="btn btn-brand">Add New Products</a>--}}


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
                    <h5 class="card-header">List Arrtibutes Values</h5>
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
                                <th scope="col">Name Arrtibutes Values</th>
                                <th scope="col">Arrtibutes</th>
                                <th scope="col">User Role</th>
                                <th scope="col">Rolle</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $value)
                                <?php
                                $us_role = \DB::table("user_role")
                                    ->join("roles","roles.id","=","user_role.role_id")
                                    ->where("user_id",$value->id)
                                    ->select("name")->get();
                                ?>
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->user_name}}</td>
                                    <td>{{$value->email}}</td>
                                    <td>@foreach($us_role as $usr)
                                            {{$usr->name}},
                                        @endforeach
                                    </td>
                                    <td><span class="{{$value->getRole($value->role)['class']}}">
                                        {{$value->getRole($value->role)['name']}}</td>
                                    <td>
                                        <a href="{{url("admin/account/grant-right/$value->id")}}"  class="badge badge-success badge-pill">Grant Right</a>
                                        <a href="{{url("admin/account/delete/$value->id")}}"  class="badge badge-danger badge-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





