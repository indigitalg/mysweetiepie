@extends('layouts.sweetiepie')
@section('contents')
        
<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
    <div class="ps-hero__content">
      
    </div>
</div>
  
<div class="catgmain">
      <div id="page-category-title" class="top-title">
          <h2 class="text-center">Login & Continue</h2>
      </div>
      <div class="clearfix"></div>
</div>
        
        <main class="ps-main">

            <div class="container">
           		<div class="signin-page-wrapper">
           			
    				<div class="signin-row clearfix">
    				    <div class="col-sm-6" style="margin-bottom:25px;">
    				        <div class="heading-wr"  style="text-align:center;">
                   			    <h3>Existing Customer?</h3>
            					<h4>Please login</h4>
            				</div>
    					    <div class="signin-terms-wr ">
    						    
    						    <form action="{{url()->current()}}" class="form-horizontal" method="post" accept-charset="utf-8">
        							{{ csrf_field() }}
        
        							@if(session()->has('message'))
        								{{session('message')}}	
        							@endif
        
        							<input type="hidden" name="visitor" value="customer" />   
        
        							<div class="form-group">
        		                        <label form="username" class="control-label label-col-16">Username</label>
        		                        <div class="field-col-16 field-col">
        		                            <input type="text" name="email" class="form-control">
        		                            <span class="validation_error">{{$errors->first('email')}}</span>
        		                        </div>
        		                    </div>
        
        		                    <div class="form-group">
        		                        <label for="password" class="control-label label-col-17">Password</label>
        		                        <div class="field-col-17 field-col">
        		                            <input type="password" name="password" autocomplete="off" class="form-control">
        		                            <span class="validation_error">{{$errors->first('password')}}</span>
        		                        </div>
        		                    </div>
        
        		                    <div class="form-group">
        		                       <div class="field-col-18 field-col" style="text-align:center;">
        		                            <button type="submit" name="submit" class="ps-btn ps-btn--yellow custimize-bs" id="buttonGradient" value="Sign-in" style="height: auto;width: 300px;content: none;font-size: 12px;align-content: center;padding: 5px;">Sign-in</button>
        								</div>
        		                    </div>
        		                    <div>
        		                        <div class="recover-block-wr text-center">
        									<a href="{{url('/signup')}}">Do not have an account? Sign Up</a><br>
        		                            <a href="{{url('/retrieve-account')}}">Forgot your Username or Password?</a>
        		                        </div>
        		                    </div>
                                </form>
    				 		    <!-- <a href="{{url('/register')}}" class="button btn-primary">Do not have an account? Sign Up</a> -->
    				 	    </div>
    				 	</div>
    				 	<div class="col-sm-6">
    				 	    <div class="heading-wr" style="text-align:center;">
                   			    <h3>New Customer?</h3>
            					<h4>Continue as guest</h4>
            				</div>
    				 	    <div class="signin-terms-wr right center" >
    				 	        
    						     <div class="form-group form-group--inline">
    							    <form action="{{url()->current()}}" method="POST">
    								 <input type="hidden" name="visitor" value="guest" /> 
    								 
    								 <div class="form-group">
        								<label for="password" class="control-label label-col-17">Your Email</label>
        		                        <div class="field-col-17 field-col">
        		                            <input type="text" name="guest_email" id="guest_email" class="form-control" required="" placeholder="Enter email address" >
    								        <span class="validation_error">{{$errors->first('guest_email')}}</span>
        		                        </div>
        		                     </div>

                                     <div class="form-group">
                                        <label for="password" class="control-label label-col-17 hidden-xs">&nbsp;</label>
                                        <div class="field-col-17 field-col" style="text-align:center;">
                                           <button type="submit" name="btsubmit" value="Continue" class="ps-btn ps-btn--yellow custimize-bs" id="btnsubmit" style="height: auto;width: 300px;content: none;font-size: 12px;align-content: center;padding: 5px;">Continue</button>
                                            @csrf
                                        </div>
                                     </div>

    							 	 <div class="advantages-terms" style="margin-top: 25px;">
            							<p>Registered members can take advantage of the following</p>
            							<ul>
                                            <li>Online Order Tracking - Check your order status online.</li>
                                            <li>Faster Checkout - Your personal information is stored for you.</li>
                                            <li>Collection Previews - Sneak Peek of upcoming product releases.</li>
                                            <li>Promotions &amp; Offers - Opt in to receive Promotions &amp; Offers.</li>
                                        </ul>
            						</div>
    							    </form>
    						      </div>
    		                     </div>
    				 	      </div>
    				 	</div>
    				 	
    				</div>
    			</div><!--  end of signin-page-wrapper -->
        </div>
    </main>
    <div style="max-width: 500px; margin: 0px auto 100px auto;">
	    <div class="_form_25"></div><script src="https://indigitalgroup.activehosted.com/f/embed.php?id=25"  type="text/javascript" charset="utf-8"></script>
    </div>
@endsection


@section('bottom_scripts')


<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '{your-app-id}',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

@endsection
  
