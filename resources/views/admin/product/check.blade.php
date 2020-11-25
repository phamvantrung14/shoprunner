@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Product Detail</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{route("admin.product.index")}}" class="breadcrumb-link">List Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h5 class="card-header">Product: {{$data->pro_name}}</h5>
                                        <div class="card-body">
                                            <table class="table table-striped table-inverse ">
                                                <thead class="thead-inverse">
                                                <tr>
                                                    <th>Name Product: </th>
                                                    <th>{{$data->pro_name}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Price: </th>
                                                    <th>{{$data->getPrice()}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Sale Price: </th>
                                                    <th>{{$data->getSalePrice()}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Code Product: </th>
                                                    <th>{{$data->ma_sp}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Product priority level: </th>
                                                    <th>
                                                        <span class="{{$data->getNew($data->new)['class']}}">
                                                        {{$data->getNew($data->new)['name']}}
                                                        </span>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>Product status: </th>
                                                    <th><span class="{{$data->getStatus1($data->status)['class']}}">
                                                            {{$data->getStatus1($data->status)['name']}}
                                                        </span></th>
                                                </tr>
                                                <tr>
                                                    <th>Category: </th>
                                                    <th>{{$data->Categories->cate_name}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Made In: </th>
                                                    <th>{{$data->made_from}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Brand: </th>
                                                    <th>{{$data->Brands->brand_name}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Created At: </th>
                                                    <th>{{$data->created_at}}</th>
                                                </tr>
                                                </thead>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 " id="checkboxradio" tabindex="-1">
                                    <div class="card">
                                        <h5 class="card-header" >Product specifications*</h5>
                                        <div class="card-body specifications-vl"  >
                                            @if(isset($technical))
                                            <table class="table table-striped table-inverse ">
                                                <thead class="thead-inverse">
                                                <tr>
                                                    <th>Speed:</th>
                                                    <th>{{$technical->speed}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Incline:</th>
                                                    <th>{{$technical->incline}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Running floor size:</th>
                                                    <th>{{$technical->running_floor_size}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Size Product:</th>
                                                    <th>{{$technical->size_pro}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Weight withstand:</th>
                                                    <th>{{$technical->weight_withstand}}</th>
                                                </tr>
                                                <tr>
                                                    <th>Weight product:</th>
                                                    <th>{{$technical->weight}}</th>
                                                </tr>
                                                </thead>

                                            </table>
                                                @else
                                                <p>No</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 arrtb" id="checkboxradio" tabindex="-1">
                                    <div class="card">
                                        <h5 class="card-header">Arrtibutes Product*</h5>

                                        <div class=" card-body">
                                            <h4 id="colorPd">Endows*</h4>
                                            @foreach($endows as $value)
                                                <p><i class="fas fa-gift" style="margin-right: 15px;font-size: 25px;color: red"></i>{{$value->Endows->endow_name}}</p>
                                            @endforeach
                                        </div>


                                        <div class=" card-body border-top">
                                            <h4 id="colorPd">Color*</h4>
                                            @foreach($color as $value)
{{--                                                <label class="custom-control custom-checkbox custom-control-inline">--}}
{{--                                                    <input type="checkbox" value="{{$value->id}}"  name="arrtibute_value_id[]" {{in_array($value->id,$arrtb_vl)?"checked":""}}  class="custom-control-input"><span class="custom-control-label"><i class="fas fa-square-full" style="color:{{$value->name_arrtb_value}} "></i></span>--}}
                                                    <i class="fas fa-square-full"  style=" font-size:25px; color:{{$value->name_arrtb_value}};{{in_array($value->id,$arrtb_vl)?"":"display:none"}} "></i>
{{--                                                </label>--}}
                                            @endforeach
                                        </div>
                                        <div class=" card-body border-top">
                                            <h4 id="sizeShoes">Size Shoes*</h4>
                                                @foreach($sizeShoes as $value)
                                                    @if(in_array($value->id,$arrtb_vl))

                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" value="{{$value->id}}"   class="custom-control-input" ><span style="{{in_array($value->id,$arrtb_vl)?"color:red;border: 1px solid;padding: 0px 3px;border-radius: 19%;":""}}">{{$value->name_arrtb_value}}</span>
                                                        </label>
                                                    @endif
                                                @endforeach

                                        </div>
                                        <div class=" card-body border-top">
                                            <h4 id="SizeShirt">Size Shirt*</h4>
{{--                                            @if()--}}
                                            @foreach($sizeShirt as $value)
                                               @if(in_array($value->id,$arrtb_vl))
                                                <label class="custom-control custom-checkbox custom-control-inline">
                                                    <input type="checkbox" value="{{$value->id}}"  class="custom-control-input"><span style="{{in_array($value->id,$arrtb_vl)?"color:red;border: 1px solid;padding: 0px 3px;border-radius: 19%;":""}}">{{$value->name_arrtb_value}}</span>
                                                </label>
                                                @endif
                                            @endforeach
{{--                                            @endif--}}
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Image Product</h5>
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
                                    <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carouselExampleIndicators1" data-slide-to="0" class=""></li>
                                            <li data-target="#carouselExampleIndicators1" data-slide-to="1" class=""></li>
                                            <li data-target="#carouselExampleIndicators1" data-slide-to="2" class="active"></li>
                                        </ol>
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="{{asset($data->avatar)}}" style="height: 350px!important;" alt="First slide">
                                                <div class="carousel-caption d-none d-md-block">

                                                </div>
                                            </div>
                                            @foreach($pro_image as $value)
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="{{asset($value->image)}}"style="height: 350px!important;" alt="Second slide">
                                                <div class="carousel-caption d-none d-md-block">
                                                    <p><a href="{{url("admin/products/delete-img/$value->id")}}"class="badge badge-danger badge-pill">Delete</a></p>
                                                </div>
                                            </div>
                                            @endforeach

                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>  </a>
                                        <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>  </a>
                                    </div>
                                </div>

                                <div class="card-body border-top">
                                    <h3>Action*</h3>
                                    <p class="text-left">
                                        <a href="{{route("admin.product.index")}}" style="color: #ffffff" class="btn btn-space btn-secondary">Back</a>
                                        <a href="{{url("admin/products/edit/$data->slug")}}" style="color: #ffffff" class="btn btn-space btn-success">Edit</a>
                                    </p>

                                </div>
                            </div>
                        </div>

                    </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Reviews Product</h5>

                            <div class="card-body">
{{--                                <div class="content-container">--}}
                                    <div class="chat-module" style="height: calc(70vh - 154px) !important;">
                                        <div class="chat-module-top">
                                            <div class="chat-module-body">
                                                @foreach($reviews as $value)
                                                <div class="media chat-item">
                                                    <div class="media-body">
                                                        <div class="chat-item-title">
                                                            <span class="chat-item-author">{{$value->Customer->customer_name}}</span>
                                                            <span>
                                                                @if($value->number==1)
                                                               <i class="far fa-star"></i>
                                                                @elseif($value->number==2)
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif($value->number==3)
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif($value->number==4)
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @elseif($value->number==5)
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                    <i class="far fa-star"></i>
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="chat-item-body">
                                                            <p>{{$value->content}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                            </div>
{{--                                        </div>--}}

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
