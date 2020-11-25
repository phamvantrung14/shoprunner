<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Arrtibute_value;
use App\Models\Arrtibutes;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Endow_product;
use App\Models\Endows;
use App\Models\Product_arrtibutes;
use App\Models\Product_image;
use App\Models\Products;
use App\Models\Reviews;
use App\Models\Technical;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $cate = Categories::all();
        $brands = Brands::orderBy("brand_name","ASC")->get();
        $products = Products::paginate(20);

        return view("admin.product.index",compact("products","cate","brands"));
    }
    public function search(Request $request)
    {
//        dd($request->all());
        $cate = Categories::all();
        $brands = Brands::orderBy("brand_name","ASC")->get();
        $products = Products::where("pro_name",'like','%'.$request->pro_name.'%')->where("brand_id",$request->brand_id)->where("status",$request->status)->where("cate_id",$request->cate_id)->paginate(20);
        return view("admin.product.index",compact("products","cate","brands"));
    }
    public function add()
    {
        $brands = Brands::all();
        $cate = Categories::all();
        $color = Arrtibute_value::where("arrtb_id",9)->get();
        $sizeShoes = Arrtibute_value::where("arrtb_id",1)->get();
        $sizeShirt = Arrtibute_value::where("arrtb_id",2)->get();
        $endows = Endows::orderBy("endow_name","ASC")->get();
        return view("admin.product.add-pd",compact("brands","cate","color","sizeShoes","sizeShirt","endows"));
    }
    public function save(Request $request)
    {
//        dd($request->all());
        $random = Str::random(4);
        $request->validate([
           "pro_name"=>"required|min:3",
           "ma_sp"=>"required|unique:products",
           "price"=>"required",
           "made_from"=>"required",
        ],[
            "pro_name.required"=>"Product name must not be blank",
            "pro_name.min"=>"Product name must be at least 3 characters",
            "ma_sp.required"=>"Product code must not be blank",
            "ma_sp.unique"=>"Product code already exists",
            "price.required"=>"Product price must not be blank",
            "made_from.required"=>"Origin must not be blank",
        ]);

        if ($request->sale_price>$request->price)
        {
            return redirect()->back()->with("error","Promotional price cannot be greater than price");
        }
        $image ="";
        if ($request->hasFile("avatar"))
        {
            $file = $request->avatar;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("thong_bao","Invalid image file...");
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/product"),$fileImage);
            $image = "upload/product/".$fileImage;
        }
        $slug = Str::slug($request->pro_name.$request->ma_sp);
        $pro = Products::create([
           "pro_name"=>$request->pro_name,
           "slug"=>$slug,
           "price"=>$request->price,
           "sale_price"=>$request->sale_price,
           "ma_sp"=>$request->ma_sp,
           "new"=>$request->new,
           "status"=>$request->status,
           "cate_id"=>$request->cate_id,
           "description"=>$request->description,
           "brand_id"=>$request->brand_id,
            "avatar"=>$image,
            "made_from"=>$request->made_from,
            "rating"=>$request->rating
        ]);
        if ($request->hasFile("image")) {
            foreach ($request->image as $value) {
                $extName2 = $value->getClientOriginalExtension();
                if ($extName2 != "png" && $extName2 != "jpg" && $extName2 != "jpeg" && $extName2 != "gif") {
                    return redirect()->back()->with("thong_bao", "Invalid products image file");
                }
                $imageName = $value->getClientOriginalName();
                $filePdImg = $random . "_" . $imageName;
                $value->move(public_path("upload/product"), $filePdImg);
                $link = "upload/product/" . $filePdImg;
                Product_image::create([
                    "image" => $link,
                    "product_id" => $pro->__get("id"),
                    "status" => 1,
                ]);

            }
        }
        if (!is_null($request->arrtibute_value_id))
        {
            foreach ($request->arrtibute_value_id as $value)
            {
                Product_arrtibutes::create([
                    "product_id"=>$pro->id,
                    "arrtibute_value_id"=>$value,
                ]);
            }
        }
        if (!is_null($request->endow_id))
        {
            foreach ($request->endow_id as $value)
            {
                Endow_product::create([
                    "product_id"=>$pro->id,
                    "endow_id" =>$value
                ]);
            }
        }
        if ($request->speed != null && $request->incline != null)
        {
            Technical::create([
                "speed"=>$request->speed,
                "incline"=>$request->incline,
                "running_floor_size"=>$request->running_floor_size,
                "weight"=>$request->weight,
                "size_pro"=>$request->size_pro,
                "weight_withstand"=>$request->weight_withstand,
                "product_id"=>$pro->id,
            ]);
        }


        return redirect()->route("admin.product.index")->with("success","Add new products successfully");
    }
    public function edit(Products $product)
    {
        $pro = Products::findOrFail($product->id);
        $brands = Brands::all();
        $cate = Categories::all();
        $color = Arrtibute_value::where("arrtb_id",9)->get();
        $sizeShoes = Arrtibute_value::where("arrtb_id",1)->get();
        $sizeShirt = Arrtibute_value::where("arrtb_id",2)->get();
        $pro_attb_vl = Product_arrtibutes::where("product_id",$product->id)->pluck("arrtibute_value_id")->toArray();
        $endows = Endows::orderBy("endow_name","ASC")->get();
        $pro_endow = Endow_product::where("product_id",$product->id)->pluck("endow_id")->toArray();
        if (!$pro_attb_vl){
            $pro_attb_vl = [];
        }
        $technical = Technical::where("product_id",$product->id)->first();
        return view("admin.product.edit-pd",compact("pro","brands","cate","color",
            "sizeShoes","sizeShirt","pro_attb_vl","technical","endows","pro_endow"));
    }

    public function update(Request $request,Products $product)
    {
        $random = Str::random(4);
        $pro = Products::findOrFail($product->id);
        $request->validate([
            "pro_name"=>"required|min:3",
            "ma_sp"=>"required",
            "price"=>"required",
            "made_from"=>"required",
        ],[
            "pro_name.required"=>"Product name must not be blank",
            "pro_name.min"=>"Product name must be at least 3 characters",
            "ma_sp.required"=>"Product code must not be blank",
            "price.required"=>"Product price must not be blank",
            "made_from.required"=>"Origin must not be blank",
        ]);
        if ($request->hasFile("avatar"))
        {
            $file = $request->avatar;
            $extName = $file->getClientOriginalExtension();
            if ($extName != "png" && $extName != "jpg" && $extName != "jpeg" && $extName != "gif")
            {
                return redirect()->back()->with("thong_bao","File avatar không hợp lệ..");
            }
            if (!is_null($pro->__get("avatar"))){
                unlink($pro->__get("avatar"));
            }
            $fileName = $file->getClientOriginalName();
            $fileImage = $random."_".$fileName;
            $file->move(public_path("upload/product"),$fileImage);
            $image = "upload/product/".$fileImage;
        }else{
            $image = $pro->__get("avatar");
        }
        $slug = Str::slug($request->pro_name.$request->ma_sp);

        $pro->pro_name      =$request->pro_name;
        $pro->slug          =$slug;
        $pro->price         =$request->price;
        $pro->sale_price    =$request->sale_price;
//        $pro->ma_sp         =$request->ma_sp;
        $pro->new           =$request->new;
        $pro->cate_id       =$request->cate_id;
        $pro->description   =$request->description;
        $pro->brand_id      =$request->brand_id;
        $pro->avatar        =$image;
        $pro->made_from     =$request->made_from;
        $pro->status        = $request->status;
        $pro->rating        =$request->rating;
        $pro->save();
        if ($request->hasFile("image")) {
            foreach ($request->image as $value) {
                $extName2 = $value->getClientOriginalExtension();
                if ($extName2 != "png" && $extName2 != "jpg" && $extName2 != "jpeg" && $extName2 != "gif") {
                    return redirect()->back()->with("thong_bao", "File ảnh sản phẩm không hợp lệ..");
                }

                $imageName = $value->getClientOriginalName();
                $filePdImg = $random . "_" . $imageName;
                $value->move(public_path("upload/product"), $filePdImg);
                $link = "upload/product/" . $filePdImg;
                Product_image::create([
                    "image" => $link,
                    "product_id" => $pro->__get("id"),
                    "status" => 1
                ]);

            }
        }
        if (!is_null($request->arrtibute_value_id))
        {
            Product_arrtibutes::where("product_id",$pro->id)->delete();
            foreach ($request->arrtibute_value_id as $value)
            {
                Product_arrtibutes::create([
                    "product_id"=>$pro->id,
                    "arrtibute_value_id"=>$value,
                ]);
            }
        }
        if (!is_null($request->endow_id))
        {
            Endow_product::where("product_id",$pro->id)->delete();
            foreach ($request->endow_id as $value)
            {
                Endow_product::create([
                    "product_id"=>$pro->id,
                    "endow_id" =>$value
                ]);
            }
        }
        $ten = Technical::where("product_id",$pro->id)->first();

        if (isset($ten))
        {
            $ten->speed                 =$request->speed;
            $ten->incline               =$request->incline;
            $ten->running_floor_size    =$request->running_floor_size;
            $ten->weight                =$request->weight;
            $ten->size_pro             =$request->size_pro;
            $ten->weight_withstand     =$request->weight_withstand;
            $ten->save();
        }
        return redirect()->route("admin.product.index")->with("success","Update products successfully");

    }


    public function delete(Products $product)
    {
        $pro = Products::findOrFail($product->id);
         Technical::where("product_id",$product->id)->delete();
         Product_arrtibutes::where("product_id",$product->id)->delete();
        Product_image::where("product_id",$product->id)->delete();
        Endow_product::where("product_id",$product->id)->delete();
        $pro->delete();
        if ($pro)
        {
            return redirect()->route("admin.product.index")->with("success","Delete successful..!..");
        }
        return redirect()->route("admin.product.index")->with("error","Delete failed..!..");
    }

    public function show(Products $product)
    {
        $id = $product->id;
        $data = Products::findOrFail($id);
        $arrtb_vl = Product_arrtibutes::where("product_id",$id)->pluck("arrtibute_value_id")->toArray();
        $color = Arrtibute_value::where("arrtb_id",9)->get();
        $sizeShoes = Arrtibute_value::where("arrtb_id",1)->get();
        $sizeShirt = Arrtibute_value::where("arrtb_id",2)->get();
        $pro_image = Product_image::where("product_id",$id)->get();
        $technical = Technical::where("product_id",$id)->first();
        $reviews = Reviews::where("product_id",$id)->orderby("updated_at","DESC")->get();
        $endows = Endow_product::where("product_id",$id)->get();

//        dd($pro_image);
        return view("admin.product.check",compact("data","arrtb_vl","color","sizeShoes","sizeShirt",
            "pro_image","technical","reviews","endows"));
    }

    public function delete_img($id)
    {
        $proImg= Product_image::findOrFail($id);
        $proImg->delete();
        if ($proImg)
        {
            return redirect()->back()->with("success","Delete successful..!..");
        }
        return redirect()->back()->with("error","Delete failed..!..");
    }


}
