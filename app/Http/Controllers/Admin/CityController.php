<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Citys;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CityController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        $city = Citys::paginate(25);
        return view("admin.city.city",compact("city","areas"));
    }
    public function search(Request $request)
    {
        $areas = Area::all();
        $city = Citys::where("area_id",$request->area_id)->where("name_city",'like','%'.$request->name_city.'%')->paginate(25);
        return view("admin.city.city",compact("city","areas"));
    }
    public function save(Request $request)
    {
        $request->validate([
            "name_city"=>"required|unique:citys",
        ],[
            "name_city.required"=>"The city name field is required",
        ]);
        $slug = Str::slug($request->name_city);
        $city = Citys::create([
           "name_city"=>$request->name_city,
           "status"=>$request->status,
           "area_id"=>$request->area_id,
            "slug"=>$slug
        ]);
        if ($city)
        {
            return redirect()->back()->with("success","thanh cong");
        }
        return redirect()->back()->with("error","that bai");

    }
    public function edit(Citys $city)
    {
        $data = Citys::findOrFail($city->id);
        $areas = Area::all();
        return view("admin.city.edit-city",compact("data","areas"));
    }
    public function update(Request $request,Citys $city)
    {
        $data = Citys::findOrFail($city->id);
        $request->validate([
            "name_city"=>"required|unique:citys",
        ],[
            "name_city.required"=>"The city name field is required",
        ]);
        $slug = Str::slug($request->name_city);
        $data->name_city=$request->name_city;
        $data->status=$request->status;
        $data->area_id=$request->area_id;
        $data->slug=$slug;
        $data->save();
        return redirect()->route("admin.city.index")->with("success","update thanh cong");
    }
    public function delete(Citys $city)
    {
       $data = Citys::findOrFail($city->id);
       $data->delete();
       if ($data)
       {
           return redirect()->route("admin.city.index")->with("success","delete thanh cong");
       }
        return redirect()->route("admin.city.index")->with("error","delete that bai");
    }
}
