@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Endows </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Endows</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Edit Endow</h5>
                    <div class="card-body">
                        <form action="{{route("admin.endow.postedit",$endow->id)}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Endow name*</label>
                                <input id="inputUserName" type="text" name="endow_name" data-parsley-trigger="change" value="{{$endow->endow_name}}" required="" placeholder="Enter endow name" autocomplete="off" class="form-control @error("endow_name") is-invalid  @enderror">
                                @error("endow_name")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>

                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Update</button>
                                <a href="{{route("admin.endow.index")}}" class="btn btn-space btn-secondary">Cancel</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
