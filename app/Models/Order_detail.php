<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $table="order_detail";
    public $fillable=["product_id","order_id","quantity","price","size"];
    public function Product()
    {
        return $this->belongsTo("\App\Models\Products","product_id");
    }
    public function Order()
    {
        return $this->belongsTo("\App\Models\Orders","order_id");
    }
    public function getPrice()
    {
        $price = $this->__get("price")*$this->__get("quantity");
        return "$".number_format($price,2);
    }
    public function Size1()
    {
        return $this->hasOne("\App\Models\Arrtibute_value","size");
    }
}
