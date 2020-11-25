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
                <form action="{{route("1lg.post.form-reset-pas")}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" id="username" type="email" placeholder="Email" autocomplete="off">
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer bg-white">
                    <p>Already member? <a href="{{route("1lg.login")}}" class="text-secondary">Login Here.</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
