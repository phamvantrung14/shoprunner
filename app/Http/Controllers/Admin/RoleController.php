<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Roles;
use Illuminate\Http\Request;
use Route;

class RoleController extends Controller
{
    public function index()
    {
        $data = Roles::paginate(15);
        $route = [];
        $all = Route::getRoutes();
        foreach ($all as $r)
        {
            $name = $r->getName();
            $pos = strpos($name,'admin');
            if ($pos !== false)
            {
                array_push($route,$r->getName());
            }
        }
//        dd($route);

        return view("admin.role.index",compact("data","route"));
    }
    public function create(Request $request)
    {
        $request->validate([
            'name' =>'required'
        ]);
//        array_push($request->route,'admin.home');
        $routes = json_encode($request->route);
//        dd($routes);
        Roles::create([
            'name'=>$request->name,
            'permissions'=>$routes
        ]);
        return redirect()->back()->with("success", "Thanh cong");

    }

    public function edit($id)
    {
        $data = Roles::find($id);
//        dd($data);
        $permissions = json_decode($data->permissions);
//        dd($permissions);
        $route = [];
        $all = Route::getRoutes();
        foreach ($all as $r)
        {
            $name = $r->getName();
            $pos = strpos($name,'admin');
            if ($pos !== false)
            {
                array_push($route,$r->getName());
            }
        }
        return view("admin.role.edit",compact("data","route","permissions"));
    }
    public function update(Request $request,$id)
    {
        $role = Roles::find($id);
        $request->validate([
            'name' =>'required'
        ]);

        $routes = json_encode($request->route);
        $role->update([
            'name'=>$request->__get("name"),
            'permissions'=>$routes
        ]);
        return redirect()->back()->with("success", "Thanh cong");
    }

    public function delete($id)
    {
        $role = Roles::findOrFail($id);
        $role->delete();
        return redirect()->back()->with("success", "Thanh cong");
    }
}
