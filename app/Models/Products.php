<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Products extends Model
{
    protected $table="products";
    public $fillable=["pro_name","slug","price","sale_price","avatar","description","ma_sp","new","cate_id","brand_id","made_from","rating"];

    public function number_price($price, $sale_price)
    {
        if ($sale_price<1)
        {
            return "";
        }
        $price1 = (($sale_price-$price)/ $price)*100;
        return round($price1)."%";
    }
    public function salePrice()
    {
        if ($this->sale_price>1){
            return ("( sale price: $".number_format($this->__get("sale_price"),2)." )");

        }
        return ;
    }
    public function getAvatar()
    {
        return asset($this->__get("avatar"));
    }
    public function getPrice()
    {
        return "$".number_format($this->__get("price"),2);
    }
    public function getSalePrice()
    {
        if ($this->__get("sale_price")>1)
        {
            return ("$".number_format($this->__get("sale_price"),2));
        }
        return ;
    }
    protected $type = [
        1=>[
            'name'=>"Default",
            'class'=>'badge badge-primary badge-pill'
        ],
        2=>[
            'name'=>'Normal',
            'class'=>'badge badge-brand badge-pill'
        ],
        3=>[
            'name'=>'New',
            'class'=>'badge badge-danger badge-pill'
        ],
        4=>[
            'name'=>'Hot',
            'class'=>'badge badge-success badge-pill'
        ],
    ];
    public function getNew()
    {
        return Arr::get($this->type, $this->new);
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
    public function Categories()
    {
        return $this->belongsTo("\App\Models\Categories","cate_id");
    }
    public function Brands()
    {
        return $this->belongsTo("\App\Models\Brands","brand_id");
    }
    public function Product_arrtibutes()
    {
        return $this->hasMany("\App\Models\Product_arrtibutes","product_id");
    }
    public function Product_img()
    {
        return $this->belongsTo("\App\Models\Product_image","product_id");
    }

    public function Favorite()
    {
        return $this->belongsToMany(Customers::class,'favorites','product_id','customer_id');
    }

}
