<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $table = 'cities'; 
   
   public function products() {
       return $this->belongsToMany('App\Models\Product','product_cities');
   }
}
