<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute_set extends Model
{
    //
    protected $fillable = ['name'];
    //attribute
    public function attributes(){
    	return $this->hasMany('App\Attribute');
    }
    //product_attributes
     public function product_attributes(){
    	return $this->hasMany('App\Product_attribute');
    }

}
