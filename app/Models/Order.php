<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function basket()
    {
    	return $this->belongsTo('App\Models\Basket');
    }

    public function address()
    {
    	return $this->hasOne('App\Models\Address');
    }

    public function user()
    {
    	return $this->hasOne('App\Models\User');
    }
}
