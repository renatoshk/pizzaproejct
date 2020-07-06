<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    protected $fillable = ['order_id', 'credit_card_name', 'credit_card_number','expiration','verification_number'];

    //users
    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }
    //orders
    public function order(){
    	return $this->belongsTo('App\Order', 'order_id');
    }
    
}
