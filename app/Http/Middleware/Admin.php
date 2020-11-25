<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Auth;
class Admin
{

    public function handle($request,Closure $next)
    {
        if (!Auth::check())
            return redirect()->route("admin.login");
            $currentUser = Auth::user();


        if ($currentUser->__get("role")!= User::ADMIN_ROLE)
        {
            return redirect()->route("admin.login")->with("error","The account does not have admin access");
        }
        return $next($request);
    }
}
