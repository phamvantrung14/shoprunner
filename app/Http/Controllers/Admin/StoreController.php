<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Citys;
use App\Models\Stores;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index()
    {
        $area = Area::orderBy("name_area","ASC")->get();
        $city = Citys::orderBy("name_city","ASC")->get();
        $store = Stores::paginate(20);
        return view("admin.store.store",compact("store","area","city"));
    }
    public function search(Request $request)
    {
        $area = Area::orderBy("name_area","ASC")->get();
        $city = Citys::orderBy("name_city","ASC")->get();
        $store = Stores::where("name_store",'like','%'.$request->name_store.'%')
            ->where("status",$request->status)
            ->where("city_id",$request->city_id)->paginate(20);
        return view("admin.store.store",compact("store","area","city"));
    }
    public function add()
    {
        $areas = Area::all();
        $citys = Citys::all();
        return view("admin.store.add-st",compact("areas","citys"));
    }
    public function save(Request $request)
    {
//        dd($request->all());
        $request->validate([
            "name_store"=>"required|min:4",
            "ma_store"=>"required|unique:stores",
            "area_id"=>"required",
            "city_id"=>"required",
            "address"=>"required|min:4",
            "phone"=>"required|numeric",
        ],[

        ]);
        $slug = Str::slug($request->__get("name_store")."-".$request->__get("ma_store"));
        $store = Stores::create([
            "name_store"=>$request->name_store,
            "ma_store"=>$request->ma_store,
            "city_id"=>$request->city_id,
            "address"=>$request->address,
            "phone"=>$request->phone,
            "slug"=>$slug,
            "status"=>$request->status,
        ]);
        if ($store)
        {
            return redirect()->route("admin.store.index")->with("success","Add new store successfully");
        }
        return redirect()->back()->with("error","Add ko Thanh cong");
    }
    public function edit(Stores $store)
    {
        $data = Stores::findOrFail($store->id);
        $areas = Area::all();
        $citys = Citys::all();
        return view("admin.store.edit-st",compact("data","areas","citys"));
    }
    public function update(Request $request,Stores $store)
    {
        $request->validate([
            "name_store"=>"required|min:4",
            "ma_store"=>"required",
            "area_id"=>"required",
            "city_id"=>"required",
            "address"=>"required|min:4",
            "phone"=>"required|numeric",
        ],[

        ]);
        $data = Stores::findOrFail($store->id);
        $slug = Str::slug($request->__get("name_store")."-".$request->__get("ma_store"));

        $data->name_store = $request->name_store;
        $data->ma_store = $request->ma_store;
        $data->city_id = $request->city_id;
        $data->address = $request->address;
        $data->phone = $request->phone;
        $data->status = $request->status;
        $data->slug = $slug;
        $data->save();
        if ($data)
        {
            return redirect()->route("admin.store.index")->with("success","Update store successfully");
        }
        return redirect()->back()->with("error","Update store failed..!..");

    }
    public function delete(Stores $store)
    {
        $data = Stores::findOrFail($store->id);
        $data->delete();
        if ($data)
        {
            return redirect()->back()->with("success","Delete successfully");
        }
        return redirect()->back()->with("error","Delete failed..!..");

    }

    public function getArea($id)
    {
        $citys = Citys::where('area_id',$id)->get();
        foreach ($citys as $value)
        {
            echo "<option value='".$value->id."'>".$value->name_city."</option>";
        }
    }
}
