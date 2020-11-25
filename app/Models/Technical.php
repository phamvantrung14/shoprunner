<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technical extends Model
{
    protected $table ="technical";
    public $fillable=["speed","incline","running_floor_size","weight","size_pro","weight_withstand","product_id"];

    public function Products()
    {
        return $this->belongsTo("\App\Models\Products","product_id");
    }
}
