<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('signup','UserController@signup');
Route::post('signup','UserController@postSignup');
Route::get('signin','UserController@signin');
Route::post('signin','UserController@postSignin')->name('login');
Route::get('signout','UserController@signout')->name('logout');
Route::get('retrieve-account','UserController@getRetrievepassword');
Route::post('retrieve-account','UserController@postRetrievepassword');
Route::get('reset-password/{token}','UserController@getResetpassword');
Route::post('reset-password/{token}','UserController@postResetpassword');



Route::group(['prefix'=>'myaccount','middleware' => ['auth','web']], function () {
    Route::get('/','UserController@index');
    Route::get('profile','UserController@profile');
    Route::post('profile','UserController@postProfile');
    Route::get('password','UserController@password');
    Route::post('password','UserController@postPassword');
    Route::get('orders','UserController@orders');
    Route::get('logout','UserController@signout');
});



Route::group(['middleware'=>['web']],function(){
    // Route::get('exception/404','MainController@exception404');
    // Route::get('exception/500','MainController@exception500');
    
    // Route::get('customerslist','MainController@getCustomers');
    
    // Route::get('support','ContactController@support');
    
    // Route::post('support','ContactController@postSupport');
    


    Route::get('/','MainController@index');

            
    Route::get('blogs','MainController@blogs');
    Route::get('blogdetail/{id}','MainController@blogsdetail');
    Route::get('shipping-policies','MainController@shipping_policies');
    Route::get('faqs','MainController@faqs');
    Route::get('policies','MainController@policies');
    Route::get('media','MainController@gallery');
    Route::get('gallery','MainController@gallery');

    Route::get('contact','ContactController@create');
    Route::post('contact','ContactController@store');
    Route::get('menu','MainController@menu');

    Route::any('category/{category?}','ProductController@category');
    Route::any('subcategory/{category}','ProductController@category');

    // Route::get('shop/customize-label','ShoppingController@customizeLabel');
    // Route::post('shop/customize-label','ShoppingController@postCustomizeLabel');

    
    // Route::get('pickupcal',function(){
    //     echo getPickupCalendar(date('n'),date('Y'),'harbord');
    // });

    // Route::any('occasion/{occasion}','ProductController@occasion');
    // Route::any('search','ProductController@search');
    // Route::any('luxury','ProductController@luxury');
    // Route::any('products','ProductController@index');

    // Route::get('producttest/{slug}','ProducttestController@show'); // test product page
    // Route::post('producttest/showprice','ProducttestController@showprice'); // test product page

    // Route::get('products/{slug}','ProductController@show');
    // Route::post('products/{slug}/showprice','ProductController@showprice'); 
    
    // Route::post('occasion-get-by-id','ProductController@getOccasions');
    
    // Route::get('delivery-options','MainController@deliveryOptions');
    // Route::post('delivery-options','MainController@postDeliveryOptions');
    // Route::get('delivery-clear','MainController@deliveryOptionsDelete');
    // Route::post('notdelivery_location','ProductController@notdeliveryloc');
    
    // Route::get('signup','UserController@signup');
    // Route::post('signup','UserController@postSignup');
    // Route::get('signin','UserController@signin');
    // Route::post('signin','UserController@postSignin')->name('login');
    // Route::get('signout','UserController@signout')->name('logout');
    // Route::get('retrieve-account','UserController@getRetrievepassword');
    // Route::post('retrieve-account','UserController@postRetrievepassword');
    // Route::get('reset-password/{token}','UserController@getResetpassword');
    // Route::post('reset-password/{token}','UserController@postResetpassword');

    // Route::post('products/{slug}','ShoppingController@add');
    // Route::get('avail','MainController@availCoupon');
    // Route::get('shop/cart','ShoppingController@index');
    // Route::post('shop/coupon','ShoppingController@coupon');
    // Route::get('shop/remove/{id}','ShoppingController@remove');
    // Route::get('shop/remove/{itemid}/addon/{addonid}','ShoppingController@removeAddon');
    // Route::get('shop/cart/update','ShoppingController@updateCart');
    // Route::get('shop/login','ShoppingController@login');
    // Route::post('shop/login','ShoppingController@postLogin');
    // Route::get('shop/checkout','ShoppingController@checkout');
    // Route::post('shop/checkout','ShoppingController@postCheckout');
    // Route::get('shop/billing','ShoppingController@billing');
    // Route::post('shop/billing','ShoppingController@postBilling');
    // Route::get('shop/thankyou','ShoppingController@thankyou');
    // Route::post('shop/province-check','ShoppingController@provinceCheck');
    // Route::get('deleteproduct/{id}','ShoppingController@deleteProduct');

    // Route::get('shop/test-billing','ShoppingController@billing');
    // Route::post('shop/test-billing','ShoppingController@testBilling');

    // Route::get('continue-shopping/{id}','ShoppingController@continueShopping');

    // //Route::get('{slug}','LandingPageController@index');
    
    // Route::get('confirm-delivery','MainController@confirmDelivery');
    // Route::post('confirm-delivery','MainController@postConfirmDelivery');


    // Route::any('moneris','MainController@moneris');
    // Route::get('recipes','MainController@recipes');
    // Route::get('recipesdetail/{id}','MainController@recipesdetail');
    


    // Route::get('setprice','MainController@provincePrice');
    // Route::post('setprice','MainController@postProvincePrice');
    // Route::get('setprovince/{id}','MainController@setProvince');
    // Route::post('setprovince','MainController@setProvince');
    // Route::get('setprovproducts','MainController@setProductProvince');
    // Route::get('wholesale','MainController@wholesale');
    // Route::post('wholesale','MainController@store');
    // Route::get('medicalert','MainController@medicalert');
    // Route::get('torontomarlies','MainController@torontomarliesHome');
    // Route::get('torontomarliesxsweetiepie','MainController@torontomarlies');
    


    // Route::get('holidayseason','HolidayController@index');
    // Route::get('holidayseason/shop','HolidayController@shop');
    // Route::post('holidayseason/shop/options','HolidayController@setOptions');
    
    // Route::post('holidayseason/pickup-options','HolidayController@pickup');
    // Route::post('holidayseason/add-cart','HolidayController@addCart');
    // Route::get('holidayseason/checkout','HolidayController@checkout');
    // Route::post('holidayseason/checkout','HolidayController@postCheckout');
    // Route::get('holidayseason/thankyou','HolidayController@thankyou');

    
    // Route::get('feedback/{location}','MainController@feedback');
    // Route::post('feedback/{location}','MainController@postFeedback');

    // Route::get('subscribe','SubscriberController@getSubscription');
    // Route::post('subscribe','SubscriberController@postSubscription');
    
    // Route::get('fundraiser','FundraiserController@index2');
    // Route::get('fundraiser/thankyou','FundraiserController@thankyou2');
    // Route::get('fundraiser2/thankyou','FundraiserController@thankyou2');
    
    // Route::get('charles-g-fraser','FundraiserController@index');
    // Route::post('charles-g-fraser/pickup-options','FundraiserController@pickup');
    // Route::post('charles-g-fraser/add-cart','FundraiserController@addCart');
    // Route::get('charles-g-fraser/checkout','FundraiserController@checkout');
    // Route::post('charles-g-fraser/checkout','FundraiserController@postCheckout');
    // Route::get('charles-g-fraser/thankyou','FundraiserController@thankyou');

    // Route::get('/sitemap.xml','MainController@sitemap');
    // Route::get('/sitemap','MainController@sitemap');

    // Route::get('operation-smile/smilesbouquet','ProductController@smilesbouquet');
    // Route::get('cookiecard/ospca','ProductController@ospcacookiecard');

    // Route::get('page/{category}','LandingpageController@index');
    // Route::get('page/{category}/{keyword}','LandingpageController@index');
    // Route::get('page/{category}/{keyword}/{name}','LandingpageController@index');
    
    // Route::get('{place}/{category}','MainController@page');
    
});