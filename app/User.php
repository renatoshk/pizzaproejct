<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use Sluggable;
    use SluggableScopeHelpers;
    //slug
    public function sluggable(){
        return [
            'slug' => [ 
                'source' => 'username',
                'onUpdate' => false,
                'separator' => '-',
                'method' => null,
                'maxLength' => null,
                'maxLengthKeepWords' => true,
                'unique' => true,
                'uniqueSuffix' => null,
                'includeTrashed' => false,
                'reserved' => null,
                
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','username', 'email', 'password'];

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

    //roles
    public function role(){
        return $this->belongsTo('App\Role', 'role_id');
    }

      //products
    public function products(){
        return $this->hasMany('App\Product');
    }
      //orders
    public function orders(){
        return $this->hasMany('App\Order');
    }
      //payments
    public function payments(){
        return $this->hasMany('App\Payment');
    }
      //shipping
    public function shippings(){
        return $this->hasMany('App\Shipping');
    }
    //admin
    public function isAdmin(){
        if($this->role->name == "admin"){
            return true;
        }
        else {
            return false;
        }
    }
}
