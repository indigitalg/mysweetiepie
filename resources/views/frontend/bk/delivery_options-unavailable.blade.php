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

#delivery-action1 {
    border:1px solid #DDD;
    margin: 25px 0px;
    padding: 15px;
    width: 850px;
}

.delivery-option1 {

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



#delivery-action1 h4 {
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

.pickuploc label {
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

.pickuploc label:hover {
    background-color: #f993c3;
    color: #FFF !important;
}


.pickuploc label:hover p {
    color: #FFF;
}

.pickuploc label input {
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

</style>
@endpush

@section('contents')

<div class="ps-hero bg--cover" data-background="/imagesmsp/product.jpg" style="height:300px !important;min-height:0px" background="url(/imagesmsp/product.jpg) no-repeat cover;">
  <div class="ps-hero__content">
    <h1>Fast Easy Online Ordering Your Way</h1>
    <div class="ps-breadcrumb">
      <ol class="breadcrumb">
        <li><a href="{{url('')}}">Home</a></li>
        <li class="active">No Delivery Availiable</li>
      </ol>
    </div>
  </div>
</div>
<main class="ps-main" style="padding-top: 25px;">
  <div class="ps-container">
      <div class="row">
          <div class="col-sm-12 text-center">
              <img src="/img/MainBanner.png" style="max-width:1256px; height:auto;" />
          </div>
          <div class="col-sm-12 text-center">
              <h2>Get It Your Way</h2>
              <p>We've made it easy to getyour online order safely</p>
          </div>
         <center>
             <div class="col-sm-12">
              <div id="delivery-action1">
                  <div class="row">
                      <div class="col-sm-12">
                          <div id="local-pickup-option1" class="delivery-option1" style="align:center">
                              <h4><font color="red">Sorry, we are currently not delivering in your area. Please enter your email address for updates</font></h4>
                              <form action="{{url('notdelivery_location')}}" method="POST">
                                  @csrf
                                  <input type="text" name="location" value="{{session('cityIdSet')}}" class="form-control">
                                  <br>
                                  <input type="text" name="name" value="" class="form-control" placeholder="Your Name">
                                  <br>
                                  <input type="text" name="email" value="" class="form-control" placeholder="Your Email">
                                  <br>
                                  <!--<input type="hidden" name="redirecturl" value="{{url('notdelivery_location')}}" />-->
                                   <button type="submit" class="btn btn-success" style="width:100%;" >SEND</button>
                              </form>
                          </div>
                      </div>
                      
                  </div>
              </div>
          </div>
         </center> 
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
                           <iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=MySweetiepie%2C%20128%20Cartwright%20Ave%2C%20North%20York%2C%20ON%20M6A%201V2&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
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

@endpush