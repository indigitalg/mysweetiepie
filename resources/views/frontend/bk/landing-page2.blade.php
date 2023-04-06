 @extends('layouts/sweetiepie')
 @section('title',$landPage->page_title.' | ')
 @section('description',$landPage->seo_description)
 @section('keywords',$landPage->seo_keyword)
 @section('contents')
 <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet"> 
 <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 

    <main class="landingfull" style="padding: 0;margin: 0;padding-top: 50px;">
        <div class="landingcontent">
          <div class="bannertop" style="background-image:url(/images/site_landing_page/{{$landPage->banner1_image}});background-size:cover;">
            <div class="bannercaption">
               <h2>{{$landPage->banner1_title}}</h2> 
               <p>{{$landPage->banner1_description}}</p>
            </div>  
          </div>
           <div class="aboutsect" style="padding-top:80px;padding-bottom:80px">
                <div class="col-sm-6 abtcnt">
                   <h4>{{$landPage->section1_title}}</h4> 
                   <p>{{$landPage->section1_description}}</p>
                   <a href="{{$landPage->section1_button_link}}">{{$landPage->section1_button_text	}}</a>
                </div>
                <div class="col-sm-6 aboutimage">
                     <img src="/images/site_landing_page/{{$landPage->section1_picture}}" alt="abtimage"/>
                </div>
                <div class="clear"></div>
            </div>  
           <div class="availablebanner" style="background-image:url(/images/site_landing_page/{{$landPage->banner2_image}});background-repeat:no-repeat;background-size: 100% 100%;">
               <div class="ps-container">
                    <h3>{{$landPage->banner2_text}}</h3>
                    <a href="{{$landPage->banner2_button_link}}">{{$landPage->banner2_button_text}}</a>
              </div>
            </div>   
            <div class="piedetails">
               
                <div class="col-sm-6 pieimage">
                    <img src="/images/site_landing_page/{{$landPage->section2_picture}}" alt="image"/>
                </div>
                <div class="col-sm-6 piecontent">
                         <h4>{{$landPage->section2_title}}</h4> 
                   <p>{{$landPage->section2_description}}</p>
                   <a href="{{$landPage->section2_button_link}}">{{$landPage->section2_button_text}}</a>
                 </div>
                 <div class="clear"></div>
                    
            </div>
            <div class="socialmediasection">
                  <div class="ps-container" style="
    padding-left: 0px;
    padding-right: 0px;
">
                      <div class="col-sm-3 fblink" style="padding-left: 0px;padding-right: 0px;">
                           <a href="https://www.facebook.com/mysweetiepie.ca" target="_blank"> <img src="{{asset('imagesmsp/Follow us-WebsiteBreaks-facebook.jpg')}}" alt="image"/></a>
                      </div>
                    <div class="col-sm-6">
                        
                        <div class="owl-carousel-gallery ps-carousel-nav">
                            <div class="item">
                            	<a href="javascript:void(0);"><img src="/images/site_landing_page/{{$landPage->gallery1}}" class="img-responsive"></a>
                            </div>
                            <div class="item">
                            	<a href="javascript:void(0);"><img src="/images/site_landing_page/{{$landPage->gallery2}}" class="img-responsive"></a>
                            </div>
                            <div class="item">
                            	<a href="javascript:void(0);"> <img src="/images/site_landing_page/{{$landPage->gallery3}}" class="img-responsive"></a>
                            </div>
                        </div>
                        
                        <!--<a href="">  <img src="https://cgc.indigital.company/images/mysweetiepie/site_landing_page/{{$landPage->gallery1}}" alt="image"/></a>//-->
                          
                      </div>
                      <div class="col-sm-3 instagramlink" style="padding-left: 0px;padding-right: 0px;">
                         <a href="https://www.instagram.com/mysweetiepie.ca/" target="_blank">  <img src="{{asset('imagesmsp/Follow us-WebsiteBreaks-instagram.jpg')}}" alt="image"/> </a>
                      </div>
                      <div class="clear"></div>
                   </div>
            </div>
         <style>
            .owl-carousel-gallery > .slider-prev {
                position: absolute;
                bottom: 50%;
                z-index: 9999;
                left: 1%;
                background: #f993c3;
                width: 40px;
                height: 40px;
                border: 0;
                content:'<';
            }
            .owl-carousel-gallery > .slider-next {
                position: absolute;
                right: 1%;
                bottom: 50%;
                background: #f993c3;
                width: 40px;
                height: 40px;
                border: 0;
                content:'>';
            }
        </style>
                        
    </div>

</main>
<style>

 /* style for landing page just like apple pie */ 
 .bannertop {
  margin-top: 81px;
    background-repeat: no-repeat;
    min-height: 490px;
    background-size: 100% 100%;
    display: table;
    width: 100%;

}
.bannercaption {
    display: table-cell;
    vertical-align: middle;
    height: 490px;
    text-align: center;
 
}
.bannercaption p{
    width:47%;
    margin-left:auto;
    margin-right:auto;
    color: white;
   font-family: "Lora", serif;
    font-size: 20px
}
.bannercaption h2{
    color: white;
    font-family: Kaushan Script, cursive;
    font-size: 70px;
    margin-bottom:25px;
}
.aboutsect .col-sm-6{
    text-align:center;
}
.aboutsect .col-sm-6 img{
   width:100%;
   height:auto;
   
}

 .aboutimage {
     padding-right: 0px;
 }
.aboutsect .col-sm-6 h4{
    font-family: "Lora", serif;
    font-size: 30px;
    line-height:40px;
    color:#000;
    margin-bottom:20px;
}
.aboutsect .col-sm-6 p{
  font-family: "Lora", serif;
font-size: 18px;
margin-bottom: 20px;
width: 90%;
margin-left: auto;
margin-right: auto;; 
}
.aboutsect .col-sm-6 a{
    display:inline-block;
    color:#fff;
    background-color:#f993c3;;
    border-radius:40px;
    width:200px;
    height:47px;
    font-size: 17px;
    line-height:47px;
   font-family: "Lora", serif;
}
.aboutsect .col-sm-6 a:hover{
    background-color:#000;
}
.col-sm-6.abtcnt {
    padding-top: 50px;
}
.availablebanner{
    padding-top:70px;
    padding-bottom:70px;
    text-align: center;
    
}
.availablebanner h3{
    font-size: 45px;
    line-height: 47px;
    font-family: "Lora", serif;
    color: #fff;
    letter-spacing: 0.8px;
    margin-bottom: 40px;
}
.availablebanner a{
    display:inline-block;
    color:#fff;
    background-color:#f993c3;;
    border-radius:40px;
    width:200px;
    height:47px;
    font-size: 17px;
    line-height:47px;
   font-family: "Lora", serif;
}
.piedetails{
    margin-bottom: 80px;
    margin-top:80px;
    text-align:center;
}
.availablebanner a:hover{
  background-color:#000;
}
.piedetails .col-sm-6 a:hover{
  background-color:#000;
}
.clear{
    clear:both;
}
.piedetails img{
    width:100%;
}
.piedetails .col-sm-6 h4{
    font-family: "Lora", serif;
    font-size: 30px;
    line-height:40px;
    color:#000;
    margin-bottom:20px;
    margin-top:80px;
}
.piedetails .col-sm-6 p{
  font-family: "Lora", serif;
font-size: 18px;
margin-bottom: 20px;
width: 90%;
margin-left: auto;
margin-right: auto;; 
}
.piedetails .col-sm-6 a{
    display:inline-block;
    color:#fff;
    background-color:#f993c3;;
    border-radius:40px;
    width:200px;
    height:47px;
    font-size: 17px;
    line-height:47px;
   font-family: "Lora", serif;
}
.col-sm-6.pieimage{
    padding-left:0px;
}
.socialmediasection img{
    width:100%;
    /*height:350px;*/
}
.socialmediasection {
    margin-bottom: 160px;
}
 @media only screen and (max-width: 1200px) {

.col-sm-6.abtcnt {
    padding-top: 49px;
}
.piedetails .col-sm-6 h4{
    margin-top: 35px;
}
 }
  @media only screen and (max-width: 992px) {
  .col-sm-6.abtcnt {
    padding-top: 34px;
}
.aboutsect .col-sm-6 p{
    font-size:15px;
    width:100%;
}
.availablebanner h3{
    font-size: 40px;
    margin-bottom: 40px;  
}
.piedetails .col-sm-6 h4 {
    margin-top: 0;
}
  }
  @media only screen and (max-width: 768px) {
.bannercaption p{
    width:80%;
    padding-left:15px;
    padding-right:10px;
}
.bannercaption h2{
    font-size:60px;
}
.col-sm-6.abtcnt {
    padding-top: 0;
    padding-bottom: 50px;
}
.aboutsect .col-sm-6 img {
    width: 60%;
}
.availablebanner {
    padding-top: 40px;
    padding-bottom: 40px;
 
}
.availablebanner a{
    width:150px;
}
.availablebanner h3 {
    font-size: 35px;
    margin-bottom: 30px;
}
.col-sm-6.pieimage {
   
    padding-right: 0;
    margin-bottom: 15px;
}
.socialmediasection .col-sm-4{
    margin-bottom:25px;
    text-align: center;
}
.socialmediasection .col-sm-4 img{
    width:60%;
}
.socialmediasection {
    margin-bottom: 80px;
}
.piedetails img {
    width: 60%;
}
.col-sm-6.abtcnt {

    padding-bottom: 30px;
}
.ps-container.aboutsect{
      padding-top: 50px !important;
    padding-bottom: 50px !important;
}
.socialmediasection .col-sm-3{
    width:70%;
    margin-left:auto;
    margin-right:auto;
    padding-left:15px !important;
    padding-right:15px !important;
    margin-bottom:15px;
}
.socialmediasection .col-sm-3 img{
    height:auto !important;
}
.socialmediasection .col-sm-6{
    width:70%;
    margin-left:auto;
    margin-right:auto;
      margin-bottom:15px;
}
}

@media only screen and (max-width: 480px) {
.bannercaption p{
    width:100%;
}
.aboutsect .col-sm-6 img {
    width:100%;
}
.socialmediasection .col-sm-4 img{
    width:100%;
}
.piedetails img {
    width:100%;
}
.socialmediasection .col-sm-3{
    width:100%;
    margin-left:auto;
    margin-right:auto;
}
.socialmediasection .col-sm-6{
    width:100%;
    margin-left:auto;
    margin-right:auto;
}
}
  @media only screen and (max-width: 320px) {
      width:auto;
  }
</style>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="BdJ51tIA"></script>
   
@endsection
@section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Place your order now</a>
</div>
@endsection
@push('scripts')

<script>
    $(document).ready(function(){
//   $(".owl-carousel").owlCarousel();
  $(".owl-carousel-gallery").slick({
      autoplay: false,
      autoplaySpeed: 1000,
        dots: false,
  infinite: true,
  speed: 300,
//   adaptiveHeight: true,
//   slidesToShow: 1,
//   centerMode: true,
//   variableWidth: true,
  prevArrow: "<i class='slider-prev ba-back'></i>",
    nextArrow: "<i class='slider-next ba-next'></i>"
        }).slickAnimation();
});

$(document).ready(function() {
        $("#lightgallery").lightGallery(); 
    });
</script>
@endpush