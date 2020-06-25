<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = ['photo_id', 'name', 'description','price','qty','status'];
    //users
    public function user(){
    	return $this->belongsTo('App\User','user_id');
    }
    //product_image
    public function photo(){
    	return $this->belongsTo('App\Product_image','photo_id');
    }
    //orders
    public function products(){
    	return $this->hasMany('App\Order');
    }
    //product_attributes
    public function product_attributes(){
    	return $this->hasMany('App\Product_attribute');
    }
}
