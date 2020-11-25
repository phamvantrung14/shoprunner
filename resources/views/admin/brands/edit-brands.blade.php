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
                                <li class="breadcrumb-item"><a href="{{route("admin.brand.index")}}" class="breadcrumb-link">List Brands</a></li>
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
                    <h5 class="card-header">Edit Brand {{$brand->brand_name}}</h5>
                    <div class="card-body">
                        <form action="{{route("admin.brand.update",["id"=>$brand->id])}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="inputUserName">Brand name*</label>
                                <input id="inputUserName" type="text" name="brand_name" data-parsley-trigger="change" required="" value="{{$brand->brand_name}}" autocomplete="off" class="form-control @error("brand_name") is-invalid  @enderror">
                                @error("brand_name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                <a href="{{route("admin.brand.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Cancel</a>

                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


