<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Basket extends Model
{
    protected $fillable = ['session','user_id','email','affiliate_id','remarks','address_id'];
    protected $appends = ['total','shipping','tax'];

    public function order()
    {
    	return $this->hasOne('App\Models\Order');
    }

    public function items()
    {
    	return $this->hasMany('App\Models\Item');
    }

    public function address()
    {
    	return $this->belongsTo('App\Models\Address','address_id');
    }

    public function getTotalAttribute()
    {
        return $this->items->sum(function($detail){
            return $detail->price_amount * $detail->quantity + $detail->addon_total;
        });
    }
    
    public function getGrandTotalAttribute()
    {
        return $this->items->sum(function($detail){
            return $detail->price_amount * $detail->quantity + $detail->addon_total + $detail->label_charge + $detail->shipping + $detail->tax;
        });
    }

    public function getShippingAttribute()
    {
        return $this->items->avg(function($detail){
            return session('shippingType') == 'pickup' ? 0:$detail->shipping;
        });
    }

    public function getTaxAttribute()
    {
        return $this->items->sum(function($detail){
            return $detail->tax;
        });
    }


    public static function attachUser($user = NULL, $email= NULL)
    {   
       $basket = self::whereId(session('basket_id'))->with(['items','address'])->first();
       
       if(!$basket)
            return false;

       $basket->update(['user_id'=>$user,'email'=>$email]);

       if($basket->address)
          $basket->address()->update(['user_id'=>$user]);

        foreach($basket->items as $item)
        {   
            if($item->address)
                $item->address()->update(['user_id'=>$user]);
        }
    }

    public static function valid()
    {
        $basket = self::find(session('basket_id'));
        return $basket && !empty($basket->email);
    }

    public static function refreshCart()
    {
        $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri_segments = explode('/', $uri_path);

        $page =  $uri_segments[count($uri_segments)-1];

        $basket = self::with(['items'=>function($query){
            $query->with('addonitems','product');
        }])->whereId(session('basket_id',0))->first();

        if(!$basket)
            return false;

        foreach($basket->items as $item)
        {
            if($item->product->taxable) {
                $item->update(['tax'=>getTaxCharge($item->subtotal+$item->addon_total,$item->postalcode),
                           'shipping'=>getShippingCharge($item->shipping_id,$item->postalcode)]);
            }
            else {
                $item->update(['tax'=>0,'shipping'=>getShippingCharge($item->shipping_id,$item->postalcode)]);
            }
        }  

        $basket->page = $page;
        $basket->save();      
    }
    // public function itemvariation()
    // {
    // 	return $this->hasMany('App\Models\Itemvariation');
    // }
}
