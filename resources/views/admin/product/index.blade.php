@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Lists Products</h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Products</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Function</h5>
                    <div class="card-body" style="padding-left: 0px;padding-right: 0px">
                        <form action="{{route("admin.product.search")}}" method="POST">
                            @method("POST")
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Name Products*</label>
                                        <input type="text"
                                               class="form-control" name="pro_name" id="s_pro_name" aria-describedby="helpId"
                                               placeholder="Enter Name Product">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Status *</label>
                                        <select class="form-control" name="status" id="s_status">
                                            <option value="2">Show Up</option>
                                            <option value="1">Hidden</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Categories*</label>
                                        <select class="form-control" name="cate_id" id="s_cate_id">
                                            <option value="">--choice--</option>
                                            @foreach($cate as $value)
                                            <option value="{{$value->id}}">{{$value->cate_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Brands*</label>
                                        <select class="form-control" name="brand_id" id="s_cate_id">
                                            @foreach($brands as $value)
                                                <option value="{{$value->id}}">{{$value->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3" style="padding-top: 25px">

{{--                                            <label for="">Categories*</label>--}}
                                            <button type="submit"  class="btn btn-primary">Search</button>



                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12">
                        <a type="submit" href="{{route("admin.product.index")}}" style="color: #fff;cursor: pointer" class="btn btn-success">All Products</a>
                        <a type="submit" href="{{route("admin.product.add")}}" style="color: #fff;cursor: pointer" class="btn btn-brand">Add New Products</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Lists Products</h5>
                    <div class="card-body list-product">
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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name </th>

                                <th scope="col">Brands</th>
                                <th scope="col">Status</th>
                                <th scope="col">Price</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->pro_name}}<br>{{$value->Categories->cate_name}}<br>
                                        @if(($value->rating)==1)
                                            <div class="">
                                              <i class="fas fa-star rating-color fa-xs fa-xs"></i>
                                            </div>
                                        @elseif(($value->rating)==2)
                                            <div class="">
                                                <i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i>
                                            </div>
                                        @elseif(($value->rating)==3)
                                            <div class="">
                                                <i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i>
                                            </div>
                                        @elseif(($value->rating)==4)
                                            <div class="">
                                                <i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i>
                                            </div>
                                        @elseif(($value->rating)==5)
                                            <div class="">
                                                <i class="fas fa-star rating-color fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i><i class="fas fa-star rating-color fa-xs fa-xs"></i>
                                            </div>
                                        @endif

                                    </td>
                                    <td>{{$value->Brands->brand_name}}</td>
                                    <td><span class="{{$value->getStatus1($value->status)['class']}}">
                                            {{$value->getStatus1($value->status)['name']}}</span></td>
                                    <td>{{$value->getPrice()}}<br>
                                        {{$value->salePrice()}}
                                    </td>
                                    <td><img src="{{$value->getAvatar()}}"width="80px" alt=""></td>

                                    <td>
                                        <a href="{{url("admin/products/check/$value->slug")}}" class="badge badge-success badge-pill">Check</a>
                                        <a href="{{url("admin/products/edit/$value->slug")}}" class="badge badge-primary badge-pill">Edit</a>
                                        <a href="{{url("admin/products/delete/$value->slug")}}"  class="badge badge-danger badge-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>


    </div>
@endsection




