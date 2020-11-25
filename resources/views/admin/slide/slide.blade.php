@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Slide's</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Slide's</li>
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
                        <form action="{{route("admin.slide.search")}}" method="POST">
                            @method("POST")
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">Title Slide*</label>
                                        <input type="text"
                                               class="form-control" name="title" id="s_pro_name" aria-describedby="helpId"
                                               placeholder="Enter Name Product">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="">Status *</label>
                                        <select class="form-control" name="status" id="s_status">
                                            <option value="2">Show Up</option>
                                            <option value="1">Hidden</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5" style="padding-top: 25px">
                                        <button type="submit"  class="btn btn-primary">Search</button>
                                        <a type="submit" href="{{route("admin.slide")}}" style="color: #fff;cursor: pointer" class="btn btn-success">All Slides</a>
                                        <a type="submit" href="{{route("admin.slide.add")}}" style="color: #fff;cursor: pointer" class="btn btn-brand">Add New Slides</a>


                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List's Slide</h5>
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
                                <th scope="col">Title/Content</th>
                                <th scope="col">Image</th>
                                <th scope="col">Type</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($slides as $value)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>{!! $value->title !!}
                                        {!! $value->content !!}</td>
                                    <td><img src="{{asset($value->getImage())}}" width="100px" alt=""></td>

                                    <td> <span class="{{$value->getType($value->type)['class']}}">
                                            {{$value->getType($value->type)['name']}}
                                        </span></td>
                                    <td>
                                        <span class="{{$value->getStatus($value->status)['class']}}">
                                            {{$value->getStatus($value->status)['name']}}
                                        </span>
                                    </td>
                                    <td><a href="{{url("admin/slides/delete/$value->id")}}" class="badge badge-danger badge-pill">Delete</a></td></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->

@endsection

