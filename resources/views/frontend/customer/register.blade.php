@extends("components.frontend.layout")
@section("content")
    <div class="breadcrumb-area bg-gray">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Register</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wraper mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3"></div>

                <div class="col-lg-6  col-md-6 col-sm-12">
                    <div class="customer-login-register">
                        <h3>Register</h3>
                        <div class="login-Register-info">
                            <form action="{{route("customer.post.register")}}" method="POST">
                                @if(session('error'))
                                    <div class="header">
                                        <div class="alert alert-danger">
                                            {{session('error')}}
                                        </div>
                                    </div>
                                @endif
                                @csrf
                                @method("POST")
                                <p class="coupon-input form-row-first">
                                    <label>Name <span class="required">*</span></label>
                                    <input type="text" name="customer_name" class="@error("customer_name") is-invalid  @enderror">
                                    @error("customer_name")
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="coupon-input form-row-first">
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" class="@error("email") is-invalid  @enderror">
                                    @error("email")
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Password <span class="required">*</span></label>
                                    <input type="password" name="password" class="@error("password") is-invalid  @enderror">
                                    @error("password")
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </p>
                                <p class="coupon-input form-row-last">
                                    <label>Password Confirm<span class="required">*</span></label>
                                    <input type="password" name="password_cf" class="@error("password_cf") is-invalid  @enderror">
                                    @error("password_cf")
                                    <span class="error invalid-feedback">{{$message}}</span>
                                    @enderror
                                </p>
                                <div class="clear"></div>
                                <p>
                                    <button class="button-login" type="submit">Register</button>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


