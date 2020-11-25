<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brands::all();
        return view("admin.brands.brand",compact("brand"));
    }
    public function save(Request $request)
    {
        $request->validate([
           "brand_name"=>"required|unique:brands"
        ],
        [
            "brand_name.required"=>"The brand name field is required"
        ]);

        $brand = Brands::create($request->all());
        if ($brand)
        {
            return redirect()->back()->with("success", "Add new brand successfully");
        }
        return redirect()->back()->with("error", "Add new brand failed..!..");
    }
    public function edit($id){
        $brand = Brands::findOrFail($id);
        return view("admin.brands.edit-brands",compact("brand"));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "brand_name"=>"required"
        ],[
            "brand_name.required"=>"The brand name field is required"
        ]);
        $brand = Brands::findOrFail($id);
        $brand->brand_name = $request->brand_name;
        $brand->save();
        return redirect()->route("admin.brand.index")->with("success", "Update brand successfully");
    }
    public function delete($id)
    {
        $brand = Brands::findOrFail($id);
        $brand->delete();
        return redirect()->back()->with("success", "Update brand failed..!..");
    }
}
