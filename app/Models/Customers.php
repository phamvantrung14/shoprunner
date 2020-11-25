<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class Customers extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'customers';
    protected $fillable = [
        'customer_name', 'email', 'password','phone_number','address','image'
    ];
    public const ADMIN_ROLE = 1;
    public const USER_ROLE =0;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getImage()
    {
        if (is_null($this->__get("image")))
        {
            return asset("backend/images/avatar-1.jpg");
        }else {
            return asset($this->__get("image"));
        }
    }
    protected $type=[
        0=>[
            'name'=>"Often",
            'class'=>'badge badge-brandc badge-pill'
        ],
        1=>[
            'name'=>"Admin",
            'class'=>'badge badge-primary badge-pill'
        ]
    ];
    public function getRole()
    {
        return Arr::get($this->type,$this->role);
    }
}
