@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Arrtibutes Values </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.arrtb-vl.index")}}" class="breadcrumb-link">List Arrtibutes Values</a></li>
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
                    <h5 class="card-header">Edit Arrtibutes Values ({{$data->name_arrtb_value}})</h5>
                    <div class="card-body">
                        <form action="{{url("admin/arrtibute_values/edit/$data->id")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="form-group">
                                <label for="inputUserName">Arrtibutes values name*</label>
                                <input id="inputUserName" type="text" name="name_arrtb_value" data-parsley-trigger="change" value="{{$data->name_arrtb_value}}" autocomplete="off" class="form-control @error("name_arrtb_value") is-invalid  @enderror">
                                @error("name_arrtb_value")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Area*</label>
                                <select class="form-control" name="arrtb_id" id="">
                                    @foreach($arrtb as $value)
                                        <option value="{{$value->id}}" {{($value->id)==($data->arrtb_id)?"selected":""}}>{{$value->name_arrtibutes}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                <a href="{{route("admin.arrtb-vl.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Cancel</a>

                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




