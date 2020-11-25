@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">List's Account Admin</h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
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
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
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
                            <form action="{{url("admin/account/grant-right/$data->id")}}" id="basicform" method="POST" >
                                @csrf
                                @method("POST")
                                <div class="form-group">
                                    <label for="inputUserName">Email*</label>
                                    <input id="inputipt" type="text"  readonly="true" data-parsley-trigger="change" value="{{$data->email}}" placeholder="Enter Arrtibute values name" autocomplete="off" class="form-control">

                                </div>
                                <div class="form-group">
                                    <label for="">Grant Right*</label>
                                    <select class="form-control" name="role" id="arrtb_id">
                                            <option value="0" {{($data->role==0)?"selected":""}}>Close</option>
                                            <option value="1"  {{($data->role==1)?"selected":""}}>Active</option>
                                    </select>
                                </div>

                                @foreach($role as $value)
                                    <?php
                                        $checked = in_array($value->name,$role_assignments)?'checked':'';
                                    ?>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox"{{$checked}} class="form-check-input" name="role2[]" id=""
                                               value="{{$value->id}}" >{{$value->name}}
                                    </label>
                                </div>
                                @endforeach

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






