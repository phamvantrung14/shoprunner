<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = "favorites";
    public $fillable = ["product_id","customer_id"];
}
