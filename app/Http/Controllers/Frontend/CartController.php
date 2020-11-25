<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\CartHelper;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(CartHelper $cart,Products $product,Request $request)
    {
        $id = $product->__get("id");
        $product_data = Products::find($id);
        $size = $request->__get("size_shirt") && $request->__get("size_shirt")!= null ? $request->__get("size_shirt"):null;
        $qty = $request->__get("qty") && (int)$request->__get("qty")>0?(int)$request->__get("qty"):1 ;
        $cart->add($product_data,$qty,$size);
        dd(session('cart'));
        return redirect()->back();
    }
}
