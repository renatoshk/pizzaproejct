<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

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
