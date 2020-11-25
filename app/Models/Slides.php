<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Slides extends Model
{
    protected $table = "slides";
    public $fillable=["title","content","image","type","status"];

    public function getImage()
    {
        return $this->__get("image");
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
    public function getStatus()
    {
        return Arr::get($this->datastatus, $this->status);
    }
    protected $dataType = [
        0=>[
            'name'=>"Default",
            'class'=>'badge badge-primary badge-pill'
        ],
        1=>[
            'name'=>'Home Page',
            'class'=>'badge badge-brand badge-pill'
        ],
        2=>[
            'name'=>'Product Short',
            'class'=>'badge badge-danger badge-pill'
        ],
        3=>[
            'name'=>'Product Shirt',
            'class'=>'badge badge-success badge-pill'
        ],
        4=>[
            'name'=>'Detail',
            'class'=>'badge badge-google-plus badge-pill'
        ],
    ];
    public function getType()
    {
        return Arr::get($this->dataType, $this->type);
    }
}
