@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Categories </h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">List Categories</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">List Categories</h5>
                <div class="card-body">
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
                            <th scope="col">Name Category</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cate as $value)
                        <tr>
                            <th scope="row">{{$loop->index+1}}</th>
                            <td>{{$value->cate_name}}</td>
                            <td>{{$value->created_at}}</td>
                            <td><a href="{{url("admin/categories/edit/$value->id")}}" class="badge badge-primary badge-pill">Edit</a>
                                <a href="{{url("admin/categories/delete/$value->id")}}" class="badge badge-danger badge-pill">Delete</a></td>
                        </tr>
                        @endforeach
                        <input type="hidden" class="" id="token" name="_token" value="{{csrf_token()}}">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Add New Categories</h5>
                <div class="card-body">
                    <form action="{{route("admin.categories.save")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                        @csrf
                        @method("POST")
                        <div class="form-group">
                            <label for="inputUserName">Category name*</label>
                            <input id="inputUserName" type="text" name="cate_name" data-parsley-trigger="change" required="" placeholder="Enter category name" autocomplete="off" class="form-control @error("cate_name") is-invalid  @enderror">
                            @error("cate_name")
                            <span class="error invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Description*</label>
                            <textarea id="inputEmail" type="text" name="description" data-parsley-trigger="change"   placeholder="Enter description" autocomplete="off" class="form-control ckeditor"></textarea>
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
