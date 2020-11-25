<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPasswordEmail;

class UserController extends Controller
{
    public function getLoginAdmin()
    {
        return view("admin.users.login");
    }
    public function postLoginAdmin(Request $request)
    {
//        dd($request->all());
        if (Auth::attempt(['email'=>$request->__get('email'),'password'=>$request->__get("password")]))
        {
            return redirect()->route("admin.home");
        }
        return redirect()->back()->with("error","Login failed..");
    }
    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route("1lg.login");
    }
    public function getRegisterAdmin()
    {
        return view("admin.users.register");
    }
    public function postRegisterAdmin(Request $request)
    {
       $request->validate(
       [
           "user_name" =>"required|min:3",
           "email"=>"required|unique:users",
           "password"=>"required|min:6",
           "password_vf"=>"required|same:password"
       ],
       [
           "password_vf.same"=>"The password confirm and password must match.",
           "password_vf.required"=>"The password confirm field is required."
       ]);
       $user = User::create([
           "user_name"=>$request->__get("user_name"),
           "email"=>$request->__get("email"),
           "password"=>bcrypt($request->__get("password")),
           "role"=>0
       ]);
       if ($user)
       {
           return redirect()->route("1lg.login")->with("success","Sign Up Success...");
       }
       return redirect()->back()->with("error","Registration failed...");
    }

    public function getFromRessetPas()
    {
        return view("admin.users.forgot-password");
    }
    public function postFromRessetPas(Request $request)
    {
        $email = $request->email;
        $checkUser = User::where("email",$email)->first();
        if (!$checkUser)
        {
            return redirect()->back()->with("error","Email not failed...");
        }
        $remember_token = bcrypt(md5(time().$email));
        $checkUser->remember_token = $remember_token;
        $checkUser->save();
        $url = route('link-resetpas',["remember_token"=>$checkUser->remember_token,"email"=>$email]);
        \Mail::to($request->email)->send(new ForgotPasswordEmail($url));
        return redirect()->back()->with("success","Send Mail Success...");
    }
    public function resetPassword(Request $request)
    {
        $remember_token = $request->remember_token;
        $email = $request->email;

        $checkUser = User::where([
            'remember_token'=>$remember_token,
            'email'=>$email
        ])->first();
        if (!$checkUser)
        {
            return redirect()->with("error","The path is incorrect..");
        }
        return view("admin.users.resset-password",compact("checkUser"));
    }
    public function saveResetPassword(Request $request)
    {
        $request->validate([
            "password"=>"required|min:6",
            "password_cf"=>"required|same:password"
        ],
            [
                "password_cf.same"=>"Password does not match.."
            ]);
        if ($request->password)
        {
            $remember_token = $request->remember_token;
            $email = $request->email;
            $checkUser = User::where([
                'remember_token'=>$remember_token,
                'email'=>$email
            ])->first();
            if (!$checkUser)
            {
                return redirect()->back()->with("error","The path is incorrect..");
            }
            $checkUser->password = bcrypt($request->password);
            $checkUser->save();
            return redirect()->to(route("1lg.login"))->with("success","Change password successfully...");

        }

    }
}
