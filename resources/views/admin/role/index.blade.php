@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Permission </h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lists Permission</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Lists Permission</h5>
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
                                <th scope="col">Name Category</th>
                                <th scope="col">Created_at</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->created_at}}</td>
                                    <td>
                                        <a href="{{route("admin.roles.edit",$value->id)}}" class="badge badge-primary badge-pill">Edit</a>
                                        <a href="{{url("admin/roles/delete/$value->id")}}" class="badge badge-danger badge-pill">Delete</a></td>
                                </tr>
                            @endforeach
                            <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" ng-app="role" ng-controller="roleController">
                <div class="card">
                    <h5 class="card-header">Add New Permission</h5>
                    <div class="card-body">
                        <form action="" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Name Permission*</label>
                                <input id="inputUserName"  type="text" name="name" data-parsley-trigger="change" required="" placeholder="Enter name permission" autocomplete="off" class="form-control @error("name") is-invalid  @enderror">
                                @error("name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="height: 300px; overflow-y: auto;">

                            @foreach($route as $value)
                            <div class="form-check" >
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input role-item" name="route[]" id="" value="{{$value}}">
                                    {{$value}}
                                </label>
                            </div>
                            @endforeach
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary" style="margin-right: 30px">Submit</button>
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="check-all"  >Check All
                                </label>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.0/angular.min.js"></script>--}}
    <script type="text/javascript">
        {{--var app = angular.module('role',[]);--}}
        {{--app.controller('roleController',function ($scope) {--}}
        {{--    var roles = '<?php echo json_encode($route);?>';--}}
        {{--    $scope.roles = angular.fromJson(roles);--}}

        {{--})--}}


        $('#check-all').click(function () {
            var isChecked = $(this).is(':checked');
            $('.role-item').not(this).prop('checked',this.checked);
            // if(isChecked)
            // {
            //     $('.role-item').attr('checked',true);
            // }else
            // {
            //     $('.role-item').attr('checked',false);
            // }
        })
    </script>
@endsection
