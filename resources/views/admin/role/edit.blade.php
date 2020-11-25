@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Roller </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Permission</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" ng-app="role">
                <div class="card">
                    <h5 class="card-header">Edit Permission</h5>
                    <div class="card-body">
                        <form action="{{route("admin.roles.update",$data->id)}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Ten nhom quyen*</label>
                                <input id="inputUserName"  type="text" name="name" value="{{$data->name}}"  required="" placeholder="Enter ten nhom quyen" autocomplete="off" class="form-control @error("name") is-invalid  @enderror">
                                @error("name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="height: 300px; overflow-y: auto;">
                                @foreach($route as $value)
                                <div class="form-check" >
                                    <label class="form-check-label">
                                        <input type="checkbox"   class="form-check-input role-item" name="route[]" {{in_array($value,$permissions)?"checked":""}} id="" value="{{$value}}">{{$value}}

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
{{--    <script type="text/javascript" src="{{asset("angular/angular.min.js")}}"></script>--}}
    <script type="text/javascript">
        {{--var app = angular.module('role',[]);--}}
        {{--app.controller('roleController',function ($scope) {--}}
        {{--    var roles = '<?php echo json_encode($route);?>';--}}
        {{--    var permissions = '<?php echo json_encode($permissions);?>';--}}
        {{--    $scope.roles = angular.fromJson(roles);--}}
        {{--    $scope.role = angular.fromJson(permissions);--}}

        {{--    $scope.set_cheked = function (r) {--}}

        {{--        for (var i = 0; i <$scope.role.length; i++)--}}
        {{--        {--}}
        {{--            if($scope.role[i] == r)--}}
        {{--            {--}}
        {{--                return true;--}}
        {{--            }--}}

        {{--        }--}}
        {{--        return false;--}}
        {{--    }--}}

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
