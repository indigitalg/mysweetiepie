<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    

    public function contents()
    {
    	return $this->hasMany('App\Models\Content');
    }
}
