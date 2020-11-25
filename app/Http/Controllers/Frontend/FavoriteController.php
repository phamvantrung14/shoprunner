<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Favorites;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function favoriteCust(Customers $customer)
    {
        $customer_id = $customer->id;
        $products = Products::whereHas('Favorite',function ($query) use ($customer_id){
            $query->where('customer_id',$customer_id);
    })->select('id','pro_name','slug','price','sale_price','avatar')->get();
        $favorite = Favorites::where("customer_id",$customer->id)->orderBy("updated_at","DESC")->get();
        return view("frontend.checkout.favorite",compact("favorite","products"));
    }
    public function add(Products $product)
    {
        $id_cus =Auth::guard('cus')->user()->id;
        $id_product = $product->id;
        Favorites::create([
            "customer_id"=>$id_cus,
            "product_id"=>$id_product
        ]);
        return redirect()->back();
    }
    public function deleteFavorite($id)
    {
        $cus_id = Auth::guard('cus')->user()->id;
        $favorite = Favorites::where("customer_id",$cus_id)->where("product_id",$id)->first();
        $favorite->delete();
        return redirect()->back();
    }
}
