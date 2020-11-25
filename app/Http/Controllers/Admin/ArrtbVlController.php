<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arrtibute_value;
use App\Models\Arrtibutes;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArrtbVlController extends Controller
{
    public function index()
    {
        $arrtb = Arrtibutes::all();
        $arrtbVl = Arrtibute_value::paginate(20);
        return view("admin.arrtb-vl.index",compact("arrtbVl","arrtb"));
    }
    public function search(Request $request)
    {
        $arrtb = Arrtibutes::all();
        $arrtbVl = Arrtibute_value::where("arrtb_id",$request->arrtb_id)->paginate(20);
        return view("admin.arrtb-vl.index",compact("arrtbVl","arrtb"));
    }
    public function save(Request $request)
    {
        $request->validate([
           "name_arrtb_value" =>"required|unique:arrtibute_values"
        ]);
        $arrtbVl = Arrtibute_value::create([
           "name_arrtb_value" =>$request->name_arrtb_value,
            "arrtb_id"=>$request->arrtb_id,
        ]);
        if ($arrtbVl)
        {
            return redirect()->back()->with("success","Add thanh cong");
        }
        return redirect()->back()->with("error","Add ko thanh cong");
    }
    public function edit($id)
    {
        $arrtb = Arrtibutes::all();
        $data = Arrtibute_value::findOrFail($id);
        return view("admin.arrtb-vl.edit-attrvl",compact("data","arrtb"));
    }
    public function update(Request $request,$id)
    {
        $data = Arrtibute_value::findOrFail($id);
        $request->validate([
            "name_arrtb_value" =>"required"
        ]);
        $data->name_arrtb_value = $request->name_arrtb_value;
        $data->arrtb_id = $request->arrtb_id;
        $data->save();
        if ($data)
        {
            return redirect()->route("admin.arrtb-vl.index")->with("success","Update thanh cong");

        }
        return redirect()->back()->with("error","Update ko thanh cong");
    }
    public function delete($id)
    {
        $data = Arrtibute_value::findOrFail($id);
        $data->delete();
        if ($data)
        {
            return redirect()->back()->with("success","Delete thanh cong");
        }
        return redirect()->back()->with("error","Delete ko thanh cong");
    }
}
