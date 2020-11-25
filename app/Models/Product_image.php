<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    protected $table="product_image";
    public $fillable=["image","product_id","status"];
    public function Product()
    {
        return $this->belongsTo("\App\Models\Products","product_id");
    }
}
