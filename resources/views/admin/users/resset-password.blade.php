@extends("admin.users.layout")
@section("content")
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="{{url("backend")}}/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
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
                <form action="{{route("1lg.save-password")}}" method="POST">
                    @csrf
                    @method("POST")
                    <input type="hidden" name="email" value="{{$checkUser->email}}">
                    <input type="hidden" name="remember_token" value="{{$checkUser->remember_token}}">
                    <div class="form-group">
                        <input class="form-control form-control-lg @error("password") is-invalid  @enderror" name="password" value="" id="username" type="password" placeholder="Password" autocomplete="off">
                        @error("password")
                        <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg @error("password_cf") is-invalid  @enderror" name="password_cf" id="password" type="password" placeholder="Password Confirm">
                        @error("password_cf")
                        <span class="error invalid-feedback">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{route("1lg.register")}}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{route("1lg.form-reset-pas")}}" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
@endsection

