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
                                <li class="breadcrumb-item"><a href="{{route("admin.area.index")}}" class="breadcrumb-link">List Area/Country</a></li>
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
                    <h5 class="card-header">Edit Brand {{$data->name_area}}</h5>
                    <div class="card-body">
                        <form action="{{url("admin/area/edit/$data->slug")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="inputUserName">Brand name*</label>
                                <input id="inputUserName" type="text" name="name_area" data-parsley-trigger="change" required="" value="{{$data->name_area}}" autocomplete="off" class="form-control @error("name_area") is-invalid  @enderror">
                                @error("name_area")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                <a href="{{route("admin.area.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Cancel</a>

                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



