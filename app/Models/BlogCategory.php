<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class BlogCategory extends Model {
    protected $table = 'blogscategories';
    //protected $connection = 'mysql2';

    public function products() {
 	 	  return $this->belongsToMany('App\Blog')->withPivot('position');
  	}

  	public function parent() {
    	return $this->belongsTo(static::class, 'parent_id');
  	}

    public function children() {
      return $this->hasMany(static::class, 'parent_id');
    }

  	public function setNameAttribute($value) {
      	$this->attributes['name'] = title_case($value);
  	}

  	public function getUpdatedAtAttribute($value) {
      	return Carbon::createFromTimestamp(strtotime($value))->diffForHumans(Carbon::now());
  	}
}