@extends('layouts.sweetiepie')

@push('styles')
        <style>
.ba-shopping-gall{top:16% !important;
 }
@media screen and (max-width: 680px) {
  

  .ba-shopping-gall{top:6px !important;
  left:19px !important}
}.ps-cart__toggle span {
  bottom: 2px;
}


@media screen and (max-width: 680px) {
  .ps-form--subscribe-offer{margin-top:-10px !important;}
  .ps-form--get-in-touch{ height: 541px !important;
  }

  /* .ba-shopping-gall{top:0px !important;
  left:0px !important} */
}


    html {
  box-sizing: border-box;
}

*,
*:before,
*:after {
  box-sizing: inherit;
}

/* The Masonry Container */
.masonry {
  transition: all .5s ease-in-out;
  column-gap: 10px;
  column-fill: initial;
}

/* Masonry item */
.masonry .brick {
   
  margin-bottom: 10px;
  display: inline-block; /* Fix the misalignment of items */
  vertical-align: top; /* Keep the item on the very top */
}

/* Masonry image effects */
.masonry .brick img {
    border-radius: 10px;
  transition: all .5s ease-in-out;
  backface-visibility: hidden; /* Remove Image flickering on hover */
}

.masonry .brick:hover img {
  opacity: .75;
}

/* Masonry on large screens */
@media only screen and (min-width: 1024px) {
  .masonry {
    column-count: 6;
  }
}

/* Masonry on medium-sized screens */
@media only screen and (max-width: 1023px) and (min-width: 768px) {
  .masonry {
    column-count: 3;
  }
}

/* Masonry on small screens */
@media only screen and (max-width: 767px) and (min-width: 540px) {
  .masonry {
    column-count: 2;
  }
}

.vertical-alignment-helper {
    display:table;
    height: 100%;
    width: 100%;
    pointer-events:none; /* This makes sure that we can still click outside of the modal to close it */
}
.vertical-align-center {
    /* To center vertically */
    display: table-cell;
    vertical-align: middle;
    pointer-events:none;
}
.modal-content {
    /* Bootstrap sets the size of the modal in the modal-dialog class, we need to inherit it */
    width:inherit;
    max-width:inherit; /* For Bootstrap 4 - to avoid the modal window stretching full width */
    height:inherit;
    /* To center horizontally */
    margin: 0 auto;
    pointer-events: all;
}

</style>
@endpush

@section('contents')
    
      <div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
          <div class="ps-hero__content">
            
          </div>
      </div>
        
      <div class="catgmain">
            <div id="page-category-title" class="top-title">
                <h2 class="text-center">Gallery</h2>
            </div>
            <div class="clearfix"></div>
      </div>


    <div class="ps-checkout pt-40 pb-40">
      <div class="ps-container">
        
          <div class="row">
            <div class="masonry" id="gallery" >
         

            @for ($i = 0; $i < count($gallery); $i++)
            <div class="brick">
                   <a href="#" class="pop"><img src="{{asset('images/gallery/'.$gallery[$i]->picture)}}"  id="gallery-item-{{$i}}"> </a>
            </div>
            @endfor 
  
 
          </div>
      </div>
    </div>

    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
          <div class="modal-content">              
            <div class="modal-body" id="gallery-image">
              <button style="margin-top:-15px" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <a  class="arrow-next slider-previous gallery-nav" href="#" style="position:absolute;"> <i class="fa fa-angle-left " ></i></a>
              <img src="" class="imagepreview" id="imgsrc" style="width: 100%;" data-image-id="" >
              <a  class="arrow-pre slider-next gallery-nav" href="#"  style="position:absolute;" ><i class="fa fa-angle-right " ></i></a>
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
@endsection
@section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Place your order now</a>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  $(function() {
    $('.pop').on('click', function() {
      var imgid = $(this).children().first().attr("id");
      $('.imagepreview').attr('src', $(this).find('img').attr('src'));
      $('#imagemodal').modal('show');   
      $("#imgsrc").attr("data-image-id",imgid)
    }); 

    $( ".slider-next" ).click(function(e)
    {
      e.preventDefault();
      var current = $(this).prev().attr("data-image-id");
      var previmage = $("#"+current).parent().parent().next().children().first().children().first().attr("src");
      var previd = $("#"+current).parent().parent().next().children().first().children().first().attr("id");
     
      if(previmage != undefined) {
        $("#imgsrc").attr("src",previmage)
        $("#imgsrc").attr("data-image-id",previd)
      }

    }); 

    $( ".slider-previous" ).click(function(e){
      e.preventDefault();
      var current = $(this).next().attr("data-image-id");
      var nextimage = $("#"+current).parent().parent().prev().children().first().children().first().attr("src");
      var nextvid = $("#"+current).parent().parent().prev().children().first().children().first().attr("id");
      if(nextimage != undefined) {
        $("#imgsrc").attr("src",nextimage)
        $("#imgsrc").attr("data-image-id",nextvid)
      } 
    });

  });
</script>
@endpush
  
