<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class Product extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers; 
    protected $fillable = ['photo_id','category_id', 'name','slug', 'description','price','qty','status'];

    //slug
    public function sluggable(){
        return [
            'slug' => [ 
                'source' => 'name',
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
    //category
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }

}
