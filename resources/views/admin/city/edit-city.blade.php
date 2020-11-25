@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Brands </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.city.index")}}" class="breadcrumb-link">Lists Brands</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Edit Brand {{$data->name_city}}</h5>
                    <div class="card-body">
                        <form action="{{url("admin/city/edit/$data->slug")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="inputUserName">Brand name*</label>
                                <input id="inputUserName" type="text" name="name_city" data-parsley-trigger="change" required="" value="{{$data->name_city}}" autocomplete="off" class="form-control @error("name_city") is-invalid  @enderror">
                                @error("name_city")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Area*</label>
                                <select class="form-control" name="area_id" id="">
                                    @foreach($areas as $value)
                                        <option value="{{$value->id}}" {{($value->id)==($data->area_id)?"selected":""}}>{{$value->name_area}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status*</label>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="custom-control custom-radio mr-3" >
                                            <input type="radio" class="custom-control-input is-valid" value="1" {{($data->status)==1?"checked":""}} id="customControlValidation3" name="status" >
                                            <label class="custom-control-label" for="customControlValidation3">Show up</label>
                                        </div>
                                        <div class="custom-control custom-radio mf-3">
                                            <input type="radio" class="custom-control-input is-invalid" value="2" {{($data->status)==2?"checked":""}} id="customControlValidation4" name="status" >
                                            <label class="custom-control-label" for="customControlValidation4">hide</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                <a href="{{route("admin.city.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Cancel</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




