@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">News </h2>
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
                    <h5 class="card-header">Add News</h5>
                    @if(session('error'))
                        <div class="header">
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{route("admin.new.update",$new->id)}}" id="basicform" method="POST" enctype="multipart/form-data" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("PUT")
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputUserName">New Name*</label>
                                        <textarea id="inputEmail" type="text" value="" name="new_name" data-parsley-trigger="change"   placeholder="Enter title" autocomplete="off" class="form-control ckeditor @error("new_name") is-invalid  @enderror">{{$new->new_name}}</textarea>

                                        @error("new_name")
                                        <span class="error invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputUserName">Title*</label>
                                        <textarea id="inputEmail" type="text" name="new_title" data-parsley-trigger="change"   placeholder="Enter content" autocomplete="off" class="form-control ckeditor @error("new_title") is-invalid  @enderror">{{$new->new_title}}</textarea>
                                        @error("new_title")
                                        <span class="error invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="">Type News*</label>
                                        <select class="form-control" name="type_new" id="area_id">
                                            <option value="0" {{($new->type_new==0)?"selected":""}}>--Default--</option>
                                            <option value="1" {{($new->type_new==1)?"selected":""}}>--Recruitment--</option>
                                            <option value="2" {{($new->type_new==2)?"selected":""}}>--New running machine--</option>
                                            <option value="3" {{($new->type_new==3)?"selected":""}}>--New outfit--</option>
                                            <option value="4" {{($new->type_new==4)?"selected":""}}>--New shoes--</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Image*</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="inputUserName">News Content*</label>
                                        <textarea id="inputEmail" type="text" name="new_content" data-parsley-trigger="change"   placeholder="Enter title" autocomplete="off" class="form-control ckeditor @error("new_content") is-invalid  @enderror">{{$new->new_content}}</textarea>

                                        @error("new_content")
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
                                            <input type="radio" class="custom-control-input is-valid" value="2" {{($new->status==2)?"checked":""}} id="customControlValidation3" name="status" >
                                            <label class="custom-control-label" for="customControlValidation3">Show up</label>
                                        </div>
                                        <div class="custom-control custom-radio mf-3">
                                            <input type="radio" class="custom-control-input is-invalid" value="1" {{($new->status==1)?"checked":""}} id="customControlValidation4" name="status" >
                                            <label class="custom-control-label" for="customControlValidation4">hide</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

