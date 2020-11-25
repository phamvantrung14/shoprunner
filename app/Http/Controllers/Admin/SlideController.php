<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slides::orderby("type","ASC")->paginate(20);
        return view("admin.slide.slide",compact("slides"));
    }
    public function add()
    {
        return view("admin.slide.add");
    }
    public function store(Request $request)
    {
        $request->validate([
           "title" =>"required|min:3",
           "content" =>"required|min:3",
        ]);
        $random = Str::random(4);
        $image ="";
        if ($request->hasFile("image"))
        {
            $file = $request->image;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("thong_bao","Invalid image file...");
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/slide"),$fileImage);
            $image = "upload/slide/".$fileImage;
        }
        $slide = Slides::create([
           "title"=> $request->__get("title"),
            "content"=>$request->__get("content"),
            "status"=>$request->status,
            "type"=>$request->type,
            "image"=>$image
        ]);
        if ($slide)
        {
            return redirect()->route("admin.slide")->with("sussces","Add new slides successfully");
        }
        return redirect()->back();
    }
    public function delete($id)
    {
        $slide = Slides::findOrFail($id);
        unlink($slide->image);
        $slide->delete();
        if ($slide)
        {
            return redirect()->back()->with("success","Delete successful..!..");
        }
        return redirect()->back()->with("error","Delete failed..!..");

    }
    public function searchSlides(Request $request)
    {
        $slides = Slides::where("title",'like','%'.$request->title.'%')->where("status",$request->status)->orderby("type","ASC")->paginate(20);
        return view("admin.slide.slide",compact("slides"));
    }
}
