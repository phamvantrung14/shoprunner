@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Products </h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.product.index")}}" class="breadcrumb-link">List Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New Product</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <form action="{{route("admin.product.save")}}" id="basicform" method="POST" data-parsley-validate="" enctype="multipart/form-data" novalidate="">
                        @csrf
                        <div class="row">
                        <div class="col-md-8">
                        <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Add Product</h5>
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
                                                    <input id="inputUserName" type="text" name="pro_name" data-parsley-trigger="change" placeholder="Enter product name" autocomplete="off" class="form-control @error("pro_name") is-invalid  @enderror">
                                                    @error("pro_name")
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Code product*</label>
                                                    <input id="inputUserName" type="text" name="ma_sp" data-parsley-trigger="change" placeholder="Enter code product" autocomplete="off" class="form-control @error("ma_sp") is-invalid  @enderror">
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
                                                            <option value="{{$value->id}}">{{$value->cate_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Brands*</label>
                                                    <select class="form-control" name="brand_id" id="">
                                                        @foreach($brands as $value)
                                                            <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Price product*</label>
                                                    <input id="inputUserName" type="text" name="price" data-parsley-trigger="change" placeholder="Enter price product" autocomplete="off" class="form-control @error("price") is-invalid  @enderror">
                                                    @error("price")
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Sale price product*</label>
                                                    <input id="inputUserName" type="number" name="sale_price" data-parsley-trigger="change" placeholder="Enter sale price" autocomplete="off" class="form-control @error("sale_price") is-invalid  @enderror">
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
                                                    <input id="inputUserName" type="text" name="made_from" data-parsley-trigger="change" placeholder="Enter made from" autocomplete="off" class="form-control @error("made_from") is-invalid  @enderror">
                                                    @error("made_from")
                                                    <span class="error invalid-feedback">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Rating*</label>
                                                    <select class="form-control" name="rating" id="">
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Description product*</label>
                                            <textarea class="form-control ckeditor" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                                                    <input type="checkbox" class="form-check-input" name="endow_id[]" id="" value="{{$value->id}}" >{{$value->endow_name}}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 arrtb" id="checkboxradio" tabindex="-1">
                                <div class="card">
                                    <h5 class="card-header">Arrtibutes Product*</h5>

                                    <div class="arrtb-vl card-body">
                                        <h4 id="colorPd">Color*  <span style="font-size: 11px">(Choose color for the product) </span> <i class="fas fa-sort-up"></i></h4>
                                        @foreach($color as $value)
                                            <label class="custom-control custom-checkbox custom-control-inline colorPd" style="display:none;">
                                                <input type="checkbox" value="{{$value->id}}" name="arrtibute_value_id[]"  class="custom-control-input"><span class="custom-control-label"><i class="fas fa-square-full" style="color:{{$value->name_arrtb_value}};border: 1px solid grey; "></i></span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="arrtb-vl card-body border-top">
                                        <h4 id="sizeShoes">Size Shoes*  <span style="font-size: 11px">(Choose shirt shoes for the product) </span> <i class="fas fa-sort-up"></i></h4>
                                        @foreach($sizeShoes as $value)
                                            <label class="custom-control custom-checkbox custom-control-inline sizeShoes" style="display:none;">
                                                <input type="checkbox" value="{{$value->id}}"  name="arrtibute_value_id[]" class="custom-control-input"><span class="custom-control-label">{{$value->name_arrtb_value}}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="arrtb-vl card-body border-top">
                                        <h4 id="SizeShirt">Size Shirt*  <span style="font-size: 11px">(Choose shirt size for the product) </span> <i class="fas fa-sort-up"></i></h4>
                                        @foreach($sizeShirt as $value)
                                            <label class="custom-control custom-checkbox custom-control-inline SizeShirtVl"style="display:none;" id="">
                                                <input type="checkbox" value="{{$value->id}}" name="arrtibute_value_id[]" class="custom-control-input"><span class="custom-control-label">{{$value->name_arrtb_value}}</span>
                                            </label>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 specifications" id="checkboxradio" tabindex="-1">
                                <div class="card">
                                    <h5 class="card-header" id="specifications">Product specifications* <span>(choice for treadmill)</span> <i class="fas fa-sort-up"></i></h5>
                                    <div class="card-body specifications-vl" style="display: none;" >
                                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Speed*</label>
                                                    <input id="inputUserName" type="text" name="speed" data-parsley-trigger="change" placeholder="Enter product speed" autocomplete="off" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Incline*</label>
                                                    <input id="inputUserName" type="text" name="incline" data-parsley-trigger="change" placeholder="Enter product incline" autocomplete="off" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Running floor size*</label>
                                                    <input id="inputUserName" type="text" name="running_floor_size" data-parsley-trigger="change" placeholder="Enter product running floor size" autocomplete="off" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Size Product*</label>
                                                    <input id="inputUserName" type="text" name="size_pro" data-parsley-trigger="change" placeholder="Enter size product" autocomplete="off" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Weight withstand*</label>
                                                    <input id="inputUserName" type="text" name="weight_withstand" data-parsley-trigger="change" placeholder="Enter product weight withstand" autocomplete="off" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputUserName">Weight product*</label>
                                                    <input id="inputUserName" type="text" name="weight" data-parsley-trigger="change" placeholder="Enter product weight" autocomplete="off" class="form-control">
                                                </div>
                                            </div>
                                        </div>
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
                                                    <option value="1">--Default--</option>
                                                    <option value="2">--Normal--</option>
                                                    <option value="3">--New--</option>
                                                    <option value="4">--Hot--</option>
                                                </select>
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
                                </div>
                                <div class="card-body border-top">
                                    <h3>Action*</h3>
                                    <p class="text-left">
                                        <button type="submit" class="btn btn-space btn-primary">Submit</button>
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
@section("script")
    <script>
        $(document).ready(function (event) {
            $("#SizeShirt").click(function () {
                $("#SizeShirt i").toggleClass("fa-sort-up");
                $(".SizeShirtVl").toggle();
                $("#SizeShirt i").toggleClass("fa-sort-down");

            });
            $("#colorPd").click(function () {
                $("#colorPd i").toggleClass("fa-sort-up");
                $(".colorPd").toggle();
                $("#colorPd i").toggleClass("fa-sort-down");

            });
            $("#sizeShoes").click(function () {
                $("#sizeShoes i").toggleClass("fa-sort-up");
                $(".sizeShoes").toggle();
                $("#sizeShoes i").toggleClass("fa-sort-down");

            });
            $("#specifications").click(function () {
                $("#specifications i").toggleClass("fa-sort-up");
                $(".specifications-vl").toggle();
                $("#specifications i").toggleClass("fa-sort-down");

            })
        })
    </script>
@endsection
