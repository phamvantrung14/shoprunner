<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endow_product extends Model
{
    protected $table = "endow_product";
    public $fillable = ["product_id","endow_id"];

    public function Endows()
    {
        return $this->belongsTo("\App\Models\Endows","endow_id");
    }
}
