<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_attribute extends Model
{
    //
    protected $fillable = ['product_id','attribute_set_id','attribute_id','attribute_value'];

    //products
    public function product(){
    	return $this->belongsTo('App\Product','product_id');
    }
    //attribute sets
    public function attribute_set(){
    	return $this->belongsTo('App\Attribute_set','attribute_set_id');
    }
    //attributes
    public function attribute(){
    	return $this->belongsTo('App\Attribute','attribute_id');
    }


}
