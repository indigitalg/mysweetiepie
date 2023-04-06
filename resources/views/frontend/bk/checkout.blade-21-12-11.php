@extends('layouts/sweetiepie')

 @section('contents')

 <style>

     .info-label-products {

    margin-left: 1px;

    margin-top: 5px;

    border: 1px solid #ce6f9b;

    padding: 5px;

    border-radius: 20px;

    height: 20px;

    width: 20px;

    text-align: center;

    cursor: pointer;

    color: #ce6f9b;

    font-size: 12px;

    position: absolute;

    top: 16%;

    float: right;

}

 </style>

<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
    <div class="ps-hero__content">
      
    </div>
</div>
  
<div class="catgmain">
      <div id="page-category-title" class="top-title">
          <h2 class="text-center">Checkout</h2>
      </div>
      <div class="clearfix"></div>
</div>

    <div class="ps-checkout pt-40 pb-40">

      <div class="ps-container">

        

          <div class="row">

            <form class="ps-form--checkout" action="{{url()->current()}}" method="post" id="checkoutform" novalidate>	

            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 " id="checkoutInfo">

                

				@csrf

				

				@if(session('shippingType') != 'pickup')

				

                  <div class="ps-checkout__billing">

                    <h3>Delivery Address</h3>

                        @if(count($errors->all()) > 0)

                        <div class="form-group">

                            <ul>

                                @foreach($errors->all() as $error)

                                <li style="color:red;">{{$error}}</li>

                                @endforeach

                            </ul>

                        </div>

                        @endif

                        <div class="form-group form-group--inline">

                          <label>First Name<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname')}}" v-model="formInputs.firstname" required>

                              <span>{{$errors->first('firstname')}}</span>

                          </div>

                        </div>

                        <div class="form-group form-group--inline">

                          <label>Last Name<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="lastname" id="lastname" value="{{old('lastname')}}" required>

                           <span class="validation_error">{{$errors->first('lastname')}}</span>

                          </div>

                        </div>

                         <div class="form-group form-group--inline">

                          <label>Email<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="email" name="email" id="email" value="{{$email->email}}" required readonly>

                          </div>

                          <span class="validation_error">

    		                {{$errors->first('email')}}

    		              </span>

                        </div>

                        <div class="form-group form-group--inline">

                          <label>Location Type<span>*</span>

                          </label>

                          <div class="form-group__content">

                              {{old('location_type')}}

                            <select class="form-control" name="location_type" id="location_type" v-model="formInputs.location_type" required>

                                <option value="">Select Location type</option>

                                <option value="Residence" @if(old('location_type') == 'Residence') selected @endif>Residence</option>

                                <option value="Business" @if(old('location_type') == 'Business') selected @endif>Business</option>

                                <option value="Funeral Home" @if(old('location_type') == 'Funeral Home') selected @endif>Funeral Home</option>

                                <option value="Hospital" @if(old('location_type') == 'Hospital') selected @endif>Hospital</option>

                                <option value="Apartment" @if(old('location_type') == 'Apartment') selected @endif>Apartment</option>

                                <option value="School" @if(old('location_type') == 'School') selected @endif>School</option>

                                <option value="Church" @if(old('location_type') == 'Church') selected @endif>Church</option>

    		                </select>

    		                <span class="validation_error">{{$errors->first('location_type')}}</span>

                          </div>

                        </div>

    

                        <div class="form-group form-group--inline">

                          <label>Address<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" value="{{old('address')}}" name="address" id="address" required>

                              <span class="validation_error">{{$errors->first('address')}}</span>

                          </div>

                        </div>

                        <div class="form-group form-group--inline">

                          <label>Postal Code<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" value="{{$pin->postalcode}}" name="postalcode" id="postalcode" required readonly>

                             <span class="validation_error postal-code-error">{{$errors->first('postalcode')}}</span>

                          </div>

                        </div>

                        <?php $cprovince = getPostProvince($pin->postalcode); 

                              $ccity = getPostCity($pin->postalcode); 

                        ?>

                        <div class="form-group form-group--inline">

                          <label>City<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" value="{{old('city',$ccity)}}" name="city" id="city" required readonly>

                             <span class="validation_error ">{{$errors->first('city')}}</span>

                          </div>

                        </div>

                        <div class="form-group form-group--inline">

                          <label>Province<span>*</span>

                          </label>

                          <div class="form-group__content">

    		                    @foreach($countries as $country)

    		                      @if(count($country->provinces)>0)

    		                          @foreach($country->provinces as $province)

    		                             @if($province->code == strtoupper($cprovince)) 

    		                                <input type="text" name="noprovince" value="{{$province->name}}" class="form-control" readonly>

    		                             @endif

    		                          @endforeach

    		                      @endif

    		                    @endforeach   

    		                <input type="hidden" name="province" value="{{old('province',$cprovince)}}">

                            <span class="validation_error">{{$errors->first('province')}}</span>

                          </div>

                        </div>

                      

                        <div class="form-group form-group--inline">

                          <label>Phone<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" value="{{old('phone')}}" maxlength="10" name="phone" id="phone1" required>

                              <span class="validation_error">{{$errors->first('phone')}}</span>

                          </div>

                        </div>

                        <div class="form-group form-group--inline">

                          <label>Mobile

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" value="{{old('phone2')}}" maxlength="10"  name="phone2" id="phone2">

                            <span class="validation_error">{{$errors->first('phone2')}}</span>

                          </div>

                        </div>

                        

                        <?php $send_gift = old('send_gift','No'); ?>

                        

                        <div class="form-group form-group--inline">

                          <label for="same_address">&nbsp;</label>

                          <div class="form-group__content">

                            <label>

                                <input class="" type="checkbox" name="send_gift" id="send_gift" @if($send_gift == 'Yes') checked="checked" @endif value="Yes" > 

                                <span >Send it as a Gift</span>

                            </label>

                          </div>

                        </div>

                        

                        <div class="form-group form-group--inline" id="gift_message"  @if($send_gift != 1) style="display:none;" @endif >

                          <label>Gift card Message

                          </label>

                          <div class="form-group__content">

                            <textarea class="form-control" name="card_message" id="card_message" rows="4">{!! old('card_message') !!}</textarea>

                              <span class="validation_error">{{$errors->first('card_message')}}</span>

                          </div>

                        </div>

                        

                  </div>

                  

                  

                @endif

                  

                  <div class="ps-checkout__billing" @if(session('shippingType') != 'pickup') style="display:none;" @endif  @if($basket->send_gift != 1)  id="billing_address"   @endif >

                    <h3>Billing Address</h3>

                    <hr/>

                        <div class="form-group form-group--inline">

                          <label>First Name<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="firstname_billing" id="firstname_billing" value="{{old('firstname_billing')}}" v-model="formInputs.firstname_billing" required>

                          <span class="validation_error">

    			            {{$errors->first('firstname_billing')}}

    			          </span>

                          </div>

                        </div>

                        <div class="form-group form-group--inline">

                          <label>Last Name<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="lastname_billing" id="lastname_billing" value="{{old('lastname_billing')}}" v-model="formInputs.lastname_billing" required>

                           <span class="validation_error">

    			             {{$errors->first('lastname_billing')}}

    			           </span>

                          </div>

                        </div>

                        

                        <div class="form-group form-group--inline">

                          <label>Address<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="address_billing" id="address_billing" value="{{old('address_billing')}}" required>

                          </div>

                          <span class="validation_error">

    		              {{$errors->first('address_billing')}}

    		              </span>

                        </div>

                        

                        <div class="form-group form-group--inline">

                          <label>City<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="city_billing" id="city_billing" value="{{old('city_billing')}}" required>

                          </div>

                          <span class="validation_error">

    		                {{$errors->first('city_billing')}}

    		              </span>

                        </div>

                        

                        <div class="form-group form-group--inline">

                          <label>Postal Code<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" name="postalcode_billing" id="postalcode1" value="{{old('postalcode_billing',$basket->address ? $basket->address->postalcode:'')}}" required>

                          </div>

                          <span class="validation_error">

    		                {{$errors->first('postalcode_billing')}}

    		              </span>

                        </div>

                        

                        <div class="form-group form-group--inline">

                          <label>Province<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <?php $defprovince = old('province_billing'); ?>

                            <select class="form-control" name="province_billing" id="province_billing" required>

                                <option value="">Select Province</option>

                                @foreach($countries as $country)

    		                      @if(count($country->provinces)>0)

    		                        <optgroup label="{{$country->name}}">

    		                          @foreach($country->provinces as $province)

    		                             <option value="{{$province->code}}" {{$defprovince == $province->code ? 'selected':''}}>

    		                               {{$province->name}}

    		                             </option>

    		                          @endforeach

    		                       </optgroup> 

    		                      @endif

    		                    @endforeach   

                         

    		                </select>

                          </div>

                          <span class="validation_error">

    		                {{$errors->first('province_billing')}}

    		              </span>

                        </div>

                     

                        <div class="form-group form-group--inline">

                          <label>Email<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="email_billing" name="email_billing" id="email_billing" value="{{old('email_billing')}}" required>

                          </div>

                          <span class="validation_error">

    		                {{$errors->first('email_billing')}}

    		              </span>

                        </div>

                        

                        <div class="form-group form-group--inline">

                          <label>Phone<span>*</span>

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" maxlength="10" name="phone_billing" id="phone_billing" value="{{old('phone_billing')}}" required>

                          </div>

                          <span class="validation_error">

    		                {{$errors->first('phone_billing')}}

    		              </span>

                        </div>

                        

                        <div class="form-group form-group--inline">

                          <label>Mobile Number

                          </label>

                          <div class="form-group__content">

                            <input class="form-control" type="text" maxlength="10"  name="phone2_billing" id="phone2_billing" value="">

                          </div>

                          <span class="validation_error">

    		                 {{$errors->first('phone2_blling')}}

    		              </span>

                        </div>
                        <div class="form-group form-group--inline">

                          <label>Special Instructions

                          </label>

                          <div class="form-group__content" style="margin-bottom:25px">
                              <textarea class="form-control" name="spcl_instructions" id="spcl_instructions" rows="4">{!! old('spcl_instructions') !!}</textarea>
                                  
        

                            <!--<input class="form-control" type="text" maxlength="10"  name="phone2_billing" id="phone2_billing" value="">-->

                          </div>

                          <span class="validation_error">

    		                 {{$errors->first('spcl_instructions')}}

    		              </span>

                        </div>

                     

                  </div>

                  

                  



            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 "  id="checkoutItems"  >

              <div class="ps-checkout__order" style="border: 2px solid #e6e1c0; background-color:white;">

                <header>

                    <div class="row">

                        <div class="col-sm-6">

                    <h3 style="color:black">Your Order</h3>

                    </div>

                    <div class="col-sm-6" style="

    text-align: right;

">

                    <a href="{{url('shop/cart')}}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="

    border: 1px solid #e6e1c0;

    width: 80px;

    border-radius: 22px;

    padding-left: 15px;

    padding-right: 20px;

    padding-top: 5px;

    padding-bottom: 5px;

    "> Edit</i></a>

                    </div>

                    </div>

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

                        <td><div class="ps-cart-item__thumbnail" ><img src="{{env('PRODUCT_FILES').$item->picture}}" alt=""></div></td>

                        <td style="color:black">{{$item->product_name}}&nbsp;&nbsp;X&nbsp;&nbsp;{{$item->quantity}}@if($item->custom_label)

                        <span>(Custom Label)</span>

                        @endif</td>

                        <td style="color:black"> {{getPrice($item->quantity*$item->price_amount)}}</td>

                      </tr>

                      @endforeach

                      @if(session()->has('coupon'))

                      <tr>

                        <td colspan="2" style="color:black">Coupon Code</td>

                        <td style="color:black">{{session('coupon')}}</td>

                      </tr>

                      @endif

                      <tr>

                        <td colspan="2" style="color:black">Product Total</td>

                        <td style="color:black">{{getPrice($basket->total)}}</td>

                      </tr>

                      @if(session('shippingType') != 'pickup')

                      <tr>

                        <td colspan="2" style="color:black">Delivery Charges via UPS or FedEx </td>

                        <td style="color:black">{{getPrice($basket->shipping)}}</td>

                      </tr>

                      @endif

                      <tr>

                        <td colspan="2" style="color:black">Tax</td>

                        <td style="color:black">{{getPrice($basket->tax)}}</td>

                      </tr>

                      <tr>

                        <td colspan="2" style="color:black">Other Service Charges</td>

                        <td style="color:black">{{getPrice($basket->items->sum('label_charge'))}}</td>

                      </tr>

                      <tr>

                        <td colspan="2" style="color:black">Discount</td>

                        <td style="color:black">{{getPrice($basket->discount_type == 'amount' ? $basket->discount : ($basket->total*$basket->discount/100))}}</td>

                      </tr>

                      <tr>

                        <td colspan="2" style="color:black"><b>Grand Total</b></td>

                        <td style="color:black"><b>{{getPrice($basket->total-($basket->discount_type == 'amount' ? $basket->discount : ($basket->total*$basket->discount/100))+($basket->tax)+($basket->shipping)+($basket->items->sum('label_charge')))}}</b></td>

                      </tr>

                      

                    </tbody>

                  </table>

                </div>

                

              </div>

              

              <div class="ps-checkout__order" style="border: 2px solid #e6e1c0; background-color:white; bottom: 0px;">

                    <header>

                        <div class="form-group__inline">

                      <h3 style="color:black">Pay Now<img src="{{asset('imagesmsp/visa.png')}}" style="

    padding-left: 155px;

    padding-right: 8px;

"><img src="{{asset('imagesmsp/master-card.png')}}"></div>

                    </header>

                    <div class="content">

                        @if(session()->has('error'))

        				 <p  style="padding:25px;color:#DD0000">

        			       <strong>{{session('error')}}</strong>

        			     </p>

        			    @endif

        			    

        			    <div class="form-group">

                          

                          <div class="form-group__content">

                           <label>Credit card Number<span>*</span></label>

                           <input class="form-control" type="text" name="cardnumber" id="cardnumber" maxlength="16" value="" placeholder="Credit Card Number" pattern="\d*" required>

                                <span class="validation_error">

        			              {{$errors->first('cardnumber')}}

        			            </span>

                          </div>

                       <!--   <span class="validation_error">-->

        	              <!--   {{$errors->first('cardnumber')}}-->

        	              <!--</span>-->

                        </div>

                        

                        <div class="form-group">

                            

                            <div class="form-group__content row">

                                <label class="col-sm-12">Expiry Date<span>*</span></label>

                                

                                <div class="col-sm-6">

                                <select name="expiry_month" id="expiry_month" class="form-control" required>

                                    <option value="">Month</option>

                                    @for($i=1;$i<=12;$i++)

        		                    <option value="{{sprintf("%2d",$i)}}">{{sprintf("%02d",$i)}}</option> 

        		                    @endfor

                                </select>

                                </div>

                                <div class="col-sm-6">

                                <select name="expiry_year" id="expiry_year" class="form-control" required>

                                    <option value="">Year</option>

                                     @for($i=0;$i<=15;$i++)

        		                     <option value="{{date('Y')+$i}}">{{date('Y')+$i}}</option>

        		                     @endfor

                                </select>

                                </div>

                                

                            </div>

                            

                        </div>

                        

                        <div class="form-group">

                            <div class="form-group__content row">

                                <label class="col-sm-12">Security Code<span>*</span> <i class="fa fa-info-circle" aria-hidden="true" id="cvvinfo"></i> </label>

                                

                                <div class="col-sm-4">

                                    <input type="text" name="cvv" id="cvv" value="" size="5" maxlength="4" placeholder="CVV" pattern="\d*" class="form-control" required>

                                   

                                </div>

                                 <div id="cvv12" style="display:none;"><font color="red">This is a 3-Digital Number printed on the back of your card.</font></div>

                            </div>

                        </div>

                        

                        <div class="form-group">

                            <div class="form-group__content">

                              <button class="ps-btn ps-btn ps-btn--yellow" type="submit" style="width: 100%;">PAY & PLACE ORDER</button>

                            </div>

                        </div>

                        

                        

                    </div>

    			    

                </div>

             

            </div>

            </form>

          </div>

      </div>

    </div>

    @endsection

    @push('scripts')

    <script>

        $(document).on('change','#postalcode',function(){

            

            $.ajax({

               url:'{{url('get-province-city-country')}}',

               method:'POST',

               data:{code:$(this).val(),_token:$('meta[name="token"]').attr('content')},

               success:function(data){

                   $('.ps-loading').addClass('loaded');



                    data = JSON.parse(data);

                    

                    if(data.error) {

                        $('.postal-code-error').html(data.error);

                    } else {

                        $('.postal-code-error').html('');

                    }

                    

               },

               error:function(xhr,status){

                   alert(xhr);

                   $('.ps-loading').addClass('loaded');

               }

            });

            

            

        });

        

        $(document).ready(function(){

            

            $('.ps-loading').removeClass('loaded');

            

            $('#send_gift').click(function() {

                if(this.checked) {

                    $("#billing_address").attr("style","display:block;");

                    $("#gift_message").attr("style","display:block;");

                }

                else {

                    $("#billing_address").attr("style","display:none;");

                    $("#gift_message").attr("style","display:none;");

                }

                

                $('#send_gift').val(this.checked ? 1 : 0);        

            });

            

        })

        

         $('#cvvinfo').on('click',function(){

             if($('#cvv12').css('display') == 'none'){ 

   $('#cvv12').show(); 

} else { 

   $('#cvv12').hide(); 

}

                // $("#cvv12").show(); 

                

            });

    </script>

    @endpush