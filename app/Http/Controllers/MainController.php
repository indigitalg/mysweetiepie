<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\BlogCategory;
use App\Models\Blog;
use App\Models\Blog_category;

// use App\Models\Product;
// use App\Models\Price;
// use App\Models\Occasion;
// use App\Models\Shipping;
// use App\Models\Color;
// use App\Models\Content;
// use App\Models\Discount;
// use App\Models\Basket;
// use App\Library\Moneris\Transaction;
// use Storage;
// use App\Models\User;
// use View;
// use App\Library\Moneris\mpgTransaction;
// use App\Library\Moneris\CofInfo;
// use App\Library\Moneris\mpgRequest;
// use App\Library\Moneris\mpgHttpsPost;
// use App\Models\Landingpage;
// use App\Models\City;
// use App\Models\Wholesale;
// use App\Models\Province;
// use App\Models\Country;
// use App\Models\Provprice;
// use App\Mail\SendGift;
// use App\Mail\DeliveryConfirmation;
// use App\Mail\DeliveryNotification;
// use App\Mail\DeliveryAdminNotification;
// use App\Mail\Wholesalemail;
// use App\Mail\Feedbackmail;
// use App\Mail\ContactMail;
// use App\Models\Store;
// use App\Models\StoreTiming;
// use App\Models\ManageMenu;
// use Mail;
use DB;
// use Route;

class MainController extends Controller
{
    
    public function index()
    {
      
        // $settings  = DB::table('settings')->first();

        // if(time() <= strtotime($settings->hotdeal_end))
        // {
        //     $hotdeal = Product::with(['prices'=>function($query) {
        //         $query->orderBy('amount','ASC');
        //     }])->whereStatus(1)->whereSku($settings->hotdeal)->first();
        // }
        // else
        // {
            $hotdeal = null;
        // }

        // DB::enableQueryLog();

        $category = Category::with(['products'=>function($query) {
                $query->with(['prices'=>function($query) {
                    $query->with('provprices')->where('amount','>',0);
                }])->whereStatus(1)->orderBy('pivot_position','ASC')->take(8);
        }])->whereStatus(1)->first();

        $tiles=Banner::whereType('home_tiles')->where('status', 1)
    						 ->orderBy('display_order','ASC')->get();

    	$slider = Banner::whereType('home_slider')->where('status', 1)
    						->orderBy('display_order','ASC')->get();
                            
        $catPro = Category::whereStatus(1)->get();

    	return view('frontend.home')
                            ->withSliders($slider)
    						->withTiles($tiles)
    						->withCategory($category)
    						->withCatpro($catPro)
                            ->withHotdeal($hotdeal);
    }

    function blogs(Request $request)
    {

        if($request->has('cat'))
        {
            $c=$request->get('cat');
            $m=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.published_at','blogs.picture')
                                ->join('blogs_category','blogs_category.blog_id','=','blogs.id')
                                ->join('blogscategories','blogscategories.id','=','blogs_category.category_id')
                                ->where('blogscategories.slug','=',$c)->paginate(5);
           
        }
        else
        {
            $m=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.published_at','blogs.picture')
                            ->join('blogs_category','blogs_category.blog_id','=','blogs.id')
                            ->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->paginate(5);
        }
        
        $post   =   Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.published_at','blogs.picture')
                                ->join('blogs_category','blogs_category.blog_id','=','blogs.id')
                                ->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->paginate(5);
       
        $cat=BlogCategory::get();
       
        return view('frontend.blog.bloglist')->withBlog($m)->withCat($cat)->withPost($post);
    }
    function blogsdetail($id)
    {
        $rp=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.published_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->paginate(5);
        $m=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.published_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->where('blogs.id','=',$id)->first();
        //$recpost=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.created_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->;// print_r($m);
        // die;
        // print_r($m);
        // die;
        $cat=BlogCategory::get();
        return view('frontend.blog.blogdetail')->withBlog($m)->withRp($rp)->withCat($cat);
    }


    
    // public function exception404()
    // {

    //     $sliders = Banner::whereType('home_slider')->where('status', 1)->orderBy('weight','ASC')->get();
    //     $tiles = Banner::whereType('home_tiles')->where('status', 1)->orderBy('weight','ASC')->get();
    // 	$error_message = 'Oops! Looks like there is nothing yummilicious here!';
    	
    // 	return view('frontend.error',compact('sliders','tiles','error_message'));
    // }
    
    // public function exception500()
    // {

    //     $sliders = Banner::whereType('home_slider')->where('status', 1)->orderBy('weight','ASC')->get();
    //     $tiles = Banner::whereType('home_tiles')->where('status', 1)->orderBy('weight','ASC')->get();
    // 	$error_message = 'Oops! Something went wrong! Please try after some time';
    	
    // 	return view('frontend.error',compact('sliders','tiles','error_message'));
    // }

    // public function amway2()   
    // {    
    //     $settings  = DB::table('settings')->first();

    //     if(time() <= strtotime($settings->hotdeal_end))
    //     {
    //         $hotdeal = Product::with(['prices'=>function($query) {
    //             $query->orderBy('amount','ASC');
    //         }])->whereStatus(1)->whereSku($settings->hotdeal)->first();
    //     }
    //     else
    //     {
    //         $hotdeal = null;
    //     }

    //     $category = Category::with(['products'=>function($query){
    //             $query->with('prices')->whereStatus(1)->limit(8);
    //     }])->whereId($settings->home_category ?? 0)->whereStatus(1)->first();

    //     return view('amway')->withSliders(Banner::whereType('home_slider')
    //                         ->orderBy('weight','ASC')->get())
    //                         ->withTiles(Banner::whereType('home_tiles')
    //                         ->orderBy('weight','ASC')->get())
    //                         ->withCategory($category)
    //                         ->withHotdeal($hotdeal);
    // }

    // public function shipping_policies()
    // {
    //     $policies  = DB::table('policies')->orderBy('display_order','ASC')->get();
    //     return view('frontend.pages.shippingpolicies')->withTitle(ucwords('shipping & delivery'))
    //                                          ->with('policies',$policies);        
    // }

    // public function availCoupon(Request $request)
    // {
    //     if(!$request->has('c'))
    //         abort(404);

    //     //$coupon = $request->c;
    //     $coupon = hex2bin($request->c);

    //     $discount = Discount::whereName($coupon)
    //                                 ->where('start_time','<=',date('Y-m-d H:i:s'))
    //                                 ->where('end_time','>=',date('Y-m-d H:i:s'))
    //                                 ->whereRaw('`usage` < `max_limit` ')->first();
    //     if(!$discount)
    //         abort(404);

    //     session(['coupon'=>$discount->name,
    //              'value'=>$discount->value,
    //              'value_type'=>$discount->value_type]);

    //     $basket = Basket::find(session('basket_id',0));

    //     if($basket)
    //     {
    //         $basket->coupon = $discount->name;
    //         $basket->discount = $discount->value;
    //         $basket->discount_id = $discount->id;
    //         $basket->discount_type = $discount->value_type;
    //         $basket->save();
    //     }

    //     return redirect('/');
    // }

    // public function groupon() 
    // {
    //     return view('pages.groupon')->withTitle(ucwords('Flowers Canada'))->with('prevent_offer',true);
    // }

    // public function postGroupon(Request $request)
    // {         
    //     $this->validate($request,[
    //         'name'    => 'bail|required|string|max:100',
    //         'email'   => 'bail|required|string|email|max:50',
    //         'phone'   => 'bail|nullable|numeric|digits:10',  
    //         'coupon_code' => 'required|max:20|unique:discounts,name',  
    //     ]);

    //     $existing = Discount::where('name',$request->coupon_code)->first();

    //     if(!$existing)
    //     {
    //         $discount = new Discount();

    //         $discount->type       = 'groupon';
    //         $discount->customer   = $request->name;
    //         $discount->email      = $request->email;
    //         $discount->phone      = $request->phone;
    //         $discount->name       = $request->coupon_code;
    //         $discount->value      = 20.00;
    //         $discount->value_type = 'amount';
    //         $discount->start_time = date('Y-m-d H:i:s');
    //         $discount->end_time   = date('Y-m-d H:i:s',strtotime("+3 months"));
    //         $discount->usage      = 0;
    //         $discount->max_limit  = 1;
    //         $discount->min_sale   = 0;

    //         $discount->save();
    //     }
    // }


//    public function sitemap() {

//     $occasions = Occasion::all();
//     $categories = Category::all();
//     $products = Product::all();
//     $landings= Landingpage::all('place','category_url');

//     return response()->view('pages.sitemap', 
//             [
//                 'categories'=>$categories,
//                 'occasions' => $occasions,
//                 'products'=>$products,
//                 'pages'=>$landings,
//            ])->header('Content-Type', 'text/xml');
//     //return view('pages.sitemap')->header('Content-Type', 'text/xml');
//    }

    // public function page(Request $request, $handle, $catid = null)
    // {
    //     //dd($request->all());

    //     $affiliate = User::whereType('affiliate')->whereIdentifier($handle)->first();

    //     if($affiliate)
    //     {
    //         $settings  = DB::table('settings')->first();

    //         if(time() <= strtotime($settings->hotdeal_end))
    //         {
    //             $hotdeal = Product::with(['prices'=>function($query) {
    //                 $query->orderBy('amount','ASC');
    //             }])->whereStatus(1)->whereSku($settings->hotdeal)->first();
    //         }
    //         else
    //         {
    //             $hotdeal = null;
    //         }

    //         $category = Category::with(['products'=>function($query){
    //                 $query->with('prices')->whereStatus(1)->limit(8);
    //         }])->whereId($settings->home_category ?? 0)->whereStatus(1)->first();

    //         session(['affiliate_id'=>$affiliate->id]);
    //         session(['affiliate_vars'=>encrypt(serialize($request->all()))]);

    //         if(session()->has('basket_id'))
    //         {
    //             $basket = Basket::find(session('basket_id'));
    //             $basket->affiliate_id = $affiliate->id;
    //             $basket->remarks = encrypt(serialize($request->all()));
    //             $basket->save();
    //         }

    //         return view($handle)->withSliders(Banner::whereType('home_slider')
    //                             ->orderBy('weight','ASC')->get())
    //                             ->withTiles(Banner::whereType('home_tiles')
    //                              ->orderBy('weight','ASC')->get())
    //                             ->withCategory($category)
    //                             ->withHotdeal($hotdeal);
    //     }


    //     $planding = Content::whereSlug($handle)->whereType('Product Landing Page')->wherePublished(1)->first();
        
    //     if($planding) {
    //         return view('pages.productlanding')->withPlanding($planding);
    //     }
        
    //     $landingpages = Content::whereSlug($handle)->whereType('Landing Page')->wherePublished(1)->first();
        
    //     if($landingpages) {
    //         $banner = Banner::find($landingpages->banner_id);
    //         return view('pages.landing-pages')->withLandingpages($landingpages)->withBanner($banner);
    //     }

    //     $product = Product::whereSlug($handle)->first();

    //     if($product)  {
    //         $request = Request::create('products/'.$handle, 'GET', array());
    //         return Route::dispatch($request)->getContent(); 
    //     }

    //     $policy = Content::whereSlug($handle)->whereType('Policy')->wherePublished(1)->first();

    //     if($policy) {
    //         return view('pages.privacysecurity')->with('policy', $policy);
    //     }


    //     $page = Content::whereSlug($handle)->whereType('Page')->wherePublished(1)->first();

    //     if($page) 
    //         return view('content')->withPage($page);
                
    //     elseif(strtolower($handle)=='shippingpolicies' || strtolower($handle)=='shipping-policies' || strtolower($handle)=='policies' || strtolower($handle)=='policy') {
    //         $policies  = DB::table('policies')->orderBy('display_order','ASC')->get();
    //         return view('pages.shippingpolicies')->withTitle(ucwords('shipping & delivery'))->with('policies',$policies);
    //     }
    //     elseif(strtolower($handle)=='faqs' || strtolower($handle)=='faq'){

    //         $faqs_general  = DB::table('faqs')->where('type','General')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();
    //         $faqs_subs  = DB::table('faqs')->where('type','Substitutions')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();
    //         $faqs_discounts  = DB::table('faqs')->where('type','Discounts')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();
    //         $faqs_returns  = DB::table('faqs')->where('type','Returns')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();               
    //         return view('pages.faq')->withTitle(ucwords('Faqs'))->with('faqs_general',$faqs_general)->with('faqs_subs',$faqs_subs)->with('faqs_discounts',$faqs_discounts)->with('faqs_returns',$faqs_returns);
    //     }
    //     elseif(8 == 5) //$city=City::where('name',$handle)->first())
    //     {
    //         $landing = Landingpage::whereId($city->page_id)->first() ?? abort(404);
    //         $nearbycities = '';
            
    //         if(!empty($city->id))
    //         {
    //             $nearcities = City::whereCitygroupId($city->citygroup_id)->get();
                
    //             foreach($nearcities as $ncity) {
    //                 $nearbycities .= '<a href="/'.str_slug($ncity->name).'">'.$ncity->name.'</a>, ';
    //             }
                
    //             $nearbycities = rtrim($nearbycities, ', ');
    //         }
            
    //         $category = Category::with('products')->whereId($landing->category_id)->first();
    //         $category2 = Category::with('products')->whereId($landing->category2_id)->first();
            
    //         $banners = Banner::where('id',$landing->banner1_id)->orWhere('id',$landing->banner2_id)->orWhere('id',$landing->banner3_id)->get();

    //         return view('landing-page')->withPage($landing)->withNearbycities($nearbycities ?? null)->withCity($city ?? null)
    //         ->withBanners($banners)->withCategory($category ?? null);
    //     }
    //     elseif($handle == 'landing-preview')
    //     {
    //         $city = City::whereName('Toronto')->first() ?? abort(404);
    //         $landing = Landingpage::whereName('Preview Sample')->first() ?? abort(404);
    //         $nearbycities = '';
            
    //         if(!empty($city->id))
    //         {
                
                
    //             $placetype = 'city';
    //             $nearcities = City::whereCitygroupId($city->citygroup_id)->get();
    //             foreach($nearcities as $ncity) {
    //                 $nearbycities .= '<a href="/'.str_slug($ncity->name).'">'.$ncity->name.'</a>, ';
    //             }
                    
    //             $nearbycities = rtrim($nearbycities, ', ');
    //         }
            
    //         if($city) 
    //         {
    //             $landing = Landingpage::whereName('Preview Sample')->first() ?? abort(404);
                
    //             $category = Category::with(['products'=>function($query){ $query->take(8); }])->whereId($landing->category_id)->first();
    //             $category2 = Category::with(['products'=>function($query){ $query->take(8); }])->whereId($landing->category2_id)->first();
                
    //             $banners = Banner::where('id',$landing->banner1_id)->orWhere('id',$landing->banner2_id)->orWhere('id',$landing->banner3_id)->get();
                
    //             $default = Landingpage::where('default',1)->first() ?? abort(404);
                
    //             $pagecats = DB::table('page_categories')->where('page_id',$landing->id)->get();
    //             $catlinks = '';
                
    //             foreach($pagecats as $pcat)
    //             {
    //                 $cat = Category::find($pcat->category_id);
    //                 if($cat)
    //                 {
    //                     $catlinks .= '<a href="'.url(str_slug($city->name)).'/'.$cat->slug.'">'.$cat->name.'</a>, ';
    //                 }
    //             }
                
    
    //             return view('landing-page')->withPage($landing)
    //                                         ->withTitle($landing->seo_title)
    //                                         ->withDescription($landing->seo_description)
    //                                         ->withKeywords($landing->seo_keywords)
    //                                         ->withNearbycities($nearbycities ?? null)
    //                                         ->withCity($city ?? null)
    //                                         ->withPlacetype($placetype)
    //                                         ->withBanners($banners)->withCategory($category ?? null)
    //                                         ->withCategorytwo($category2 ?? null)
    //                                         ->withProvinces($provinces ?? null)
    //                                         ->withCities($cities ?? null)
    //                                         ->withDefault($default)
    //                                         ->withCatlinks($catlinks);
                                            
    //         }   
    //     }
    //     else
    //     {
    //         $place = str_replace('-',' ',$handle);
    //         $placetype = '';
    //         $nearbycities = '';
            
    //         if($city = City::where('name',$place)->first())
    //         {
    //             $placetype = 'city';
    //             $nearcities = City::whereCitygroupId($city->citygroup_id)->get();
    //             foreach($nearcities as $ncity) {
    //                 $nearbycities .= '<a href="/'.str_slug($ncity->name).'">'.$ncity->name.'</a>, ';
    //             }
                    
    //             $nearbycities = rtrim($nearbycities, ', ');
    //         }
    //         elseif($city = Province::where('name',$place)->first())
    //         {
    //             $placetype = 'province';
    //             $cities = City::whereProvince($city->code)->orderBy('name','asc')->get();
    //             foreach($cities as $ncity) {
    //                 $nearbycities .= '<a href="/'.str_slug($ncity->name).'">'.$ncity->name.'</a>, ';
    //             }
                    
    //             $nearbycities = rtrim($nearbycities, ', ');
    //         }
    //         elseif($city = Country::where('name',$place)->first())
    //         {
    //             $placetype = 'country';
    //             $provinces = Province::whereCountry($city->code)->orderBy('name','asc')->get();
                
    //             foreach($provinces as $ncity) {
    //                 $nearbycities .= '<a href="/'.str_slug($ncity->name).'">'.$ncity->name.'</a>, ';
    //             }
                    
    //             $nearbycities = rtrim($nearbycities, ', ');
    //         }
            
            
    //         if($city) 
    //         {
                
    //             if($catid != null)
    //             {
    //                 $category = Category::whereSlug($catid)->first() ?? abort(404);
    //                 $catid = $category->id;
    //             }
            
    //             $landing = Landingpage::where('place_id',$city->id)->where('place_type',$placetype ?? 'x')->where('category_id',$catid)->where('default',0)->first();
                
    //             $default = Landingpage::where('default',1)->first() ?? abort(404);
                
    //             $pagecats = DB::table('page_categories')->where('page_id',$landing->id)->get();
    //             $catlinks = '';
                
    //             foreach($pagecats as $pcat)
    //             {
    //                 $cat = Category::find($pcat->category_id);
    //                 if($cat)
    //                 {
    //                     $catlinks .= '<a href="'.url(str_slug($city->name)).'/'.$cat->slug.'">'.$cat->name.'</a>, ';
    //                 }
    //             }
                
    //             $category1 = Category::with(['products'=>function($query){ $query->take(8); }])->whereId($landing->category1_id)->first();
    //             $category2 = Category::with(['products'=>function($query){ $query->take(8); }])->whereId($landing->category2_id)->first();
                
    //             $banners = Banner::where('id',$landing->banner1_id)->orWhere('id',$landing->banner2_id)->orWhere('id',$landing->banner3_id)->get();
                
    
    //             return view('landing-page')->withPage($landing)
    //                                         ->withTitle($landing->seo_title)
    //                                         ->withDescription($landing->seo_description)
    //                                         ->withKeywords($landing->seo_keywords)
    //                                         ->withNearbycities($nearbycities ?? null)
    //                                         ->withCity($city ?? null)
    //                                         ->withPlacetype($placetype)
    //                                         ->withBanners($banners)
    //                                         ->withCategoryone($category1 ?? null)
    //                                         ->withCategorytwo($category2 ?? null)
    //                                         ->withProvinces($provinces ?? null)
    //                                         ->withCities($cities ?? null)
    //                                         ->withDefault($default)
    //                                         ->withCatlinks($catlinks);
    //             }
            
    //         if(file_exists('pages.'.$handle))
    //             return view('pages.'.$handle)->withTitle(ucwords(str_replace('-',' ',$handle)));
    //     }
           
    //     abort(404);

    //    /* $page = Content::whereSlug($handle)->whereType('Page')->wherePublished(1)->first();

    //     if($page)
    //         return view('content')->withPage($page);
    //     else
    //         return view('pages.'.$handle)->withTitle(ucwords(str_replace('-',' ',$handle)));*/
    //     //abort(404);        
    // }


    // function provincePrice() {

    //     $provinces = Province::get();
    //     $products = Product::with(['prices'=>function($query) {
    //         $query->with('Provprices');
    //     }])->get();

    //     return view('pages.province-price')->withProvinces($provinces)->withProducts($products);
    // }


    // function postProvincePrice(Request $request) {

    //     Provprice::where('id','>',0)->delete();

    //     if($request->has('prices') && count($request->prices) > 0) {

    //         foreach($request->prices as $key => $price) {

    //             foreach($price as $pkey=>$val) {

    //                 $provprice = new Provprice();
    //                 $provprice->price_id = $key;
    //                 $provprice->province = $pkey;
    //                 $provprice->amount = $val;

    //                 $provprice->save();

    //             }

    //         }
    //     }

    // }


    // function setProvince($code = null, Request $request) {

    //     if(!$code)
    //     {
    //         if(!$request->has('province'))
    //         {
    //             abort(404);
    //         }
    //         else
    //         {
    //             $code = $request->province;
    //         }
            
    //     }

    //     $province = Province::whereCode($code)->first();

    //     if($province)
    //     {
    //         session(['province'=>$province->code]);
    //     }
    //     else
    //     {
    //         session()->forget('province');
    //         echo 'Province: none';
    //     }

    //     if($request->has('province'))
    //     {
    //         session()->flash('postal',$request->postal);
    //         return redirect()->back();
    //     }

    // }


    // function setProductProvince() {

    //     $products = Product::get();
    //     $provinces = Province::where('country','CA')->get();

    //     DB::table('product_province')->delete();

    //     foreach($products as $product) {
    //         foreach($provinces as $province) {

    //             DB::table('product_province')->insert(['product_id'=>$product->id, 'province_id'=>$province->id,
    //                     'province'=>$province->code,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]);

    //             echo 'Setting ('.$product->sku.') '.$product->name.' for '.$province->name.'.... '."<br/>\n";

    //         }
    //     }
    // }


    // function confirmDelivery(Request $request) {

    //     $url = 'http://cgc.mysweetiepie.ca/api/item-info';
    //     $data = ['ds'=>$request->ds];

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_POST, 1);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //     $result = curl_exec($curl);
        
    //     die(print_r($result));

    //     if(!$result)
    //         abort(404);
            


    //     curl_close($curl);

    //     return view('frontend.confirm-delivery')->withItem(json_decode($result));
    // }

    // function postConfirmDelivery(Request $request) {

    //     $url = 'http://cgc.mysweetiepie.ca/api/item-update';
    //     $data = $request->all();

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_POST, 1);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //     $result = curl_exec($curl);
    //     $item = json_decode($result);

    //     curl_close($curl);

    //     $message = 'Your item has arrived. ';

    //     //$this->sendSMS('+1'.$item->order->address->phone2,$message);

    //     if(!empty($item->address->email)) {
    //         Mail::to($item->address->email)->bcc('developer@indigitalgroup.ca')->send(new DeliveryNotification($item));
    //     }

    //     if(!empty($item->address->phone2)) {
    //         $message = 'Hi '.$item->address->firstname .' ' . $item->address->lastname . 
    //                    ', your gift has been delivered and ' . $item->delivery_type;
    //         $this->sendSMS('+1'.$item->address->phone2,$message);
    //     }

    //     Mail::to('admin@mysweetiepie.ca')->bcc('developer@indigitalgroup.ca')->send(new DeliveryAdminNotification($item));
    //     Mail::to($item->order->email)->bcc('developer@indigitalgroup.ca')->send(new DeliveryConfirmation($item));

    //     $message = 'Hi '.$item->order->address->firstname . ' ' . $item->order->address->lastname . 
    //                ', your gift to ' . $item->address->firstname . ' ' . $item->address->lastname . 
    //                ' has been delivered';

    //     //$this->sendSMS('+1'.$item->order->address->phone2,$message);

    //     return view('frontend.confirm-delivery');
    // }


    // function sayThanks(Request $request) {

    //     $url = 'http://new.bloomcommand.com/api/item-info';
    //     $data = ['ds'=>$request->ds];

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_POST, 1);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //     $result = curl_exec($curl);

    //     curl_close($curl);

    //     return view('frontend.say-thanks')->withItem(json_decode($result));
    // }


    // function postSayThanks(Request $request) 
    // {
       
        // $request->validate( [
        //     'email' => 'required|email',
        //     'selfie' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        // $url = 'http://new.bloomcommand.com/api/send-thanks';
        // $post = $_POST;

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_POST, 1);

        // if($request->hasFile('selfie') && $request->file('selfie')->isValid())
        // {
        //     $cFile = curl_file_create($request->file('selfie')->getPathName());
        //     $post['selfie'] = $cFile; // Parameter to be sent
        // }

        // curl_setopt($curl, CURLOPT_POSTFIELDS, $post);

        // curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // curl_setopt($curl, CURLOPT_USERPWD, "username:password");

        // curl_setopt($curl, CURLOPT_URL, $url);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        // $result = curl_exec($curl);

        // curl_close($curl);

        // $item = json_decode($result);

        // Mail::to($item->order->email)->bcc('bijuys@gmail.com')->send(new SendGift($item));

        // $message = 'Hi '. $item->order->address->firstname.' ' . $item->order->address->lastname .
        //             ', you have a thank you message from ' . 
        //             $item->address->firstname. ' ' . $item->address->lastname . 
        //             '. Visit ' . url('thanks?ds='.base64_encode($item->id)) . ' to receive it.';

        // $this->sendSMS('+1'.$item->order->address->phone2,$message);

        // return view('say-thanks');
    // }


    // function showThanks(Request $request) {

    //     $url = 'http://new.bloomcommand.com/api/item-info';
    //     $data = ['ds'=>$request->ds];

    //     $curl = curl_init();
    //     curl_setopt($curl, CURLOPT_POST, 1);
    //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($curl, CURLOPT_USERPWD, "username:password");

    //     curl_setopt($curl, CURLOPT_URL, $url);
    //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    //     $result = curl_exec($curl);

    //     if(!$result)
    //         abort(404);

    //     curl_close($curl);

    //     return view('thanks-card')->withCard(json_decode($result));
    // }

    // function sendSMS($to = "",$message = "") {
    //     $id = "AC803d9c8601d6e7781f9ce0b47f7dac86";
    //     $token = "30532e4ce3b73d24fd6478e226e52c8e";
    //     $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
    //     $from = "+16473708101";
    //     $to = $to; // twilio trial verified number
    //     $body = "using twilio rest api from Flowerscanada";
    //     $data = array (
    //         'From' => $from,
    //         'To' => $to,
    //         'Body' => $message,
    //     );
    //     $post = http_build_query($data);
    //     $x = curl_init($url );
    //     curl_setopt($x, CURLOPT_POST, true);
    //     curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
    //     curl_setopt($x, CURLOPT_POSTFIELDS, $post);
    //     $y = curl_exec($x);
    //     curl_close($x);
    // }

    // function smsCheck() {
    //     $id = "AC803d9c8601d6e7781f9ce0b47f7dac86";
    //     $token = "30532e4ce3b73d24fd6478e226e52c8e";
    //     $url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
    //     $from = "+16473708101";
    //     $to = "+14169900944"; // twilio trial verified number
    //     $body = "using twilio rest api from Flowerscanada";
    //     $data = array (
    //         'From' => $from,
    //         'To' => $to,
    //         'Body' => $body,
    //     );
    //     $post = http_build_query($data);
    //     $x = curl_init($url );
    //     curl_setopt($x, CURLOPT_POST, true);
    //     curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    //     curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
    //     curl_setopt($x, CURLOPT_POSTFIELDS, $post);
    //     $y = curl_exec($x);
    //     curl_close($x);
    //     var_dump($post);
    //     var_dump($y);
    // }

    // function recipes()
    // {
    //     $m=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.created_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->where('blogs_category.category_id',3)->paginate(5);
    //     //$recpost=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.created_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->;// print_r($m);
    //     //dd($m);
    //     return view('frontend.blog.recipes')->withBlog($m);
    // }
    //  function recipesdetail($id)
    // {
    //     $rp=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.created_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->where('blogs_category.category_id',3)->paginate(5);
    //     $m=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.created_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->where('blogs.id','=',$id)->first();
    //     //$recpost=Blog::select('blogs.id','blogs.name','blogs.description','blogscategories.name AS cname','blogs.created_at','blogs.picture')->join('blogs_category','blogs_category.blog_id','=','blogs.id')->join('blogscategories','blogscategories.id','=','blogs_category.category_id')->;// print_r($m);
    //     // die;
    //     // print_r($m);
    //     // die;
    //     return view('frontend.blog.recipesdetail')->withBlog($m)->withRp($rp);
    // }
    // public function faqs()
    // {
    //         $faqs_general  = DB::table('faqs')->where('type','General')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();
    //         $faqs_subs  = DB::table('faqs')->where('type','Substitutions')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();
    //         $faqs_discounts  = DB::table('faqs')->where('type','Discounts')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();
    //         $faqs_returns  = DB::table('faqs')->where('type','Returns')->orderBy('type','ASC')->orderBy('display_order','ASC')->get();               
    //         return view('frontend.pages.faqs')->withTitle(ucwords('Faqs'))->with('faqs_general',$faqs_general)->with('faqs_subs',$faqs_subs)->with('faqs_discounts',$faqs_discounts)->with('faqs_returns',$faqs_returns);    
    // }
    // public function policies()
    // {
    //     $policies  = DB::table('policies')->orderBy('display_order','ASC')->get();
    //     return view('frontend.pages.policies')->withTitle(ucwords('Policies'))
    //                                          ->with('policies',$policies);        
    // }

    // public function media()
    // {
    //     //$policies  = DB::table('policies')->orderBy('display_order','ASC')->get();
    //     return view('frontend.pages.media');
    //     // ->withTitle(ucwords('Policies'))->with('policies',$policies);        
    // }
    
    
    // public function deliveryOptions() {
        
    //     $basket = Basket::with(['items'=>function($query){
    //         $query->with('addonitems','delivery','itemvariation','product');
    //     }])->whereId(session('basket_id'))->first();

        
    //     if($basket && count($basket->items) > 0 && session('shippingType') == 'delivery') {
    //         return view('frontend.delivery_options-unavailable');
    //     }
    //     else
    //     {
    //         $cities = DB::table('cities')->where('status',1)->get();
    //         $pickpoints = Store::with('store_timing')->orderBy('name','ASC')->get();
    //         $redirect = request()->redirect != '' ? url('products/'.request()->redirect):(url()->previous() ?? url('/'));
            
    //         if(request()->has('test') && request()->test == 'yes') {
    //             return view('frontend.delivery_options2',compact('cities','pickpoints','redirect'));
    //             exit;
    //         }
            
    //         return view('frontend.delivery_options2',compact('cities','pickpoints','redirect'));
    //     }

    // }
    
    // public function postDeliveryOptions() {
        

        
    //     if(request()->has('pickup')){
    //         $store = DB::table('stores')->where('store_code',request()->pickup)->first();
    //         if(!$store) { return rediect()->back(); }
    //         session(['cityIdSet'=>request()->pickup,'shippingType'=>'pickup']);
    //         $pickuploc = Store::where('store_code',strtoupper(request()->pickup));
    //     }
    //     elseif(request()->has('delivery')){
    //         $city = DB::table('cities')->where('name',ucfirst(strtolower(request()->delivery)))->first();
    //         if(!$city) { return redirect()->back(); }
    //         session(['cityIdSet'=>request()->delivery,'shippingType'=>'delivery']);
    //     }
        
    //     if(request()->redirecturl != '' && request()->redirecturl != url('delivery-options')) {
    //         return redirect(request()->redirecturl);
    //         exit;
    //     }
    //     else {
    //         return redirect(url('/'));
    //         exit;
    //     }
        
    // }
    
    // public function deliveryOptionsDelete() {
    //     session()->forget('shippingType');
    //     session()->forget('cityIdSet');
        
    //     echo 'Session variables are unset';
    // }
    
    // public function feedback($location) {
        
    //     $locations = ['harbord-street','queen-street','unionville','danforth','distillery-district', 'leaside' , 'yonge'];
        
    //     if(!in_array($location,$locations)) 
    //         abort(404);
        
    //     return view('frontend.feedback')->withLocation($location);
    // }
    
    // public function postFeedback($location, Request $request) {
        
        
    //     $this->validate($request,[
    // 		'name'    => 'bail|required|string|max:100',
    // 		'email'	  => 'bail|required|string|email|max:50',
    // 		'contactno' =>'bail|required|numeric',
    // 		'message'=>'bail|required|string'
    // 	   ]);
    	   
    // 	$secret = '6LdF0VAaAAAAADqcwMTTEuK0cpxUkKW7zbUBhl4e';
    //     $captchaId = $request->input('g-recaptcha-response');
        
    //     $responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));
        
    //     if($responseCaptcha->success) { 
        
    //      	Mail::to('cesario@mysweetiepie.ca')->bcc('developer@indigitalgroup.ca')->send(new Feedbackmail($request->all()));
    //     	return view('frontend.feedback-thanks')->withLocation($location);
    //     }
    //     else
    //     {
    //           die('Invalid submission!');
    //     }
        
        
    // }
    
    // public function wholesale() {
    //     return view('frontend.wholesale');
    // }
    
    // public function menu() {
    //     $cat=Category::select('c.product_id','ca.name')->join('category_product AS c','c.category_id','=','categories.id')->join('categories AS ca','ca.id','=','categories.parent_id')->get();
    //     //$product=Product::where('status',1)->orderby('name','ASC')->get();
    //     ///$product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid','products.slug as pslug','prices.amount as pamount')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->join('managemenu','managemenu.product_id','=','products.id')->join('prices','prices.product_id','=','products.id')->where('products.status','=',1)->get();
    //    // $product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->where('products.status','=',1)->groupby('products.id')->get();
    //      ///$categories = Category::with('children')->where('status',1)->whereNull('parent_id')->orWhere('parent_id',0)->orderBy('name','ASC')->get();
    //     $categories=MenuCategory::with('children')->orderBy('display_order','ASC')->where('status',1)->get();
    //     $product=ManageMenu::with('products')->join('prices','prices.product_id','=','managemenu.product_id')->get();
    //     //  die(print_r($categories));
        
    //     return view('frontend.menu')->withProduct($product)->withCat($categories);
    // }
    
    // public function medicalert() {
    //     $cat=Category::select('c.product_id','ca.name')->join('category_product AS c','c.category_id','=','categories.id')->join('categories AS ca','ca.id','=','categories.parent_id')->get();
    //     //$product=Product::where('status',1)->orderby('name','ASC')->get();
    //     ///$product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid','products.slug as pslug','prices.amount as pamount')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->join('managemenu','managemenu.product_id','=','products.id')->join('prices','prices.product_id','=','products.id')->where('products.status','=',1)->get();
    //    // $product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->where('products.status','=',1)->groupby('products.id')->get();
    //      ///$categories = Category::with('children')->where('status',1)->whereNull('parent_id')->orWhere('parent_id',0)->orderBy('name','ASC')->get();
    //      session()->put('fundraiser_origin','medicalert');
    //     $categories=MenuCategory::with('children')->orderBy('display_order','ASC')->where('status',1)->where('id',1)->get();
    //     $product=ManageMenu::with('products')->join('prices','prices.product_id','=','managemenu.product_id')->get();
    //     //  die(print_r($categories));
        
    //     return view('frontend.medicalert')->withProduct($product)->withCat($categories);
    // }
    
    // public function torontomarlies() {
    //     $cat=Category::select('c.product_id','ca.name')->join('category_product AS c','c.category_id','=','categories.id')->join('categories AS ca','ca.id','=','categories.parent_id')->get();
    //     //$product=Product::where('status',1)->orderby('name','ASC')->get();
    //     ///$product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid','products.slug as pslug','prices.amount as pamount')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->join('managemenu','managemenu.product_id','=','products.id')->join('prices','prices.product_id','=','products.id')->where('products.status','=',1)->get();
    //    // $product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->where('products.status','=',1)->groupby('products.id')->get();
    //      ///$categories = Category::with('children')->where('status',1)->whereNull('parent_id')->orWhere('parent_id',0)->orderBy('name','ASC')->get();
    //     $categories=MenuCategory::with('children')->orderBy('display_order','ASC')->where('status',1)->get();
    //     $product=ManageMenu::with('products')->join('prices','prices.product_id','=','managemenu.product_id')->get();
    //     //  die(print_r($categories));
        
    //     session()->put('fundraiser_origin','torontomarlies');
        
    //     $coupon = 'TORONTOMARLIES';

    //     $discount = Discount::whereName($coupon)
    //                             ->where('start_time','<=',date('Y-m-d H:i:s'))
    //                             ->where('end_time','>=',date('Y-m-d H:i:s'))
    //                             ->whereRaw('`usage` < `max_limit` ')->first();

    //     if($discount) {

    //         session(['coupon'=>$discount->name,
    //                  'value'=>$discount->value,
    //                  'coupon_type' => $discount->type,
    //                  'value_type'=>$discount->value_type]);

    //         $basket = Basket::find(session('basket_id',0));

    //         if($basket)
    //         {
    //             $basket->coupon = $discount->name;
    //             $basket->discount = $discount->value;
    //             $basket->discount_mode = $discount->type;
    //             $basket->discount_id = $discount->id;
    //             $basket->discount_type = $discount->value_type;
    //             $basket->save();
    //         }
            
    //         View::share('coupon_applied', 'true');
    //     }
        
    //     return view('frontend.torontomarlies')->withProduct($product)->withCat($categories);
    // }
    
    
    // public function torontomarliesHome() {
    //     $cat=Category::select('c.product_id','ca.name')->join('category_product AS c','c.category_id','=','categories.id')->join('categories AS ca','ca.id','=','categories.parent_id')->get();
    //     //$product=Product::where('status',1)->orderby('name','ASC')->get();
    //     ///$product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid','products.slug as pslug','prices.amount as pamount')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->join('managemenu','managemenu.product_id','=','products.id')->join('prices','prices.product_id','=','products.id')->where('products.status','=',1)->get();
    //    // $product=Product::select('products.name AS pname','categories.name AS cname','products.picture','categories.id AS cid','products.id as pid')->join('category_product','category_product.product_id','=','products.id')->join('categories','categories.id','=','category_product.category_id')->where('products.status','=',1)->groupby('products.id')->get();
    //      ///$categories = Category::with('children')->where('status',1)->whereNull('parent_id')->orWhere('parent_id',0)->orderBy('name','ASC')->get();
    //     $categories=MenuCategory::with('children')->orderBy('display_order','ASC')->where('status',1)->get();
    //     $product=ManageMenu::with('products')->join('prices','prices.product_id','=','managemenu.product_id')->get();
    //     //  die(print_r($categories));
        
    //     session()->put('fundraiser_origin','torontomarlies');
        
    //     $coupon = 'TORONTOMARLIES';

    //     $discount = Discount::whereName($coupon)
    //                             ->where('start_time','<=',date('Y-m-d H:i:s'))
    //                             ->where('end_time','>=',date('Y-m-d H:i:s'))
    //                             ->whereRaw('`usage` < `max_limit` ')->first();

    //     if($discount) {

    //         session(['coupon'=>$discount->name,
    //                  'value'=>$discount->value,
    //                  'coupon_type' => $discount->type,
    //                  'value_type'=>$discount->value_type]);

    //         $basket = Basket::find(session('basket_id',0));

    //         if($basket)
    //         {
    //             $basket->coupon = $discount->name;
    //             $basket->discount = $discount->value;
    //             $basket->discount_mode = $discount->type;
    //             $basket->discount_id = $discount->id;
    //             $basket->discount_type = $discount->value_type;
    //             $basket->save();
    //         }
            
    //         View::share('coupon_applied', 'true');
    //     }
        
    //     return view('frontend.torontomarlies-home')->withProduct($product)->withCat($categories)->withTiles(Banner::whereType('home_tiles')->where('status', 1)
    // 						 ->orderBy('weight','ASC')->get());
    // }
    
    // public function get_categories($categories,$level,&$object) {
    //     foreach($categories as $category) {
    //         $category->level = $level;
    //         $object[] = $category;
    //         if(count($category->children) > 0) {
    //             $this->get_categories($category->children, $level+1, $object);
    //         }
    //     }
    // }
    
    // public function store(Request $request){

    // 	$this->validate($request,[
    // 		'name'    => 'bail|required|string|max:100',
    // 		'email'	  => 'bail|required|string|email|max:50',
    // 		'contactno' =>'bail|required|numeric',
    // 		'message'=>'bail|required|string',
    // 		'orgname'=>'bail|required',
    // 		'website'=>'bail|required',
    // 		//'apqty'=>'bail|required'
    //         //'phone'   => 'bail|nullable|numeric|digits:10'  
    // 	//	'message' => 'required',
    //         // 'captchatext' => [function ($attribute, $value, $fail) {
    //         //                     if ($value != Session::get('captcha_text')) {
    //         //                         $fail('Dot not match captch');
    //         //                     }
    //         //                 }]
    // 	   ]);
    	   
    	   
    // 	$secret = '6LdF0VAaAAAAADqcwMTTEuK0cpxUkKW7zbUBhl4e';
    //     $captchaId = $request->input('g-recaptcha-response');
    
    //     $responseCaptcha = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$captchaId));

    //     if($responseCaptcha->success) {   
    	   
    //         $wholesale=new Wholesale();


    //         // $data   =   array(
    //         //         'name'      =>  $request->name,
    //         //         'email'     =>  $request->email,
    //         //         'contactno' =>  $request->contactno,
    //         //         'designation'   =>  $request->designation,
    //         //         'organaization_name'     =>  $request->orgname,
    //         //         'website'   =>  $request->website,
    //         //         'product_interested_in' =>  $request->proin,
    //         //         'approx_qty' =>$request->apqty
    //         //         );
    //                 $wholesale->name = $request->name;
    //                 $wholesale->email     = $request->email;
    //                 $wholesale->contactno =  $request->contactno;
    //                 $wholesale->designation   =  $request->message;
    //                 $wholesale->organization_name     =  $request->orgname;
    //                 $wholesale->website   =  $request->website;
    //                 $wholesale->product_interested_in = implode(',',$request->has('categories') ? $request->categories:[]).($request->proin != '' ? '... Other:'.$request->proin:'');
               	
       	
    //      	$wholesale->save();
    //      	$wholesale->subject = 'Wholesale enquiry!';
        
    //       // Mail::to('cintafc96@gmail.com')->send(new Wholesalemail($wholesale));
    //      	Mail::to('cesario@mysweetiepie.ca')->bcc('developer@indigitalgroup.ca')->send(new Wholesalemail($wholesale));
    //         //return response()->json(null, 200);
    //     	return redirect()->back()->with('flash_message','Thank you for your wholesale enquiry,We will respond you soon.');
    //     }
    //     else
    //     {
    //          die('Invalid submission!');
    //     }
        
        
    // }  
    // public function gallery()
    // {
    //     $gallery=Gallery::get();
    //     return view('frontend.gallery')->with('gallery',$gallery);
    // }
    
    // public function holiday() {
    //     return view('frontend.holiday-season');
    // }
    
    // public function holidayShop() {
        
    // }
    
    // public function getCustomers() {
    //     $customers = User::where('type','customer')->orderBy("id","ASC")->get();
        
    //     foreach($customers as $customer) {
            
    //         //echo $customer->email."<br/>\n";
            
    //     }
        


    // }
    
    /*public function getCustomers() {
        $customers = User::with('orders')->where('type','customer')->orderBy("id","ASC")->get();
        
        echo '<h1>Cusotmers list ('.count($customers).')</h1>';   
        echo '<table border="1" cellpadding="5" cellspacing="3"><thead><tr>';
        
        echo '<th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Started On</th><th>City</th><th>Postalcode</th><td>Sales</td>';
        
        echo '</tr></thead><tbody>';
        
        foreach($customers as $customer) {
            
            echo '<tr>';
            
            echo '<td>'.$customer->id.'</td>';
            echo '<td>'.$customer->firstname.' '.$customer->lastname.'</td>';
            echo '<td>'.$customer->email.'</td>';
            echo '<td>'.$customer->phone.'</td>';
            echo '<td>'.$customer->created_at.'</td>';
            echo '<td>'.$customer->city.'</td>';
            echo '<td>'.$customer->postalcode.'</td>';
            echo '<td align="right">'.getPrice($customer->orders->sum('grandtotal')).'</td>';
            
            echo '</tr>';
            
        }
        
        echo '</tbody></table>';

    }*/



}