@extends("admin.users.layout")
@section("content")
    <form class="splash-container" action="{{route("1lg.post.register")}}" method="POST">
        @csrf
        @method("POST")
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
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
                <div class="form-group">
                    <input class="form-control form-control-lg @error("user_name") is-invalid  @enderror" type="text" name="user_name"  placeholder="Username" autocomplete="off">
                    @error("user_name")
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error("email") is-invalid  @enderror" type="email" name="email"  placeholder="E-mail" autocomplete="off">
                    @error("email")
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error("password") is-invalid  @enderror" id="pass1" name="password" type="password"  placeholder="Password">
                    @error("password")
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg @error("password_vf") is-invalid  @enderror"  type="password" name="password_vf" placeholder="Confirm">
                    @error("password_vf")
                    <span class="error invalid-feedback">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
{{--                <div class="form-group">--}}
{{--                    <label class="custom-control custom-checkbox">--}}
{{--                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>--}}
{{--                    </label>--}}
{{--                </div>--}}

            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="{{route("1lg.login")}}" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
@endsection
