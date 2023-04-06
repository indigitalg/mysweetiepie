
@extends('layouts.sweetiepie')
@section('contents')
<div class="ps-hero bg--cover" data-background="images/hero/about.jpg" style="height:300px !important;min-height:0px">
    <div class="ps-hero bg--cover" data-background="/imagesmsp/product.jpg" style="height:300px !important;min-height:0px" background="url(/imagesmsp/product.jpg) no-repeat cover;">
        <div class="ps-hero__content">
            <h1>Billing Details</h1>
            <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="/shop/cart">Shopping</a></li>
                    <li class="active">Billing Info</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="ps-checkout pt-40 pb-40">
      <div class="ps-container">
          @if(session()->has('error'))
          <div class="alert alert-danger">Unfortunately, we were unable to process your credit card, please contact your financial institution or try again later.  <u><a href="/support"><strong>Contact Us here</strong></a></u> if you are facing issues</div>
          @endif
          <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
			<form class="ps-form--checkout" action="{{url()->current()}}" method="post" id="billingInfo">		
					@csrf
			  

              <div class="ps-checkout__billing">
                <h4>Billing Address</h4>
                <hr/>
                    <div class="form-group form-group--inline">
                      <label>First Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname',$basket->address ? $basket->address->firstname:session('sender_firstname'))}}" v-model="formInputs.firstname" required>
                      <span class="validation_error">
			            {{$errors->first('firstname')}}
			          </span>
                      </div>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Last Name<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('lastname',$basket->address ? $basket->address->lastname:session('sender_lastname'))}}" v-model="formInputs.lastname" required>
                       <span class="validation_error">
			             {{$errors->first('lastname')}}
			           </span>
                      </div>
                    </div>
                    
                    
                    <div class="form-group form-group--inline">
                      <label>Address<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="address" id="address" value="{{old('address',$basket->address ? $basket->address->address:'')}}" required>
                      </div>
                      <span class="validation_error">
		              {{$errors->first('address')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>City<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="city" id="city" value="{{old('city',$basket->address ? $basket->address->city:'')}}" required>
                      </div>
                      <span class="validation_error">
		                {{$errors->first('city')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Postal Code<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" name="postalcode" id="postalcode" value="{{old('postalcode',$basket->address ? $basket->address->postalcode:'')}}" required>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('postalcode')}}
		                                	</span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Province<span>*</span>
                      </label>
                      <div class="form-group__content">
                          	<?php $defprovince = old('province',$basket->address ? $basket->address->province:''); ?>
                        <select class="form-control" name="province" id="province" required>
                            <option value="">Select Province</option>
                            @foreach($countries as $country)
		                      @if(count($country->provinces)>0)
		                        <optgroup label="{{$country->name}}">
		                          @foreach($country->provinces as $province)
		                             <option value="{{$province->code}}" {{$defprovince == $province->code ? 'selected':''}}>
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
                  <!--  <div class="form-group form-group--inline">-->
                  <!--    <label>Country<span>*</span>-->
                  <!--    </label>-->
                  <!--    <div class="form-group__content">-->
                  <!--        	<?php $defcountry = old('country',$basket->address ? $basket->address->country:''); ?>-->
                  <!--      <select class="form-control" name="country" id="country" required>-->
                            
                  <!--          <option value="">Select Country</option>-->
                  <!--          @foreach($countries as $country)-->
	                 <!--       <option value="{{$country->code}}" {{$defcountry == $country->code ? 'selected':''}}>{{$country->name}}</option>-->
	                 <!--       @endforeach-->
                      <!--      <option value="Residence" >Residence</option>-->
		                    <!--<option value="Business" >Business</option>-->
		                    <!--<option value="Funeral Home" >Funeral Home</option>-->
		                    <!--<option value="Hospital" >Hospital</option>-->
		                    <!--<option value="Apartment" >Apartment</option>-->
		                    <!--<option value="School" >School</option>-->
		                    <!--<option value="Church" >Church</option>-->
		                <!--</select>-->
                  <!--    </div>-->
                  <!--    <span class="validation_error">-->
		                <!--                		{{$errors->first('country')}}-->
		                <!--                	</span>-->
                  <!--  </div>-->
                    <div class="form-group form-group--inline">
                      <label>Email<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="email" name="email" id="email" value="{{old('email',$basket->email)}}" required>
                      </div>
                      <span class="validation_error">
		                {{$errors->first('email')}}
		              </span>
                    </div>
                    <div class="form-group form-group--inline">
                      <label>Phone<span>*</span>
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" maxlength="10" name="phone" id="dayphone" value="{{old('phone',$basket->address ? $basket->address->phone:'')}}" required>
                      </div>
                      <span class="validation_error">
		                                		{{$errors->first('phone')}}
		                                	</span>
                    </div>
                    
                    <div class="form-group form-group--inline">
                      <label>Mobile Number
                      </label>
                      <div class="form-group__content">
                        <input class="form-control" type="text" maxlength="10"  name="evephone" id="evephone" value="{{old('phone2',$basket->address ? $basket->address->phone2:'')}}">
                      </div>
                      <span class="validation_error">
		                 {{$errors->first('phone2')}}
		              </span>
                    </div>
                 
              </div>
              
              <p>&nbsp;</p>
              <br/><br/>
              
              <div class="ps-checkout__billing">
                <h4>Payment Info</h4>
                <hr/>
                @if(session()->has('error'))
				 <p  style="padding:25px;color:#DD0000">
			       <strong>{{session('error')}}</strong>
			     </p>
			    @endif
			    
			    <div class="form-group form-group--inline">
                  <label>Credit card Number<span>*</span></label>
                  <div class="form-group__content">
                   <input class="form-control" type="text" name="cardnumber" id="cardnumber" maxlength="16" value="" placeholder="Credit Card Number" pattern="\d*" required>
                        <span class="validation_error">
			              {{$errors->first('cardnumber')}}
			            </span>
                  </div>
                  <span class="validation_error">
	                 {{$errors->first('phone2')}}
	              </span>
                </div>
                
                <div class="form-group form-group--inline">
                    <label>Expiry Date<span>*</span></label>
                    <div class="form-group__content row">
                        <div class="col-sm-4">
                        <select name="expiry_month" id="expiry_month" class="form-control" required>
                            <option value="">Month</option>
                            @for($i=1;$i<=12;$i++)
		                    <option value="{{sprintf("%2d",$i)}}">{{sprintf("%02d",$i)}}</option> 
		                    @endfor
                        </select>
                        </div>
                        <div class="col-sm-4">
                        <select name="expiry_year" id="expiry_year" class="form-control" required>
                            <option value="">Year</option>
                             @for($i=0;$i<=15;$i++)
		                     <option value="{{date('Y')+$i}}">{{date('Y')+$i}}</option>
		                     @endfor
                        </select>
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="form-group form-group--inline">
                    <label>Security Code<span>*</span></label>
                    <div class="form-group__content row">
                        <div class="col-sm-4">
                            <input type="text" name="cvv" id="cvv" value="" size="5" maxlength="4" placeholder="CVV" pattern="\d*" class="form-control" required>
                        </div>
                    </div>
                </div>
                
                <div class="form-group form-group--inline">
                  <label >&nbsp;</label>
                  <div class="form-group__content">
                      <button class="ps-btn ps-btn ps-btn--yellow" type="submit" >PLACE ORDER NOW</button>
                  </div>
                </div>
			    
              </div>
              </form>
            </div>
            

            
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <div class="ps-checkout__order" style="border: 2px solid #4e3939;background-color:white;">
                <header>
                  <h3 style="color:black">Your Order</h3>
                </header>
                <div class="content">
                  <table class="table ps-checkout__products">
                    <thead>
                      <tr>
                        <th class="text-uppercase" style="color:black">Image</th>
                        <th class="text-uppercase" style="color:black">Product</th>
                        <th class="text-uppercase" style="color:black">Total</th>
                      </tr>
                    </thead>
                     <tbody>
                        @foreach($basket->items as $item)
                      <tr>
                        <td><div class="ps-cart-item__thumbnail"><img src="{{env('PRODUCT_FILES').$item->picture}}" alt=""></div></td>
                        <td style="color:black">{{$item->product_name}}X{{$item->quantity}}</td>
                        <td style="color:black"> {{getPrice($item->quantity*$item->price_amount)}}</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="2" style="color:black">Product Total</td>
                        <td style="color:black">{{getPrice($basket->total)}}</td>
                      </tr>
                      <tr>
                        <td colspan="2" style="color:black">Delivery Charges via UPS or FedEx </td>
                        <td style="color:black">{{getPrice($basket->shipping)}}</td>
                      </tr>
                      <tr>
                        <td colspan="2" style="color:black">Tax</td>
                        <td style="color:black">{{getPrice($basket->tax)}}</td>
                      </tr>
                      <tr>
                        <td colspan="2" style="color:black"><b>Grand Total</b></td>
                        <td style="color:black"><b>{{getPrice($basket->total+$basket->shipping+$basket->tax)}}</b></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                
              </div>
             
            </div>
           
          </div>
      </div>
    </div>

@endsection

@section('bottom-scripts')

<script type="text/javascript">

	$(document).ready(function() {

		$("#billingInfo").submit(function(e){
			//e.preventDefault();
			$("#buttonGradient").prop('disabled',true);
			$("#buttonGradient").text('Processing Order...');
		})

	});

</script>


@endsection  
  
