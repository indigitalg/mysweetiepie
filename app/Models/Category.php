<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function products()
	{
		return $this->belongsToMany('App\Models\Product')->withPivot('position');
	}

    public function parent() 
    {
    	return $this->belongsTo(static::class, 'parent_id');
  	}

	public function children() 
  	{
	    return $this->hasMany(static::class, 'parent_id');
	}
}
