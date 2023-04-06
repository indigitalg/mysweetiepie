@extends('layouts.sweetiepie')
@section('contents')
<div class="ps-hero bg--cover" data-background="{{url('imagesmsp/product.jpg')}}" style="height:300px !important;min-height:0px">
<div class="ps-hero__content">
        <h1>Change Password</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Change Password</li>
          </ol>
        </div>
      </div>
</div>
<div class="ps-product-collection">
    <div class="ps-container">
        <div class="ps-section__content">
            <ul class="tab-list" role="tablist">
                <li><a href="{{url('/myaccount')}}">My Account</a></li>
                <li class=""><a href="{{url('myaccount/profile')}}">Manage Profile</a></li>
                <li class="active"><a href="{{url('myaccount/password')}}">Change Password</a></li>
                <li class=""><a href="{{url('/myaccount/orders')}}">My Orders</a></li>
                <li class=""><a href="{{url('/signout')}}">Logout</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab_1">
              <div class="ps-block--product-set">
                <div class="ps-block__content" style="width:100%;">
                    <div class="heading-wr"><h3>Change Password</h3></div>
	        		<article>Welcome <strong>Ashiq Muhammed</strong>, Change your account settings here. For more help please contact our support center</article>
	        		<div class="row">
	        		    <div class="col-sm-12">
	        		        <div class="form-group" style="padding-top:3%;">
	        		            <h3 class="text-center">Change Password</h3>
	        		        </div>
	        		        <form class="ps-form--checkout" action="{{url()->current()}}" method="post">		
					@csrf
              <div class="ps-checkout__billing">
                
                    <div class="form-group form-group--inline">
                      <label>New Password<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="password" name="newpassword" id="newpassword" value="" required>
                      <span>
			            {{$errors->first('newpassword')}}
			          </span>
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Confirm Password<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="password" name="confpassword" id="confpassword" value="" required>
                       <span class="validation_error">
			             {{$errors->first('confpassword')}}
			           </span>
                      </div>
                    </div>
                   
                    
                   
                    <div class="form-group">
		                    <label for="evephone" class="control-label label-col-15">&nbsp;</label>
		                    <div >
		                        <input type="hidden" name="customer_id" value="25">
		                        <button type="submit" name="update" id="update" value="Update" class="ps-btn ps-btn ps-btn--yellow pull-right">Update</button>
		                        <!--<button type="reset" name="Reset" id="reset" value="Reset" class="ps-btn ps-btn ps-btn--yellow ">Reset</button>-->
		                        <!--<br>
		                        <p class="left">
		                            <small>Your FREE account will be registered by submitting this form.</small>                    
		                        </p>-->
		                    </div>
		                </div>
                		<div class="clearfix"></div>
                 <!--<button class="ps-btn ps-btn ps-btn--yellow" type="submit" >Register Now</button>-->
              </div>
              </form>
	        		    </div>
	        		</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!--<div class="container" style="padding-top:100px">
    <div class="col-sm-4">
	
	        	<div class="account-sidebar-wr left" style="width: 300px;line-height: 28px;border-radius:6px">
	        		<article style="display:block">
	        		</article>
	        	</div>	
	        	</div>
	        	 <div class="col-sm-8">
	        	 
      <div class="ps-container">
        
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
               
				<form class="ps-form--checkout" action="{{url()->current()}}" method="post">		
					@csrf
              <div class="ps-checkout__billing">
                <center><h3>Change Password</h3></center>
                <br>
                    
		            
                    <div class="form-group form-group--inline">
                      <label>New Password<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="password" name="newpassword" id="newpassword" value="" required>
                      <span>
			            {{$errors->first('newpassword')}}
			          </span>
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Confirm Password<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="password" name="confpassword" id="confpassword" value="" required>
                       <span class="validation_error">
			             {{$errors->first('confpassword')}}
			           </span>
                      </div>
                    </div>
                   
                    
                   
                    <div class="form-group">
		                    <label for="evephone" class="control-label label-col-15">&nbsp;</label>
		                    <div >
		                        <input type="hidden" name="customer_id" value="25">
		                        <center><button type="submit" name="update" id="update" value="Update" class="ps-btn ps-btn ps-btn--yellow">Update</button></center>
		                        <button type="reset" name="Reset" id="reset" value="Reset" class="ps-btn ps-btn ps-btn--yellow ">Reset</button>
		                        <br>
		                        <p class="left">
		                            <small>Your FREE account will be registered by submitting this form.</small>                    
		                        </p>
		                    </div>
		                </div>
                		<div class="clearfix"></div>
                 
                   
                    
                    
               
                 <button class="ps-btn ps-btn ps-btn--yellow" type="submit" >Register Now</button>
              </div>
              </form>
            </div>
            
           
          </div>
      </div>
     
				</div>
			</div>  my-account-container -->
		
@endsection
  
