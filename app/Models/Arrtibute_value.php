<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrtibute_value extends Model
{
    protected $table="arrtibute_values";
    public $fillable=["name_arrtb_value","arrtb_id"];

    public function Arrtb()
    {
        return $this->belongsTo("\App\Models\Arrtibutes","arrtb_id","id");
    }
}
