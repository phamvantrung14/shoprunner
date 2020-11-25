@extends("components.admin.layout")
@section("content")
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">List's Account Customers</h2>
{{--                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>--}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("admin.home")}}" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">List Account Customers</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">List Account Customers</h5>
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
                                <th scope="col">Info</th>
                                <th scope="col">Avatar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $value)
                                <tr>
                                    <th scope="row">{{$loop->index+1}}</th>
                                    <td>Name: {{$value->customer_name}}<br>
                                        Email: {{$value->email}}<br>
                                        Address: {{$value->address}}<br>
                                        Phone: {{$value->phone_number}}
                                    </td>
                                    <td><img src="{{asset($value->getImage())}}" width="80px" alt=""></td>
{{--                                    <td>--}}
{{--                                        <a href="{{url("admin/account/delete/$value->id")}}"  class="badge badge-danger badge-pill">Delete</a>--}}
{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $customers->links() !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Function</h5>
                    <div class="card-body">
                        <form action="{{route("admin.accustomer.search")}}" id="basicform" method="POST" data-parsley-validate="" novalidate="">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="inputUserName">Email*</label>
                                <input id="inputUserName" type="text" name="email" data-parsley-trigger="change" required="" placeholder="Enter email search" autocomplete="off" class="form-control @">
                            </div>
                            <p class="text-left">
                                <button type="submit" class="btn btn-space btn-primary">Search</button>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection





