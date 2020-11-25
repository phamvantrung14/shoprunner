<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table="reviews";
    public $fillable=["customer_id","product_id","number","content"];
    public function Customer()
    {
        return $this->belongsTo("\App\Models\Customers","customer_id");
    }
}
