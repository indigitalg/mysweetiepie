<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $fillable = ['user_id'];
	
    
    public function basket()
    {
    	return $this->belongsTo('App\Basket');
    }


}
