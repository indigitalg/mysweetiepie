@extends('layouts/sweetiepie')
 @section('contents')
      <div class="ps-hero bg--cover" data-background="images/hero/about.jpg" style="height:300px !important;min-height:0px">
            <div class="ps-hero__content">
              <h1>SignUp</h1>
              <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                  <li><a href="{{url('/')}}">Home</a></li>
                  <li class="active">SignUp</li>
                </ol>
              </div>
            </div>
          </div>
          <div class="ps-checkout pt-40 pb-40">
              <center>
            <div class="ps-container">
              
                <div class="row">
                  <div class="col-sm-8 col-sm-offset-2">
                    
              <form class="ps-form--checkout" action="{{url()->current()}}" method="post">		
                @csrf
                    <div class="ps-checkout__billing">
                      <h4>SIGNUP FOR AN ACCOUNT, ITS FREE!</h4>
                          <div class="form-group">
                              <div class="form-col-1 form-col">
                                  <!--<h3>Enter Account Information</h3>-->
                                  <font color="red">
                                      Fields marked with (*) are mandatory.                        
                                  </font>
                              </div>
                      </div>
                      <div class="form-group form-group--inline">
                            <label>Email<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="email" name="email"  id="email" value="{{old('email')}}" autocomplete="off" required>
                            <span>
                        {{$errors->first('email')}}
                      </span>
                            </div>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>Password<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="password" name="password" id="password" value="" autocomplete="off" required>
                            <span>
                        {{$errors->first('password')}}
                      </span>
                            </div>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>Confirm Password<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="password" name="password_confirmation" class="input-text fullwidth" id="password2" value="" required>
                            <span>
                        {{$errors->first('password_confirmation')}}
                      </span>
                            </div>
                          </div>
                          <hr>
                          <div class="form-group form-group--inline">
                            <label>First Name<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="text" name="firstname" id="firstname" value="{{old('firstname')}}" v-model="formInputs.firstname" required>
                            <span>
                        {{$errors->first('firstname')}}
                      </span>
                            </div>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>Last Name<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="text" value="{{old('lastname')}}" name="lastname" id="lastname" value="" required>
                            <span class="validation_error">
                        {{$errors->first('lastname')}}
                      </span>
                            </div>
                          </div>
                        
                          
                          <div class="form-group form-group--inline">
                            <label>Address<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="text" value="{{old('address')}}" name="address" id="address" required>
                            </div>
                            <span class="validation_error">
                        {{$errors->first('address')}}
                        </span>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>City<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="text" value="{{old('city')}}" name="city" id="city" required>
                            </div>
                            <span class="validation_error">
                          {{$errors->first('city')}}
                        </span>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>Postal Code<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="text" value="{{old('postalcode')}}" name="postalcode" id="postalcode" required>
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
                                      <option value="{{$province->code}}" {{$province->code == old('province') ? 'selected' : ''}}>
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
                                <option value="{{$country->code}}" {{$country->code == old('country') ? 'selected' : ''}}>{{$country->name}}</option>
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
                              <input class="form-control" type="text" value="{{old('phone')}}" maxlength="10" name="phone" id="dayphone" required>
                            </div>
                            <span class="validation_error">
                                              {{$errors->first('phone')}}
                                            </span>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>Mobile Number<span>*</span>
                            </label>
                            <div class="form-group__content">
                              <input class="form-control" type="text" maxlength="10" value="{{old('evephone')}}"  name="evephone" id="evephone">
                            </div>
                            <span class="validation_error">
                                              {{$errors->first('phone2')}}
                                            </span>
                          </div>
                          <div class="form-group">
                              <button type="submit" name="Signup" id="signup" value="Signup" class="ps-btn ps-btn ps-btn--yellow">Signup</button>
                              
                              <br/>
                              <p class="left">
                                  <small>Your FREE account will be registered by submitting this form.</small>                    
                              </p>
                        </div>
                      <div class="clearfix"></div>
                      
                      
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          <p>&nbsp;</p>
                          
                          
                    
                      <!--<button class="ps-btn ps-btn ps-btn--yellow" type="submit" >Register Now</button>-->
                    </div>
                    </form>
                  </div>
                  
                
                </div>
            </div>
            </center>
          </div>
    
    @endsection