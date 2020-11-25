<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Stores extends Model
{
    protected $table = "stores";
    public $fillable = ["name_store","city_id","address","slug","phone","status","ma_store"];
    public function City()
    {
        return $this->belongsTo("\App\Models\Citys","city_id");
    }
    protected $datastatus = [
        1=>[
            'name'=>'hide',
            'class'=>'badge badge-danger badge-pill'
        ],
        2=>[
            'name'=>'show up',
            'class'=>'badge badge-success badge-pill'
        ]
    ];
    public function getStatus1()
    {
        return Arr::get($this->datastatus, $this->status);
    }
}
