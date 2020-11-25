<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class News extends Model
{
    protected $table="news";
    public $fillable=["new_name","new_content","new_title","image","status","type_new"];
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
            'name'=>'Recruitment',
            'class'=>'badge badge-brand badge-pill'
        ],
        2=>[
            'name'=>'New running machine',
            'class'=>'badge badge-danger badge-pill'
        ],
        3=>[
            'name'=>'New outfit',
            'class'=>'badge badge-success badge-pill'
        ],
        4=>[
            'name'=>'New shoes',
            'class'=>'badge badge-google-plus badge-pill'
        ],
    ];
    public function getType()
    {
        return Arr::get($this->dataType, $this->type_new);
    }
}
