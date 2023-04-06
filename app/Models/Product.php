<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $appends = ['image'];
  
  	public function categories()
	{
	  	return $this->belongsToMany('App\Models\Category')->withPivot('position');
	}

// 	public function occasions()
// 	{
// 	  	return $this->belongsToMany('App\Models\Occasion');
// 	}
	
// 	public function cities()
// 	{
//         return $this->belongsToMany('App\Models\City', 'product_cities', 'product_id', 'city_id');
//     }

//  	public function colors()
// 	{
// 		return $this->belongsToMany('App\Models\Color');
// 	}

// 	public function addons()
// 	{
//   	return $this->belongsToMany('App\Models\Addon');
// 	}

	public function prices()
	{
		// return $this->hasMany('App\Models\Price');
	}

// 	public function provinces() {
// 		return $this->belongsToMany('App\Models\Province');
// 	}

// 	  public function shippings()
// 	  {
// 	    return $this->belongsToMany('App\Models\Shipping');
// 	  }

// 	public function getImageAttribute()
// 	{
// 	    return env('PRODUCT_FILES').$this->picture;
// 	}
	
// 	public function getImage2Attribute()
// 	{
// 	    return env('PRODUCT_FILES').$this->picture1;
// 	}
	
// 	public function getImage3Attribute()
// 	{
// 	    return env('PRODUCT_FILES').$this->picture2;
// 	}
// 	public function menuCategory() {
//     return $this->belongsTo('App\Models\MenuCategory');
//   }
//   public function manageMenu() {
//     return $this->belongsTo('App\Models\ManageMenu');
//   }
}
