@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wraper mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>
                <div class="col-lg-6 col-md-6 col-sm-12 ">
                    @if(Auth::guard('cus')->check())
                        <p>Dang nhap thanh cong</p>
                    @else
                        <div class="customer-login-register">
                            <h3>Login</h3>
                            <div class="login-Register-info">
                                <form action="{{route("customer.post.forgot-pass")}}" method="POST">
                                    @csrf
                                    @method("POST")
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
                                    <p class="coupon-input form-row-first">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" name="email">
                                    </p>
                                    <p>
                                        <button value="Login" class="button-login" type="submit">Submit</button>
                                        <label><a href="{{route("customer.login")}}" style="color: red">Login?</a></label>
                                    </p>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

