@extends('frontendmsp.holidayseason.layout')
 
 @push('styles')
 <style>
     
    .fundraiser_banner {
        /*/background: url(/imagesmsp/Pie_drive.jpg) no-repeat center center;
        min-height:700px;
        background-size:cover;*/
    }
    
    .fundraiser_banner img {
        width:100%;
        height:auto;
    }
     
     
    .orderbutton {
        margin-bottom: 30px;
    }
     
     .form-group--number.quantitybox input.form-control{
    float:left;
    max-width:calc(100% - 80px);
}
.form-group--number.quantitybox button{
      float:left;  
}  
.orderbutton{
    margin-bottom:60px;
    text-align:right;
}
.orderbutton button{
    padding-top:11px;
    padding-bottom:9px;
}
.category_selector {
    padding: 0px;
    margin-top: 50px;
    margin-bottom:30px;
}

.category_selector h3 {
    color: #f993c3;
    text-decoration:underline;
    margin-bottom: 25px;
}


.category_selector ul {
    list-style:none;
    padding:0px;
    margin:0px;
}

.category_selector li{
    padding:0px;
    list-style:none;
    margin-bottom: 15px;
    
}
.category_selector li a{
    color: #000;
    font-size: 130%;
    font-family:ChunkFive;
}

.category_selector li a:hover {
    color: #f993c3;
    text-decoration: underline;
}



.addtocart_button button{
    width:90%;
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 11px;
    padding-bottom: 9px;
}
.stickycategorylsts{
    position:sticky;
    top:20px;
}
@media only screen and (max-width: 992px) {
 .category_selector{
     width:100%;
 }   
 .addtocart_button button{
      width:100%;
 }
}    
     
 </style>
 
 @endpush
 
 @section('contents')


<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px;">
      <div class="ps-hero__content">
        
      </div>
  </div>
    
    <div class="catgmain fundraiser_banner">
        <img src="/imagesmsp/HolidayBanner.jpg" alt="Sweetie Pie Holiday Season" title="Sweetie Pie Holiday Season" />
        <!--<div class="container">
        <h2 class="text-center">Sweetie Pie Fundraiser Program Order Form</h2>
        </div>//-->
    </div>
    


<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
      
    <div class="row" id="holiday-categories">
        
        <div class="col-md-12">
            <h2>Select from our wide variety of treats</h2>
        </div>
        
        <div class="col-md-3 cat_box">
            <a href="/holidayseason/shop?category=Pies#{{str_slug('Pies')}}"><img src="/imagesmsp/cat_pies.jpg" /></a>
            <h3><a href="/holidayseason/shop?category=Pies#{{str_slug('Pies')}}">Pies</a></h3>
        </div>
        <div class="col-md-3 cat_box">
            <a href="/holidayseason/shop?category=Baked-Speciality-Items#{{str_slug('Baked Speciality Items')}}"><img src="/imagesmsp/cat_baked.jpg" /></a>
            <h3><a href="/holidayseason/shop?category=Baked-Speciality-Items#{{str_slug('Baked Speciality Items')}}">Baked specialty items</a></h3>
        </div>
        <div class="col-md-3 cat_box">
            <a href="/holidayseason/shop?category=Gift-Cards#{{str_slug('Gift Cards')}}"><img src="/imagesmsp/cat_giftcards.jpg" /></a>
            
            <h3><a href="/holidayseason/shop?category=Gift-Cards#{{str_slug('Gift Cards')}}">Gift Cards</a></h3>
        </div>
        <div class="col-md-3 cat_box">
            <a href="/holidayseason/shop?category=Gift-Boxes#{{str_slug('Gift Boxes')}}"><img src="/imagesmsp/cat_giftbox.jpg" /></a>
            <h3><a href="/holidayseason/shop?category=Gift-Boxes#{{str_slug('Gift Boxes')}}">Gift Boxes</a></h3>
        </div>
        
        <div class="col-md-12">
            <p><!--<a href="/holidayseason/shop" id="holiday-order-button">Place your holiday order now</a>//--></p>
        </div>
    </div>
      
    
      
    

  </div>
</div>


@endsection