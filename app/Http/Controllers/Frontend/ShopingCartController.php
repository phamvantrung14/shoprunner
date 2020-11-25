<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Arrtibute_value;
use App\Models\Products;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Cart;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class ShopingCartController extends Controller
{
    public function index()
    {
        $shopping = \Cart::content();
        $size_shirt = Arrtibute_value::where("arrtb_id",2)->get();
        $size_short = Arrtibute_value::where("arrtb_id",1)->get();
        return view('frontend.shopping.index',compact("shopping","size_shirt","size_short"));
    }
    public function add($id,Request $request)
    {
//        dd($request->all());
        $product = Products::find($id);


        \Cart::add([
            'id' => $product->id,
            'name' => $product->pro_name,
            'qty' => $request->qty && (int)$request->__get("qty")>0?(int)$request->__get("qty"):1,
            'price' => ($product->sale_price)>1 ? $product->sale_price : $product->price,
            'weight' => 1,
            'options' => [
                'size' => $request->size_shirt,
                'avatar'=>$product->avatar,
                'cate'=> $product->cate_id,
            ]]);
//        dd(\Cart::content());
        return redirect()->back();
    }

    public function delete($rowId)
    {
        \Cart::remove($rowId);
        return redirect()->back();
    }

    public function updateQty($rowId,Request $request)
    {
//        dd($request->all());
//        if ($request->size == null){
//            return redirect()->back();
//        }
        if (isset($request->qty))
        {
            \Cart::update($rowId, ['qty' => $request->qty,'options'  => ['size' =>$request->size,'avatar'=>$request->avatar,'cate'=>$request->cate]]);
        }
        return redirect()->back();
    }
}
