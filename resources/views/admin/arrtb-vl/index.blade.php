@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Arrtibutes Values</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Arrtibutes Values</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List Arrtibutes Values</h5>
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
                            <form action="{{route("admin.arrtb-vl.search")}}" method="POST">
                                @csrf
                                @method("POST")
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="">Name Arrtibutes</label>
                                        <select class="form-control" name="arrtb_id" id="">
                                            <option value="">--choice--</option>
                                            @foreach($arrtb as $value)
                                                <option value="{{$value->id}}">{{$value->name_arrtibutes}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-5" style="padding-top: 22px">
                                        <button type="submit" class="btn btn-primary" style="">Search</button>
                                        <a href="{{route("admin.arrtb-vl.index")}}" type="submit" class="btn btn-success" style="color: #fff">All Arrtibutes Values</a>
                                    </div>
                                </div>
                            </form>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Name Arrtibutes Values</th>
                                <th scope="col">Arrtibutes</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($arrtbVl as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>{{$value->name_arrtb_value}}</td>
                                    <td>{{$value->Arrtb->name_arrtibutes}}</td>
                                    <td>
                                        <a href="{{url("admin/arrtibute_values/edit/$value->id")}}" class="badge badge-primary badge-pill">Edit</a>
                                        <a href="{{url("admin/arrtibute_values/delete/$value->id")}}"  class="badge badge-danger badge-pill">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $arrtbVl->links() !!}
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Add New Arrtibutes Values</h5>
                    <div class="card-body">
                        <form action="{{route("admin.arrtb-vl.save")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Arrtibute values name*</label>
                                <input id="inputipt" type="text" name="name_arrtb_value" data-parsley-trigger="change" required="" placeholder="Enter Arrtibute values name" autocomplete="off" class="form-control @error("name_arrtb_value") is-invalid  @enderror">
{{--                                <input id="ipt" type="color" name="name_arrtb_value"  placeholder="Enter Arrtibute values name" class="form-control @error("name_arrtb_value") is-invalid  @enderror">--}}
                                @error("name_arrtb_value")
                                <span class="error invalid-feedback">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Arrtibutes*</label>
                                <select class="form-control" name="arrtb_id" id="arrtb_id">
                                    @foreach($arrtb as $value)
                                        <option value="{{$value->id}}">{{$value->name_arrtibutes}}</option>
                                    @endforeach
                                </select>
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
@section("script")
    <script>
        $(document).ready(function () {
            $("#arrtb_id").change(function (event) {
                var _value = $(this).val();
                if(_value==9){
                    $("#inputipt").attr('type','color');
                }else{
                    $("#inputipt").attr('type','text');
                }
            })
        })
    </script>
@endsection



