<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Gallery extends Model
{
	
	protected $table = 'gallery';

 	public function getUpdatedAtAttribute($value)
    {
        return Carbon::createFromTimestamp(strtotime($value))->diffForHumans(Carbon::now());
    }
}