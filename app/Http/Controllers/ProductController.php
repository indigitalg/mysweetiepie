<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
// use App\Models\Addon;
use App\Models\Category;
// use App\Models\Occasion;
// use App\Models\Color;
// use App\Models\Price;
// use App\Models\Basket;
// use App\Models\Flavour;
// use App\Models\Item;
// use App\Models\Addonitem;
// use App\Models\Content;
// use App\Models\Store;
// use DB;
// use Carbon\Carbon;
// use App\Models\Ecard;
// use App\Models\Label;
// use App\Models\ProductCity;
// use App\Mail\SendEcard;
// use App\Mail\EcardConfirmation;
// use App\Mail\NoLocation;
// use Mail;
// use Auth;

class ProductController extends Controller
{
    
    public function index()
    {
    	$products = Product::with(['prices'])->whereType('physical')->where('status','>',-1)->get();
    	return view('category')->withProducts($products);	
    }


//     public function show($slug)
//     {
        
//         if(!session('cityIdSet')) {
//             return redirect('/delivery-options?redirect='.$slug);
//             exit;
//         }
//         elseif(session('shippingType') == 'delivery') {
            
//             $city = DB::table('cities')->leftJoin('product_cities','product_cities.city_id','=','cities.id')
//                                        ->leftJoin('products','product_cities.product_id','=','products.id')
//                                        ->where('cities.name',ucfirst(strtolower(ucfirst(session('cityIdSet')))))
//                                        ->where('products.slug',$slug)
//                                        ->count();
//             //     print_r($city);
//             //   die;                                
//             if($city == 0)
//             {
//               return view('frontend.delivery_options-unavailable');
//             }
              
//         }
        
        
           
//         $today = Carbon::now()->toDateString();
        
//         $holidaydate = DB::table('holidays')
//                         ->select('*')
//                         ->join('holidays_ranges', 'holidays_ranges.holiday_id', '=', 'holidays.id')
//                         ->join('prices', 'prices.holiday_id', '=', 'holidays.id')
//                         ->join('products', 'prices.product_id', '=', 'products.id')
//                         ->where('holidays_ranges.day', $today)
//                         ->where('products.slug', $slug)
//                         ->take(1)->get()->toArray();
                                    
//         if(count($holidaydate) > 0) {
//             $holiday_id = $holidaydate[0]->holiday_id;
//         }else{
//             $holiday_id = '';
//         }

//         $product = Product::with(['categories','occasions','colors','prices'=>function($query) use($holiday_id){

//                 if(!empty($holiday_id)) {
//                     $query->with('provprices')->where('holiday_id', $holiday_id)->orderBy('id','ASC');
//                 }
//                 else {
//                     $query->with('provprices')->whereNull('holiday_id')->orWhere('holiday_id',0)->orderBy('id','ASC');
//                 }
//         },'addons'=>function($query) {
//             return $query->orderBy('position','asc');
//         }])
//         // ->whereHas('provinces',function($squery){
//         //     $squery->where('province',session('province',0));
//         // })
//         ->whereSlug($slug)->where('type','physical')->first();
        
//         if(!$product) abort(404);
//         $labels = Label::where('status',1)->get();
//         \View::share('labels',$labels);
//         // dd($product);
        
//         $cityAvailable = ProductCity::where('product_id',$product->id)->where('city_id',session('cityIdSet'))->count() > 0;
        
//         \View::share('cityAvailable',$cityAvailable);
//         // print_r($errors->all());
//         $occasions = Occasion::where('status',1)->get();
        
//         $stores = Store::with('store_timing')->orderBy('name','ASC')->get();
        
//         $flavours=Flavour::where('status',1)->get();
//         return view('frontend/product_detail')->withProduct($product)->withTitle($product->seo_title)
//                     ->withDescription($product->seo_description)
//                     ->withKeywords($product->seo_keywords)
//                     ->withOccasions($occasions)
//                     ->withStores($stores)
//                     ->withPickuploc(isset($pickuploc) ? $pickuploc:NULL)
//                     ->withFlavour($flavours);
                    
                    
                    
//         // return view('product')->withProduct($product)->withTitle($product->seo_title)->withDescription($product->seo_description)->withKeywords($product->seo_keywords);
//     }
//   public function notdeliveryloc(Request $request)
//   {
//       $city=$request->location;
//       $name=$request->name;
//       $email=$request->email;
//       $data=array('city'=>$city,
//       'name'=>$name,
//       'email'=>$email);
//     //   print_r($data);
//     //   die;
//       Mail::to('admin@sweetiepie.com')->send(new NoLocation($data));
//       return view("frontend/thankyou_nodelivery")->withDa($data['name']);
      
//   }
//     public function showprice(Request $request)
//     {
//         //dd($request->all());
//         $slug = $request->slug;
//         $product_id = $request->product_id;
//         $today = isset($request->delivery_date)?$request->delivery_date:date('Y-m-d');

//         $holidaydate = DB::table('holidays')
//                         ->select('prices.*')
//                         ->join('holidays_ranges', 'holidays_ranges.holiday_id', '=', 'holidays.id')
//                         ->join('prices', 'prices.holiday_id', '=', 'holidays.id')
//                         ->join('products', 'prices.product_id', '=', 'products.id')
//                         ->where('holidays_ranges.day', $today)
//                         ->where('products.slug', $slug)
//                         ->get()->toArray();

      
//         $prices=array();
//         $is_discount = 0;
//         if(count($holidaydate) > 0) {
//             foreach ($holidaydate as $key => $price) {
//                 if($price->special_price>0) {
//                     $amount = getPrice($price->special_price);
//                     $id=$price->id;

//                 } else{
//                    if(discountAvailable()) {
//                         $is_discount = 1;
//                         $amount = getDiscountedPrice($price->amount);
//                     }
//                     else {
//                          $amount = getPrice($price->amount);
//                          $is_discount = 0;
//                     }
//                     $id=$price->id;
//                 }                   # code...
//                 $prices[]=array('id'=>$id,'name'=>$price->name,'amount'=>$amount,'picture'=>url(env('PRODUCT_FILES')).'/'.$price->picture, 'isdiscount'=>$is_discount);
//             } 
//         }else {
            
            

//             $prices = 'false';

//         }

//         return response()->json(['product'=>$prices]);
//     }

//     public function addon($slug, $id)
//     {
//         $product = Product::with(['addons'])->whereSlug($slug)->first();
//         $item = Item::whereBasketId(session('basket_id'))->whereId($id)->first();
        
//         if(!$product || !$item)
//             abort(404);

//         return view('productaddon')->withProduct($product)->withItem($item);
//     }

//     public function postAddon($slug, $id, Request $request)
//     {
//         $product = Product::with(['addons'])->whereSlug($slug)->first();
//         $item = Item::whereBasketId(session('basket_id'))->whereProductId($product->id)
//                                                          ->whereId($id)->first();
//         if(!$product || !$item)
//             abort(404);

//         foreach($request->addon as $key=>$val)
//         {
//             $addon = Addon::findOrFail($key);

//             $addonitem = new Addonitem();

//             $addonitem->addon_id        = $addon->id;
//             $addonitem->item_id         = $item->id;
//             $addonitem->addon_name      = $addon->name;
//             $addonitem->addon_price     = $addon->price;
//             $addonitem->quantity        = $val;
//             $addonitem->addon_picture   = $addon->picture;

//             $item->addonitems()->save($addonitem);

//             $item->save();
//         }

//         return redirect('shop/cart');
//     }

//     public function occasion($slug = '',Request $request)
//     {
//         $sort = array();

//         if($request->has('color'))
//             $sort['color'] = $request->color;

//         if($request->has('sort'))
//         {
//             $vars = explode('_',$request->sort);
//             $sort[$vars[0]]=$vars[1];
//         }

//         //DB::enableQueryLog();

//     	$occasion = Occasion::with(['products'=>function($query) use ($sort) {

//                                 $query->with(['prices'=>function($query) {
//                                     $query->with('provprices')->orderBy('amount','asc');
//                                 },'colors'])->whereHas('prices',function($query){
//                                         $query->where('amount','>',0);
//                                     })->whereHas('provinces',function($squery){
//                                             $squery->where('province',session('province',0));
//                                         })->where('status',1)->where('type','physical')->where('luxury',0);

//                                 if(isset($sort['color']))
//                                 {
//                                     $query->whereHas('colors',function($query) use ($sort) {
//                                         $query->whereSlug($sort['color']);
//                                     })->whereHas('provinces',function($squery){
//                                             $squery->where('province',session('province',0));
//                                         });
//                                 }
//                             }])->whereStatus(1)->whereSlug($slug)->first() or abort(404);

//         //dd(DB::getQueryLog());


  
//         if($request->has('sort'))
//         {
//             list($field,$order) = explode('_',$request->sort);

//             if($field == 'price')
//             {
//                 if($order == 'asc')
//                 { 
//                     $products = $occasion->products->sortBy(function($product){
//                         return ($product->prices[0]->amount ?? 0);
//                     });
//                 }
//                 else
//                 {
//                     $products = $occasion->products->sortByDesc(function($product){
//                         return ($product->prices[count($product->prices)-1]->amount ?? 100);
//                     });
//                 }   
//             }
//             elseif($field == 'name')
//             {
//                 if($order == 'asc')
//                     $products = $occasion->products->sortBy('name');
//                 else
//                     $products = $occasion->products->sortByDesc('name');
//             }
//             else
//             {
//                 $products = $occasion->products->sortBy('name');
//             }

//         }
//         else
//         {
//             $products = $occasion->products;
//         }

   
//     	return view('frontend.category')->withTitle($occasion->seo_title)->withDescription($occasion->seo_description)->withKeywords($occasion->keywords)
//     	                        ->withCategory($occasion)
//                                 ->withProducts($products)
//     							->withColors(Color::all());
//     }
    
    
    public function category($slug = '',Request $request)
    {
    	$categories = Category::with('children')->where('parent_id',null)->get();
           
        if($slug!='')
        {
            $category = Category::whereSlug($slug)->first();
            $catid=array();
            $catid[]=$category->id ?? 0;


    	    if(!$category)
    		    abort(404);
                
                // with(['prices','categories','colors','occasions'])
        		// 				->whereHas('categories',function($query) use($slug) {
        		// 					$query->whereSlug($slug);
        		// 				})->whereHas('prices',function($query){
        		// 				    $query->with('provprices')->where('amount','>',0);
        		// 		 		})->whereHas('cities',function($query){
        		// 		 		 //   $query->where('city_id',session('cityIdSet'));
        		// 		 		})->whereLuxury(0)->whereType('physical')->where('status','>',-1)->
        	$products = Product::with(['categories'])->whereHas('categories',function($query) use($slug) {
                                        $query->whereSlug($slug);})
                                    ->orderBy('name','ASC');
                   
        }
        if($request->has('category'))
        {
            $amount = explode('-',str_replace(' ','',str_replace('$','',$request->amount)));
            
            if(!is_array($amount)) {
                $amount = [0,50];
            }
            
            $cat=$request->category;
            foreach($cat as $c)
            {
                $catid[]=$c;
            }
            $category=Category::whereid($cat[0])->first();

            // $products = Product::with(['prices','categories','colors','occasions'])
    		// 				->whereHas('categories',function($query) use($cat) {
    		// 					$query->whereIn('categories.id',$cat);
    		// 				})->whereHas('prices',function($query) use ($amount) {
    		// 				    $query->with('provprices')->where('amount','>',$amount[0])->where('amount','<',$amount[1]);
    		// 		 		})->whereHas('cities',function($query){
    		// 		 		 //   $query->where('city_id',session('cityIdSet'));
    		// 		 		})->whereLuxury(0)->whereType('physical')->orderBy('name','ASC');

        }
        $products = $products->get();
    	return view('frontend/category')
    	                        ->withTitle($category->seo_title)
    	                        ->withDescription($category->seo_description)
    	                        ->withKeywords($category->seo_keywords)
    	                        ->withCategory($category)
    	                        ->withCategories($categories)
    	                        ->withCatid($catid)
    							->withProducts($products);
    							// ->withColors(Color::all());
    	
    }

//     public function category2($slug = '',Request $request)
//     {
//     	$category = Category::whereSlug($slug)->first();
//     	$categories = Category::get();

//     	if(!$category)
//     		abort(404);
//     	$products = Product::with(['prices','categories','colors','occasions'])
//     						->whereHas('categories',function($query) use($slug) {
//     							$query->whereSlug($slug);
//     						})->whereHas('prices',function($query){
//     						    $query->with('provprices')->where('amount','>',0);
//     				 		})->whereHas('cities',function($query){
//     				 		 //   $query->where('city_id',session('cityIdSet'));
//     				 		})
//                             ->whereLuxury(0)->whereType('physical')->orderBy('name','ASC');
//         $products = $products->get();
//     	return view('frontend/category')->withTitle($category->seo_title)->withDescription($category->seo_description)->withKeywords($category->seo_keywords)
//     	                        ->withCategory($category)
//     	                        ->withCategories($categories)
//     							->withProducts($products)
//     							->withColors(Color::all());
    	
//     }

//     public function search(Request $request)
//     {
//         $keyword = $request->input('term') ?? '';
//         $sort_value = $request->input('sort') ?? '';
//         $categories = Category::where('parent_id',null)->get();
//         $products = Product::with(['prices','categories','colors','occasions','shippings','cities'])
//                             ->whereHas('cities',function($query){
//     				 		 //   $query->where('city_id',session('cityIdSet'));
//     				 		})
//                             ->whereHas('prices',function($query){
//                                 $query->with('provprices')->where('amount','>',0);
//                             })
//                             // ->whereHas('provinces',function($squery){
//                             //                 $squery->where('province',session('province',0));
//                             //             })
//                             // ->whereStatus(1)
//                             ->whereType('physical')
//                             ->where(function($query) use ($keyword) {

//                                 $query->where('name','LIKE','%'.$keyword.'%')
//                                 ->orWhere('description','LIKE','%'.$keyword.'%')
//                                 ->orWhere('sku','LIKE','%'.$keyword.'%');

//                             })->where('status','>',-1)->orderBy('name','ASC')->get();
                            
//                             //
                            
//                             //->whereRaw("MATCH (name,name_fr,sku) AGAINST (? IN BOOLEAN MODE)" , $keyword)->orderBy('name','ASC')->get();
//                             return view('frontend.search-result')->withProducts($products)
//                             ->withTerm($keyword)
//                             ->with('sort_value',$sort_value)
//                             ->withCategories($categories)
//                             ->withColors(Color::all());

//         // return view('search')->withProducts($products)
//         //                     ->withTerm($keyword)
//         //                     ->withColors(Color::all());
//     }

//     public function luxury()
//     {
//         $products = Product::with(['prices'=>function($query){ 
//                                             $query->with('provprices');
//                                      },'categories','colors','occasions'])->whereHas('provinces',function($squery){
//                                             $squery->where('province',session('province',0));
//                                         })->whereStatus(1)->whereLuxury(1)->whereType('physical')->orderBy('name','ASC')->get();

//         return view('luxcollection')->withProducts($products)
//                                 ->withColors(Color::all());
//     }


    /********************** DIGITAL **********************************/

    // public function digital($slug = null)
    // {
    //     $category = Category::whereSlug('free-ecards')->first();

    //     $query = Product::with(['prices','categories','colors','occasions'])
    //                         ->whereHas('categories',function($query) use($category) {
    //                             $query->whereSlug($category->slug);
    //                         });
    //     if($slug) {
    //         $query->whereHas('occasions',function($query) use ($slug) {
    //             $query->whereSlug($slug);
    //         });
    //     }

    //     $products = $query->whereStatus(1)->whereLuxury(0)->whereType('digital')->orderBy('name','ASC')->get();

    //     $occasions = Occasion::whereHas('products',function($query){
    //                             $query->where('type','digital');
    //                         })->orderBy('priority','ASC')->get();
    //     $occasion = Occasion::whereSlug($slug)->first();

    //     return view('digital-products')->withTitle($category->seo_title)
    //                                 ->withDescription($category->seo_description)
    //                                 ->withKeywords($category->seo_keywords)
    //                                 ->withCategory($category)
    //                                 ->withOccasion($occasion)
    //                                 ->withProducts($products)
    //                                 ->withOccasions($occasions)
    //                                 ->with('prevent_offer',true)
    //                                 ->withColors(Color::all()); 
    // }


    // public function digitalProduct($slug){

    //   $occasion = Occasion::whereId(request()->occasion ?? 0)->first();

    //   $card = Product::whereSlug($slug)->whereType('digital')->first();
      

    //   $cookies = Product::with(['prices','categories','colors','occasions'])
    //                         ->whereHas('occasions',function($query) use ($occasion) {
    //                             if($occasion) {
    //                                 $query->whereSlug($occasion->slug);
    //                             }
    //                         })->whereHas('categories',function($query) use($slug) {
    //                             $query->whereSlug('cookie-cards');
    //                         })->whereHas('prices',function($query){
    //                             $query->with('provprices')->where('amount','>',0);
    //                         })->whereHas('provinces',function($squery){
    //                                         $squery->where('province',session('province',0));
    //                         })->whereStatus(1)->whereLuxury(0)->whereType('physical')->orderBy('name','ASC')->take(3)->get();

    //   if(session()->has('reply_card'))
    //   {
    //     $recard = Ecard::whereLink(session('reply_card',null))->first();
    //   } 

    //   if(session()->has('friend_card'))
    //   {
    //     $recard = Ecard::whereLink(session('friend_card',null))->first();
    //     $recard->sender_firstname = '';
    //     $recard->sender_lastname = '';
    //     $recard->sender_email = '';
    //   } 

    //  // $cookies = Product::whereStatus(1)->take(3)->get();

    //   return view('digital-checkout')->withCard($card)->withRecard($recard ?? null)
    //                                 ->withOccasion(request()->occasion)->withCookies($cookies);

    // }


    // public function sendDigitalProduct($slug, Request $request) {

        

    //     $request->validate(['firstname' => 'required|max:50',
    //                          'lastname' => 'required|max:50',
    //                          'rfirstname' => 'required|max:50',
    //                          'rlastname' => 'required|max:50',
    //                           'email'    => 'required|email|max:70',
    //                           'remail'   =>  'required|email|max:70',
    //                           'subject'  => 'required|max:200',
    //                          'product_id' => 'required|exists:products,id']);

    //     $product = Product::whereId($request->product_id)->whereSlug($slug)->whereType('digital')->first() or abort(404);



    //     $ecard = new Ecard();

    //     $ecard->product_id                  = $product->id;
    //     $ecard->user_id                     = auth()->id();
    //     $ecard->sender_firstname            = $request->firstname;
    //     $ecard->sender_lastname             = $request->lastname;
    //     $ecard->sender_email                = $request->email;
    //     $ecard->recipient_firstname         = $request->rfirstname;
    //     $ecard->recipient_lastname          = $request->rlastname;
    //     $ecard->recipient_email             = $request->remail;
    //     $ecard->subject                     = $request->subject;
    //     $ecard->message                     = $request->message;
    //     $ecard->link                        = str_random(170);
    //     $ecard->sent_time                   = date('Y-m-d H:i:s');

    //     if($request->has('occasion') && $request->filled('occasion')) {
    //         $occasion = Occasion::find($request->occasion);

    //         if($occasion) {
    //             $ecard->category = $occasion->name;
    //         }
    //     }


    //     if($request->has('reply_to'))
    //     {
    //         $ecard->reply_to = $request->reply_to;
    //     }

    //     $ecard->save();

    //     $settings  = DB::table('settings')->first();

    //     $products = Product::with('prices')->whereHas('categories',function($query) use ($settings) {
    //         $query->where('categories.id',$settings->home_category);
    //     })->whereStatus(1)->whereNotNull('picture')->get()->random(3);

    //     Mail::to($ecard->recipient_email)->send(new SendEcard($ecard));
    //     Mail::to($ecard->sender_email)->send(new EcardConfirmation($ecard,$products));

    //     session()->forget('reply_card');
    //     session(['sender_firstname'=>$request->firstname,'sender_lastname'=>$request->lastname,
    //             'sender_email' => $request->email, 'recipient_firstname'=>$request->rfirstname,
    //             'recipient_lastname'=>$request->rlastname, 'recipient_email'=>$request->remail,
    //              'card_message'=>$request->message]);

        

    //     return response()->json(['status'=>'success']);

    //     //view('digital-checkout-thanks')->withProducts($products);
    // }


    // public function showEcard($email, $link)
    // {
    //     $ecard = Ecard::where('recipient_email',$email)->where('link',$link)->first();
    //     $product = Product::find($ecard->product_id) or abort(404);
    //     return view('digital-card')->withEcard($ecard)->withProduct($product);
    // }
    
    // public function getOccasions(Request $request)
    // {
    //     if(empty($request->oca))
    //         $labels = Label::where('status',1);
    //     else
    //         $labels = Label::join('label_occasion AS lo','lo.label_id','=','labels.id')->where('status',1)->where('lo.occasion_id',$request->oca);
    //     return response()->json($labels->get());
    // }
}
