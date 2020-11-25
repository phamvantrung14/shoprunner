<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "area";
    public $fillable =["name_area","slug"];
}
