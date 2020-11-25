<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Categories::all();
        return view("admin.categories.categories",compact("cate"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $random = Str::random(4);
        $request->validate([
            "cate_name"=>"required",
        ],[
            "cate_name.required"=>"The category name field is required"
        ]);
        $slug = Str::slug($request->__get("cate_name").$random);
        $request->merge(["slug"=>$slug]);
        $cate = Categories::create($request->all());
        if ($cate) {
            return redirect()->back()->with("success", "Add new categories successfully");
        }
        return redirect()->back()->with("error", "Add new categories failed..!..");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Categories::findOrFail($id);
        return view("admin.categories.edit-cate",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $cate = Categories::findOrFail($id);
        $random = Str::random(4);
        $request->validate([
            "cate_name"=>"required|unique:categories",
        ],[
            "cate_name.required"=>"The category name field is required"
        ]);
        $slug = Str::slug($request->__get("cate_name").$random);
        $cate->cate_name=$request->cate_name;
        $cate->slug=$slug;
        $cate->description=$request->description;
        $cate->save();

        if ($cate) {
            return redirect()->route("admin.categories.index")->with("success", "Update categories successfully");
        }
        return redirect()->back()->with("error", "Update categories failed..!..");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categories::findOrFail($id);
        $data->delete();
        if ($data) {
            return redirect()->back()->with("success", "Delete successful..!..");
        }
        return redirect()->back()->with("error", "Delete failed..!..");
    }
}
