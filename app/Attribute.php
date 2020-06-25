<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    //
    protected $fillable =  ['attribute_set_id', 'type', 'label','attr_code'];
    //attribute_set
    public function attribute_set(){
    	return $this->belongsTo('App\Attribute_set');
    }

    //product_attributes
     public function products_attributes(){
    	return $this->hasMany('App\Product_attribute');
    }
}
