<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Menu extends Model
{

    public function parent() {
      	return $this->belongsTo(static::class, 'parent_id');
    }

  	public function children() 
    {
  	    return $this->hasMany(static::class, 'parent_id');
  	}

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))->diffForHumans(Carbon::now());
    }
  
}
