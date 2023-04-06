<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function Country()
    {
    	return $this->belongsTo('App\Models\Country','code','country');
    }

    public function products() {
    	return $this->belongsToMany('App\Models\Product');
  	}
}
