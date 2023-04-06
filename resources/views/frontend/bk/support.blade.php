 @extends('layouts/sweetiepie')

 @section('contents')

<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
  <div class="ps-hero__content">
    
  </div>
</div>

<div class="catgmain">
    <div id="page-category-title" class="top-title">
        <h2 class="text-center">{!!$title!!}</h2>
    </div>
    <div class="clearfix"></div>
</div>


    <div class="ps-contact">

      <div class="ps-container">

        <div class="row">

          <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

              <center><h2>Report a problem</h2></center>
              <br/>

              	@if(Session::has('flash_message'))

								<div class="alert alert-success">{{ Session::get('flash_message')}}</div>

							@endif

            <form class="ps-form--contact" action="" method="post">

                	{{ csrf_field()}}
                	<input type="hidden" name="error" value="{{request()->err}}" />

              <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                  <div class="form-group">

                    <label>Name <sup>*</sup></label>

                    <input class="form-control" type="text" name="name" placeholder="Name *"  title="Name should only contain letters. e.g. john" value="{{ old('name') }}" required>

                    @if($errors->has('name'))

													<small class="form-text invalid-feedback ">{{ $errors->first('name')}}</small>

												@endif 

                  </div>

                </div>

                

              </div>

              <div class="row">

               <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                  <div class="form-group">

                    <label>Email <sup>*</sup></label>

                    <input class="form-control" type="email" name="email" placeholder="Email *"  title="Please Enter Valid Email ID" value="{{ old('email') }}" required>

                    @if($errors->has('email'))

														<small class="form-text invalid-feedback">{{ $errors->first('email')}}</small>

													@endif

                  </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                  <div class="form-group">

                    <label>Phone <sup>*</sup></label>

                    <input class="form-control" type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required>

                  </div>

                </div>

              </div>

              <div class="form-group">

                <label>Your Message <sup>*</sup></label>

                <textarea class="form-control" name="message" placeholder="Message *"  rows="7" required>{{ old('message') }}</textarea>

              </div>
              
                                

              <div class="form-group submit">

                 <div class="row">

                    <div class="col-md-12 text-right">

                      <div class="text-center">

                        <div class="g-recaptcha" data-sitekey="{{'6LdF0VAaAAAAAFom-8QQQ1Y39Kc60Tmg0QI97J1Y'}}" data-callback="enableBtn"></div>

                      </div>

                    </div>

                </div>
                <div class="text-center">
                  <br/>
                  <button class="ps-btn ps-btn--yellow" type="submit" id="submit-button" disabled>Submit</button>

                </div>
              </div>

            </form>

          </div>

          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 ">
          
                <div class="ps-contact__info">

                    <div id="contact-info">

                          <!--<div class="info-box">
        
                            <h3>Hours</h3>
        
                            <table >
                              <tr>
                                <td> <b>Monday - Friday </b> </span> </td>
                                <td>9:30AM - 7:00PM</td>
                              </tr>
                               <tr>
                                <td> <b>Saturday - Sunday </b> </span> </td>
                                <td>9:30AM - 7:00PM</td>
                              </tr>
                            
                            </table>
        
                          </div> //-->

                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Head Office</h3>
        
                            <address>
                                36 Colville Rd, North York<br/>
                                ON, M6M 2Y4
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301</a><br/><i class="fa fa-phone"></i> <a href="tel://+14166759436">+1 416-675-9436</a></p>
                            </address>
                            
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Queen Street</h3>
        
                            <address>
        
                                654 Queen Street West, Toronto<br/>
                                ON, M6J 1E5
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 272</a></p>
                            </address>
                            
                            
        
                          </div>
                          
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Harbord Street</h3>
        
                            <address>
        
                                326 Harbord St, Toronto <br/>
                                ON, M6G 1H1
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 222</a></p>
                            </address>
                            
                            
        
                          </div>
                          
                           <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Unionville</h3>
        
                            <address>
                                190 Main St Unionville, Markham <br/>
                                ON, L3R 2G9
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 226</a></p>
                            </address>
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Danforth</h3>
        
                            <address>
                                563 Danforth Ave, Toronto<br/>
                                        ON M4K 1P9

                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 273</a></p>
                            </address>
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Distillery</h3>
        
                            <address>
                                6 Case Goods Lane, Toronto<br/>
                                        ON M5A 3C4

                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 274</a></p>
                            </address>
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Leaside</h3>
        
                            <address>
                                1639 B Bayview Ave East York, Toronto<br/>
                                        ON M4G 3B5
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 275</a></p>  
                                        

                                
                            </address>
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Yonge St</h3>
        
                            <address>
                                3308 Yonge st, Toronto<br/>
                                        ON M4N 2M4
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301 ext. 276</a></p> 
                                        

                                
                            </address>
                            
        
                          </div>
                          
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">First Canadian Place</h3>
        
                            <address>
                                100 King Street West, Toronto<br/>
                                        ON M5X 1A9
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301</a></p> 
                                        

                                
                            </address>
                            
        
                          </div>
                          
                  
                          

                    </div>


                 </div>

            </div>



          </div>


          </div>

        </div>

      </div>

    </div>

    <div class="ps-site-features">

      <div class="ps-container">

        <div class="row">

          

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">

            <div class="ps-block--iconbox"><i class="ba-biscuit-1"></i>

              <h4>Master Chef<span> WITH PASSION</h4>

              <p>Shop zillions of finds, with new arrivals added daily.</p>

            </div>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">

            <div class="ps-block--iconbox"><i class="ba-flour"></i>

              <h4>Natural Materials<span> protect your family</h4>

              <p>We always ensure the safety of all products of store</p>

            </div>

          </div>

          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">

            <div class="ps-block--iconbox"><i class="ba-cake-3"></i>

              <h4>Attractive Flavor <span>ALWAYS LISTEN</span></h4>

              <p>We offer a 24/7 customer hotline so you’re never alone if you have a question.</p>

            </div>

          </div>

        </div>

      </div>

    </div>



<script>

    

    function enableBtn() {

        $("#submit-button").removeAttr("disabled");

    }

    

</script>

@endsection

@section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Place your order now</a>
</div>
@endsection
