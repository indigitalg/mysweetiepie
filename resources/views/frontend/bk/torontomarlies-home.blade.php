 @extends('layouts/sweetiepie')
 @section('contents')
<style>
html{
   scroll-behavior: smooth;
}
.orderbutton_mobile{
    background-color:#f993c3;
    color:#fff;
    position: fixed;
     bottom: 0px;
     width:100%;
     padding:15px;
     text-align:center;
} 
.orderbutton_mobile a{
    color:#000;
    text-transform: uppercase;
    font-size: 19px;
    font-family: 'ChunkFive';
    word-wrap: break-word;
    margin-top: 4px;
    display: block;
}

#category_icons {
    margin: 0px;
    padding:0px;
    list-style: none;
    overflow:hidden;
}

#category_icons li {
    list-style: none;
    text-align:center;
    margin-bottom: 20px;
    
}

#category_icons li img {
    max-height: 100px;
    width:auto;
}


@media only screen and (max-width: 640px) {
  .orderbutton_mobile{
      display:block !important;
  }
}

</style>
<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
    <div class="ps-hero__content">
      
    </div>
</div>
  
<div class="catgmain">
      <div id="page-category-title" class="top-title">
          <img src="/imagesmsp/toronto_marlies_header.jpg" style="width:100%;height:auto;" />
      </div>
      <div class="clearfix"></div>
</div>

<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
  
  <div class="clearfix"></div>
  
  <div class="program-intro" >
        <div class="row">
          <div class="col-md-6"> 
            <img src="/imagesmsp/marlies_new.jpg"/>
            
          </div>
          <div class="col-md-6">
            <div id="program-info">
             <img src="/imagesmsp/Heading.png" />
             <br/><br/>
             <div>
             
             <p style="font-size:18px;">Well get ready Sweetie Pie has partner with your Toronto Marlies this season in an amazing way. 
             Sweetie Pie will be giving all our amazing Sweetie Pie team of customers a chance to win a game day experience that will included.</p>

                <p style="font-size:18px;">TICKETS TO AN UPCOMING MARLIES GAME</p>

                <p style="font-size:18px;">A SWEETIE PIE GIFT BAG FULL OF SWEETIE PIE’S HAND CRAFTED GOODIES</p>

                <p style="font-size:18px;">You get a chance to sit front row in our branded SWEETIE SEATS, 
                what a great way to watch and cheer on your Toronto Marlies to victory and enjoy all the Sweetie Pie goodies.</p>
                
             </div>
            </div>
          </div>
        </div>

      </div>


      <div class="contest-info" style="padding:25px 0;">
        <div class="row">
          <div class="col-md-6"> 
          
          <h3>Are you feeling Lucky? </h3>
          <br/>
            <h4>Because we sure are!</h4><br/>
            
            <p>This St. Patrick’s Day we want to give back to our sweetie pies by giving two lucky winners a chance to take their Sweetie Pie to the Toronto Marlies Game on March 17th at 1:30 pm.</p>
            <p>Test your luck by following these simple rules for a chance to win 2 tickets to watch the Toronto Marlies play at the Scotiabank Arena. </p>
            <p><u>RULES TO WIN</u>:</p>

            <ul>
                <li>Fill out the form</li>
                <li>Find the giveaway post on Instagram and leave a comment mentioning your favourite pie and your favourite Sweetie Pie location</li>
            </ul>
            <br/>
            <p>May the luck of the Irish be with you!</p>

            <p>Winners will be announced on March 16th, 2023.<br/>
                Don't miss out on this amazing opportunity to enjoy a special St. Patrick's Day celebration. Cheers!</p>
            
          </div>
          <div class="col-md-6">
            <h4>Fill the form below to enter</h4>
            
            <form action="" method="post" id="marliesform" class="leadgenpro_form">

            <p>
              <label for="name">Name</label>
              <input type="text" name="name" value="" required class="form-control" />
            </p>

            <p>
              <label for="email">Email</label>
              <input type="email" name="email" value="" required  class="form-control" />
            </p>
            
            <p>
              <label for="email">Instagram Username</label>
              <input type="text" name="instagram" value="" required  class="form-control" />
            </p>

            <p>
              <div > <label>Who will be your Sweetie Pie at the game?
                (optional):</label>
                <input type="text" name="sweetiepie" value=""  class="form-control" />
                <input type="hidden" name="success_url" value="/torontomarlies/shop" />
                </div>
              
            </p>

            <p>
              <label ><input type="checkbox" name="agree"  onchange="document.getElementById('submit-enq').disabled = !this.checked;" /> I agree to receive promotional
                communication from My Sweetie Pie</label>
              
            </p>

            <p>
              <button type="submit" class="marlies-button" id="submit-enq"  disabled>Submit</button>
              
            </p>
            
            </form>

          </div>
        </div>

      </div>
  
        <div class="ps-section__content secondsection">

        <div class="ps-section__header">

          <h3 class="ps-section__title" style="font-size:25px;text-align:center;padding-bottom: 16px;">Welcome to Sweetie Pie</h3>

          <!--<p>breads every day</p><span><img src="images/icons/floral.png" alt=""></span>-->

        </div>

              <div class="ps-container homecategoriescnt" style="padding-bottom: 16px;">
                  <div class="row">

                   @foreach($tiles as $tile)

                   <div class="col-sm-6 col-md-3 homecategorylist">
                       
                        <div class="homecategorybox">
                            <a href="{{url($tile->link)}}">

                                <center><img src="{{asset('images/banners/'.$tile->picture)}}"/></center>

                            </a>

                            <div style="text-align:center;font-size:18px;color: #000;">

                                <h3> {{$tile->name}} </h3>

                            </div>

                            <p>

                                 {{$tile->description}}

                            </p>
                        </div>
                   </div>

                   @endforeach

                </div>  

               </div> 

               

           </div>

  </div>
</div>



<div style="height:100px;">&nbsp;</div>

<div class="backdrop" id="submission_modal">
    <div class="the_modal">
        <h1>Thank you for entering into the contest</h1>
        <br/>
        <h4>Follow us on Instagram and Facebook for the results</h4>
        <ul class="ps-list--social" style="margin:0px;padding:0px;">
            <li><a href="https://www.facebook.com/mysweetiepie.ca/?ref=br_rs" target="_blank"><i class="fa fa-facebook"></i></a></li>
            
            <li><a href="https://www.instagram.com/mysweetiepie.ca/" target="_blank"><i class="fa fa-instagram"></i></a></li>
          </ul>
        <br/>
        <h3>Shop Now and Get 5% off on your order. <br/><br/>Use Code: “TorontoMarlies”</h3>
        <br/>
        <p>
            <a href="/torontomarliesxsweetiepie"><button class="marlies-button">CONTINUE</button></a>
        </p>
    </div>
    
</div>


@endsection
@section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Add to Cart</a>
</div>
@endsection

