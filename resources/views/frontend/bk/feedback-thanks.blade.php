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

              <center><h2>Thank you for sending feedback</h2></center>


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