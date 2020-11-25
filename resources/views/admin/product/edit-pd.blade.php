@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Products </h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.product.index")}}" class="breadcrumb-link">List Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form action="{{url("admin/products/edit/$pro->slug")}}" id="basicform" method="POST" data-parsley-validate="" enctype="multipart/form-data" novalidate="">
                    @csrf
                    @method("POST")
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">Edit Product: {{$pro->pro_name}}</h5>
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
                                        <div class="card-body">
                                            @csrf
                                            @method("POST")
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Product name*</label>
                                                        <input id="inputUserName" type="text" value="{{$pro->pro_name}}" name="pro_name" data-parsley-trigger="change" placeholder="Enter product name" autocomplete="off" class="form-control @error("pro_name") is-invalid  @enderror">
                                                        @error("pro_name")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Code product*</label>
                                                        <input id="inputUserName" type="text" value="{{$pro->ma_sp}}" readonly="true" name="ma_sp" data-parsley-trigger="change" placeholder="Enter code product" autocomplete="off" class="form-control @error("ma_sp") is-invalid  @enderror">
                                                        @error("ma_sp")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="">Categories*</label>
                                                        <select class="form-control" name="cate_id" id="">
                                                            @foreach($cate as $value)
                                                                <option value="{{$value->id}}" {{($pro->cate_id)==($value->id)?"selected":""}}>{{$value->cate_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="">Brands*</label>
                                                        <select class="form-control" name="brand_id" id="">
                                                            @foreach($brands as $value)
                                                                <option value="{{$value->id}}" {{($pro->brand_id)==($value->id)?"selected":""}}>{{$value->brand_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Price product*</label>
                                                        <input id="inputUserName" type="text" name="price" value="{{$pro->price}}" data-parsley-trigger="change" placeholder="Enter price product" autocomplete="off" class="form-control @error("price") is-invalid  @enderror">
                                                        @error("price")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Sale price product*</label>
                                                        <input id="inputUserName" type="number" name="sale_price" value="{{$pro->sale_price}}" data-parsley-trigger="change" placeholder="Enter sale price" autocomplete="off" class="form-control @error("sale_price") is-invalid  @enderror">
                                                        @error("sale_price")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Made From*</label>
                                                        <input id="inputUserName" type="text" name="made_from" value="{{$pro->made_from}}" data-parsley-trigger="change" placeholder="Enter made from" autocomplete="off" class="form-control @error("made_from") is-invalid  @enderror">
                                                        @error("made_from")
                                                        <span class="error invalid-feedback">{{$message}}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Rating*</label>
                                                        <select class="form-control" name="rating" id="">
                                                            <option value="1" {{($pro->rating)==1?"selected":""}}>1</option>
                                                            <option value="2" {{($pro->rating)==2?"selected":""}}>2</option>
                                                            <option value="3" {{($pro->rating)==3?"selected":""}}>3</option>
                                                            <option value="4" {{($pro->rating)==4?"selected":""}}>4</option>
                                                            <option value="5" {{($pro->rating)==5?"selected":""}}>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Description product*</label>
                                                <textarea class="form-control ckeditor" name="description" id="exampleFormControlTextarea1" rows="3">{{$pro->description}}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 arrtb" id="checkboxradio" tabindex="-1">
                                    <div class="card">
                                        <h5 class="card-header">Endow Product*</h5>

                                        <div class="arrtb-vl card-body" style="height: 200px; overflow-y: auto;">
                                            @foreach($endows as $value)
                                                <div class="form-check mt-3 mb-3">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="endow_id[]" id="" {{in_array($value->id,$pro_endow)?"checked":""}} value="{{$value->id}}" >{{$value->endow_name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="checkboxradio" tabindex="-1">
                                    <div class="card">
                                        <h5 class="card-header">Arrtibutes Product*</h5>

                                        <div class="card-body">
                                            <h4>Color*</h4>
                                            @foreach($color as $value)
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" value="{{$value->id}}"  name="arrtibute_value_id[]" {{in_array($value->id,$pro_attb_vl)?"checked":""}}  class="custom-control-input"><span class="custom-control-label"><i class="fas fa-square-full" style="color:{{$value->name_arrtb_value}} "></i></span>
                                                </label>
                                            @endforeach
                                        </div>
                                        <div class="card-body border-top">
                                            <h4>Size Shoes*</h4>
{{--                                            @if()--}}
                                            @foreach($sizeShoes as $value)
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" value="{{$value->id}}" {{in_array($value->id,$pro_attb_vl)?"checked":""}}  name="arrtibute_value_id[]" class="custom-control-input"><span class="custom-control-label">{{$value->name_arrtb_value}}</span>
                                                </label>
                                            @endforeach

                                        </div>
                                        <div class="card-body border-top">
                                            <h4>Size Shirt*</h4>
                                            @foreach($sizeShirt as $value)
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" value="{{$value->id}}" {{in_array($value->id,$pro_attb_vl)?"checked":""}} name="arrtibute_value_id[]" class="custom-control-input"><span class="custom-control-label">{{$value->name_arrtb_value}}</span>
                                                </label>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="checkboxradio" tabindex="-1">
                                    <div class="card">
                                        <h5 class="card-header">Product specifications*</h5>
                                        <div class="card-body">
                                            @if(isset($technical))
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Speed*</label>
                                                        <input id="inputUserName" type="text" value="{{isset($technical->speed)?$technical->speed:""}}" name="speed" data-parsley-trigger="change" placeholder="Enter product speed" autocomplete="off" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Incline*</label>
                                                        <input id="inputUserName" type="text" value="{{isset($technical->incline)?$technical->incline:""}}" name="incline" data-parsley-trigger="change" placeholder="Enter product incline" autocomplete="off" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Running floor size*</label>
                                                        <input id="inputUserName" type="text" value="{{isset($technical->running_floor_size)?$technical->running_floor_size:""}}" name="running_floor_size" data-parsley-trigger="change" placeholder="Enter product running floor size" autocomplete="off" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Size Product*</label>
                                                        <input id="inputUserName" type="text" value="{{isset($technical->size_pro)?$technical->size_pro:""}}" name="size_pro" data-parsley-trigger="change" placeholder="Enter size product" autocomplete="off" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Weight withstand*</label>
                                                        <input id="inputUserName" type="text" value="{{isset($technical->weight_withstand)?$technical->weight_withstand:""}}" name="weight_withstand" data-parsley-trigger="change" placeholder="Enter product weight withstand" autocomplete="off" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputUserName">Weight product*</label>
                                                        <input id="inputUserName" type="text" name="weight" value="{{isset($technical->weight)?$technical->weight:""}}" data-parsley-trigger="change" placeholder="Enter product weight" autocomplete="off" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Image Product</h5>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputText3" class="col-form-label">Product avatar*</label>
                                        <input id="inputText3" type="file" name="avatar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">Other product photos*</label>
                                        <input id="inputEmail" type="file" name="image[]" multiple="multiple" class="form-control">
                                        <p>We'll never share your email with anyone else.</p>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3>Level/status*</h3>
                                    <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label for="">Product priority level*</label>
                                                <select class="form-control" name="new" id="">
                                                    <option value="1" {{($pro->new)==1?"selected":""}}>--Default--</option>
                                                    <option value="2" {{($pro->new)==2?"selected":""}}>--Normal--</option>
                                                    <option value="3" {{($pro->new)==3?"selected":""}}>--New--</option>
                                                    <option value="4" {{($pro->new)==4?"selected":""}}>--Hot--</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status*</label>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="custom-control custom-radio mr-3" >
                                                    <input type="radio" class="custom-control-input is-valid" value="2" {{($pro->status)==2?"checked":""}} id="customControlValidation3" name="status" >
                                                    <label class="custom-control-label" for="customControlValidation3">Show up</label>
                                                </div>
                                                <div class="custom-control custom-radio mf-3">
                                                    <input type="radio" class="custom-control-input is-invalid" value="1" {{($pro->status)==1?"checked":""}} id="customControlValidation4" name="status" >
                                                    <label class="custom-control-label" for="customControlValidation4">hide</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border-top">
                                    <h3>Action*</h3>
                                    <p class="text-left">
                                        <button type="submit" class="btn btn-space btn-primary">Update</button>
                                        <a href="{{route("admin.product.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Cancel</a>

                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
