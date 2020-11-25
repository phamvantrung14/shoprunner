<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arrtibutes;
use Illuminate\Http\Request;

class ArrtbController extends Controller
{
    public function index()
    {
        $arrtb = Arrtibutes::paginate(20);
        return view("admin.arrtb.arrtb",compact("arrtb"));
    }
    public function save(Request $request)
    {
        $request->validate([
           "name_arrtibutes" =>"required|min:4"
        ]);
        $arrtb = Arrtibutes::create($request->all());
        if ($arrtb)
        {
            return redirect()->back()->with("success","Add thanh cong");
        }
        return redirect()->back()->with("error","Add ko thanh cong");

    }
    public function edit($id)
    {
        $data = Arrtibutes::findOrFail($id);
        return view("admin.arrtb.edit-arrtb",compact("data"));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            "name_arrtibutes" =>"required|min:4|unique:arrtibutes"
        ]);
        $data = Arrtibutes::findOrFail($id);
        $data->name_arrtibutes = $request->name_arrtibutes;
        $data->save();
        if ($data)
        {
            return redirect()->route("admin.arrtb.index")->with("success","Update thanh cong");
        }
        return redirect()->back()->with("error","Update Ko thanh cong");

    }
    public function delete($id)
    {
        $data = Arrtibutes::findOrFail($id);
        $data->delete();
        if ($data)
        {
            return redirect()->route("admin.arrtb.index")->with("success","Delete thanh cong");
        }
        return redirect()->back()->with("error","DElete Ko thanh cong");
    }
}
