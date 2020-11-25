@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">News</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List News</li>
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
                        <form action="{{route("admin.new.search")}}" method="POST">
                            @method("POST")
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="">News Name*</label>
                                        <input type="text"
                                               class="form-control" name="new_name" id="s_pro_name" aria-describedby="helpId"
                                               placeholder="Enter New Name">
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
                                        <a type="submit" href="{{route("admin.new.index")}}" style="color: #fff;cursor: pointer" class="btn btn-success">All News</a>
                                        <a type="submit" href="{{route("admin.new.create")}}" style="color: #fff;cursor: pointer" class="btn btn-brand">Add News</a>
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
                    <h5 class="card-header">List News</h5>
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
                                <th scope="col">Info </th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $value)
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>
                                            Name: <p style="padding: 0px;margin: 0px">{!! $value->new_name !!}</p><br>
                                            Status: <span class="{{$value->getStatus($value->status)['class']}}">
                                            {{$value->getStatus($value->status)['name']}}
                                        </span><br>
                                            Type New: <span class="{{$value->getType($value->type_new)['class']}}">
                                            {{$value->getType($value->type_new)['name']}}
                                        </span><br>
                                            created_at: {{$value->created_at}}
                                        </td>
                                        <td><img src="{{asset($value->image)}}" width="200px" alt=""></td>
                                        <td>
{{--                                            <a href="{{route("admin.new.show",$value->id)}}" class="badge badge-success badge-pill">Show</a>--}}
                                            <a  href="javascript:void(0);" onclick="checkNew({{$value->id}})" data-toggle="modal" data-target="#exampleModal" class="badge badge-success badge-pill">Show</a>
                                            <a href="{{route("admin.new.edit",$value->id)}}" class="badge badge-primary badge-pill">Edit</a>
                                            <a href="{{route("admin.new.delete",$value->id)}}"  class="badge badge-danger badge-pill">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $data->links() !!}

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content" style="width: 650px; height: auto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...dsd ssd
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section("script")
            <script>
                function checkNew(id) {
                    $.ajax({
                        url:"{{url("admin/ajax/new_detail")}}/"+id,
                        method:"GET"
                    })
                        .done(function (response) {
                        $(".modal-dialog .modal-content").empty();
                        $(".modal-content").html(response);
                    })
                }
            </script>
@endsection




