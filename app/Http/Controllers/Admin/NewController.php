<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewController extends Controller
{
    public function index()
    {
        $data = News::orderBy("updated_at","DESC")->paginate(20);
       return view("admin.news.index_news",compact("data"));
    }
    public function searchNew(Request $request)
    {
        $data = News::where("new_name",'like','%'.$request->new_name.'%')->where("status",$request->status)->orderBy("updated_at","DESC")->paginate(20);
        return view("admin.news.index_news",compact("data"));
    }
    public function create()
    {
        return view("admin.news.add_news");
    }
    public function store(Request $request)
    {
        $request->validate([
           'new_name'=>'required|max:50',
           'new_title'=>'required|max:150',
           'image'=>'required',
            'new_content'=>'required',
        ]);
        $random = Str::random(4);
        $image ="";
        if ($request->hasFile("image"))
        {
            $file = $request->image;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("error","Invalid image file...");
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/news"),$fileImage);
            $image = "upload/news/".$fileImage;
        }
        $news = News::create([
           'new_name'=> $request->new_name,
            'new_title'=>$request->new_title,
            'type_new'=>$request->type_new,
            'image'=>$image,
            'new_content'=>$request->new_content,
            'status'=>$request->status
        ]);
        if ($news)
        {
            return redirect()->route('admin.new.index')->with("sussces","Add news successfully");
        }
        return redirect()->back()->with("error","Add news failed..!..");
    }
    public function edit($id)
    {
        $new = News::findOrFail($id);
        return view("admin.news.edit_news",compact("new"));
    }
    public function update(Request $request,$id)
    {
        $random = Str::random(4);
        $new = News::findOrFail($id);
        $request->validate([
            'new_name'=>'required|max:50',
            'new_title'=>'required|max:100',
            'new_content'=>'required',
        ]);
        if ($request->hasFile("image"))
        {
            $file = $request->image;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("error","Add news failed..!..");
            }
            if (!is_null($new->__get("image"))){
                unlink($new->__get("image"));
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/news"),$fileImage);
            $image = "upload/news/".$fileImage;
        }else{
            $image = $new->__get("image");
        }
        $new->new_name = $request->new_name;
        $new->new_title = $request->new_title;
        $new->new_content = $request->new_content;
        $new->type_new =$request->type_new;
        $new->status = $request->status;
        $new->image = $image;
        $new->save();
        if ($new)
        {
            return redirect()->route('admin.new.index')->with("sussces","Update news successfully");
        }
        return redirect()->back()->with("error","Update news failed..!..");

    }

    public function delete($id)
    {
        $new = News::findOrFail($id);
        $new->delete();
        if ($new)
        {
            return redirect()->back()->with("success","Delete successful..!..");
        }
        return redirect()->back()->with("error","Delete failed..!..");
    }
    public function show($id)
    {
        $data = News::findOrFail($id);
//        dd($data);
        return view("admin.ajax.new_detail",compact('data'));
    }
}
