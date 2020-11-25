@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Store </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.store.index")}}" class="breadcrumb-link">List Store</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Store</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add Store</h5>
                    <div class="card-body">
                        <form action="{{route("admin.store.save")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputUserName">Store name*</label>
                                        <input id="inputUserName" type="text" name="name_store" data-parsley-trigger="change" placeholder="Enter store name" autocomplete="off" class="form-control @error("name_store") is-invalid  @enderror">
                                        @error("name_store")
                                        <span class="error invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputUserName">Code Store*</label>
                                        <input id="inputUserName" type="text" name="ma_store" data-parsley-trigger="change" placeholder="Enter code store" autocomplete="off" class="form-control @error("ma_store") is-invalid  @enderror">
                                        @error("ma_store")
                                        <span class="error invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Area*</label>
                                        <select class="form-control" name="area_id" id="area_id">
                                            <option>--choose--</option>
                                            @foreach($areas as $value)
                                                <option value="{{$value->id}}">{{$value->name_area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">City*</label>
                                        <select class="form-control" name="city_id" id="city_id">
                                            @foreach($citys as $value)
                                                <option value="{{$value->id}}">{{$value->name_city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputUserName">Address*</label>
                                        <input id="inputUserName" type="text" name="address" data-parsley-trigger="change" placeholder="Enter address store" autocomplete="off" class="form-control @error("address") is-invalid  @enderror">
                                        @error("address")
                                        <span class="error invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputUserName">Number phone*</label>
                                        <input id="inputUserName" type="number" name="phone" data-parsley-trigger="change" placeholder="Enter phone store" autocomplete="off" class="form-control @error("phone") is-invalid  @enderror">
                                        @error("phone")
                                        <span class="error invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Status*</label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="custom-control custom-radio mr-3" >
                                            <input type="radio" class="custom-control-input is-valid" value="2" checked id="customControlValidation3" name="status" >
                                            <label class="custom-control-label" for="customControlValidation3">Show up</label>
                                        </div>
                                        <div class="custom-control custom-radio mf-3">
                                            <input type="radio" class="custom-control-input is-invalid" value="1" id="customControlValidation4" name="status" >
                                            <label class="custom-control-label" for="customControlValidation4">hide</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <a href="{{route("admin.store.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Cancel</a>

                            </p>
                        </form>
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
                $.get("../ajax/area/"+area,function (data) {
                    $("#city_id").html(data);
                })
            })
        })
    </script>
@endsection

