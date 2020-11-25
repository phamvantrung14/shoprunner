<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    protected $table = "citys";
    public $fillable = ["name_city","area_id","status","slug"];
    public function Area()
    {
       return $this->belongsTo("App\Models\Area","area_id","id");
    }
}
