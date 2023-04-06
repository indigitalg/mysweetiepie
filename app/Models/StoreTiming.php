<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class StoreTiming extends Model
{
    protected $table = 'store_timing';

    public function store() {
        return $this->belongsTo('App\Models\Store');
    }

}



