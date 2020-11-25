<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Customers;
use App\Models\Products;
use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function add(Request $request,Products $product,$customer)
    {
//        dd($request->all());
        Reviews::create([
            "product_id"=>$product->id,
            "customer_id"=>$customer,
            "number"=>$request->number,
            "content"=>$request->__get("content"),
        ]);
        return redirect()->back();
    }
    public function delete($id)
    {
        $data = Reviews::findOrFail($id);
        $data->delete();
        if ($data)
        {
            return redirect()->back();
        }
    }
}
