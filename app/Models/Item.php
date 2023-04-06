<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // protected $fillable = ['tax','shipping'];
    // protected $appends = ['subtotal','image','addon_total'];
    
    // public function addonitems()
    // {
    //     return $this->hasMany('App\Addonitem');
    // }

    // public function delivery()
    // {
    //     return $this->belongsTo('App\Shipping','shipping_id');
    // }

    // public function basket()
    // {
    // 	return $this->belongsTo('App\Basket');
    // }

    // public function product()
    // {
    // 	return $this->belongsTo('App\Product');
    // }

    // public function address()
    // {
    //     return $this->belongsTo('App\Address');
    // }

    // public function price()
    // {
    // 	return $this->hasOne('App\Price');
    // }

    // public function getSubtotalAttribute()
    // {
    //     return $this->quantity * $this->price_amount;
    // }

    // public function getAddonTotalAttribute()
    // {
    //     return $this->addonitems->sum(function($detail){
    //         return $detail->addon_price * $detail->quantity;
    //     });
    // }

    // public function getImageAttribute()
    // {
    //     return env('PRODUCT_FILES').$this->picture;
    // }
    
    // public function itemvariation()
    // {
    // 	return $this->hasMany('App\Itemvariation');
    // }
    
    // public function getLabelChargeAttribute()
    // {
    // 	return $this->custom_label == 1 ? 0.5 : 0;
    // }
}
