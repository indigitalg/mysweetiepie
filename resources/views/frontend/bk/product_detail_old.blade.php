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
@media (min-width: 992px){
    .modal-lg {
        width: 1038px;
    }
}
.panel-title>a{
    /*text-decoration: underline;*/
}
.line-head{
    display: inline-block;
    font-weight: 500;
    font-style: italic;
    font-size: 16px;
}
.padrem-label > label {
    font-weight: 500;
    font-size: 12px;
}
.panel-default>.panel-heading {
    color: #333;
     background-color: transparent; 
     border-color: transparent; 
}
.panel {
     border: 0px solid transparent; 
}
.panel-default {
     border-color: transparent;
}
.label:empty {
    display: unset;
}
.label.form-control {
    height: 30px;
    font-size: 14px;
    text-align: left;
    /*display: inline-block;
    width: auto;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    text-align: left;*/
}
.label-show {
    height:320px;
    overflow-y: auto;
    overflow-x: hidden;
}
.label-controls {
    height:320px;
    overflow-y: auto;
    overflow-x: hidden;
}
.info-label-products {
    margin-left: 1px;
    margin-top: 5px;
    border: 1px solid #ce6f9b;
    padding: 5px;
    border-radius: 20px;
    height: 20px;
    width: 20px;
    text-align: center;
    cursor: pointer;
    color: #ce6f9b;
    font-size: 12px;
    position: absolute;
    top: 16%;
    float: right;
}

.info-label-products:hover {
    border: 1px solid #75264b;
    color: #75264b;
}

ul#date-select {
    overflow: hidden;
    display: block;
    margin: 0px 0px 25px 0px;
    padding: 0px;
    
}

ul#date-select li {
    display: inline-block;
   
}

ul#date-select li a {
    border: 1px solid #DDD;
    padding: 10px;
    text-align:center;
    text-transform:uppercase;
}

ul#date-select .d-day {
    font-size: 120%;
    font-weight: bold;
    text-align:center;
    text-transform:uppercase;
}

select, textarea, input {
    border-radius: 15px;
}

#dateselect {
    background-image: url(/img/calendar.png);
    background-position: right 15px center;
    background-repeat: no-repeat;
}

#calendar-container {
    position:absolute;
    z-index: 5000;
    background: #FFF;
    padding: 15px;
    border: 1px solid #DDD;
    border-radius: 40px;
}

#calendar {
    width: 100%;
}

#calendar h3 {
    color: #FFF;
    background: #ce6f9b;
    padding: 3px 5px;
    font-size: 110%;
}

#calendar .day-number {
    text-align:center;
}

#calendar .day-number a {
    width: 30px;
    display: block;
    line-height:200%;
}

#calendar .day-number a:hover {
    background: #ce6f9b;
    color: White;
}

#calendar .date-disabled {
    color: #AAA;
}

#calendar .calendar {
    margin-bottom: 15px;
}

#calendar th {
    padding: 0px 3px;
    color: #ce6f9b;
}

#calendar .day-number a.active {
    background: #ce6f9b;
    color: white;   
}


a.boxdate  {
    display: block;
}

a.boxdate.active {
    background: #ce6f9b;
    color: white;
}


/* Custom  Label CSS */

.label-image-container{
    border: 1px solid #000;
    border-radius: 7px;
    margin: 6px 0px;
    padding: 5px 5px;
    position:relative;
}
.label-image-container:hover{
    /*background-color: #00000073;*/
    cursor:pointer;
    /*border: 1px solid #ce6f9b !important;*/
    border: 1px solid #000 !important;
}
.footer-label {
    padding-top: 15px;
}
.label-image-container span {
    /*position: absolute;
    /* width: 95.8%; */
    /* height: 94.5%; */
    /*z-index: 9999;
    right: 7px;
    font-size: 27px;
    color: green;
    font-weight: 800;*/
    /*position: absolute;
    width: 13.8%;
    height: 45.5%;
    z-index: 9999;
    right: 40%;
    font-size: 27px;
    color: green;
    font-weight: 800;
    top: 18%;
    border: 25px solid green;
    border-width: 0 10px 9px 0;
    border-radius: 8px;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);*/
}
.active-label-container {
    position: absolute;
    width: 13.8%;
    height: 45.5%;
    z-index: 9999;
    right: 40%;
    font-size: 27px;
    color: green;
    font-weight: 800;
    top: 18%;
    border: 25px solid green;
    border-width: 0 10px 9px 0;
    border-radius: 8px;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.padrem-label {
    padding: 5px;
}
.label-image-container span.active{
    position: absolute;
    width: 9.8%;
    height: 45.5%;
    z-index: 9999;
    right: 40%;
    font-size: 27px;
    color: green;
    font-weight: 800;
    top: 18%;
    border: 25px solid green;
    border-width: 0 10px 9px 0;
    border-radius: 8px;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
.label-image-container span.active:before{
    background-color: #fffffff2;
    /*content: '\2713\0020';*/
    padding: 0px 10px;
}
.label-image-container span:focus {
    /*background-color: #00000073;*/
    content: '\2713\0020';
}
.label-image-container img {
    width:100%;
    height:120px;
}
.active-container {
    background-color: #ce6f9b;
}
.image-display{
    position:relative;
    font-size:10px !important;
}
/*.image-display > h1 {
    font-size:40px !important;
}*/
.name-header {
    position: absolute;
    top: 8%;
    width: 100%;
    text-align: center;
}
.event-number {
    position: absolute;
    top: 27%;
    width: 100%;
    text-align: center;
}
.event-name {
    position: absolute;
    top: 43%;
    width: 100%;
    text-align: center;
}
.event-date {
    position: absolute;
    top: 62%;
    width: 100%;
    text-align: center;
}
.contents{
    padding-top: 15px;
}
.preview-container{
    position: relative;
    width: 250px;
    margin: 0 auto;
}
.selected-label-background {
    position: absolute;
    top: 32%;
    left: 30%;
    width: 50%;
    height: 50%;
    background-size: 80% 98%;
    background-repeat: no-repeat;
}
.name-header.last{
    width:80%;
}
.event-number.last{
    width:80%;
}
.event-date.last{
    width:80%;
}
.event-name.last{
    width:80%;
}
.image-remover-left {
    position: absolute;
    background: #fff;
    top: 0;
    left: 0;
    width: 24%;
    height: 100%;
}
.image-remover-right {
    position: absolute;
    background: #fff;
    top: 0;
    right: 20%;
    width: 24%;
    height: 100%;
}
input[name="quantity_flavour"] {
    width: 40%;
}

#pickuptime {
    display: none;
}

.show-more-dates {
   padding: 3px 0px;
   font-size:90%;
   display:block;
   text-align:center;
}

.more-dates {
    display:none;
}

.selected-label-background-image {
    width: 81.6%;
    height: 100%;
    position: absolute;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}

@media (min-width:320px)  {
    .selected-label-background {
        left: 21%;
        width: 71%;
    }
    .image-remover-left {
        width: 3%;
    }
    .image-remover-right {
        width: 1%;
    }
}
@media (min-width:412px)  {
    .image-remover-left {
        width: 12%;
    }
    .image-remover-right {
        right: 0;
        width: 30%
    }
    .ps-btn--yellow, button.ps-btn--yellow
    {
        /*width: 50%;
        padding: 5px 5px;
        text-align: center;*/
    }
}
@media (min-width:481px)  {
    .image-remover-left {
        width: 12%;
    }
    .image-remover-right {
        right: 0;
        width: 30%
    }
    .ps-btn--yellow, button.ps-btn--yellow
    {
        /*width: 50%;
        padding: 5px 5px;
        text-align: center;*/
    }
}

</style>
@endpush
 @section('contents')
<div class="ps-hero bg--cover" data-background="/imagesmsp/product.jpg" style="height:300px !important;min-height:0px" background="url(/imagesmsp/product.jpg) no-repeat cover;">
      <div class="ps-hero__content">
        <h1> Product Details</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('')}}">Home</a></li>
            <li class="active">Product Details</li>
          </ol>
        </div>
      </div>
    </div>
    <main class="ps-main">
      <div class="ps-container">
        <div class="ps-product--detail">
          <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 ">
              <div class="ps-product__thumbnail">
                <div class="ps-product__image">
                  <div class="item"><a href="{{$product->image}}"><img src="{{$product->image}}" alt=""></a></div>
                  <div class="item"><a href="{{$product->image2}}"><img src="{{$product->image2}}" alt=""></a></div>
                  <div class="item"><a href="{{$product->image3}}"><img src="{{$product->image3}}" alt=""></a></div>
                </div>
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                      <div class="item"><img src="{{$product->image}}" alt=""></div>
                      <div class="item"><img src="{{$product->image2}}" alt=""></div>
                      <div class="item"><img src="{{$product->image3}}" alt=""></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 ">
              <div class="ps-product__info">
                <h1 class="text-uppercase">{{$product->name}} </h1>
                @php $givediscount = discountAvailable(); @endphp
               

                <h3 class="ps-product__price">
                    
                    @php
                    $categories = array_map(function ($short) {
                        return $short['slug'];
                    },$product->categories->toArray());
                    //print_r($categories);
                    @endphp
                    
                    @if($givediscount)
                            @if(in_array('crazy-good-cake',$categories))

                                <strike>{{getPrice($product->prices->min('amount')*6)}}</strike> | <span id="price">{{getDiscountedPrice($product->prices->min('amount')*6)}}</span> ({{getDiscountText('OFF')}})
                            @else

                                <strike>{{getPrice($product->prices->min('amount'))}}</strike> | <span id="price">{{getDiscountedPrice($product->prices->min('amount'))}}</span> ({{getDiscountText('OFF')}})
                            @endif
                    @else
                            @if(in_array('crazy-good-cake',$categories))
                                <span id="price">{{getPrice($product->prices->min('amount')*6)}}</span>
                            @else
                                <span id="price">{{getPrice($product->prices->min('amount'))}}</span>
                            @endif
                    @endif  
                    
                </h3>
                    
                    
                <div class="ps-product__desc">
                  <p>{{$product->description}}</p>
                </div>
               
                <div class="ps-product__shopping" style="padding-top:0px;">
                     <form class="ps-form--shopping" action="" method="post" id="cartform">
                         
                         @csrf
                         <input type="hidden" value="{{$product->shipping_id}}" name="shipping_id">
                         <input type="hidden" value="{{$product->prices->min('id')}}" name="price_id" id="price_id">
                         <input type="hidden" value="@if(@$givediscount) @if(in_array('crazy-good-cake',$categories)) {{getDiscountedPriceI($product->prices->min('amount'))}} @else {{getDiscountedPriceI($product->prices->min('amount'))}} @endif @else @if(in_array('crazy-good-cake',$categories)) {{$product->prices->min('amount')}} @else {{$product->prices->min('amount')}} @endif @endif" name="price_i" id="price_i">
                         
                         <div class="row">
                             
                            @if(session('shippingType') != 'pickup')

                            <div class="col-sm-4 form-group">
                                <label class="form-label">Delivery Postalcode</label>
                                <input type="text" class="form-control" name="postalcode" placeholder="Postalcode" style="border-radius:40px">
                                @if($errors->first('postalcode')!='')
                                <span style="color:Red;font-size:90%" >A valid postalcode required</span>
                                @endif
                            </div>
                            
                            @else
                            
                            <?php   $pickup_points = array('harbord' => '326, Harbord St', 'cartwright' => '128 Cartwright Ave');  ?>
                            
                            <div class="col-sm-4 form-group">
                                <label class="form-label">Pickup From</label>
                                <input type="text" class="form-control" name="cityname" value="{{strtoupper($pickup_points[session('cityIdSet')])}}" readonly placeholder="City" style="border-radius:40px">
                            </div>
                            
                            @endif
                            
                            @if(session('shippingType') != 'pickup')
                            
                            <div class="col-sm-4 form-group">
                                <label>Location Type <span class="required">*</span></label>
                                <select name="location_type" v-model="formInputs.location_type" class="form-control" style="border-radius:40px">
                                        <option value="">Select Location Type   </option>
                                        <option selected="selected" value="Residence">Residence</option>
                                        <option value="Business">Business</option>
                                        <option value="Funeral home">Funeral home</option>
                                        <option value="Hospital">Hospital</option>
                                        <option value="Apartment">Apartment</option>
                                        <option value="School">School</option>
                                        <option value="Church">Church</option>
                                </select>
                            </div>
                            
                            @endif
                            
                            <div class="col-sm-4 form-group">
                                @if(session('shippingType') == 'pickup')<label>Pick Up Date</label>@else <label>Delivery Date</label> @endif
                                <div style="position:relative">
                                    <input type="text" class="d-calendar form-control" name="display_date" value="{{old('display_date')}}" readonly required  style="border-radius:40px" id="dateselect">
                                    
                                    <div id="calendar-container" style="display:none;">
                                        
                                        @if(session('shippingType')=='pickup')
                                        <div id="calendar">
                                            <div class="month">
                                                <h3>{{date('F Y')}}</h3>
                                                {!!getPickupCalendar(date('n'),date('Y'),session('cityIdSet'))!!}
                                            </div>
                                            <div id="more-dates1" class="more-dates">
                                                <div class="month">
                                                    <h3>{{date('F Y',strtotime('first day of +1 month'))}}</h3>
                                                    {!!getPickupCalendar(date('n',strtotime('first day of +1 month')),date('Y',strtotime('first day of +1 month')),session('cityIdSet'))!!}
                                                </div>
                                            </div>
                                            <a href="#" class="show-more-dates" data-target="more-dates1">More dates</a>
                                            
                                        </div>
                                        @else
                                        <div id="calendar">
                                            <div class="month">
                                                <h3>{{date('F Y')}}</h3>
                                                {!!getCalendar(date('n'),date('Y'),$product->shippings[0]->id ?? 0)!!}
                                            </div>
                                            <div class="more-dates" id="more-dates2">
                                                <div class="month">
                                                    <h3>{{date('F Y',strtotime('first day of +1 month'))}}</h3>
                                                    {!!getCalendar(date('n',strtotime('first day of +1 month')),date('Y',strtotime('first day of +1 month')),$product->shippings[0]->id ?? 0)!!}
                                                </div>
                                            </div>
                                            <a href="#" class="show-more-dates" data-target="more-dates2">More dates</a>
                                        </div>
                                        @endif
            
                                    </div>
                                    <input type="hidden" name="delivery_date" id="delivery_date" value="{{old('delivery_date')}}">
                                    @if($errors->first('delivery_date') != '')
                                        <span style="color:red;font-size:90%;">@if(session('shippingType') == 'pickup')<label>Pick Up Date</label>@else <label>Delivery Date</label> @endif required</span>
                                    @endif
                                </div>
                            </div>
                            
                            @if(session('shippingType') == 'pickup')
                            <div class="col-sm-4 form-group" id="pickuptime">
                                <label>Pickup Time</label>
                                <div style="position:relative">
                                    <select class="form-control" name="pickup_time" style="border-radius:40px;" id="pickup-picker">
                                        <option>Select a Time</option>
                                    </select>
                                </div>
                            </div>
                            
                            @endif
                            
                            <div class="clearfix"></div>
                            
                            <div class="col-sm-12">
                                <ul id="date-select">
                                    @if(session('shippingType') == 'pickup')
                                        <?php $days = getNearestPickupDates(session('cityIdSet'),5); ?>
                                         @foreach($days as $day)
                                            <li class="d-date">
                                                <a href="#" class="boxdate" onclick="changePickupDate(event, '{{date('Y-m-d',strtotime($day['day']))}}', '{{date('l dS M',strtotime($day['day']))}}', '{{$day['open']}}', '{{$day['close']}}')" 
                                                            id="boxdate-{{date('Y-m-d',strtotime($day['day']))}}" data-date="{{date('Y-m-d',strtotime($day['day']))}}" data-display-date="{{date('l dS M',strtotime($day['day']))}}" onclick="changeDate(event,'{{date('Y-m-d',strtotime($day['day']))}}','{{date('l dS M',strtotime($day['day']))}}');">
                                                    <div class="d-day">{{date('Y-m-d') == $day['day'] ? 'Today':date('D',strtotime($day['day']))}}</div>
                                                    <div class="monthname">{{date('d M',strtotime($day['day']))}}</div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <?php $days = getNearestDates($product->shippings[0]->id,5); ?>
                                        @foreach($days as $day)
                                            <li class="d-date">
                                                <a href="#" class="boxdate"  
                                                            id="boxdate-{{date('Y-m-d',strtotime($day))}}" data-date="{{date('Y-m-d',strtotime($day))}}" data-display-date="{{date('l dS M',strtotime($day))}}" onclick="changeDate(event,'{{date('Y-m-d',strtotime($day))}}','{{date('l dS M',strtotime($day))}}');">
                                                    <div class="d-day">{{date('Y-m-d') == $day ? 'Today':date('D',strtotime($day))}}</div>
                                                    <div class="monthname">{{date('d M',strtotime($day))}}</div>
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                    
            
                                </ul>
                            </div>
                            
                            <div class="col-sm-12">
                                <textarea name="card_message" placeholder="Card Message" class="form-control" rows="4" id="card_message" style="border-radius:40px; padding: 20px 20px;"></textarea>
                                <div style="margin-top:10px;text-align:right;">
                                Remaining characters: <span id="remchars"></span></div>
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            <input type="hidden" name="delivery_type" value="{{session('shippingType')}}" />
                            <input type="hidden" name="delivery_city" value="{{session('cityIdSet')}}" />
                            <input type="hidden" name="delivery_time" value="" id="delivery_time" />
                            
                            <div class="col-sm-4 form-group" style="margin-bottom: unset;">
                                <label class="form-label">Choose Qty</label>
                                <div class="clearfix"></div>
                                @php
                                    $categories = array_map(function ($short) {
                                        return $short['slug'];
                                    },$product->categories->toArray());
                                @endphp
                                @if(in_array('crazy-good-cake',$categories))
                                <select class="form-control major-qty" name="qty" id="qty" style="border-radius:40px">
                                  <option value="6">6</option>
                                  <option value="12">12</option>
                                  <option value="18">18</option>
                                  <option value="24">24</option>
                                  <option value="30">30</option>
                                  <option value="36">36</option>
                                  <option value="42">42</option>
                                  <option value="48">48</option>
                                  <option value="54">54</option>
                                  <option value="60">60</option>
                                </select>
                                @else
                                <div class="form-group--number">
                                  <button class="minus"><span>-</span></button>
                                  <input class="form-control major-qty" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="1" name="qty" id="qty" readonly>
                                  <button class="plus"><span>+</span></button>
                                  <span class="minimum-quantity hidden" style="text-align: center;color: red; font-size:90%;">Minimum Quantity Should be 18</span>
                                </div>
                                @endif
                            </div>
                            
                            <div class="col-sm-8">
                                <label>&nbsp;</label>
                                <div class="clearfix"></div>
                                @php
                                $categories = array_map(function ($short) {
                                    return $short['slug'];
                                },$product->categories->toArray());
                                //print_r($categories);
                                @endphp
                            </div>

                            <div class="col-sm-12">
                                <span class="text-danger label-error hidden">Minimum quantity 18 required for label customization</span>
                            </div>
                            
                            <div class="clearfix"></div>
                            
                            @if(in_array('crazy-good-cake',$categories))
                            <div class="col-sm-6" style="position: relative;">
                                <a class="ps-btn custimize-flavour customize-button" style="padding: 8px 10px 9px;width: 100%;text-align: center;" href="#flavourModal" data-toggle="modal" data-target="#flavourModal" data-backdrop="static" data-keyboard="false">Choose Your Flavours</a><i data-toggle="modal" data-target="#prooduct-info-show" class="fa fa-info info-label-products product-flavour-cb"></i>
                            </div>
                            <div class="col-sm-6" style="position: relative;">
                                <a class="ps-btn custimize-bs customize-button" style="padding: 8px 21px 9px;width: 100%;text-align: center;">Customize Your label</a><i data-toggle="modal" data-target="#prooduct-info-show" class="fa fa-info info-label-products product-label-cb"></i>
                            </div>
                            @endif
                            <div class="ps-product__sharing col-sm-12" style="text-align: center;">
                                <button class="ps-btn ps-btn--yellow submit-order" style="float: none;width:100%;" type="submit">Order Now</button>
                              <!--<p class="text-right">Share this:<a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-dribbble"></i></a></p>-->
                            </div>
                         </div>
                         
                  </form>
                      
                </div>
                
                <!--</form>-->
              </div>
            </div>
          </div>
          <div class="ps-product__content">
            <ul class="tab-list" role="tablist">
              <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Product Description</a></li>
              <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Delivery Policy
                  </a></li>
              <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">Substitution Policy
                  </a></li>
              
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab_01">
              <p>{{$product->description}}</p>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab_02">
              
              
              
            </div>
            <div class="tab-pane" role="tabpanel" id="tab_03">
              <p>{!!getPolicy('substitution-policy')!!}</p>
              
              
            </div>
            
          </div>
        </div>
      </div>
    </main>
    <div id="customize-design" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title pull-left">Customize Label</h4>
                    <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">

                    <div class="ps-product__content">
                        <ul class="nav nav-tabs main-nav">
                            <li class="active home-active"><a data-toggle="tab" data-target="#home" href="#home">Select a Category</a></li>
                            <li class="menu1-active" ><a data-toggle="tab" data-target="#menu1" href="#menu1">Enter Your Message</a></li>
                            <li class="menu2-active"><a data-toggle="tab" data-target="#menu2" href="#menu2">Preview</a></li>
                        </ul>

                          <div class="tab-content label-contents">
                            <div id="home" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group"><br>
                                            <!--<label>Select category</label>-->
                                            <select name="occasions" class="form-control">
                                                <option value="">--select --</option>
                                                @foreach($occasions as $oc => $oca)
                                                <option value="{{$oca->id}}">{{$oca->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row label-show">
                                    @foreach($labels as $label)
                                    <div class="col-sm-3" onclick="clickLabel({{$label->id}},this)">
                                        <div class="label-image-container">
                                            <span></span>
                                            <img src="{{$label->label_image}}" class="img-responsive images_{{$label->id}}">
                                            <h1 class="name-header" style="font-size: 17px;">Jake's</h1>
                                            <h1 class="event-number" style="font-size: 17px;">5<sup>th</sup></h1>
                                            <h1 class="event-name" style="font-size: 17px;">Birthday</h1>
                                            <h4 class="event-date" style="font-size: 8px;">21 September {{date('d M Y')}}</h4>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <input type="hidden" value="" name="label_selected" id="label_selected">
                                <div class="row footer-label">
                                    <div class="col-sm-12">
                                        <a type="button" class="ps-btn select-first ps-btn--yellow pull-right" onclick="tabsActive('.menu1-active')">Next&nbsp; &nbsp;<i class="fa fa-forward"></i></a>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="ps-btn pull-right" data-dismiss="modal" style="margin-right: 15px;">Close</button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-12">
                                        <span class="error text-danger hidden pull-right">Please select a label to customize.</span>
                                    </div>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <div class="row contents hidden">
                                    <div class="col-sm-4 label-controls">
                                        <div class="panel-group" id="accordion">
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                                Line 1 : <h4 class="line-head name1-head">Jake</h4></a> 
                                              </h4>
                                            </div>
                                            <div id="collapse1" class="panel-collapse collapse in">
                                              <div class="panel-body">
                                                <div class="col-md-12 padrem-label">
                                                    <!--<label>Some</label>-->
                                                    <input type="text" class="label form-control" name="name" />
                                                </div>
                                                  <div class="col-md-6 padrem-label">
                                                    <label>Text Style</label> 
                                                    <select class="form-control label" name="label_font1">
                                                        <option value="">-- select --</option>
                                                        <?php foreach ($fontIterator as $key => $fileinfo) {
                                                            if(!$fileinfo->isDot()) { ?>
                                                            <option value="<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>"><?php echo substr($fileinfo, 0, strpos($fileinfo, ".")); ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Color</label>
                                                    <input type="color" value="#000000" class="label form-control" name="label_font_color1" />
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Size</label>
                                                    <!--<select class="label form-control label-font-size" name="label_font_size1">
                                                        @for($i=0;$i<=10;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>-->
                                                    <input type="number" class="label form-control label-font-size" name="label_font_size1" min="1" value="10">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                                Line 2 : <h4 class="line-head name2-head">0th</h4></a>
                                              </h4>
                                            </div>
                                            <div id="collapse2" class="panel-collapse collapse">
                                              <div class="panel-body">
                                                <div class="col-md-12 padrem-label">
                                                    <!--<label>Some</label>-->
                                                    <input type="text" class="label form-control" name="name2" />
                                                </div>
                                                <div class="col-md-6 padrem-label">
                                                    <label>Text Style</label>
                                                    <select class="form-control label" name="label_font2">
                                                        <option value="">-- select --</option>
                                                        <?php foreach ($fontIterator as $key => $fileinfo) {
                                                            if(!$fileinfo->isDot()) { ?>
                                                            <option value="<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>"><?php echo substr($fileinfo, 0, strpos($fileinfo, ".")); ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Color</label>
                                                    <input type="color" value="#000000" class="label form-control" name="label_font_color2" />
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Size</label>
                                                    <!--<select class="label form-control label-font-size2" name="label_font_size2">
                                                        @for($i=0;$i<=10;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>-->
                                                    <input type="number" class="label form-control label-font-size2" value="10" name="label_font_size2" min="1">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                                Line 3 : <h4 class="line-head name3-head">Birthday</h4></a><!--<input type="text" class="form-control label" name="name3" />-->
                                              </h4>
                                            </div>
                                            <div id="collapse3" class="panel-collapse collapse">
                                              <div class="panel-body">
                                                <div class="col-md-12 padrem-label">
                                                    <!--<label>Some</label>-->
                                                    <input type="text" class="label form-control" name="name3" />
                                                </div>
                                                <div class="col-md-6 padrem-label">
                                                    <label>Font</label>
                                                    <select class="label form-control" name="label_font3">
                                                        <option value="">-- select --</option>
                                                        <?php foreach ($fontIterator as $key => $fileinfo) {
                                                            if(!$fileinfo->isDot()) { ?>
                                                            <option value="<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>"><?php echo substr($fileinfo, 0, strpos($fileinfo, ".")); ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Color</label>
                                                    <input type="color" value="#000000" class="label form-control" name="label_font_color3" />
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Size</label>
                                                    <!--<select class="label form-control label-font-size3" name="label_font_size3">
                                                        @for($i=0;$i<=10;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>-->
                                                    <input type="number" class="label form-control label-font-size3" name="label_font_size3" value="10" min="1">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                                Line 4 : <h4 class="line-head name4-head">Birthday</h4></a><!--<input type="text" class="form-control label" name="name4" />-->
                                              </h4>
                                            </div>
                                            <div id="collapse4" class="panel-collapse collapse">
                                              <div class="panel-body">
                                                  <div class="col-md-12 padrem-label">
                                                    <!--<label>Some</label>-->
                                                    <input type="text" class="label form-control" name="name4" />
                                                </div>
                                                  <div class="col-md-6 padrem-label">
                                                    <label>Font</label>
                                                    <select class="form-control label" name="label_font4">
                                                        <option value="">-- select --</option>
                                                        <?php foreach ($fontIterator as $key => $fileinfo) {
                                                            if(!$fileinfo->isDot()) { ?>
                                                            <option value="<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>"><?php echo substr($fileinfo, 0, strpos($fileinfo, ".")); ?></option>
                                                        <?php } } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Color</label>
                                                    <input type="color" value="#000000" class="label form-control" name="label_font_color4" />
                                                </div>
                                                <div class="col-md-3 padrem-label">
                                                    <label>Size</label>
                                                    <!--<select class="label form-control label-font-size4" name="label_font_size4">
                                                        @for($i=0;$i<=10;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                        @endfor
                                                    </select>-->
                                                    <input type="number" class="label form-control label-font-size4" name="label_font_size4" value="2" min="1">
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!--<ul class="nav nav-tabs">
                                          <li class="active"><a aria-controls="line1" role="tab" data-toggle="tab" href="#line1">Line 1</a></li>
                                          <li><a aria-controls="line2" role="tab" data-toggle="tab" href="#line2">Line 2</a></li>
                                          <li><a aria-controls="line3" role="tab" data-toggle="tab" href="#line3">Line 3</a></li>
                                          <li><a aria-controls="line4" role="tab" data-toggle="tab" href="#line4">Line 4</a></li>
                                        </ul>-->
                                        
                                        <div class="tab-content">
                                          <!--<div id="line1" class="tab-pane fade in active">
                                            <h3>Line 1</h3>
                                            <div class="form-group">
                                                <label>Text</label>
                                                <input type="text" class="form-control" name="name" />
                                            </div>
                                          </div>-->
                                          <div id="line2" class="tab-pane fade">
                                            <h3>Line 2</h3>
                                            <div class="form-group">
                                                <label>Text</label>
                                                <!--<input type="text" class="form-control" name="name2" />-->
                                            </div>
                                          </div>
                                          <div id="line3" class="tab-pane fade">
                                            <h3>Line 3</h3>
                                            
                                          </div>
                                          <div id="line4" class="tab-pane fade">
                                            <h3>Line 4</h3>
                                            <div class="form-group">
                                                <label>Text</label>
                                                <!--<input type="text" class="form-control" name="name4" />-->
                                            </div>
                                          </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <label>Line 1</label>
                                            <input type="text" class="form-control" name="name" />
                                        </div>
                                        <div class="form-group">
                                            <label>Line 2</label>
                                            <input type="text" class="form-control" name="line2" />
                                        </div>
                                        <div class="form-group">
                                            <label>Line 3</label>
                                            <input type="text" class="form-control" name="line3" />
                                        </div>
                                        <div class="form-group">
                                            <label>Event Date</label>
                                            <input type="date" class="form-control" name="dob" />
                                        </div>
                                        <div class="form-group">
                                            <label>Font</label>
                                            <select class="form-control" name="label_font">
                                                <option value="">-- select --</option>
                                                <?php /*foreach ($fontIterator as $key => $fileinfo) {
                                                    if(!$fileinfo->isDot()) { ?>
                                                    <option value="<?php echo str_replace(' ','',substr($fileinfo, 0, strpos($fileinfo, "."))); ?>"><?php echo substr($fileinfo, 0, strpos($fileinfo, ".")); ?></option>
                                                <?php } }*/ ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Color</label>
                                            <input type="color" value="#000000" class="form-control" name="label_font_color" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Size</label>
                                            <select class="form-control label-font-size" name="label_font_size">
                                                @for($i=1;$i<=10;$i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>-->
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group image-display">
                                            <img src="" class="img-responsive display_image_selected" style="height:292px;object-fit: cover;">
                                            <div id="image-display-content">
                                                <h1 class="name-header" id="name-header">Jake's</h1>
                                                <h1 class="event-number" id="event-number">5<sup>th</sup></h1>
                                                <h1 class="event-name" id="event-name">Birthday</h1>
                                                <h4 class="event-date" id="event-date">21 September 2020</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 footer-label">
                                        <a type="button" class="ps-btn ps-btn--yellow pull-left" data-toggle="tab" onclick="tabsActive('.home-active')" href="#home"><i class="fa fa-backward"></i>&nbsp; &nbsp;Back</a>
                                        <a type="button" class="ps-btn ps-btn--yellow pull-right" data-toggle="tab" onclick="tabsActive('.menu2-active')" href="#menu2">Next&nbsp; &nbsp;<i class="fa fa-forward"></i></a>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="ps-btn pull-right" data-dismiss="modal" style="margin-right: 15px;">Close</button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <div class="row" style="padding-top: 15px;">
                                    <div class="sol-sm-12 preview-container text-center">
                                        <img src="{{$product->image}}" style="max-width: 100%;height: 250px;">
                                        <div class="selected-label-background">
                                            <!--<div class="image-remover-left"></div>-->
                                            <div class="selected-label-background-image"></div>
                                            <h1 class="name-header last" style="font-size: 17px;">Jake's</h1>
                                            <h1 class="event-number last" style="font-size: 17px;">5<sup>th</sup></h1>
                                            <h1 class="event-name last" style="font-size: 17px;">Birthday</h1>
                                            <h4 class="event-date last" style="font-size: 8px;">21 September {{date('d M Y')}}</h4>
                                            <!--<div class="image-remover-right"></div>-->
                                        </div>
                                    </div>
                                    <div class="col-sm-12 footer-label">
                                        <a type="button" class="ps-btn ps-btn--yellow pull-left" data-toggle="tab" onclick="tabsActive('.menu1-active')" href="#menu1"><i class="fa fa-backward"></i>&nbsp; &nbsp;Back</a>
                                        <button type="button" class="ps-btn ps-btn--yellow pull-right submit-label">Submit</button>&nbsp;&nbsp;&nbsp;
                                        <button type="button" class="ps-btn pull-right" data-dismiss="modal" style="margin-right: 15px;">Close</button>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                              <h3>Menu 3</h3>
                              <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                          </div>
                    </div>
                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="ps-btn ps-btn--yellow submit-label">Submit</button>
                    <button type="button" class="ps-btn" data-dismiss="modal">Close</button>
                </div>-->
            </div>
        </div>
    </div>
    <div id="errorShow" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!--<h4 class="modal-title">Modal Header</h4>-->
          </div>
          <div class="modal-body">
              <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-danger text-center" style="font-size: 22px;">Minimum Quantity 18 Required</p>
                </div>
                <div class="col-sm-12">
                    <p class="text-info current-quantity-info"></p>
                    <p class="text-info current-quantity-info" style="border-bottom: 0px solid;">Selected Flavours</p>
                    <div class="table-responsive">
                        <table class="table flavours-selected-error-show">
                            
                        </table>
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer" style="float:none;text-align:center;">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
    
      </div>
    </div>
    <div id="prooduct-info-show" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <!--<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modal Header</h4>
          </div>-->
          <div class="modal-body">
              <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <div class="row">
                <div class="col-sm-12">
                    <p class="text-info info-product text-center" style="font-size: 18px;"></p>
                </div>
            </div>
          </div>
          <!--<div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>-->
        </div>
    
      </div>
    </div>
    <div id="productNotAvailable" class="modal fade" role="dialog">
      <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <!--<h4 class="modal-title">Modal Header</h4>-->
          </div>
          <div class="modal-body">
              <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
            <p class="text-danger text-center" style="font-size: 22px;">Product not available for this city.</p>
          </div>
          <div class="modal-footer">
            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
          </div>
        </div>
    
      </div>
    </div>
    <a class="ps-btn product-not-available hidden" href="#productNotAvailable" data-toggle="modal" data-target="#productNotAvailable" data-backdrop="static" data-keyboard="false"></a>
    <style>
        i.add-child {
            /*content: "\f067";*/
            /*content: attr(data-before);*/
                font-size: 14px;
                cursor: pointer;
                font-style: inherit;
                color:#000;
                /*border: 1px solid #000;*/
                padding: 5px;
        }
    </style>
    <div id="flavourModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
            <h4 class="modal-title pull-left">Choose Flavour</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="pull-right">Total Quantity : <span class="total-quantity">0</span></h3>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table" style="">
                            <thead>
                                <tr>
                                    <th>Flavour</th>
                                    <th>Quantity</th>
                                    <th></th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="items-list-add">
                                <tr>
                                    <td>
                                        <select class="form-control" name="flavour">
                                            @foreach($flavour as $f)
                                            <option value="{{$f['name']}}" selected="">{{$f['name']}}</option>
                                            @endforeach
                                            <!--<option value="Vanila" selected="">Vanila</option>-->
                                            <!--<option value="Pista">Pista</option>-->
                                            <!--<option value="Strawberry">Strawberry</option>-->
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" min="1" value="1" class="form-control" name="quantity_flavour" autocomplete="off">
                                    </td>
                                    <td>
                                        <i class="add-child add-item-flavour" title="Add Item" style="border: 1px solid #000;" aria-hidden="true"></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-trash delete-bulk" aria-hidden="true" style="font-size: 25px;cursor: pointer;"></i>&nbsp;&nbsp;&nbsp;
                                        <!--<i class="add-child add-item-flavour" title="Add Item" aria-hidden="true" style="font-size: 25px;cursor: pointer;"></i>-->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <!--<button type="button" class="btn btn-primary add-item-flavour pull-right">Add Item</button>-->
                    </div>
                    <div class="form-group col-sm-12">
                        <h4 class="pull-right">Total Items Added : <span class="total-selected">1</span></h4>
                    </div>
                    <div class="form-group col-sm-12">
                        <!--<button type="button" data-dismiss="modal" class="btn btn-primary submit-item-flavour hidden pull-right">Submit</button>-->
                    </div>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="ps-btn pull-rigth" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;&nbsp;
            <button type="button" class="ps-btn ps-btn--yellow submit-item-flavour pull-right">Confirm Flavours</button>
          </div>
        </div>
    
      </div>
    </div>
    
    
    <div id="cityModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close pull-right" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div id="del-type">
                <h1>Are you looking for?</h1>
                <button id="city-delivery">Delivery</button> <button id="city-pickup">Pickup</button>
            </div>
            <div id="sel-city">
                <h1>Select a city</h1>
                <input type="text" name="city" class="form-control"/>
            </div>
            <div id="sel-city">
                <h1>Where would you like to pickup the order</h1>
                <a href="#">Harbord</a> &nbsp; <a href="#">Cartwright</a>
            </div>
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
    
      </div>
    </div>
    
   
     @endsection
     @push('scripts')
     <!--<canvas id="canvas"></canvas>-->
    <!--<link href="{{asset('color-picker/color-picker.min.css')}}" rel="stylesheet">
    <script src="{{asset('color-picker/color-picker.min.js')}}"></script>-->
     <script>
            var headLenghtX = 0,headLenghtY = 0,numberLengthX = 0,numberLengthY = 0,birthLengthX = 0,birthLengthY = 0,dateLengthX = 0,dateLengthY = 0;
            /*var picker = new CP(document.querySelector('input[name="label_font_color"]'), {
                color: '#000000', // color format
                e: ['touchstart', 'mousedown'], // events to show the color picker 
                parent: null //parent element
            });*/
            $(function(){
                /*$(document).on('select','select[name="label_font_size"]',function(){
                    alert($(this).val());
                });*/
                $('.image-display > h1').css('font-size',40);
                $(document).on('input','.label-font-size',function(e){
                    e.preventDefault();
                    $('.name-header').css({ fontSize: parseInt($(this).val())*3+10 });
                });
                $(document).on('input','.label-font-size2',function(e){
                    e.preventDefault();
                    $('.event-number').css({ fontSize: parseInt($(this).val())*3+10 });
                });
                $(document).on('input','.label-font-size3',function(e){
                    e.preventDefault();
                    $('.event-name').css({ fontSize: parseInt($(this).val())*3+10 });
                });
                $(document).on('input','.label-font-size4',function(e){
                    e.preventDefault();
                    $('.event-date').css({ fontSize: parseInt($(this).val())*3+10 });
                });
                $('.product-flavour-cb').tooltip();
                $(document).on('mouseover','.product-flavour-cb',function(){
                    // $('#prooduct-info-show').modal('show');
                    $('.product-flavour-cb').click();
                });
                $(document).on('mouseover','.product-label-cb',function(){
                    // $('#prooduct-info-show').modal('show');
                    $('.product-label-cb').click();
                });
                $('.product-label-cb').tooltip();
                $('.info-label-products').on('click',function(e){
                    e.preventDefault();
                    if($(this).hasClass('product-flavour-cb'))
                        $('.info-product').text('You can choose deifferent flavors for selected quantities !!');
                    else
                        $('.info-product').text('You can choose label design for your cake jars !!');
                });
                
                $("#dateselect").click(function(){
                    if($("#calendar-container").attr("style") == "display:none;") {
                        $("#calendar-container").removeAttr("style");
                    }
                    else {
                        $("#calendar-container").attr("style","display:none;");
                    }
                })
                
                $(".day-number a").click(function(e){
                    e.preventDefault();
                    
                    $(this).addClass('active');
                    var id = $(this).attr("data-date");
                    $("#daybox-"+id).addClass("active");
                })
                
                $("#card_message").keydown(function(e){
                    var val = $(this).val();
                    var key = e.which;
                    
                    if(val.length > 150 && key != 8 ) {
                        return false;
                    }
                    
                    $("#remchars").text(150-val.length);
                })
                
                $("body").delegate("#pickup-picker","change",function(e) {
                    
                    //alert($(this).val())
                    
                });
                
                $(".show-more-dates").click(function(e) {
                    e.preventDefault();
                    var id = $(this).attr("data-target");
                    var text = $(this).text();
                    
                    if(text == 'More dates') {
                        $(".more-dates#"+id).css("display","block");
                        $(this).text('Less dates');
                    }
                    else {
                        $(".more-dates#"+id).css("display","none");
                        $(this).text('More dates');
                    }
                })
                
            });
            
            $(document).on('hide.bs.modal', '#productNotAvailable', function (e) {
                window.scrollTo(0, 0);
                cityPopup();
            });
            
            function changeDate(e, ddate, dispdate) {
                e.preventDefault();
                $("#calendar .day-number a").removeClass("active");
                $(".boxdate").removeClass("active");
                $("#caldate-"+ddate).addClass('active');
                $("#boxdate-"+ddate).addClass('active');
                $("#dateselect").val(dispdate);
                $("#delivery_date").val(ddate);
                $("#calendar-container").attr("style","display:none;");
            }
            
            function changePickupDate(e, ddate, dispdate, start, end) {
                var starts = start.split(':');
                var ends = end.split(':');
                
                var options = '';
                
                for(i=starts[0];i<ends[0];i++) {
                    for(j=0;j<59;j+= 15) {
                        
                        var z = i > 12 ? i-12:i;
                        var ampm = i > 12 ? 'pm':'am';
                        options += '<option value="'+zeroFill(i,2)+':'+zeroFill(j,2)+'">'+zeroFill(z,2)+':'+zeroFill(j,2)+' '+ampm+'</option>';
                    }
                }
                $("#pickup-picker").html('')
                $("#pickup-picker").append(options)
                
                $("#pickuptime").css("display","block");

                e.preventDefault();
                $("#calendar .day-number a").removeClass("active");
                $(".boxdate").removeClass("active");
                $("#caldate-"+ddate).addClass('active');
                $("#boxdate-"+ddate).addClass('active');
                $("#dateselect").val(dispdate);
                $("#delivery_date").val(ddate);
                $("#calendar-container").attr("style","display:none;");
            }
            
            function zeroFill( number, width )
            {
              width -= number.toString().length;
              if ( width > 0 )
              {
                return new Array( width + (/\./.test( number ) ? 2 : 1) ).join( '0' ) + number;
              }
              return number + ""; // always return a string
            }


            Date.prototype.toDateInputValue = (function() {
                var local = new Date(this);
                local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
                return local.toJSON().slice(0,10);
            });
            
            const monthNames = ["January", "February", "March", "April", "May", "June","July", "August", "September", "October", "November", "December"];
            var sumitLabel = 0;
            
            $(document).on('input','input[name="name"]',function(){
                $('.name-header').html($(this).val());
                $('.name1-head').html($(this).val());
                $('.name2-head').html($('input[name="name2"]').val());
                $('.name3-head').html($('input[name="name3"]').val());
                $('.name4-head').html($('input[name="name4"]').val());
                $('.event-number').html($('input[name="name2"]').val());
                $('.event-name').html($('input[name="name3"]').val());
                /*var date = new Date($('input[name="dob"]').val());
                // var number = today.getFullYear()-date.getFullYear();
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0');
                var yyyy = date.getFullYear();
                var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[date.getMonth()]==undefined?'':(monthNames[date.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));*/
                $('.event-date').html($('input[name="name4"]').val());
            });
            $(document).on('input','input[name="name3"]',function(){
                $('.event-name').html($(this).val());
                $('.name1-head').html($('input[name="name"]').val());
                $('.name2-head').html($('input[name="name2"]').val());
                $('.name3-head').html($(this).val());
                $('.name4-head').html($('input[name="name4"]').val());
                $('.event-number').html($('input[name="name2"]').val());
                $('.name-header').html($('input[name="name"]').val());
                /*var date = new Date($('input[name="dob"]').val());
                // var number = today.getFullYear()-date.getFullYear();
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0');
                var yyyy = date.getFullYear();
                var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[date.getMonth()]==undefined?'':(monthNames[date.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));*/
                $('.event-date').html($('input[name="name4"]').val());
            });
            $(document).on('input','input[name="name2"]',function(){
                $('.name-header').html($('input[name="name"]').val());
                $('.name1-head').html($('input[name="name"]').val());
                $('.name2-head').html($(this).val());
                $('.name3-head').html($('input[name="name3"]').val());
                $('.name4-head').html($('input[name="name4"]').val());
                $('.event-number').html($(this).val());
                $('.event-name').html($('input[name="name3"]').val());
                /*var date = new Date($('input[name="dob"]').val());
                // var number = today.getFullYear()-date.getFullYear();
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0');
                var yyyy = date.getFullYear();
                var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[date.getMonth()]==undefined?'':(monthNames[date.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));*/
                $('.event-date').html($('input[name="name4"]').val());
            });
            
            $(document).on('change','select[name="label_font1"]',function(){
                $('.name-header').css('font-family',$(this).val());
                /*$('.preview-container').css('font-family',$(this).val());
                $('.preview-container, .selected-label-background').css('font-family',$(this).val());*/
            });
            
            $(document).on('input','input[name="label_font_color1"]',function(){
                $('.name-header').css('color',$(this).val());
                /*$('.image-display').find('h4').css('color',$(this).val());
                $('.preview-container').find('h1').css('color',$(this).val());
                $('.preview-container').find('h4').css('color',$(this).val());*/
            });
            
            $(document).on('change','select[name="label_font2"]',function(){
                $('.event-number').css('font-family',$(this).val());
                /*$('.preview-container').css('font-family',$(this).val());
                $('.preview-container, .selected-label-background').css('font-family',$(this).val());*/
            });
            
            $(document).on('input','input[name="label_font_color2"]',function(){
                $('.event-number').css('color',$(this).val());
                /*$('.image-display').find('h4').css('color',$(this).val());
                $('.preview-container').find('h1').css('color',$(this).val());
                $('.preview-container').find('h4').css('color',$(this).val());*/
            });
            
            $(document).on('change','select[name="label_font3"]',function(){
                $('.event-name').css('font-family',$(this).val());
                /*$('.preview-container').css('font-family',$(this).val());
                $('.preview-container, .selected-label-background').css('font-family',$(this).val());*/
            });
            
            $(document).on('input','input[name="label_font_color3"]',function(){
                $('.event-name').css('color',$(this).val());
                /*$('.image-display').find('h4').css('color',$(this).val());
                $('.preview-container').find('h1').css('color',$(this).val());
                $('.preview-container').find('h4').css('color',$(this).val());*/
            });
            
            $(document).on('change','select[name="label_font4"]',function(){
                $('.event-date').css('font-family',$(this).val());
                /*$('.preview-container').css('font-family',$(this).val());
                $('.preview-container, .selected-label-background').css('font-family',$(this).val());*/
            });
            
            $(document).on('input','input[name="label_font_color4"]',function(){
                $('.event-date').css('color',$(this).val());
                /*$('.image-display').find('h4').css('color',$(this).val());
                $('.preview-container').find('h1').css('color',$(this).val());
                $('.preview-container').find('h4').css('color',$(this).val());*/
            });
            
            $(document).on('change','select[name="occasions"]',function(){
                // alert($(this).val());
                $('.label-show').html('<div class="col-sm-12"><h3 class="text-center text-info">Please wait...</h3></div>');
                $.ajax({
            		url: '{{url("occasion-get-by-id")}}',
            		type: 'POST',
            		dataType: 'json',
            		data: {_token: $('meta[name="token"]').attr('content'),oca:$(this).val()},
            		success:function(data){
                        // data = JSON.parse(data);
                        // alert(JSON.stringify(data));
                        var asset = '';
                        $.each(data,function(index,value){
                            asset += '<div class="col-sm-3" onclick="clickLabel('+value.id+',this)"> <div class="label-image-container">'+
                                '<span></span>'+
                                '<img src="'+value.label_image+'" class="img-responsive images_'+value.id+'">'+
                                '<h1 class="name-header" style="font-size: 17px;">Jake\'s</h1>'+
                                '<h1 class="event-number" style="font-size: 17px;">5<sup>th</sup></h1>'+
                                '<h1 class="event-name" style="font-size: 17px;">Birthday</h1>'+
                                '<h4 class="event-date" style="font-size: 8px;">{{date('d M Y')}}</h4> </div>'+
                            '</div>';
                        });
                        if(asset == '') 
                            asset = '<div class="col-sm-12"><h3 class="text-center text-danger">Label not found !!</h3></div>';
                        $('.label-show').html(asset);
            		},
            		error:function(xhr,status){
            			
            		}
            	});
            });
            
            $(document).on('input','input[name="line3"]',function(){
                $('.name-header').html($('input[name="name"]').val());
                $('.event-number').html($('input[name="line2"]').val());
                $('.event-name').html($(this).val());
                var date = new Date($('input[name="dob"]').val());
                // var number = today.getFullYear()-date.getFullYear();
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0');
                var yyyy = date.getFullYear();
                // var eventDatw = dd+' '+(monthNames[date.getMonth()])+' '+yyyy;
                var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[date.getMonth()]==undefined?'':(monthNames[date.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));
                $('.event-date').html(eventDatw);
            });
            
            $(document).on('input','input[name="name4"]',function(){
                /*var date = new Date($(this).val());
                var today = new Date();
                var number = today.getFullYear()-date.getFullYear();
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0');
                var yyyy = today.getFullYear();
                var eventDatw = dd+' '+(monthNames[date.getMonth()])+' '+yyyy;
                if(isNaN(number))
                    $('.event-number').html('5<sup>th</sup>');
                else if(number == 1)
                    $('.event-number').html(number+'<sup>st</sup>');
                else if(number == 2)
                    $('.event-number').html(number+'<sup>nd</sup>');
                else if(number == 3)
                    $('.event-number').html(number+'<sup>rd</sup>');
                else
                    $('.event-number').html(number+'<sup>th</sup>');
                $('.event-date').html(eventDatw);*/
                
                $('.name1-head').html($('input[name="name"]').val());
                $('.name2-head').html($('input[name="name2"]').val());
                $('.name3-head').html($('input[name="name3"]').val());
                $('.name4-head').html($(this).val());
                $('.name-header').html($('input[name="name"]').val());
                $('.event-number').html($('input[name="name2"]').val());
                $('.event-name').html($('input[name="name3"]').val());
                var date = new Date($('input[name="dob"]').val());
                // var number = today.getFullYear()-date.getFullYear();
                var dd = String(date.getDate()).padStart(2, '0');
                var mm = String(date.getMonth() + 1).padStart(2, '0');
                var yyyy = date.getFullYear();
                var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[date.getMonth()]==undefined?'':(monthNames[date.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));
                $('.event-date').html($(this).val());
            });
            
            $(document).on('show.bs.modal', '#flavourModal', function (e) {
                $('.total-quantity').html($('.major-qty').val());
                // $('input[name="quantity_flavour"]').attr('max',$('.major-qty').val());
                var total = 0;
                $('input[name="quantity_flavour"]').each(function(index){
                    total += parseInt($('input[name="quantity_flavour"]')[index].value);
                });
                /*var quantitySelected = parseInt($('.total-quantity').html());
                if(total == quantitySelected)
                    $('.submit-item-flavour').removeClass('hidden');
                else
                    $('.submit-item-flavour').addClass('hidden');*/
                $('.items-list-add > tr > td > i.add-child').html('');
                $('.items-list-add > tr > td > i.add-child').css('border','0');
                $('.items-list-add > tr:last-child').find('i.add-child').html('Add more flavors');
                $('.items-list-add > tr:last-child').find('i.add-child').css('border','1px solid #000');
            });
            
            $(document).on('focusin','input[name="quantity_flavour"]', function(){
                $(this).data('val', $(this).val());
            });
            
            $(document).on('change','input[name="quantity_flavour"]',function(){
                /*alert($(this).val())*/
                var prevValue = parseInt($(this).data('val'));
                // alert(prevValue);
                var total = 0;
                var indexAll = 0;
                
                $('input[name="quantity_flavour"]').each(function(index){
                    // alert($('input[name="quantity_flavour"]')[index].value);
                    total += parseInt($('input[name="quantity_flavour"]')[index].value);
                    indexAll = index;
                });
                // submit-item-flavour
                var quantitySelected = parseInt($('.total-quantity').html());
                /*if(total == quantitySelected)
                    $('.submit-item-flavour').removeClass('hidden');
                else
                    $('.submit-item-flavour').addClass('hidden');*/
                if(quantitySelected < total)
                {
                    // alert('You can not add more then min order quantity.');
                    var currentTotal = total - parseInt($(this).val());
                    // $(this).val(prevValue);
                    // currentTotal += prevValue;
                    // $('.total-selected').html(parseInt(currentTotal));
                    /*if(currentTotal == quantitySelected)
                    $('.submit-item-flavour').removeClass('hidden');
                    else
                    $('.submit-item-flavour').addClass('hidden');*/
                    // return;
                    /*var mode = (quantitySelected+total) % 6;
                    $('.total-quantity').text(quantitySelected+(mode*6));*/
                }else{
                    /*var mode = (quantitySelected+total) % 6;
                    $('.total-quantity').text(quantitySelected+(mode*6));*/
                }
                if(total%6 == 0)
                    $('.total-quantity').text(total);
                else if(total > quantitySelected)
                    $('.total-quantity').text(quantitySelected+6);
                $('.total-selected').html(total);
            });
            
            $(document).on('click','.add-item-flavour',function(){
                var total = 0;
                var totalIndex = 0;
                $('input[name="quantity_flavour"]').each(function(index){
                    total += parseInt($('input[name="quantity_flavour"]')[index].value);
                    ++totalIndex;
                });
                total += 1;
                if(total > parseInt($('.total-quantity').html())){
                    alert('You can not add more then min order quantity.');
                    return;
                }
                // alert($('.items-list-add > tr > td > select[name="flavour"] option:selected').length)
                if(totalIndex > ($('.items-list-add > tr:first > td:first > select[name="flavour"] option').length - 1)){
                    alert('We have only '+$('.items-list-add > tr:first > td:first > select[name="flavour"] option').length+' flavours in hand.');
                    return;
                }
                /*var quantitySelected = parseInt($('.total-quantity').html());
                if(total == quantitySelected)
                    $('.submit-item-flavour').removeClass('hidden');
                else
                    $('.submit-item-flavour').addClass('hidden');*/
                var item = '<tr><td><select class="form-control" name="flavour"><option value="Vanila">Vanila</option><option value="Pista">Pista</option><option value="Strawberry">Strawberry</option></select></td><td><input type="number" min="1" value="1" class="form-control" name="quantity_flavour" autocomplete="off"></td><td><i class="add-child add-item-flavour" style="border: 1px solid #000;" title="Add Item" aria-hidden="true"></i><td><i class="fa fa-trash delete-bulk" aria-hidden="true" style="font-size: 25px;cursor: pointer;"></i></td></tr>';
                item = '<tr>'+$('.items-list-add > tr:first-child').html()+'</tr>';
                // alert($('.items-list-add > tr:first-child').html());
                $('.items-list-add').append(item);
                $('input[name="quantity_flavour"]:last').val('1');
                // $('input[name="quantity_flavour"]').attr('max',$('input[name="quantity_flavour"]').attr('max'));
                $('.total-selected').html(total);
                $('.items-list-add > tr > td > i.add-child').html('');
                $('.items-list-add > tr > td > i.add-child').css('border','0');
                $('.items-list-add > tr:last-child').find('i.add-child').html('Add more flavors');
                $('.items-list-add > tr:last-child').find('i.add-child').css('border','1px solid #000');
            });
            
            $(document).on('click','.submit-item-flavour',function(){
                var total = 0;
                $('input[name="quantity_flavour"]').each(function(index){
                    total += parseInt($('input[name="quantity_flavour"]')[index].value);
                });
                var quantitySelected = parseInt($('.total-quantity').html());
                if(total != quantitySelected){
                    alert('Please select correct quantity to add the flavours');
                    return;
                }
                var quantity = '';
                var flavour = '';
                if($('.flavours-quantity-already').length) $('.flavours-quantity-already').remove();
                $('input[name="quantity_flavour"]').each(function(index){
                    quantity += '<input type="hidden" class="flavours-quantity-already" name="flavour_quantity['+$('.items-list-add > tr > td > select[name="flavour"] option:selected')[index].value+']" value="'+($('input[name="quantity_flavour"]')[index].value)+'">';
                    // flavour += '<input type="hidden" name="flavours[]" value="'+($('.items-list-add > tr > td > select[name="flavour"] option:selected')[index].value)+'">';
                });
                $('#cartform').append(quantity);
                $('#cartform').append(flavour);
                $('#flavourModal').modal('hide');
            });
            
            $(document).on('click','.delete-bulk',function(){
                var total = 0;
                var indexAll = 0;
                $('input[name="quantity_flavour"]').each(function(index){
                    total += parseInt($('input[name="quantity_flavour"]')[index].value);
                    ++indexAll;
                });
                if(indexAll == 1){
                    return;
                }
                $(this).closest('tr').remove();
                $('.total-selected').html(total);
                /*var quantitySelected = parseInt($('.total-quantity').html());
                if(total == quantitySelected)
                    $('.submit-item-flavour').removeClass('hidden');
                else
                    $('.submit-item-flavour').addClass('hidden');*/
                $('.items-list-add > tr > td > i.add-child').html('');
                $('.items-list-add > tr > td > i.add-child').css('border','0');
                $('.items-list-add > tr:last-child').find('i.add-child').html('Add more flavors');
                $('.items-list-add > tr:last-child').find('i.add-child').css('border','1px solid #000');
            });
            
            $(document).on('hide.bs.modal', '#customize-design', function (e) {
                $('body').css('overflow', 'auto');
                $('.navigation').css('display', 'block');
            });
            $(document).on('show.bs.modal', '#customize-design', function (e) {
                $('body').css('overflow', 'hidden');
                $('.navigation').css('display', 'none');
                /*if($('#qty').val() < 18)
                    $('#customize-design').modal('hide');*/
                if(sumitLabel == 0){
                    /*$('.contents').addClass('hidden');
                    $('#label_selected').val('');
                    $('.label-image-container').css('border','1px solid #000');
                    $('.label-image-container').removeClass('active-container');
                    $('.label-image-container > span').removeClass('active-container');*/
                    var today = new Date();
                    var dd = String(today.getDate()).padStart(2, '0');
                    var mm = String(today.getMonth() + 1).padStart(2, '0');
                    var yyyy = today.getFullYear();
                    $('input[name="dob"]').val(new Date().toDateInputValue());
                    $('input[name="dob"]').val('');
                    $('input[name="name"]').val("Jake");
                    $('.name-header').html("Jake");
                    $('.name1-head').html("Jake");
                    $('input[name="name2"]').val("0th");
                    $('.event-number').html("0th");
                    $('.name2-head').html("0th");
                    $('input[name="name3"]').val("Birthday");
                    $('.event-name').html("Birthday");
                    $('.name3-head').html("Birthday");
                    var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[today.getMonth()]==undefined?'':(monthNames[today.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));
                    $('input[name="name4"]').val(eventDatw);
                    $('.event-date').html(eventDatw);
                    $('.name4-head').html(eventDatw);
                    $('input[name="label_font_size1"]').trigger("keypress");
                    $('input[name="label_font_size2"]').trigger("keypress");
                    $('input[name="label_font_size3"]').trigger("keypress");
                    $('input[name="label_font_size4"]').trigger("keypress");
                    // $('input[name="dob"]').trigger('input');
                    // $('input[name="name"]').trigger('input');
                    if(sumitLabel == 0){
                        tabsActive('.home-active');
                        $('.label-contents > .tab-pane.fade').removeClass('in active');
                        $('#home').addClass('in active');
                        $('#label_selected').val('');
                        $('.label-image-container').removeClass('active-container');
                        // $('.label-image-container').removeClass('active-label-container');
                        $('.label-image-container').find('span').removeClass('active');
                        // $('.label-image-container').css('border','1px solid #000');
                    }
                }
                sumitLabel = 0;
            });
            
            $(document).on('hide.bs.modal', '#errorShow', function (e) {
                $('.flavours-selected-error-show').html('');
                $('.current-quantity-info').addClass('hidden');
            });
            
            $(document).on('show.bs.modal', '#errorShow', function (e) {
                $('.current-quantity-info').removeClass('hidden');
                var total = 0;
                $('input[name="quantity_flavour"]').each(function(index){
                    total += parseInt($('input[name="quantity_flavour"]')[index].value);
                });
                $('.current-quantity-info').first().text('Currently there is only '+total);
                var selectedItems = $('select[name="flavour"]');
                $('.flavours-selected-error-show').html($('.items-list-add').clone());
                var currentSelector = $('.flavours-selected-error-show').find('select[name="flavour"]');
                $(selectedItems).each(function(i) {
                    var select = this;
                    $('.flavours-selected-error-show').find('select[name="flavour"]').eq(i).val($(select).val());
                });
                $('.flavours-selected-error-show').find('input[name="quantity_flavour"]').attr('disabled',true);
                $('.flavours-selected-error-show').find('input[name="quantity_flavour"]').removeClass('form-control');
                $('.flavours-selected-error-show').find('input[name="quantity_flavour"]').css({
                    'background': 'white',
                    'border': '0',
                    'color': '#000'
                });
                $('.flavours-selected-error-show').find('input[name="quantity_flavour"]').removeAttr('name');
                $('.flavours-selected-error-show').find('select[name="flavour"]').attr('disabled',true);
                $('.flavours-selected-error-show').find('select[name="flavour"]').removeClass('form-control');
                $('.flavours-selected-error-show').find('select[name="flavour"]').css({
                    'border': '0',
                    '-webkit-appearance': 'none',
                    '-moz-appearance': 'none',
                    'text-indent': '1px',
                    'text-overflow': '',
                    'color': '#000'
                });
                $('.flavours-selected-error-show').find('select[name="flavour"]').removeAttr('name');
                $('.flavours-selected-error-show tr > td:last-child').remove();
                $('.flavours-selected-error-show tr > td:last-child').remove();
            });
            
            $('.ps-btn').on('click',function(){
                var attr = $(this).attr('data-dismiss');
                var attr2 = $(this).attr('type');
                if (typeof attr !== typeof undefined && attr !== false && typeof attr2 !== typeof undefined && attr2 !== false) {
                    sumitLabel = 0;
                }
            });
            
            $('.submit-label').click(function(){
                $('#customize-design').modal('hide');
                sumitLabel = 1;
                if($('#form-hidden-elements').length)
                    $('#form-hidden-elements').remove();
                /*if($('#cartform').find('input[name="birthdate"]').length)
                    $('#cartform').find('input[name="birthdate"]').remove();
                if($('#cartform').find('input[name="line2"]').length)
                    $('#cartform').find('input[name="line2"]').remove();
                if($('#cartform').find('input[name="line3"]').length)
                    $('#cartform').find('input[name="line3"]').remove();
                if($('#cartform').find('input[name="labelid"]').length)
                    $('#cartform').find('input[name="labelid"]').remove();
                if($('#cartform').find('select[name="label_font"]').length)
                    $('#cartform').find('select[name="label_font"]').remove();
                if($('#cartform').find('input[name="label_font_color1"]').length)
                    $('#cartform').find('input[name="label_font_color1"]').remove();
                if($('#cartform').find('input[name="label_font_color2"]').length)
                    $('#cartform').find('input[name="label_font_color2"]').remove();
                if($('#cartform').find('input[name="label_font_color3"]').length)
                    $('#cartform').find('input[name="label_font_color3"]').remove();*/
                /*if($('#cartform').find('input[name="qty"]').length)
                        $('#cartform').find('input[name="qty"]').remove();*/
                $('#cartform').append('<div id="form-hidden-elements"></div>');
                if($('.total-quantity').text() != '' && $('.total-quantity').text() != '0')
                    $('#form-hidden-elements').append('<input type="hidden" value="'+$('.total-quantity').text()+'" name="qty" />');
                else if($('#form-hidden-elements').find('input[name="qty"]').length)
                    $('#form-hidden-elements').find('input[name="qty"]').remove();
                var cakename = $('input[name="name"]').val();
                var line2 = $('input[name="name2"]').val();
                var line3 = $('input[name="name3"]').val();
                var dob = $('input[name="name4"]').val();
                var labelid = $('#label_selected').val();
                // var dob = $('input[name="dob"]').val();
                var label_font = $('select[name="label_font1"]').val();
                var label_font_color = $('input[name="label_font_color1"]').val();
                var label_font_size = parseInt($('input[name="label_font_size1"]').val())+40;
                $('#form-hidden-elements').append('<input type="hidden" name="cakename" value="'+cakename+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="name2" value="'+line2+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="name3" value="'+line3+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="name4" value="'+dob+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="labelid" value="'+labelid+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font1" value="'+label_font+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_color1" value="'+label_font_color+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_size1" value="'+label_font_size+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font2" value="'+$('select[name="label_font2"]').val()+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font3" value="'+$('select[name="label_font3"]').val()+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font4" value="'+$('select[name="label_font4"]').val()+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_color2" value="'+$('input[name="label_font_color2"]').val()+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_color3" value="'+$('input[name="label_font_color3"]').val()+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_color4" value="'+$('input[name="label_font_color4"]').val()+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_size2" value="'+(parseInt($('input[name="label_font_size2"]').val())+40)+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_size3" value="'+(parseInt($('input[name="label_font_size3"]').val())+40)+'">');
                $('#form-hidden-elements').append('<input type="hidden" name="label_font_size4" value="'+(parseInt($('input[name="label_font_size4"]').val())+18)+'">');
                // var productQuantity = $('input[name="qty"').val();
                // minimumQuantityAlert(productQuantity < 18);
                    
            });
            
            $(document).on('change','.major-qty',function(){
                // minimumQuantityAlert($(this).val() >= 18);
            });
            
            $('.plus').on('click',function(){
               var p=$('#price_i').val();
                var q=$('#qty').val();
                 //alert(q);
                var m=p*(Number(q)+1);
                var v=m.toFixed(2);
                $('#price').html("$"+v);
                    minimumQuantityAlert(false);
                    setTimeout(function(){
                        minimumQuantityAlert($('input[name="qty"]').val() >= 18);
                    },250);
                
            });
            
            $('.minus').on('click',function(){
                var p=$('#price_i').val();
                var q=$('#qty').val();
                 //alert(q);
                 if(q!=1)
                 {
                var m=p*(Number(q)-1);
                 }
                 else
                 {
                     var m=p*(Number(q));
                 }
                var v=m.toFixed(2);
                $('#price').html("$"+v);
                minimumQuantityAlert(false);
                setTimeout(function(){
                    minimumQuantityAlert($('input[name="qty"]').val() >= 18);
                },250);
                
            });
            
            $('#qty').on('change',function(){
                
                var p=$('#price_i').val();
                var q=$('#qty').val();
                var m=p*q;
                var v=m.toFixed(2);
                //alert(m);
                //getPrice($product->prices->min('amount'))
                $('#price').html("$"+v);
                
            })
            $(document).on('click','.custimize-bs',function(){
                minimumQuantityAlert($('.major-qty').val() >= 18);
            });
            function minimumQuantityAlert(status){
                $('.custimize-bs').removeAttr('href');
                $('.custimize-bs').removeAttr('data-toggle data-target data-backdrop data-keyboard');
                if(status){
                    // $('.minimum-quantity').removeClass('hidden');
                    // $('.submit-order').attr('href','#');
                    // data-toggle="modal" data-target="#customize-design" data-backdrop="static" data-keyboard="false" href="#customize-design"
                    // alert($('.custimize-bs').length);
                    /*$('.custimize-bs').attr('data-toggle','modal').attr('data-target',"#customize-design")
                        .attr('data-backdrop',"static").attr('data-keyboard',"false")
                        .attr('href',"#customize-design");*/
                    // $('.custimize-bs').click();
                    $('#customize-design').modal({backdrop: 'static', keyboard: false});
                    $('.label-error').addClass("hidden");
                }
                else{
                    /*$('.minimum-quantity').removeClass('hidden');
                    $('.minimum-quantity').addClass('hidden');Minimum quantity should be 18
                    $('.submit-order').attr('href',"javascript:$('#cartform').submit();");*/
                    /*$('.custimize-bs').attr('href',"javascript:$('#errorShow').modal('show',{backdrop: 'static', keyboard: false});");
                    $('.custimize-bs').removeAttr('data-toggle data-target data-backdrop data-keyboard');*/
                    $('.label-error').removeClass("hidden");
                    $('#customize-design').modal('hide');
                }
            }
            
            function clickLabel(id,element){
                // $('.label-image-container').css('border','1px solid #000');
                $('.label-image-container').removeClass('active-container');
                $('.label-image-container > span').removeClass('active');
                if(id == $('#label_selected').val()){
                    $('.contents').addClass('hidden');
                    $('#label_selected').val('');
                    $(element).find('.label-image-container').css('border','1px solid #ce6f9b');
                    $(element).find('.label-image-container').removeClass('active-container');
                    $(element).find('.label-image-container > span').removeClass('active');
                    $('.select-first').removeAttr('data-toggle href');
                    $('#home').find('span.error').removeClass('hidden');
                }else{
                    $('.contents').removeClass('hidden');
                    $('.display_image_selected').attr('src',$('.images_'+id).attr("src"))
                    // $('.selected-label-background').css('background-image','url("'+$('.images_'+id).attr("src")+'")');
                    $('.selected-label-background-image').css('background-image','url("'+$('.images_'+id).attr("src")+'")');
                    $('#label_selected').val(id);
                    $(element).find('.label-image-container').css('border','1px solid #ce6f9b');
                    $(element).find('.label-image-container').addClass('active-container');
                    $(element).find('.label-image-container > span').addClass('active');
                    $('#home').find('span.error').addClass('hidden');
                }
            }
            
            function tabsActive(element){
                if(element == '.menu2-active'){
                    var font_size = (3*10+parseInt($('.label-font-size').val()));
                    var percentage = 60;
                    $('.name-header.last').css({fontSize:(font_size-font_size*percentage/100)});
                    font_size = (3*10+parseInt($('.label-font-size2').val()));
                    $('.event-number.last').css({fontSize:(font_size-font_size*percentage/100)});
                    font_size = (3*10+parseInt($('.label-font-size3').val()));
                    $('.event-name.last').css({fontSize:(font_size-font_size*percentage/100)});
                    font_size = (3*10+parseInt($('.label-font-size4').val()));
                    $('.event-date.last').css({fontSize:(font_size-(font_size+22)*percentage/100)});
                    // alert($('#image-display-content'));
                    // console.log($('#image-display-content'));
                    // $('.selected-label-background').append($('#image-display-content'));
                    var node = document.getElementById('image-display-content').innerHTML;
                    // $('.selected-label-background').append(node)
                }
                if(element == '.menu1-active' && $('#label_selected').val() == ''){
                    // alert('Please select a label to customize.');
                    $('.select-first').removeAttr('data-toggle href');
                    $('#home').find('span.error').removeClass('hidden');
                }else{
                    $('ul.main-nav > li').removeClass('active');
                    $(element).addClass('active');
                    $('.select-first').attr('data-toggle','tab').attr('href','#menu1');
                    if(element == '.menu1-active') $('.select-first').click();
                    $('#home').find('span.error').addClass('hidden');
                }
            }
            function minimumFlavourQuantity(){
                var total = $('.total-quantity').html();
                $('input[name="quantity_flavour"]').each(function(index){
                    
                });
            }
            dragElement(document.getElementById("name-header"));
            dragElement(document.getElementById("event-number"));
            dragElement(document.getElementById("event-name"));
            dragElement(document.getElementById("event-date"));
            headLenghtX = 0;headLenghtY = 0;numberLengthX = 0;numberLengthY = 0;birthLengthX = 0;birthLengthY = 0;dateLengthX = 0;dateLengthY = 0;
            function dragElement(elmnt) {
              var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            //   display_image_selected
              if (document.getElementById(elmnt.id + "header")) {
                /* if present, the header is where you move the DIV from:*/
                document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
              } else {
                /* otherwise, move the DIV from anywhere inside the DIV:*/
                elmnt.onmousedown = dragMouseDown;
              }
            
              function dragMouseDown(e) {
                e = e || window.event;
                e.preventDefault();
                // get the mouse cursor position at startup:
                pos3 = e.clientX;
                pos4 = e.clientY;
                document.onmouseup = closeDragElement;
                document.touchleave = closeDragElement;
                document.touchcancel = closeDragElement;
                // call a function whenever the cursor moves:
                document.onmousemove = elementDrag;
                document.touchenter = elementDrag;
                document.touchstart = elementDrag;
              }
            
              function elementDrag(e) {
                e = e || window.event;
                e.preventDefault();
                // calculate the new cursor position:
                pos1 = pos3 - e.clientX;
                pos2 = pos4 - e.clientY;
                pos3 = e.clientX;
                pos4 = e.clientY;
                // console.log(pos1+' : '+pos2+' : '+pos3+' : '+pos4);
                // alert(pos1+' : '+pos2+' : '+pos3+' : '+pos4);
                // set the element's new position:
                elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
                elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
                var percentagePosition = 46.36;
                if(elmnt.id == "name-header"){
                    headLenghtX = (elmnt.offsetTop - pos2);
                    headLenghtY = (elmnt.offsetLeft - pos1);
                    $('.name-header.last').css({top:headLenghtX-headLenghtX*percentagePosition/100,left:headLenghtY});
                }
                if(elmnt.id == "event-number"){
                    numberLengthX = (elmnt.offsetTop - pos2);
                    numberLengthY = (elmnt.offsetLeft - pos1);
                    $('.event-number.last').css({top:numberLengthX-numberLengthX*percentagePosition/100,left:numberLengthY});
                }
                if(elmnt.id == "event-name"){
                    birthLengthX = (elmnt.offsetTop - pos2);
                    birthLengthY = (elmnt.offsetLeft - pos1);
                    $('.event-name.last').css({top:birthLengthX-(birthLengthX*percentagePosition/100),left:birthLengthY});
                }
                if(elmnt.id == "event-date"){
                    dateLengthX = (elmnt.offsetTop - pos2);
                    dateLengthY = (elmnt.offsetLeft - pos1);
                    $('.event-date.last').css({top:dateLengthX-(dateLengthX*(percentagePosition+10)/100),left:dateLengthY});
                }
                console.log(dateLengthX+' : '+dateLengthY+' : '+headLenghtX+' : '+headLenghtY);
              }
            
              function closeDragElement() {
                /* stop moving when mouse button is released:*/
                document.onmouseup = null;
                document.onmousemove = null;
              }
            }
            simulateTouchEvents(document.getElementById("name-header"),false);
            simulateTouchEvents(document.getElementById("event-number"),false);
            simulateTouchEvents(document.getElementById("event-name"),false);
            simulateTouchEvents(document.getElementById("event-date"),false);
            function simulateTouchEvents(oo,bIgnoreChilds)
            {
             if( !$(oo)[0] )
              { return false; }
             if( !window.__touchTypes ) 
             {
               window.__touchTypes  = {touchstart:'mousedown',touchmove:'mousemove',touchend:'mouseup'};
               window.__touchInputs = {INPUT:1,TEXTAREA:1,SELECT:1,OPTION:1,'input':1,'textarea':1,'select':1,'option':1};
             }
            // alert(oo.id);
            $(oo).bind('touchstart touchmove touchend', function(ev)
            {
                var bSame = (ev.target == this);
                if( bIgnoreChilds && !bSame )
                 { return; }
            
                var b = (!bSame && ev.target.__ajqmeclk), // Get if object is already tested or input type
                    e = ev.originalEvent;
                if( b === true || !e.touches || e.touches.length > 1 || !window.__touchTypes[e.type]  )
                 { return; } //allow multi-touch gestures to work
            
                var oEv = ( !bSame && typeof b != 'boolean')?$(ev.target).data('events'):false,
                    b = (!bSame)?(ev.target.__ajqmeclk = oEv?(oEv['click'] || oEv['mousedown'] || oEv['mouseup'] || oEv['mousemove']):false ):false;
            
                if( b || window.__touchInputs[ev.target.tagName] )
                 { return; } //allow default clicks to work (and on inputs)
            
                // https://developer.mozilla.org/en/DOM/event.initMouseEvent for API
                var touch = e.changedTouches[0], newEvent = document.createEvent("MouseEvent");
                newEvent.initMouseEvent(window.__touchTypes[e.type], true, true, window, 1,
                        touch.screenX, touch.screenY,
                        touch.clientX, touch.clientY, false,
                        false, false, false, 0, null);
            
                touch.target.dispatchEvent(newEvent);
                e.preventDefault();
                ev.stopImmediatePropagation();
                ev.stopPropagation();
                ev.preventDefault();
            });
             return true;
            }; 
        </script>
     @endpush