<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_arrtibutes extends Model
{
    protected $table = "product_arrtibutes";
    public $fillable = ["product_id", "arrtibute_value_id"];


    public function Product()
    {
        return $this->belongsTo("\App\Models\Products", "product_id");
    }

    public function Arrtibutte_value()
    {
        return $this->belongsTo("\App\Models\Arrtibute_values","arrtibute_value_id");
    }
}
