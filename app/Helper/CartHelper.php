<?php
namespace App\Helper;
class CartHelper
{
    public $items =[];
    public $total_quantity= 0;
    public $total_price = 0;
    public function __construct()
    {
        $this->items = session('cart')?session('cart'):[];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }
    public function add($product,$qty,$size)
    {
        $item = [
            "id" => $product->id,
            "pro_name"=>$product->pro_name,
            "price"=>($product->sale_price)>1 ? $product->sale_price : $product->price,
            "avatar"=>$product->avatar,
            "cate_id"=>$product->cate_id,
            "qty"=>$qty,
            "size"=>$size
        ];
        if (isset($this->items[$product->id]) && $this->items[$product->id]["size"]==$size)
        {
            $this->items[$product->id]['qty']+= $qty;
        }else{
            $this->items[$product->id] = $item;
        }
//        session(['cart'=> $this->items]);
    }

    public function get_total_price()
    {

    }
    public function get_total_quantity()
    {

    }
}
