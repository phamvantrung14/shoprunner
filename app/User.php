<?php

namespace App;

use App\Models\Roles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','phone_number','address','image'
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
            'name'=>"Close",
            'class'=>'badge badge-danger badge-pill'
        ],
        1=>[
            'name'=>"Active",
            'class'=>'badge badge-primary badge-pill'
        ]
    ];
    public function getRole()
    {
        return Arr::get($this->type,$this->role);
    }
    //phan quyen laravel
    public function hasPermission($route)
    {
        $routes = $this->routes();
        return in_array($route,$routes) ? true : false;
    }

    //cac rout gan cho nguoi dung
    public function routes()
    {
        $data= [];
        foreach ($this->getRoles as $role)
        {
            $permission = json_decode($role->permissions);
            foreach ($permission as $per){
                if (!in_array($per,$data))
                {
                    array_push($data,$per);
                }
            }
        }
//        dd($data);
        return $data;
    }
    public function getRoles()
    {
        return $this->belongsToMany(Roles::class,'user_role','user_id','role_id');
    }
}
