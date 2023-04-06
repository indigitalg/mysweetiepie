@extends('layouts.sweetiepie')
@section('contents')
<div class="ps-hero bg--cover" data-background="{{url('imagesmsp/product.jpg')}}" style="height:300px !important;min-height:0px">
<div class="ps-hero__content">
        <h1>My Profile</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">My Profile</li>
          </ol>
        </div>
      </div>
</div>
<div class="ps-product-collection">
    <div class="ps-container">
        <div class="ps-section__content">
            <ul class="tab-list" role="tablist">
                <li><a href="{{url('/myaccount')}}">My Account</a></li>
                <li class="active"><a href="{{url('myaccount/profile')}}">Manage Profile</a></li>
                <li class=""><a href="{{url('myaccount/password')}}">Change Password</a></li>
                <li class=""><a href="{{url('/myaccount/orders')}}">My Orders</a></li>
                <li class=""><a href="{{url('/signout')}}">Logout</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab_1">
              <div class="ps-block--product-set">
                <div class="ps-block__content" style="width:100%;">
                    <div class="heading-wr"><h3>Manage Profile</h3></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <article>Welcome <strong>{{$user->firstname}} {{$user->lastname}}</strong>, Change your account settings here. For more help please contact our support center</article>
                        </div>
                    </div>
                    <div class="row" style="padding-top:3%;">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <h3 class="text-center">Update Profile</h3>
                            </div>
                        </div>
                    </div>
	        		<form class="ps-form--checkout" action="{{url()->current()}}" method="post">		
					@csrf
              <div class="ps-checkout__billing">
                    <div class="form-group form-group--inline">
                      <label>First Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname',$user->firstname)}}" required>
                      <span>
			            {{$errors->first('firstname')}}
			          </span>
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Last Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('$user->lastname',$user->lastname)}}" required>
                       <span class="validation_error">
			             {{$errors->first('lastname')}}
			           </span>
                      </div>
                    </div>
                   
                    
                    <div class="form-group form-group--inline">
                      <label>Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="address" id="address" value="{{old('address',$user->address)}}" required >
                      </div>
                      <span class="validation_error">
		              {{$errors->first('address')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>City<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="city" id="city" value="{{old('city',$user->city)}}" required >
                      </div>
                      <span class="validation_error">
		                {{$errors->first('city')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Postal Code<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="postalcode" id="postalcode" value="{{old('postalcode',$user->postalcode)}}" required>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('postalcode')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Province/State<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <select class="form-control" name="province" id="province" required>
                            <option value="">Select Province</option>
                            @foreach($countries as $country)
		                      @if(count($country->provinces)>0)
		                        <optgroup label="{{$country->name}}">
		                          @foreach($country->provinces as $province)
		                             <option value="{{$province->code}}">
		                                        					{{$province->name}}</option>
		                          @endforeach
		                       </optgroup> 
		                      @endif
		                    @endforeach   
                     
		                </select>
                      </div>
                      <span class="validation_error">
		                                			{{$errors->first('province')}}
		                                		</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Country<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <select class="form-control" name="country" id="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
	                        <option value="{{$country->code}}" @if(old('country','CA')==$country->code) selected="selected" @endif>{{$country->name}}</option>
	                        @endforeach
                      <!--      <option value="Residence" >Residence</option>-->
		                    <!--<option value="Business" >Business</option>-->
		                    <!--<option value="Funeral Home" >Funeral Home</option>-->
		                    <!--<option value="Hospital" >Hospital</option>-->
		                    <!--<option value="Apartment" >Apartment</option>-->
		                    <!--<option value="School" >School</option>-->
		                    <!--<option value="Church" >Church</option>-->
		                </select>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('country')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Day Phone<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" maxlength="10" name="phone" id="dayphone" value="{{old('phone',$user->phone)}}" required>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('phone')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Mobile Number<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" maxlength="10"  name="evephone" id="evephone" value="{{old('phone',$user->phone2)}}">
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('phone2')}}
		                                	</span>
                    </div>
                    <div class="form-group">
		                    <label for="evephone" class="control-label label-col-15">&nbsp;</label>
		                    <div >
		                        <input type="hidden" name="customer_id" value="25">
		                        <button type="submit" name="update" id="update" value="Update" class="ps-btn ps-btn ps-btn--yellow pull-right">Update</button>
		                        <!--<button type="reset" name="Reset" id="reset" value="Reset" class="ps-btn ps-btn ps-btn--yellow ">Reset</button>-->
		                        <br>
		                        <p class="left">
		                            <!--<small>Your FREE account will be registered by submitting this form.</small>                    -->
		                        </p>
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
                <center><h3>Update Profile</h3></center>
                <br>
                    
		            
                    <div class="form-group form-group--inline">
                      <label>First Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname',$user->firstname)}}" required>
                      <span>
			            {{$errors->first('firstname')}}
			          </span>
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Last Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('$user->lastname',$user->lastname)}}" required>
                       <span class="validation_error">
			             {{$errors->first('lastname')}}
			           </span>
                      </div>
                    </div>
                   
                    
                    <div class="form-group form-group--inline">
                      <label>Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="address" id="address" value="{{old('address',$user->address)}}" required >
                      </div>
                      <span class="validation_error">
		              {{$errors->first('address')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>City<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="city" id="city" value="{{old('city',$user->city)}}" required >
                      </div>
                      <span class="validation_error">
		                {{$errors->first('city')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Postal Code<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="postalcode" id="postalcode" value="{{old('postalcode',$user->postalcode)}}" required>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('postalcode')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Province/State<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <select class="form-control" name="province" id="province" required>
                            <option value="">Select Province</option>
                            @foreach($countries as $country)
		                      @if(count($country->provinces)>0)
		                        <optgroup label="{{$country->name}}">
		                          @foreach($country->provinces as $province)
		                             <option value="{{$province->code}}">
		                                        					{{$province->name}}</option>
		                          @endforeach
		                       </optgroup> 
		                      @endif
		                    @endforeach   
                     
		                </select>
                      </div>
                      <span class="validation_error">
		                                			{{$errors->first('province')}}
		                                		</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Country<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <select class="form-control" name="country" id="country" required>
                            <option value="">Select Country</option>
                            @foreach($countries as $country)
	                        <option value="{{$country->code}}" @if(old('country','CA')==$country->code) selected="selected" @endif>{{$country->name}}</option>
	                        @endforeach
                            <option value="Residence" >Residence</option>
		                    <option value="Business" >Business</option>
		                    <option value="Funeral Home" >Funeral Home</option>
		                    <option value="Hospital" >Hospital</option>
		                    <option value="Apartment" >Apartment</option>
		                    <option value="School" >School</option>
		                    <option value="Church" >Church</option>
		                </select>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('country')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Day Phone<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" maxlength="10" name="phone" id="dayphone" value="{{old('phone',$user->phone)}}" required>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('phone')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Mobile Number<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" maxlength="10"  name="evephone" id="evephone" value="{{old('phone',$user->phone2)}}">
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('phone2')}}
		                                	</span>
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
			</div>  my-account-container--> 
		
@endsection
  
