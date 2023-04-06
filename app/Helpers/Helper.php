<?php

use App\Models\Item;
use App\Models\Store;
use App\Models\Menu;
use App\Models\SEO;
use App\Models\Province;

    function getCartCount()
    {
        return Item::whereBasketId(session('basket_id'))->count();
    }

    function getStores() {
        $stores = Store::with(['store_timing'=>function($q){ $q->orderBy("day","ASC"); }])->where('status',1)->get();
        return $stores;
    }

    function getMenu($handle,$attributes)
    {
        $menu = Menu::with(['children'=>function($query){$query->whereStatus(1)->orderBy('weight','ASC');}])->whereSlug($handle)->whereStatus(1)->first();

        if(!$menu)
            return false;
        
        echo '<ul ';

        foreach($attributes as $key=>$val)
        {
            echo $key.'="'.$val.'" ';
        }

        echo 'class="menu">'."\n\r".getSubMenu($menu->children)."\n\r".'</ul>'."\n";
    }

    function getSubMenu($children)
    {
        $result = '';

        foreach($children as $submenu)
        {
            $result .= '<li class="menu-item-has-children">'."\n\r";
            $result .= '<a href="'.url($submenu->link.'').'">'.$submenu->name.'</a>'."\n\r";

            if(count($submenu->children)>0)
            {
            $result .= '<ul class="sub-menu">'."\n\r".getSubMenu($submenu->children)."\n\r".'</ul>'."\n\r";
            }

            $result .= '</li>'."\n\r";
        }

        return $result;
    }

    
    function getTags($url) {
        
        return SEO::where('url',ltrim(rtrim($url,'/'),'/'))->first() ?? null;
        
    }

    
    function provinces() {

        $provinces = Province::where('country','CA')->get();
        return $provinces;
    }


    
    function discountAvailable()
    {
        if(session()->has('coupon') && session()->has('value') && session()->has('value_type'))
        {
            $basket = App\Basket::with('items')->whereId(session('basket_id',0))->first();

            if($basket && count($basket->items)>0)
            {
                return false;
            }
            else
            {
                return true;
            }

            return true;
        }

        return false;
    }
