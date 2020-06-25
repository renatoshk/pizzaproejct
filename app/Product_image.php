<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_image extends Model
{
    //
    protected $fillable = ['product_image'];

    //products
    public function products(){
    	return $this->hasMany('App\Product');
    }
}
