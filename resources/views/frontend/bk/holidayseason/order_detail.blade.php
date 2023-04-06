@extends('frontendmsp.holidayseason.layout')

@push('styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,500;0,700;1,500;1,700&display=swap');
</style>
<style>

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
        padding: 25px;
        height: calc(100% - 50px);
    }
    
    #baking-modal iframe {
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
    
    
#form-errors ul li {
    font-size:120%;
    color: #dd0000;
}


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



    .label-show {

        height:320px;

        overflow:auto;

    }

    .label-controls {

        height:320px;

        overflow:auto;

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
        width:84px;


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

        margin: 15px 15px;

        padding: 5px 5px;

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

.label-image-container span.active{

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


.modal-dialogue{
 background-color:#fff;
 border-radius:0px;
 padding:30px 25px;
 border:1px solid #000;
 width:750px;
 max-width: 100%;
 margin:0 auto;
 position: relative;

}
img{
    max-width:100%;
}
.modal-content {
    border-radius:0px;
    padding: 40px;
}
.modal-content img{
    width:275px;
    margin-bottom:5px;
}
.modal h3{
    font-family: 'Lora', cursive;
    font-style: italic;
    font-weight: bold;
    font-size: 42px;
    line-height: 66px;
    color:#000;
    text-align:left;
    padding-right: 15px;
    margin-top:25px;

}
.modalright{
    float: left;
    width:50%;
    box-sizing: border-box;
    text-align: center;

}
.modal h3 span{
    display:block;

    
}
.close {
    position: absolute;
    right: 10px;
    top: 10px;
}
.modalleft{
  float:left;
  width:50%;
  box-sizing: border-box;
}
.modalleft h4{
  font-family: 'Xanh Mono', monospace;
  font-size:30px;
  line-height: 45px;
  color: #767676;
  font-weight: normal;
  text-align:left;
  margin-top: 25px;
}
.modalleft h4 span{
  display:block;
}
.modal p{
 font-family: sans-serif;
 font-size: 16px;
 line-height: 24px;
 color: #767676;
 margin-bottom:15px;
 text-align: center;
 margin-top:0px;
 margin-bottom: 20px;
}
.modal-footer {
    padding-left: 0px;
    padding-right: 0px;
}
.modal-footer button{

    padding-left:15px;
    padding-right:15px;

}

.ps-btn.startcustomize {
    float: right;
    margin-right:70px;
}
@media screen and (max-width: 780px) {
  .modal{
    width:90%;
}
.modal h3{
    margin-top:0;
    margin-bottom:20px;
}
.modal h4{
    margin-top:5px;
    margin-bottom:10px;

}
.ps-btn.startcustomize{
    margin-right:0;
}
}
@media screen and (max-width: 640px) {
  .modal h3{
    font-size: 35px;
    line-height: 53px;
}
.modal h3 span{
   display: inline;
}
.modalleft h4{
   font-size: 35px;
   line-height: 40px;
}
.modalleft h4 span {
    display: inline;
}
}
@media screen and (max-width: 480px) {
  .modalleft {
    float: none;
    width: auto;
    text-align: center;
}
.modalright {
    float: none;
    width: auto;
}
.modal h3{
  padding-right:0;
}
}

@media (max-width: 576px) {

ul#date-select {
    display: none;
}

}


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

@endpush

@section('contents')

<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
   <div class="ps-hero__content">
   </div>
</div>
<div class="catgmain">
   <div id="page-category-title" class="top-title">
      <h2 class="text-center">Product Details</h2>
   </div>
   <div class="clearfix"></div>
</div>
<main class="ps-main">
   <div class="ps-container">
      <div class="ps-product--detail">
        <form class="ps-form--shopping" action="/holidayseason/add-cart" method="post" id="cartform">
         <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            
               @php $grandtot = 0; @endphp
            
               @foreach($products as $item)
               <div class="row productfull ps-product ps-product--horizontal product_outer">
               
                  <div class="col-md-2 col-xs-4" >
                     <div class="ps-product__detail" style="padding:15px;">
                        <img src="/images/products/{{$item->picture}}" alt="" style="max-width:100%; width:100%; height:auto;"/>
                        
                     </div>
                  </div>
                  <div class="col-md-5 col-sm-4 col-xs-8" >
                     <div class="ps-product__detail" style="text-align:left; padding-top: 25px;">
                        <div class="productcontentleft">
                           @php $names =explode('-',$item->name); $product_id = $item->id; @endphp
                           <h4>{{$names[0]}}</h4>
                           <p class="ps-producttype"><span> {{$names[1] ?? ''}} </span></p>
                           <p class="rate" data-rate="{{$item->prices->min()->amount}}">@ {{getPrice($item->prices->min()->amount)}}</p>
                           <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                 
                  <div class="col-md-3 col-sm-12" >
                     <div class="ps-product__detail" style="text-align:left; padding:0px; padding-top: 25px;">
                        <div class="form-group--number quantitybox" style="width:130px !important;text-align:center;margin:0px auto;max-width:100%;">
                           <button class="minus" style="border-radius: 25px 0 0 25px;float:left;"><span>-</span></button>
                           <input class="form-control major-qty" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="{{$prodqty[$item->id]}}" name="quantity[{{$product_id}}]" id="qty" readonly style="width:50px;float:left">
                           <button class="plus" style="border-radius:0 25px 25px 0;float:left"><span>+</span></button>

                            <div class="clearfix"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2 col-sm-12" >
                     <div class="ps-product__detail" style="text-align:center; padding-top: 25px;padding-right:25px;margin-bottom: 25px;">
                        <span class="total" style="font-weight:bold;">{{getPrice($item->prices->min()->amount*$prodqty[$item->id])}}</span>
                        @php $grandtot += $item->prices->min()->amount*$prodqty[$item->id]; @endphp
                        <div class="clearfix"></div>
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </div>
               @endforeach
               
               <div class="row ps-cart__actions">
                   <div class="col-sm-6">
                      <div class="row">
                         <div class="col-sm-6 mobile-center">
                            <div class="ps-form--icon"><i class="fa fa-angle-right" onclick="$('.promocode-form').submit()"></i>
                               <input class="form-control" value="{{session('coupon')}}" type="text" name="coupon" placeholder="Promo Code" style="border-radius:40px;">
                            </div>
                         </div>
                         <div class="col-sm-6 mobile-center">
                           
                            <!--<a href="{{url('/search')}}">--><!--</a>-->
                            <span class="text-center" style="width: 100%;display: inline-block;color: red;">{{session('couponError')}}</span>
                            <span class="text-center" style="width: 100%;display: inline-block;color: green;">{{session('couponSuccess')}}</span>
                         </div>
                      </div>
                   </div>
                   <div class="col-sm-6 text-right mobile-center">
                      <div style="text-align:right; padding-right:25px;" id="grandtotal">
                           Grand Total: &nbsp; <strong>{{getPrice($grandtot)}}</strong>
                       </div>
                   </div>
                </div>
               
               
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
               <div class="ps-product__info">
                  @php $givediscount = discountAvailable(); @endphp
                  <div class="ps-product__shopping" style="padding-top:0px;">
                     
                        @csrf
                        <input type="hidden" value="11" name="shipping_id">
                        <div class="row">
                           @if(session('shippingType') != 'pickup')
                           <div class="col-sm-6 form-group">
                              <label class="form-label">Delivery Postal Code</label>
                              <input type="text" class="form-control" name="postalcode" placeholder="Postal Code" style="border-radius:40px">
                              @if($errors->first('postalcode')!='')
                              <span style="color:Red;font-size:90%" >A valid postal code required</span>
                              @endif
                           </div>
                           @else
                           <?php   $pickup_points = array('harbord' => '326, Harbord St', 'queen-street' => '654 Queen street west', 'unionville' => '190 Main St Unionville, Markham', 'danforth' => '563 Danforth Ave, Toronto', 'distillery' => '');  ?>
                           @php
                           if($selected_store = $stores->where('store_code',session('cityIdSet'))->first()) {
                           $store_address = $selected_store->address. ' '. $selected_store->postalcode;
                           }
                           else {
                           $store_address = '';
                           }
                           @endphp
                           <div class="col-sm-12 form-group">
                              <label class="form-label">Pickup From</label>
                              <input type="text" class="form-control" name="cityname" value="{{strtoupper($store_address)}}" readonly placeholder="City" style="border-radius:40px">
                           </div>
                           @endif
                           @if(session('shippingType') != 'pickup')
                           @endif
                           <div class="col-sm-6 form-group">
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
                                          {!!getCalendar(date('n'),date('Y'),11)!!}
                                       </div>
                                       <div class="more-dates" id="more-dates2">
                                          <div class="month">
                                             <h3>{{date('F Y',strtotime('first day of +1 month'))}}</h3>
                                             {!!getCalendar(date('n',strtotime('first day of +1 month')),date('Y',strtotime('first day of +1 month')),11)!!}
                                          </div>
                                       </div>
                                       <a href="#" class="show-more-dates" data-target="more-dates2">More dates</a>
                                    </div>
                                    @endif
                                 </div>
                                 <input type="hidden" name="delivery_date" id="delivery_date" value="{{old('delivery_date')}}">
                                 <input type="hidden" name="customize_label" value="no" id="customize_label"/>
                                 @if($errors->first('delivery_date') != '')
                                 <span style="color:red;font-size:90%;">@if(session('shippingType') == 'pickup')<label>Pick Up Date</label>@else <label>Delivery Date</label> @endif required</span>
                                 @endif
                              </div>
                           </div>
                           @if(session('shippingType') == 'pickup')
                           <div class="col-sm-6 form-group" id="pickuptime">
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
                                    <a href="#" class="boxdate" onclick="changePickupDate(event, '{{date('Y-m-d',strtotime($day['day']))}}', '{{date('D d M',strtotime($day['day']))}}', '{{$day['open']}}', '{{$day['close']}}')" 
                                       id="boxdate-{{date('Y-m-d',strtotime($day['day']))}}" data-date="{{date('Y-m-d',strtotime($day['day']))}}" data-display-date="{{date('l dS M',strtotime($day['day']))}}" onclick="changeDate(event,'{{date('Y-m-d',strtotime($day['day']))}}','{{date('D d M',strtotime($day['day']))}}');">
                                       <div class="d-day">{{date('Y-m-d') == $day['day'] ? 'Today':date('D',strtotime($day['day']))}}</div>
                                       <div class="monthname">{{date('d M',strtotime($day['day']))}}</div>
                                    </a>
                                 </li>
                                 @endforeach
                                 @else
                                 <?php $days = getNearestDates(11,5); ?>
                                 @foreach($days as $day)
                                 <li class="d-date">
                                    <a href="#" class="boxdate"  
                                       id="boxdate-{{date('Y-m-d',strtotime($day))}}" data-date="{{date('Y-m-d',strtotime($day))}}" data-display-date="{{date('l dS M',strtotime($day))}}" onclick="changeDate(event,'{{date('Y-m-d',strtotime($day))}}','{{date('D d M',strtotime($day))}}');">
                                       <div class="d-day">{{date('Y-m-d') == $day ? 'Today':date('D',strtotime($day))}}</div>
                                       <div class="monthname">{{date('d M',strtotime($day))}}</div>
                                    </a>
                                 </li>
                                 @endforeach
                                 @endif
                              </ul>
                           </div>
                           <div class="clearfix"></div>
                           <input type="hidden" name="delivery_type" value="{{session('shippingType')}}" />
                           <input type="hidden" name="delivery_city" value="{{session('cityIdSet')}}" />
                           <input type="hidden" name="delivery_time" value="" id="delivery_time" />
                           <div class="ps-product__sharing col-sm-12" style="text-align: center;">
                              <button class="ps-btn ps-btn--yellow submit-order" style="float: none;width:100%;" type="button" id="orderNow">Order Now</button>
                           </div>
                        </div>
                  </div>
                  
               </div>
               <!--</form>-->
            </div>
         </div>
         </form>
      </div>
   </div>
   </div>
</main>
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
               <a href="#">Harbord</a> &nbsp; <a href="#">Cartwright</a> &nbsp; <a href="#">Unionville</a>
            </div>
         </div>
         <div class="modal-footer">
         </div>
      </div>
   </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="customize-option">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true" style="font-size:200%;">&times;</span>
         </button>
         <div class="modalleft">
            <h3 class="modal-title text-center" style="margin-top:40px;">Customize Your<br/>Cake Jars</h3>
         </div>
         <div class="modalright">
            <img src="/img/jar.jpg" alt="image"/>
         </div>
         <br/><br/>
         <p>Make every occassion extra special with adding a custom label to an already perfect sweet treat. With a few quick easy steps your next occassion will be one to remember</p>
         <div class="clear" style="clear:both;"></div>
         <div class="modal-footer" style="padding-bottom:0px;margin-top: 25px;border-top:none;">
            <button type="button" class="ps-btn pull-left" id="no-customization">Continue to checkout</button>
            <button type="button" class="ps-btn pull-right ps-btn--yellow submit-order" id="yes-customization">Start Customizing</button>
            <!--  <button type="button" class="ps-btn" id="no-customization">No</button>
               <button type="button" class="ps-btn ps-btn--yellow submit-order" id="yes-customization">Yes</button> -->
         </div>
      </div>
   </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="cart-confirm" style="margin-left:auto;margin-right:auto;">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
            <h3 style="padding: 50px 15px; text-align:center;">Thank you<br/> Your items have been added to the cart</h3>
         </div>
         <div class="modal-footer text-center" style="text-align: center !important;">
            <a href="{{url('/continue-shopping')}}" style="margin-bottom:15px;display:inline-block;"><button type="button" class="ps-btn" >Continue Shopping</button></a> &nbsp; 
            <a href="{{url('/shop/checkout')}}" style="margin-bottom:15px;display:inline-block;"><button type="button" class="ps-btn ps-btn--yellow submit-order">Proceed to Checkout</button></a>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="form-error" style="margin-left:auto;margin-right:auto;">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 style="text-align:center;">Can't add to cart!</h3>
         </div>
         <div class="modal-body">
            <div id="form-errors">
            </div>
         </div>
         <div class="modal-footer text-center">&nbsp;</div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div id="baking-modal" style="display: none;">
   <div id="iframe-wrapper">
      <div class="baking-close"><small>Close</small> <i class="fa fa-close"></i></div>
      <iframe id="frame"></iframe>
   </div>
</div>

@endsection

@push('scripts')

<!--<canvas id="canvas"></canvas>-->

<script>

    $(function(){
        
        $('#bakinginfo-button').click(function(e){
            e.preventDefault();
            $("#baking-modal").fadeIn(500);
            $("#frame").attr("src", "/downloads/baking_instructions.pdf");
        }); 
        
        $(".baking-close").click(function(e){
            $("#baking-modal").fadeOut(500);
        })

        $("#cartform").submit(function(e){
            e.preventDefault();

            $.ajax({
             type: "POST",
             url: $("#cartform").attr("action"),
                       data: $('#cartform').serialize(), // serializes the form's elements.
                       success: function(data)
                       {
                            if(data.status=='success') {
                                $("#cart-confirm").modal('show');
                            }
                            else if(data.status=='mismatch') {
                                $("#form-error").modal("show");
                                $("#form-errors").html('<p style="text-align:center;font-size:130%;">'+data.message+'</p>');
                            }
                            else {
                                /*window.location.href = data.redirect*/
                            }
                            console.log(data); // show response from the php script.
                       },
                       error: function(data) 
                       {
                           $("#form-error").modal("show");
                           
                           let errtext = '<ul>';
                           let errs = data.responseJSON.errors;
                           
                           if(errs != '') {
                               $.each(errs, function(idex, er) {
                                   errtext += '<li>'+er[0]+"</li>\n";
                               })
                           }
                           
                           $("#form-errors").html(errtext+'</ul>');
                        }
                 });

        });


        $("#orderNow").click(function(e){
            e.preventDefault();
            var qty = $("#qty").val();

           
            $("#cartform").submit();

        })

        $("#yes-customization").click(function(){

            $("#customize_label").val("yes");
            $("#cartform").submit();
        })

        $("#no-customization").click(function(){
            $("#cartform").submit();
        })


        $('.image-display > h1').css('font-size',40);

        $(document).on('change','.label-font-size',function(e){

            e.preventDefault();

            $('.name-header').css({ fontSize: parseInt($(this).val())+40 });

        });

        $(document).on('change','.label-font-size2',function(e){

            e.preventDefault();

            $('.event-number').css({ fontSize: parseInt($(this).val())+40 });

        });

        $(document).on('change','.label-font-size3',function(e){

            e.preventDefault();

            $('.event-name').css({ fontSize: parseInt($(this).val())+40 });

        });

        $(document).on('change','.label-font-size4',function(e){

            e.preventDefault();

            $('.event-date').css({ fontSize: parseInt($(this).val())+18 });

        });

        $('.product-flavour-cb').tooltip();

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

    var sdate = new Date(start); //get a date object
    var edate = new Date(end);
    //d.setHours(0,0,0,0); //reassign it to today's midnight

    var date = sdate.getDate();
    var timeArr = [];

    while (edate.getTime() >= sdate.getTime())
    {
       var hours = sdate.getHours();
       var minutes = sdate.getMinutes();
       hours = hours == 0 ? 12: hours; //if it is 0, then make it 12
       var ampm = "am";
       ampm = hours > 11 ? "pm": "am";
       hours = hours > 12 ? hours - 12: hours; //if more than 12, reduce 12 and set am/pm flag
       hours = ( "0" + hours ).slice(-2); //pad with 0
       minute = ( "0" + sdate.getMinutes() ).slice(-2); //pad with 0
       timeArr.push( hours + ":" + minute + " " + ampm );
       sdate.setMinutes( sdate.getMinutes() + 15); //increment by 5 minutes
    }

    var options = '';

    timeArr.forEach(function(val){
        options += '<option value="'+val+'">'+val+'</option>';
    });


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

                            asset += '<div class="col-sm-3 label-image-container" onclick="clickLabel('+value.id+',this)">'+

                            '<span></span>'+

                            '<img src="'+value.label_image+'" class="img-responsive images_'+value.id+'">'+

                            '<h1 class="name-header" style="font-size: 17px;">Jake\'s</h1>'+

                            '<h1 class="event-number" style="font-size: 17px;">5<sup>th</sup></h1>'+

                            '<h1 class="event-name" style="font-size: 17px;">Birthday</h1>'+

                            '<h4 class="event-date" style="font-size: 8px;">{{date('d M Y')}}</h4>'+

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

                    $('input[name="name2"]').val("0th");

                    $('.event-number').html("0th");

                    $('input[name="name3"]').val("Birthday");

                    $('.event-name').html("Birthday");

                    var eventDatw = (isNaN(dd)?'':(dd==undefined)?'':dd+' ')+(monthNames[today.getMonth()]==undefined?'':(monthNames[today.getMonth()])+' ')+(isNaN(yyyy)?'':(yyyy==undefined?'':yyyy));

                    $('input[name="name4"]').val(eventDatw);

                    $('.event-date').html(eventDatw);

                    // $('input[name="dob"]').trigger('input');

                    // $('input[name="name"]').trigger('input');

                    if(sumitLabel == 0){

                        tabsActive('.home-active');

                        $('.label-contents > .tab-pane.fade').removeClass('in active');

                        $('#home').addClass('in active');

                        $('#label_selected').val('');

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

            var label_font = $('select[name="label_font1"]').val();

            var label_font_color = $('input[name="label_font_color1"]').val();

            var label_font_size = parseInt($('select[name="label_font_size1"]').val())+40;

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

            $('#form-hidden-elements').append('<input type="hidden" name="label_font_size2" value="'+(parseInt($('select[name="label_font_size2"]').val())+40)+'">');

            $('#form-hidden-elements').append('<input type="hidden" name="label_font_size3" value="'+(parseInt($('select[name="label_font_size3"]').val())+40)+'">');

            $('#form-hidden-elements').append('<input type="hidden" name="label_font_size4" value="'+(parseInt($('select[name="label_font_size4"]').val())+18)+'">');

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

                // alert(p);

                var q=$('#qty').val();

                var m=p*q;

                var v=m.toFixed(2);

                

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

                $('.label-image-container').removeClass('active-container');

                $('.label-image-container > span').removeClass('active');

                if(id == $('#label_selected').val()){

                    $('.contents').addClass('hidden');

                    $('#label_selected').val('');

                    $(element).css('border','1px solid #ce6f9b');

                    $(element).removeClass('active-container');

                    $(element).find('span').removeClass('active');

                    $('.select-first').removeAttr('data-toggle href');

                    $('#home').find('span.error').removeClass('hidden');

                }else{

                    $('.contents').removeClass('hidden');

                    $('.display_image_selected').attr('src',$('.images_'+id).attr("src"))

                    $('.selected-label-background-image').css('background-image','url("'+$('.images_'+id).attr("src")+'")');

                    $('#label_selected').val(id);

                    $(element).css('border','1px solid #ce6f9b');

                    $(element).addClass('active-container');

                    $(element).find('span').addClass('active');

                    $('#home').find('span.error').addClass('hidden');

                }

            }

            

            function tabsActive(element){

            	if(element == '.menu2-active'){

                    $('.name-header.last').css({fontSize:(17+parseInt($('.label-font-size').val()))});

                    $('.event-number.last').css({fontSize:(17+parseInt($('.label-font-size2').val()))});

                    $('.event-name.last').css({fontSize:(17+parseInt($('.label-font-size3').val()))});

                    $('.event-date.last').css({fontSize:(8+parseInt($('.label-font-size4').val()))});

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

        </script>

        @endpush