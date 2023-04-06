<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    public function banner()
    {
    	return $this->belongsTo('App\Models\Banner');
    }
}
