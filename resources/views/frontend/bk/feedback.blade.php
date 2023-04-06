 @extends('layouts/sweetiepie')

 @section('contents')

  <div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
      <div class="ps-hero__content">
        
      </div>
  </div>
    
  <div class="catgmain">
        <div id="page-category-title" class="top-title">
            <h2 class="text-center">Send your Feedback</h2>
        </div>
        <div class="clearfix"></div>
  </div>

    <div class="ps-contact">

      <div class="ps-container">

        <div class="row">

          <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 ">

              <center><h3>We'd love to hear your feedback from your visit to<br/> Sweetie Pie's {{ucwords(str_replace('-', ' ', $location))}} Location</h3></center>

              	@if(Session::has('flash_message'))

								<div class="alert alert-success">{{ Session::get('flash_message')}}</div>

							@endif

            <form class="ps-form--contact" action="" method="post">

                	{{ csrf_field()}}
                	
                	<input type="hidden" name="location" value="{{ucwords(str_replace('-', ' ', $location))}}" />

              <div class="row">

                <div class="col-xs-12 ">

                  <div class="form-group">

                    <label>Name <sup>*</sup></label>

                    <input class="form-control" type="text" name="name" placeholder="Name *"  title="Name should only contain letters. e.g. john" value="{{ old('name') }}" required>

                    @if($errors->has('name'))

													<small class="form-text invalid-feedback ">{{ $errors->first('name')}}</small>

												@endif 

                  </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                  <div class="form-group">

                    <label>Email <sup>*</sup></label>

                    <input class="form-control" type="text" name="email" placeholder="Email *"  title="Please Enter Valid Email ID" value="{{ old('email') }}" required>

                    @if($errors->has('email'))

														<small class="form-text invalid-feedback">{{ $errors->first('email')}}</small>

													@endif

                  </div>

                </div>
                
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                  <div class="form-group">

                    <label>Phone Number <sup>*</sup></label>

                    <input class="form-control" type="text" name="contactno" placeholder="Contactno" value="{{ old('contactno') }}" required >

                     @if($errors->has('contactno'))

														<small class="form-text invalid-feedback">{{ $errors->first('contactno')}}</small>

													@endif

                  </div>

                </div>
                
                <div class="col-xs-12">
                    <div class="form-group">
                        <label>How would you rate?</label>
                        <table class="rating" >
                            
                            <tr>
                                <td>&nbsp;</td>
                                <td align="center">&#128512;<br/>Excellent</td>
                                <td align="center">&#128522;<br/>Good</td>
                                <td align="center">&#128528;<br/>Fair</td>
                                <td align="center">&#128533;<br/>Poor</td>
                                <td align="center">&#129325;<br/>Not Applicable</td>
                            </tr>
                            
                            <tr>
                                <td>Ambience</td>
                                <td align="center"><input type="radio" name="ambience" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="ambience" value="Good" /></td>
                                <td align="center"><input type="radio" name="ambience" value="Fair" /></td>
                                <td align="center"><input type="radio" name="ambience" value="Poor" /></td>
                                <td align="center"><input type="radio" name="ambience"  value="N/A" checked  /></td>
                            </tr>
                            
                            <tr>
                                <td>Service</td>
                                <td align="center"><input type="radio" name="service" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="service" value="Good" /></td>
                                <td align="center"><input type="radio" name="service" value="Fair" /></td>
                                <td align="center"><input type="radio" name="service" value="Poor" /></td>
                                <td align="center"><input type="radio" name="service"  value="N/A" checked  /></td>
                            </tr>
                            
                            <tr>
                                <td>Ease of Ordering</td>
                                <td align="center"><input type="radio" name="ease_of_ordering" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="ease_of_ordering" value="Good" /></td>
                                <td align="center"><input type="radio" name="ease_of_ordering" value="Fair" /></td>
                                <td align="center"><input type="radio" name="ease_of_ordering" value="Poor" /></td>
                                <td align="center"><input type="radio" name="ease_of_ordering"  value="N/A" checked  /></td>
                            </tr>
                            
                            <tr>
                                <td>Portion Size</td>
                                <td align="center"><input type="radio" name="portion_size" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="portion_size" value="Good" /></td>
                                <td align="center"><input type="radio" name="portion_size" value="Fair" /></td>
                                <td align="center"><input type="radio" name="portion_size" value="Poor" /></td>
                                <td align="center"><input type="radio" name="portion_size"  value="N/A" checked /></td>
                            </tr>
                            
                            <tr>
                                <td>Taste</td>
                                <td align="center"><input type="radio" name="taste" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="taste" value="Good" /></td>
                                <td align="center"><input type="radio" name="taste" value="Fair" /></td>
                                <td align="center"><input type="radio" name="taste" value="Poor" /></td>
                                <td align="center"><input type="radio" name="taste"  value="N/A" checked  /></td>
                            </tr>
                            <tr>
                                <td>Presentation</td>
                                <td align="center"><input type="radio" name="presentation" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="presentation" value="Good" /></td>
                                <td align="center"><input type="radio" name="presentation" value="Fair" /></td>
                                <td align="center"><input type="radio" name="presentation" value="Poor" /></td>
                                <td align="center"><input type="radio" name="presentation" value="N/A" checked /></td>
                            </tr>
                            
                            <tr>
                                <td>Overall</td>
                                <td align="center"><input type="radio" name="overall" value="Excellent" /></td>
                                <td align="center"><input type="radio" name="overall" value="Good" /></td>
                                <td align="center"><input type="radio" name="overall" value="Fair" /></td>
                                <td align="center"><input type="radio" name="overall" value="Poor" /></td>
                                <td align="center"><input type="radio" name="overall" value="N/A" checked /></td>
                            </tr>
                            
                            

                        </table>
                    
                    
                    </div>
                </div>
                
                

              </div>

              Details of your visit: (optional)

            <div class="col-xs-12" style="border: 1px solid #DDD; padding:5px 15px;">
            
             <div class="row">
             
              
             
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                    <label>How did you order:</label>
                    <div style="padding:10px 0px;">
                        <label><input type="radio" name="order_mode" value="Walk-in" > Walk-in </label> &nbsp; 
                        <label><input type="radio"  name="order_mode" value="On-Phone" > On-Phone </label> &nbsp; 
                        <label><input type="radio"  name="order_mode"  value="Online"> Online </label>  &nbsp; 
                        <label><input type="radio"  name="order_mode"  value="Via Delivery Partners"> Via Delivery Partners </label> &nbsp; 
                    </div>
                </div>
      
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>Order Date</label>
                    <input type="date" name="order_date" class="form-control" />
                </div>
                
              </div>
              
              <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="form-group">
                    <label>Order/Invoice No</label>
                    <input type="text" name="invoice_number" class="form-control" />
                </div>
                
              </div>
            </div>
            
            </div>
            
            <div class="row">
                

              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

                  <div class="form-group">

                <label>Message (Optional):</label>

                <textarea class="form-control" name="message" placeholder="Message"  rows="7" required>{{ old('message') }}</textarea>

              </div>

            

                </div>


              </div>

              

               <div class="form-group submit">

                <div class="text-center">

                  <div class="g-recaptcha" data-sitekey="{{'6LdF0VAaAAAAAFom-8QQQ1Y39Kc60Tmg0QI97J1Y'}}" data-callback="enableBtn"></div> 

                </div>

               </div>

              <div class="form-group submit">

                <div class="text-center">

                  <button class="ps-btn ps-btn--yellow" type="submit" disabled id="submit-button">Submit</button>

                </div>

              </div>

            </form>

          </div>

          <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 ">

            <div class="ps-contact__info">

                <div id="contact-info">

                  <div class="info-box">

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

                  </div>

                  <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Head Office</h3>
        
                            <address>
        
                                301 Evans Ave, Etobicoke<br/>
                                ON, M8Z1K2
                                <p><i class="fa fa-phone"></i> <a href="tel://+16472453301">+1 647-245-3301</a></p>
                            </address>
                            
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Queen Street</h3>
        
                            <address>
        
                                654 Queen Street West, Toronto<br/>
                                ON, M6J 1E5
                                <p><i class="fa fa-phone"></i> <a href="tel://+14166139372">+1 416-613-9372</a></p>
                            </address>
                            
                            
        
                          </div>
                          
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Harbord Street</h3>
        
                            <address>
        
                                326 Harbord St, Toronto <br/>
                                ON, M6G 1H1
                                <p><i class="fa fa-phone"></i> <a href="tel://+14168407301">+1 416-840-7501</a></p>
                            </address>
                            
                            
        
                          </div>
                          
                          <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Unionville</h3>
        
                            <address>
                                190 Main St Unionville, Markham <br/>
                                ON, L3R 2G9
                                <p><i class="fa fa-phone"></i> <a href="tel://+19054159961">+1 905-415-9961</a></p>
                            </address>
                            
        
                          </div>
                          
                           <div class="info-box secndinfo">
        
                            <h3 class="sub-title">Danforth</h3>
        
                            <address>
                                563 Danforth Ave, Toronto<br/>
                                        ON M4K 1P9

                                <p><i class="fa fa-phone"></i> <a href="tel://+14166139372">+1 416-613-9372</a></p>
                            </address>
                            
        
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