<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Hash;
// use Socialite;
use App\Models\Country;
use App\Models\User;
use App\Models\Basket;
// use Config;
use App\Models\Order;
use App\Mail\SignupMail;
use Mail;


class UserController extends Controller
{

	function index()
	{
		return view('frontend.myaccount.myaccount');
	}
	
	function profile()
	{
	   return view('frontend.myaccount.myprofile')->withCountries(Country::with('provinces')->orderBy('base','DESC')->orderBy('name','ASC')->get())
	                                    ->withUser(Auth::user());
	}
	
	function postProfile(Request $request)
	{
	   $request->validate([
							'firstname'	=> 'bail|required',
							'lastname'	=> 'bail|required',
							'postalcode'=> 'bail|min:5|max:7',
							'city'		=> 'bail|required',
							'phone'		=> 'bail|required|numeric'],
							['required' => 'This field is required']);
	    
	    
	    $user = User::find(Auth::id());
	    
	    $user->firstname    = $request->firstname;
	    $user->lastname     = $request->lastname;
	    $user->address      = $request->address;
	    $user->postalcode   = $request->postalcode;
	    $user->city         = $request->city;
	    $user->province     = $request->province;
	    $user->country      = $request->country;
	    $user->phone        = $request->phone;
	    $user->phone2       = $request->phone2;
	    
	    $user->save();
	    
	    return redirect('/myaccount');
	    
	}
	
	function password() 
	{
	   return view('frontend.myaccount.changepassword');
	    
	}
	
	function postPassword(Request $request)
	{
	    $request->validate([
							'newpassword'	=> 'bail|required',
							'confpassword'	=> 'bail|required|same:newpassword'],
							['required' => 'This field is required']);
							
		$user = User::find(Auth::id());
		
		if($request->newpassword == $request->confpassword)
		{
		    $user->password    = $request->newpassword;
	        $user->save();
	        return redirect('/myaccount');
		}
	}
	
	
	function orders() 
	{
	    $orders = Order::where('user_id',Auth::id())->orderBy('created_at','DESC')->get();
	   return view('frontend.myaccount.myorder')->withOrders($orders);
	}
	
	// function track()
	// {}

	function signin()
	{
		return view('auth/sign-in');
	}

	function postSignin(Request $request)
	{
		$request->validate(['email'		=>'bail|required|email',
							'password'	=> 'bail|required']);

		if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,'status'=>1]))
		{
			Basket::attachUser(Auth::id());

			if($request->has('redirect_uri'))
			{
				return redirect($request->redirect_uri);
				exit;
			}

			return redirect('/myaccount');
		}
		else
		{
			return redirect()->back()->withMessage('Invalid login attempt');
		}

	}

	function signup()
	{
		$country = Country::with('provinces')->orderBy('base','DESC')->orderBy('name','ASC')->get();
        return view('auth/sign-up')->withCountries($country);
	}
	

	public function signout()
	{
		Auth::logout();
		session()->forget('basket_id');
		return redirect('/');
	}


	// function postSignup(Request $request)
	// {
	// 	$this->validate($request,['email'		=> 'bail|required|email|unique:users,email',
	// 						'password'	=> 'bail|required|confirmed',
	// 						'password_confirmation' => 'bail|required',
	// 						'firstname'	=> 'bail|required',
	// 						'lastname'	=> 'bail|required',
	// 						'postalcode'=> 'bail|min:5|max:7',
	// 						'city'		=> 'bail|required',
	// 						'phone'		=> 'bail|required|numeric'],
	// 						['required' => 'This field is required']);

	// 	$user = new User();

	// 	$user->email 		= $request->email;
	// 	$user->password 	= $request->password;
	// 	$user->firstname 	= $request->firstname;
	// 	$user->lastname 	= $request->lastname;
	// 	$user->address  	= $request->address;
	// 	$user->postalcode 	= $request->postalcode;
	// 	$user->city 	 	= $request->city;
	// 	$user->province 	= $request->province;
	// 	$user->country  	= $request->country;
	// 	$user->phone    	= $request->phone;
	// 	$user->phone2 	 	= $request->phone2;
	// 	$user->type 	 	= 'customer';
	// 	$user->status 	 	= 1;
	// 	$user->save();
	// 	Mail::to($user->email)->send(new SignupMail($user));
	// 	return view('frontend/register-thanks')->with('successMsg','Thank you for becoming a member of Sweetie Pie');
	// }

	function getRetrievePassword() {

    	return view('auth/retrieve-password')->with(['title'=>'Retrieve Account']);


    }


    function postRetrievePassword(Request $request) {

    	$request->validate(['email'=>'required|exists:users,email']);

    	$token = '';

    	$user = User::whereEmail($request->email)->first();
    	$user->reset_token = $token;
    	$user->save();

    	return view('auth/retrieve-password')->with(['title'=>'Retrieve Account','user'=>$user]);

    }

    function getResetpassword($token) {

    	return view('reset-password')->with(['title'=>'Reset Password','token'=>$token]);
    }
    function postResetpassword(Request $request) {

    	 
    	 $request->validate(['password'	=> 'bail|required|min:5|confirmed',
							'password_confirmation' => 'bail|required|min:5'],
							['required' => 'This field is required']);
    	
    	
    	$authUser = User::where('reset_token',$request->reset_token)->first();

    	if(!$authUser)
    	 	 return back()->with("flash_message", "Invalid token");
    	
    	else{
    		$authUser->password = $request->password;
    		$authUser->reset_token = '';
        	$authUser->save(); 
        	return back()->with("flash_success", "Your password has been reset.");	
    	
        }
    	
    }

	// public function redirectToCheckout($provider)
    // {
    // 	Config::set('services.facebook.redirect',Config::get('services.facebook.redirect').'checkout');
    //     return Socialite::driver($provider)->with(['redirect'=>'checkout'])->redirect();

    //     //->redirectUri(Config::get('services.facebook.redirect').'checkout')
    // }

    // public function handleCheckoutCallback($provider)
    // {
    // 	Config::set('services.facebook.redirect',Config::get('services.facebook.redirect').'checkout');
    //     $user = Socialite::driver($provider)->stateless()->user();
        
    //     $authUser = $this->findOrCreateUser($user, $provider);
        
    //     Auth::login($authUser, true);
    //     session(['email' => $user->email]);
        
    //     $basket = Basket::find(session('basket_id',0));
    //     if($basket) {
    //         $basket->email = $user->email;
    //         $basket->save();
    //     }
    
    //     return redirect('shop/checkout');
    // }

	// public function redirectToProvider($provider)
    // {
    //     return Socialite::driver($provider)->with(['url'=>'checkout'])->redirect();
    // }

    // public function handleProviderCallback($provider)
    // {
    //     $user = Socialite::driver($provider)->stateless()->user();
    //     $authUser = $this->findOrCreateUser($user, $provider);
    //     Auth::login($authUser, true);
    //     return redirect('myaccount');
    // }

    
    // public function findOrCreateUser($user, $provider)
    // {
    //     $authUser = User::where('provider_id',$user->id)->first();

    //     if ($authUser) {
    //         return $authUser;
    //     }

    //     $authUser = User::where('email',$user->email)->first();

    //     if($authUser)
    //     {
    //     	$authUser->provider = $provider;
    //     	$authUser->provider_id = $user->id;
    //     	$authUser->save();

    //     	return $authUser;
    //     }

    //     return  User::create(['email' => $user->email,
    // 						 'firstname' => $user->name,
    // 						 'provider' => $provider,
    // 						 'provider_id' => $user->id,
    // 						 'password' => $user->id]);
    // }

 

}
   