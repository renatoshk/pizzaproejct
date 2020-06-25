<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    //
    protected $fillable = ['order_id', 'shipping_id','city','address','zip_code'];

    //users
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    //orders
    public function order(){
    	return $this->belongsTo('App\Order', 'order_id');
    }
    //shipping methods
    public function shipping_method(){
    	return $this->belongsTo('App\Shipping_method', 'shipping_id');
    }
}
