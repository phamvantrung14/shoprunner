<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request,Closure $next)
    {
        if (!Auth::check())
            return redirect()->route("1lg.login");
        $currentUser = Auth::user();


        if ($currentUser->__get("role")!= User::ADMIN_ROLE)
        {
            return redirect()->route("1lg.login")->with("error","The account does not have admin access");
        }
        $user = Auth::user();//lay thong tin user khi dang nhap

        // kiem tra quyen cua nguoi dung
        $route = $request->route()->getName();
//        dd($user->can($route));
        if($user->cant($route))
        {
            return redirect()->route('admin.error',['code'=>403]);
        }

        return $next($request);
    }



//    protected function redirectTo($request)
//    {
//        if (! $request->expectsJson()) {
//            return route('login');
//        }
//    }
}
