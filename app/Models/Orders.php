<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Orders extends Model
{
    protected $table ="orders";
    public $fillable=["order_name","email","phone_number","total_price","address","note","payment","status","customer_id","city_id"];

    public function Order_detail()
    {
        return $this->hasOne("\App\Models\Order_detail","order_id","id");
    }
    public function getStatus()
    {
        if ($this->__get("status")==0)
        {
            return 'Awaiting';
        }else if ($this->__get("status")==1){
            return "Confirmed";
        }else if ($this->__get("status")==2){
            return "Being transported";
        }else if ($this->__get("status")==3){
            return "Complete";
        }else if ($this->__get("status")==4){
            return "Cancel";
        }
    }
    protected $statusdata = [
        0=>[
            'name'=>"Awaiting",
            'class'=>'badge badge-primary badge-pill'
        ],
        1=>[
            'name'=>'Confirmed',
            'class'=>'badge badge-brand badge-pill'
        ],
        2=>[
            'name'=>'Being transported',
            'class'=>'badge badge-secondary badge-pill'
        ],
        3=>[
            'name'=>'Complete',
            'class'=>'badge badge-success badge-pill'
        ],
        4=>[
            'name'=>'Cancel',
            'class'=>'badge badge-danger badge-pill'
        ],
    ];
    public function statusOrder()
    {
        return Arr::get($this->statusdata, $this->status);
    }
    public function payment()
    {
        if ($this->payment==1)
        {
            return "Online";
        }else{
            return "COD";
        }
    }
    public function getTotalPrice()
    {
        return "$".number_format($this->__get("total_price"),2);
    }
    public function City()
    {
        return $this->belongsTo("App\Models\Citys","city_id");
    }

}
