<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table="roles";
    public $fillable=["name","permissions"];
}
