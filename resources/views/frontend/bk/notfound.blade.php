@extends('layouts/sweetiepie')

@push('styles')

<style>
    .ps-section__header .ps-section__title {
        color: #f993c3;
    }
    
    #baking-modal {
        position: fixed;
        z-index: 1000000;
        left:0px;
        right:0px;
        bottom:0px;
        top:0px;
        height:100%;
        width:100%;
        background: rgba(0,0,0,0.5);
    }
    
    #baking-modal #iframe-wrapper {
        max-width:800px;
        margin: 0px auto;
        padding: 25px;
        height: calc(100% - 50px);
    }
    
    #baking-modal #iframe {
        height:100%;

    }
    
    .baking-close {
        color: #f993c3;
        font-size: 150%;
        background: #000;
        text-align: right;
        padding: 5px 15px;
        cursor: pointer;
    }
</style>


@endpush

 @section('contents')


    <div class="ps-home-banner" id="slider">

        <div class="ps-carousel--animate ps-carousel-nav">

            @foreach($sliders as $slider)

            <div class="item">

              <div class="ps-banner--2" style="background-color:white;min-height: 70px;">

                <div class="ps-banner__content" style="padding-left: 0px;padding-right: 0px;padding-top: 135px;">

                  <div class="row">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bannercnt" style="background-image:url(/images/banners/{{$slider->picture}});height:550px;position:relative;background-repeat:no-repeat;background-position:center center;background-size:cover">

                      <div class="ps-banner__container" style="text-align:center;padding-top:0px;">

                        <div class="ps-banner__captionindig" style="text-align:center;">  

                        <h5 class="animated" data-animation-in="zoomIn" data-delay-in="0.1" style="color: white;">{!!$slider->description!!}</h5>

                        <h3 class="animated" data-animation-in="zoomIn" data-delay-in="0.3" style="color: white;padding-bottom: 10px;font-family:Kaushan Script, cursive;">{!!$slider->name!!}</h3>

                        <a class="ps-btn animated" href="{{url($slider->link)}}" data-animation-in="fadeInRight" data-delay-in="0.5" style="background-color: #f993c3;border:none; color:white">Order now</a>

                      </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

            @endforeach

        </div>

    </div>

    

    <div class="ps-section__content secondsection">

        <div class="ps-section__header">

          <h3  style="font-size:45px;text-align:center;padding: 100px 0px;padding-top:50px;">Oops! Looks like there is nothing yummilicious here!</h3>

          <!--<p>breads every day</p><span><img src="images/icons/floral.png" alt=""></span>-->

        </div>

              <div class="ps-container homecategoriescnt" style="padding-bottom: 70px;">
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

     

     
     
     

@endsection
@section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Place your order now</a>
</div>
@endsection

@push('scripts')


<script>

    $(document).ready(function(){
        
        $('#bakinginfo-button').click(function(e){
            e.preventDefault();
            $("#baking-modal").fadeIn(500);
            $("#frame").html('<img src="/imagesmsp/baking_instructions.jpg" />');
        }); 
        
        $(".baking-close").click(function(e){
            $("#baking-modal").fadeOut(500);
        })

//   $(".owl-carousel").owlCarousel();

  $(".owl-carousel-gallery").slick({

      autoplay: true,

      autoplaySpeed: 1000,

            dots: false,

  infinite: true,

  speed: 300,

  slidesToShow: 3,

  centerMode: true,

  variableWidth: true,

  prevArrow: "<i class='slider-prev ba-back'></i>",

    nextArrow: "<i class='slider-next ba-next'></i>"

        }).slickAnimation();

  $(".main-our-products").slick({
      autoplay: false,
      autoplaySpeed: 1000,
      dots: false,
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      centerMode: true,
      variableWidth: true,
      prevArrow: "<i class='slider-prev ba-back' style='background-color:#f993c3;'></i>", 
      nextArrow: "<i class='slider-next ba-next' style='background-color:#f993c3;'></i>"

      }).slickAnimation();
});

  $("#home-products-carousel").slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      prevArrow: '<i class="slider-prev ba-back" style="position:absolute;"></i>', 
      nextArrow: '<i class="slider-next ba-next" style="position:absolute;"></i>',
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

</script>

<style>

.ps-home-product.bg--cover.fifthsection .ps-section__header{

    margin-bottom:0px;

}

.ps-section__title.twosections{

    position:absolute;

    left:25px;

    right:25px;

    top:25px;

    bottom:25px;

    margin:0px;

    display:flex;

    flex-direction:column;

    align-items:center;

    justify-content:center;

    background: rgba(255,255,255,0.3);

    border:1px solid #FFF;

}

.ps-banner--2 .ps-banner__content{

    max-width:100%;

}

.clear{

    clear:both;

}

.ps-banner__captionindig {

    position: absolute;

    top: 37%;

    left: 0;

    right: 0;

}

.ps-home-product.bg--cover.fifthsection{

    padding-top:0px;

}

.ps-section__content.secondsection .ps-section__title{

    text-transform:uppercase; 

    font-family: "Lora", serif;

}



@media only screen and (max-width: 1200px) {

  .ps-banner__content{

     padding-top:160px !important;

  } 

 

}

@media only screen and (max-width: 991px) {

       .ps-home-contact-2{

    height:auto !important;

}

}

@media only screen and (max-width: 768px) {

    .row.ps-container.thirdsection{

    text-align:center;

    margin-bottom:40px;

    }

    .row.ps-container.thirdsection .col-sm-6{

        text-align:center;

    }

   .row.ps-container.thirdsection .col-sm-6 img{

        width:70%;

    }

    .col-sm-6.secondpag{

        padding-top:15px !important;

    }

    .ps-section__content.secondsection .ps-section__title{

    margin-bottom:0px;

    padding-bottom:0px !important;

    }

    .ps-section__content.secondsection .col-sm-4{

    margin-bottom: 40px;    

    }



    .ps-home-product.bg--cover.fifthsection{

        margin-bottom:0px;

    }

    .col-lg-12.col-md-12.col-sm-12.col-xs-12.bannercnt{

        height:400px !important;

    }

}

@media only screen and (max-width: 460px) {

.row.ps-container.thirdsection .col-sm-6 img {

    width: auto;

    max-width: 100%;

}

.row.ps-container.thirdsection .col-sm-6 h4{

    padding-left:0px !important;

    padding-right:0px !important;

} 

}

@media only screen and (max-width:450px) { 

 .ps-home-product.fifthsection{

        padding-left:15px;

        padding-right:15px;

    }

}

</style>



@endpush
