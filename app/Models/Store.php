<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Store extends Model
{
    protected $table = 'stores';
    
    
    public function store_timing() {
        return $this->hasMany('App\Models\StoreTiming');
    }

}



