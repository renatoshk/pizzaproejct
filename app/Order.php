<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['product_id', 'status','qty','size','total_price'];

    //users
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    //products
    public function product(){
    	return $this->belongsTo('App\Product', 'product_id');
    }

    //shippings
    public function shippings(){
        return $this->hasMany('App\Shipping');
    }
    //payments
    public function payments(){
        return $this->hasMany('App\Payment');
    }
}
