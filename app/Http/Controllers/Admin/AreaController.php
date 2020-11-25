<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AreaController extends Controller
{
    public function index()
    {
        $area = Area::orderBy("name_area","ASC")->paginate(20);
        return view("admin.area.area",compact("area"));
    }
    public function search(Request $request)
    {
        $area = Area::where("name_area",'like','%'.$request->name_area.'%')->orderBy("name_area","ASC")->paginate(20);
//        dd($area->all());
        return view("admin.area.area",compact("area"));

    }
    public function save(Request $request)
    {
        $random = Str::random(4);
        $request->validate([
            "name_area"=>"required|unique:area"
        ],[
            "name_area.required"=>"The area name field is required",
            "name_area.unique"=>"Region name already exists",
            ]);
        $slug = Str::slug($request->name_area.$random);
        $request->merge(["slug"=>$slug]);
        $area = Area::create($request->all());
        if ($area)
        {
            return redirect()->back()->with("success", "Add new area successfully");
        }
        return redirect()->back()->with("error", "Add new failure area");


    }
    public function edit(Area $area)
    {
        $data = Area::findOrFail($area->id);
        return view("admin.area.edit",compact("data"));
    }
    public function update(Request $request,Area $area)
    {
        $random = Str::random(4);
        $data = Area::findOrFail($area->id);
        $request->validate([
            "name_area"=>"required|unique:area"
        ],[
            "name_area.required"=>"The area name field is required",
            "name_area.unique"=>"Region name already exists",
        ]);
        $slug = Str::slug($request->name_area.$random);
        $data->name_area = $request->name_area;
        $data->slug = $slug;
        $data->save();
        return redirect()->route("admin.area.index")->with("success","Update area successfully");
    }
    public function delete(Area $area)
    {
        $areas = Area::findOrFail($area->id);
        $areas->delete();
        return redirect()->back()->with("success","Delete successful..!..");
    }
}
