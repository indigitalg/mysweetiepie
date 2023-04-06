 @extends('layouts/sweetiepie')
 @section('title',$landPage->page_title.' | ')
 @section('description',$landPage->seo_description)
 @section('keywords',$landPage->seo_keyword)
 @section('contents')
 <link href="https://fonts.googleapis.com/css2?family=Poiret+One&display=swap" rel="stylesheet"> 
 <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
 <style>
 /* style for landing page just like apple pie */ 
     /*.ps-main.landingfull{
         padding-top:130px;
     }
     .ps-container.landingcontent{
         padding-left:0;
         padding-right:0;
         width:100%;
     }
      .firstsection .col-sm-4 img{
          width:100%;
          height:auto;
      }
    
    .firstsection .col-sm-4.second h2{
       font-family: 'Poiret One', cursive; 
      
       line-height: 27px;
        font-weight: 400;
        margin-bottom:40px;
        font-size:50px;
        color:#f993c3;
        text-transform:capitalize;
       }
    .firstsection .col-sm-4{
        text-align:center;
       }
    .firstsection .col-sm-4 p{
       white-space: pre-wrap;
        word-wrap: break-word;
        font-family: "Open Sans",sans-serif;
        font-size: 18px;
        line-height: 28px;
        letter-spacing: .01em;
        font-size:18px;
        width: 90%;
        margin-left: auto;
        margin-right: auto;
    }
    .secondsection{
        margin-top:180px;
        text-align:center;
        margin-bottom:90px;
    }
    .secondsection .col-ms-6 img{
       width:100%; 
    }
    
    .secondsection .col-sm-6.leftsec{
         padding-top:75px; 
         padding-bottom:50px;
    }
    .clear{
        clear:both;
    }
    .secondsection .col-sm-6.leftsec h2{
        font-family: "Poiret One",sans-serif;
        text-transform: capitalize;
        color: #505050;
        letter-spacing: 0;
        font-size: 50px;
        line-height: 34px;
        font-weight: 400;
        margin-bottom:30px;
        text-transform:capitalize;
    }
    img{
        max-width:100%;
    }
    .secondsection .col-sm-6.leftsec p{
        white-space: pre-wrap;
        word-wrap: break-word;
        font-family: "Open Sans",sans-serif;
        font-size: 18px;
        line-height: 28px;
        letter-spacing: .01em;
        width: 60%;
        margin-left: auto;
        margin-right: auto;
        text-align: justify;
    }
     .thirdsection img{
        display: inline-block;
    }
     .thirdsection{
         text-align:center;
         padding-top:30px;
         padding-bottom:50px;
     }
     
     @media only screen and (min-width: 768px) {
          .firstsection .col-sm-4.first{
         padding-left:0px;
     }
    .firstsection .col-sm-4.third{
          padding-right:0px;
    }
    .secondsection .col-ms-6:second-child{
        padding-right:0px;
    }
      .firstsection .col-sm-4.second{
         padding-top: 88px;  
      }
    }
    @media only screen and (max-width: 992px) {
        .firstsection .col-sm-4.second h2{
         
            margin-bottom:15px;
        }
       .firstsection .col-sm-4.second p{
           width:100%;
       }
       .firstsection .col-sm-4.second{
         padding-top:10px;   
       }
    }
    @media only screen and (max-width: 768px) {
         .firstsection .col-sm-4{
    
             margin-bottom:40px;
         }
         .secondsection{
             margin-top: 80px;
            
         }
          .secondsection .col-sm-6.leftsec{
              padding-top:0px;
          }
    }
    @media only screen and (max-width: 640px) {
    .firstsection .col-sm-4.second h2 {
        margin-bottom: 20px;
        font-size:36px;
    }*/
    .firstsection {
        padding-top: 85px;
        padding-right: 0;
        padding-bottom: 0;
        padding-left: 0;
        /*display: flex;*/
        /*align-items: center;*/
    }
    .secondsection {
        display: flex;
        align-items: center;
        background-image:url(https://cgc.indigital.company/images/mysweetiepie/site_landing_page/About-us2.png);
        background-repeat: no-repeat;
        padding-top: 5%;
        background-size: 65% 70%;
        background-position: left 10px bottom 10px;
    }
    .first {
        padding: 0;
    }
    .third {
        padding: 0;
    }
    .firstsection .col-sm-4.second h2{
        font-family: 'Poiret One', cursive;
        /* line-height: 27px; */
        font-weight: 400;
        /* margin-bottom: 40px; */
        font-size: 50px;
        color: #f993c3;
        text-transform: capitalize;
        /*display: table-cell;*/
        /*vertical-align: middle;*/
        text-align: center;
    }
    .firstsection .col-sm-4.second p {
        text-align: center;
    }
    .secondsection .col-sm-6.leftsec h2{
        font-family: "Poiret One",sans-serif;
        text-transform: capitalize;
    }
    .row.equal {
        display: flex;
      display: -webkit-flex;
      flex-wrap: wrap;
      }
      .leftsec {
      }
     .second {
         padding-top: 100px;
     }
    @media (min-width: 768px) {
      .row.equal {
        display: flex;
        flex-wrap: wrap;
      }
      .second {
         /*padding-top: 0;*/
     }
    }
    @media (min-device-width: 414px) {
        .second {
         /*padding-top: 0;*/
     }
     .row.equal {
        display: block;
      }
    }
    @media (min-device-width: 412px) {
       .row.equal {
            display: block;
      } 
    }
    .thirdsection {
        padding-left: 0;
        padding-right: 0;
        background-attachment: fixed;
        height: 350px;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
        padding: 30px 0;
        /*padding-top: 15%;*/
    }
    .thirdsection img{
        width: 100%;
        height: 375px;
        object-fit: cover;
    }
</style>

    <main class="landingfull" style="padding: 0;margin: 0;padding-top: 75px;">
        <div class="landingcontent">
                <div class="firstsection row">
                    <div class="col-sm-12">
                        <img class="img-responsive" src="{{@$landPage->left_image_uri}}" style="width:100%;">
                    </div>
                    <div class="col-sm-6 first hidden">
                        <img src="{{@$landPage->left_image_uri}}" class="img-responsive" alt="applepie"/>
                    </div>
                </div>
                <div class="row" style="padding-top: 50px;">
                    <div class="col-sm-6 second">
                        <div style="padding:0 100px;">
                            <h1 class="text-center">{{@$landPage->title}}</h1>
                            <p class="text-center">{{@$landPage->description}}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 third">
                        <img src="{{@$landPage->right_image_uri}}" class="img-responsive" alt="applepie" style="width: 100%;height: 500px;">
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="row" style="padding-top:15px;">
                    <div class="col-sm-6 leftsec text-center hidden" style="">
                        <h2>{{@$landPage->left_title}}</h2>
                        <p>{{@$landPage->left_description}}</p>
                         
                    </div>
                    <div class="col-sm-12">
                        <img src="{{@$landPage->right_image2_uri}}" class="img-responsive" alt="applepie" style="width: 100%;height:auto;"/>
                    </div>
                    <div class="col-sm-12" style="">
                        <img src="{{@$landPage->banner_image_uri}}" class="img-responsive"  style="width: 100%;height:auto;" alt="secondbanner"/>
                    </div>
                </div>
        
                    <!--
        
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-sm-4">
                            <div class="fb-page" data-tabs="timeline" data-href="https://www.facebook.com/mysweetiepie.ca" data-width="500"  data-small-header="true" data-adapt-container-width="true"  data-hide-cover="false"></div>
        
                        </div>
                        <div class="col-sm-4">
                            {!! $landPage->instagram_id !!}
                        </div>
                        <div class="col-sm-4">
                            <div class="owl-carousel-gallery ps-carousel-nav">
                                    <div class="item">
                                    	<a href="{@$landPage->gallery1_uri}}" target="_blank" download><img src="{{@$landPage->gallery1_uri}}" class="img-responsive" style="height:320px;width:100%;object-fit: contain;"></a>
                                    </div>
                                    <div class="item">
                                    	<a href="{{@$landPage->gallery2_uri}}" target="_blank" download><img src="{{@$landPage->gallery2_uri}}" class="img-responsive" style="height:320px;width:100%;object-fit: contain;"></a>
                                    </div>
                                    <div class="item">
                                    	<a href="{{@$landPage->gallery3_uri}}" target="_blank" download> <img src="{{@$landPage->gallery3_uri}}" class="img-responsive" style="height:320px;width:100%;object-fit: contain;"></a>
                                    </div>
                                </div>
                        <div>
                    <div>
                    
                    //-->
        
                    <style>
                        .owl-carousel-gallery > .slider-prev {
                            position: absolute;
                            top: 44%;
                            z-index: 9999;
                            left: 1%;
                            background: #cd9b33;
                            width: 40px;
                            height: 40px;
                            border: 0;
                            content:'<';
                        }
                        .owl-carousel-gallery > .slider-next {
                            position: absolute;
                            right: 1%;
                            bottom: 50%;
                            background: #cd9b33;
                            width: 40px;
                            height: 40px;
                            border: 0;
                            content:'>';
                        }
                    </style>
                        
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="padding:0px;padding-bottom: 150px;padding-top: 85px;text-align:center;">
                    {!! $landPage->footer_description !!}
                </div>
            </div>
        </div>
    </main>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0" nonce="BdJ51tIA"></script>
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
</script>
@endpush