<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Endows;
use Illuminate\Http\Request;

class EndowController extends Controller
{
    public function index()
    {
        $endows = Endows::orderBy("endow_name","ASC")->get();
        return view("admin.endow.endow_index",compact("endows"));
    }
    public function save(Request $request)
    {
        $request->validate([
            "endow_name"=>"required|unique:endows",
        ]);
       $endow = Endows::create([
            "endow_name"=>$request->endow_name,
        ]);
       if ($endow)
       {
           return redirect()->back()->with("success", "Add new endow successfully..!..");
       }
        return redirect()->back()->with("error", "Add new endow failed..!..");
    }
    public function edit($id)
    {
        $endow = Endows::findOrFail($id);
        return view("admin.endow.edit_endow",compact("endow"));
    }
    public function update($id,Request $request)
    {
       $request->validate([
           "endow_name"=>"required",
       ]);
       $endow = Endows::findOrFail($id);
       $endow->endow_name = $request->endow_name;
       $endow->save();
       if ($endow)
       {
           return redirect()->route("admin.endow.index")->with("success", "Update endow successfully ...");
       }
       return redirect()->back()->with("error", "Update endow failed..!..");
    }
    public function delete($id)
    {
        $endow = Endows::findOrFail($id);
        $endow->delete();
        if ($endow)
        {
            return redirect()->route("admin.endow.index")->with("success", "Delete endow successfully ...");
        }
        return redirect()->back()->with("error", "Delete endow failed..!..");
    }
}
