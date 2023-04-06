 @extends('layouts/sweetiepie')

@push('styles')

<style>

<?php

        $fontPath = public_path() . '/css/label-fonts';

        $fontIterator = new DirectoryIterator($fontPath);

        

        foreach ($fontIterator as $key => $fileinfo) {

            if (!$fileinfo->isDot()) {

?>

                @font-face {

                    font-family: <?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>;

                    <?php 

                        $filetype = pathinfo($fileinfo, PATHINFO_EXTENSION);

                        if(strpos($fileinfo,'bold') !== false || strpos($fileinfo,'BOLD'))

                            echo "font-weight: bold;";

                    ?>

                    src: url("<?php echo url('css/label-fonts/'.$fileinfo); ?>") format("<?php echo $filetype == 'otf' ? 'opentype' :'truetype' ?>");

                }

<?php

            }

        }

?>



.delivery-options {

    border: 1px solid #DDD;

    min-height:250px;

    margin: 25px 0px;

    padding: 50px 350px 50px 30px;

    margin: 25px 0px;

}



#local-pickup {

    background: url(/img/theCar.png) right center no-repeat;

}



#reliable-delivery {

    background: url(/img/packages.png) right center no-repeat;

}



#delivery-action {

    border:1px solid #DDD;

    margin: 25px 0px;

    padding: 15px;

}



.delivery-option {



}



ul#pickup-option {

    position: relative;

    overflow: hidden;

}



#pickup-option, #pickup-option li {

    list-style: none;

    margin:0px;

    padding: 0px;

    

}







#delivery-action h4 {

    margin-bottom: 15px;

    text-align:center;

}





#pickup-option img {

    width: 25px;

    height: 25px;

    margin-right: 15px;

}



#delivery-submit {

    margin: 25px 0px;

}



.btn-success {

    border: none;

    background: #ce6f9b;

    text-transform: uppercase;

    border-radius: 0px;

    padding: 15px;

    margin-top: 10px;

}



.btn-success:hover {

    background: #000;

    color:#FFF;

}





.ui-menu {

    list-style: none;

    margin: 0px;

    padding: 0px;

}



.ui-menu .ui-menu-item {

    list-style: none;

    padding: 0px;

    margin: 0px;

    padding: 5px;

    width: 100% !important;

}



.mapouter{

    position:relative;

    text-align:right;

    height:400px;

    width:100%;

    

}



.gmap_canvas {

    overflow:hidden;

    background:none!important;

    height:400px;

    width:100%;

}



#pickup-map {

    display: none;

}



#delivery-map {

    display: none;

}



.pickuploc {

    border: 1px solid #DDD;

    width: 100%;

    margin-bottom: 25px;

}



.pickuploc h5 {

    font-weight: bold;

    text-transform: uppercase;

}



.pickuploc a {

    background-image:url(/img/storefront.png);

    background-repeat: no-repeat;

    background-position: 15px 15px;

    display: block;

    width: 100%; 

    padding: 15px;

    padding-left: 80px;

    position:relative;

    margin-bottom: 0px;

    cursor: pointer;

}



.pickuploc a:hover {

    background-color: #f993c3;

    color: #FFF !important;

}





.pickuploc a:hover p {

    color: #FFF;

}



.pickuploc a input {

    display: none;

}



.pickuploc {

    position: relative;

}



.popup-map {

    position: absolute;

    z-index: 1000;

    bottom: 0px;

    left:100px;

}



.popup-button:hover {

    background-color:#f993c3;

}



.popup-button:hover p {

    color: #FFF;

}



.popup-button {

    display:block;

    width: 100%;

    position: relative;

    background: url(/img/storefront.png) no-repeat 15px 15px;

    padding: 15px 15px 15px 80px;

}



.popup-button img {

    float: left;

    margin-right: 15px;

}



.popup-button h5 {

    line-height: 150%;

}



.popup-button p {

    font-size: 90%;

}



.pickuploc {



}



#map-harbord {

    display: none;

}



#map-cartwright {

    display: none;

}



.popup-button.active {

    border: 1px solid green;

}



.popup-button:hove {

    border: 1px solid #f993c3;

    background-color: #f993c3;

}



button.go {

    border: 1px solid #f993c3;

    border-radius: 50%;

    color: #FFF;

    text-transform: uppercase;

    background-color: #f993c3;

    position: absolute;

    z-index: 150;

    width: 30px;

    height: 30px;

    padding: 0px;

    line-height: 30px;

    text-align:center;

    font-size: 120%;

    right: 15px;

    top: 10px;

}



button.go:hover{

    background:#000;

    color: #FFF;

}



#delivery-form-wrapper {

    padding: 7px;

    

}



#delivery-form {

    border: 1px solid #DDD;

    padding: 15px;

    padding-bottom: 25px;

}



@media (max-width: 576px) {

    

    .delivery-options {

        border: 1px solid #DDD;

        min-height:250px;

        margin: 25px 0px;

        padding: 25px;

        padding-bottom: 250px;

        margin: 25px 0px;

    }

    

    #local-pickup {

        background: url(/img/theCar.png) center bottom no-repeat;

    }

    

    #reliable-delivery {

        background: url(/img/packages.png) center bottom no-repeat;

    }

}



.local {

    display: none;

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
          <h2 class="text-center">Fast Easy Online Ordering Your Way</h2>
      </div>
      <div class="clearfix"></div>
</div>


<main class="ps-main" style="padding-top: 25px;">

  <div class="ps-container">

      <div class="row">

          <div class="col-sm-12 text-center">

              <img src="/img/MainBanner.png" style="height:auto;" />

          </div>

          <div class="col-sm-12 text-center">

              <h2>Get It Your Way</h2>

              <p>We've made it easy to getyour online order safely</p>

          </div>

          <div class="col-sm-6">

              <div id="local-pickup" class="delivery-options">

                  <h3>Local Store Pickup</h3>

                  <h4>Now you can pick up your handcrafted baked goods</h4>

              </div>

          </div>

          <div class="col-sm-6">

              <div id="reliable-delivery" class="delivery-options">

                  <h3>Fast Reliable Delivery</h3>

                  <h4>Now you can pick up your handcrafted baked goods</h4>

              </div>

          </div>



          <div class="col-sm-12">

              <div id="delivery-action">

                  <div class="row">

                      <div class="col-sm-12 local" id="localpickup">

                          <div id="local-pickup-option" class="delivery-option">

                              <h4>Local Pickup Locations</h4>

                              <form action="" method="POST" id="pickup-form">

                                  @csrf

                                  <input type="hidden" name="redirecturl" value="{{old('redirecturl',$redirect)}}" />

                                  <div id="pickup-option" class="row">

                                      <?php $count = 0; ?>

                                      @foreach($pickpoints as $pp)

                                      <div class="col-sm-6" style="padding:0px;padding:7px;">

                                          <div class="pickuploc" >

                                              <a class="show-map" data-id="{{strtolower($pp->store_code)}}" href="#" onclick="document.getElementById('pickup-{{$pp->store_code}}').checked = (document.getElementById('pickup-{{$pp->store_code}}').checked) ? false : true;return false;">

                                                  <h5><input type="radio" name="pickup" class="pickup-select" value="{{$pp->store_code}}" id="pickup-{{$pp->store_code}}" /> {!!strtoupper($pp->store_code)!!}</h5>

                                                  <p>{!!$pp->name!!}<br/>{!!$pp->address!!}<br/>{!!$pp->city!!}, {{$pp->province}} {{$pp->postalcode}}</p>

                                                  <?php 

                                                        

                                                        $today_open = $pp->store_timing->where('day',date('w'))->first()->open;

                                                        $today_close = $pp->store_timing->where('day',date('w'))->first()->close;

                                                        $earliest = '';

                                                        

                                                        if($today_open != '' && $today_close != '') { // If shop open today

                                                            

                                                            $today_open = strtotime(date('Y-m-d').' '.$today_open);

                                                            $today_close = strtotime(date('Y-m-d').' '.$today_close);

                                                            

                                                            if(time() > $today_open && (time() + 60*60*3) < $today_close)

                                                                $earliest = 'Today '.date('H:ia',time() + (60*60*3));

                                                            elseif(time() < $today_open && ($today_open + 60*60*3) < $today_close)

                                                                $earliest = 'Today '.date('H:ia',$today_open + (60*60*3));

                                                            

                                                            

                                                        }

                                                        

                                                        $searchday = time();

                                                        

                                                        while($earliest == '') {

                                                            $searchday += (60 * 60 * 24);

                                                            

                                                            $today_open = $pp->store_timing->where('day',date('w',$searchday))->first()->open;

                                                            $today_close = $pp->store_timing->where('day',date('w',$searchday))->first()->close;

                                                            

                                                            if($today_open != '' && $today_close != '') { // If shop open today

                                                            

                                                                $today_open = strtotime(date('Y-m-d',$searchday).' '.$today_open);

                                                                $today_close = strtotime(date('Y-m-d',$searchday).' '.$today_close);

                                                                

                                                                $earliest = date('l H:ia',$today_open + (60*60*3));

                                                            }

                                                        }

                                                  ?>

                                                  <p style="margin-bottom:0px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Earliest pickup on: <strong>{{$earliest}}</strong></p>

                                                  <button class="go" type="button"><i class="fa fa-arrow-right" aria-hidden="true"></i></button>

                                              </a>

                                          </div>

                                      </div>

                                      @endforeach

                                  </div>

                              </form>

                          </div>

                      </div>

                      <div class="col-sm-12 local" id="localdelivery">

                          <div id="reliable-delivery-option" class="delivery-option">

                              <h4>Enter your City</h4>

                              <div id="delivery-form-wrapper">

                                  <form action="" method="POST" id="delivery-form" >

                                      @csrf

                                      <input type="text" name="delivery" placeholder="ENTER CITY NAME" class="form-control" required id="city" autocomplete="off" />

                                      <input type="hidden" name="redirecturl" value="{{old('redirecturl',$redirect)}}" />

                                      <button class="btn btn-success" style="width:100%;" id="fastdelivery" disabled="disabled">I WANT FAST DELIVERY</button>

                                  </form>

                              </div>

                          </div>

                      </div>

                  </div>

              </div>

          </div>

          <div class="col-sm-12">

              <div id="map-harbord" class="gmap">

                  <div class="mapouter">

                        <div class="gmap_canvas">

                           <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=MySweetiepie%2C%20326%20Harbord%20St%2C%20Toronto%2C%20ON%20M6G%201H1%2C%20Canada&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                        </div>

                  </div>

              </div>

              <div id="map-cartwright" class="gmap">

                  <div class="mapouter">

                        <div class="gmap_canvas">

                           <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=128%2C%20128%20Cartwright%20Ave%2C%20North%20York%2C%20ON%20M6A%201V2&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                        </div>

                  </div>

              </div>

          </div>

          

          <div class="col-sm-12">

              <p>&nbsp;</p>

              <p>&nbsp;</p>

          </div>

      </div><!-- Row //-->

  </div>

</main>



@endsection



@push('scripts')

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>



    $(function() {

        

         $("#local-pickup").click(function(){

            $(".local").css("display","none");

            $("#localpickup").css("display","block");

        })

        

        $("#reliable-delivery").click(function(){

            $(".local").css("display","none");

            $("#localdelivery").css("display","block");

        })

          

        var availableTags = [

            @foreach($cities as $city)

                "{{strtoupper($city->name)}}",

            @endforeach

        ];
        
        jQuery.ui.autocomplete.prototype._resizeMenu = function () {
          var ul = this.menu.element;
          ul.outerWidth(this.element.outerWidth());
        }

        

        $("#city").autocomplete({

            source: availableTags,

            focus: function() {

                $("#fastdelivery").attr("disabled","disabled");

            },

            select:function() {

                $("#fastdelivery").removeAttr("disabled");

            }

        });

        

        $("#city").change(function(){

            $("#fastdelivery").attr("disabled","disabled");

        })

        

        $("#city").click(function(){

             $(".popup-button").parent().removeClass("active");

             $(".mapouter").parent().css("display","none");

             $("#pickupInput").val('');

        });

        

        $(".show-map").mouseover(function(){

            var id=$(this).attr("data-id");

            

            $("#map-"+id).css("display","block");

        })

        

        $(".show-map").mouseout(function(){

            var id=$(this).attr("data-id");

            $("#map-"+id).css("display","none");

        })

        

        /*$(".popup-button").click(function(e){           // A - Click

            e.preventDefault();

            var id = $(this).attr("data-city");

            $(".popup-button").parent().removeClass("active");

            $("#pickupInput").val(id);

            $(this).parent().addClass("active");

        });*/

        

        $(".popup-button").mouseover(function(){       // A - Mouse Over

            var id = $(this).attr("data-city");

            $(".gmap").css("display","none");

            $("#map-"+id).css("display","block");

        });

        

        $(".popup-button").mouseout(function(e){      //  A - Mouse Out

            var eid= $("#pickupInput").val();

            var id = $(this).attr("data-city");

            

            $("#map-"+id).css("display","none");

            

            if(eid)                               // If clicked Map

                $("#map-"+eid).css("display","block");

        });

        

        $(".popup-button").click(function(){         // A - Clicked

            var id = $(this).attr("data-city");      

            $(".gmap").css("display","none");        // Turn all maps off

            $("#map-"+id).css("display","block");    // Show the clicked Map

        });

        

        $(".pickup-select").change(function(){
            $("input[name=pickup]").val($(this).val());
            $("#pickup-form").submit();

        })

        

        $(".show-map").click(function(){

            $("#pickup-form").submit();

        })

        

    });

</script>

@endpush