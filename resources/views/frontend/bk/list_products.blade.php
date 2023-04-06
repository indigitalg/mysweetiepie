 @extends('layouts/sweetiepie')
 
@push('styles')
 
 <style>
html{
   scroll-behavior: smooth;
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

.category_selector h3 {
    color: #f993c3;
    margin-bottom: 25px;
    text-decoration: underline;
}
.category_selector {
   
    margin-top: 50px;
    padding: 0px;
    margin-bottom:30px;
}
.category_selector li{
    padding:0px;
    list-style:none;
    margin-bottom: 15px;
}
.category_selector li a{
    color: #000;
    font-family: ChunkFive;
    font-size: 120%;
}

.category_selector li a:hover {
    text-decoration: underline;
    color: #f993c3;
}

.category_selector ul{
    list-style: none;
    padding:0px;
    margin:0px;
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
@media only screen and (max-width: 768px) {
 .ps-product.product_outer {
      border-radius:0;
      max-width:100%;
      min-height: auto;
}  
 .ps-product.product_outer.ps-product--horizontal .ps-product__thumbnail{
  float: left;
width: 30%; 
padding-right:7px;
}
.ps-product.product_outer.ps-product--horizontal .ps-product__content{
    width:70%;
    padding-left: 7px;
    text-align: left;
    float: left;
    display:block;
}
.ps-product.product_outer .productcontentleft{
    float:left;
    width:60%;
}

.ps-product.product_outer .ps-producttype p{
    margin-bottom:2px;
}
.form-group--number.quantitybox{
    float:left;
    width:40% !important;
     max-width:100% !important;
}
.ps-product.product_outer{
    margin-bottom:0 !important;
}
.productfull.col-md-3.col-sm-6.col-xs-12{
    padding-left:0;
    padding-right:0;
}
.category_selector {
    width:60%;
    margin-left:auto;
    margin-right:auto;
}
.addtocart_button {
    text-align:center;
}
.addtocart_button button{
    width: 60%;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 30px;

}
.stickycategorylsts{
    position:unset;
}
}
@media only screen and (max-width: 640px) {
.category_selector {
   width:100%;  
}
.addtocart_button button{
 width:100%;    
}
}
@media only screen and (max-width: 480px) {
  .form-group--number.quantitybox{
  float:none;
   width:200px !important;
   max-width:100% !important;
} 
.ps-product.product_outer .productcontentleft{
    float:none;
    width:100%;
}
 .ps-product.product_outer.ps-product--horizontal .ps-product__thumbnail{

width: 40%; 

}
.ps-product.product_outer.ps-product--horizontal .ps-product__content{
    width:60%;

}
}
</style>
 
@endpush
 
 @section('contents')

<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px;  no-repeat cover;">
    <div class="ps-hero__content">
      
    </div>
</div>
 @php 
  if(session()->has('basket_id'))
  $i=1;
  else
  $i=0
 @endphp 
<div class="catgmain">
      <div id="page-category-title" class="top-title">
          <h2 class="text-center">Menu</h2>
      </div>
      <div class="clearfix"></div>
</div>

<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
      
  <div class="categorylist_menu">
    <ul class="row">
        <li class="col-sm-4">
          <a href="#menusectition-title0"> <img src="https://dev.mysweetiepie.ca/images/banners/XhytxKbazRPylmdIP0rajGIgPX3h8g.jpeg" alt=""/> </a>
           <h4><a href="#menusectition-title0">9” Pies</a></h4>
        </li>
        <li class="col-sm-4">
            <a href="#menusectition-title1"><img src="https://dev.mysweetiepie.ca/images/banners/XhytxKbazRPylmdIP0rajGIgPX3h8g.jpeg" alt=""/></a>
            <h4><a href="#menusectition-title1">5” Pies</a></h4>
        </li>
        <li class="col-sm-4">
            <a href="#menusectition-title2"><img src="https://dev.mysweetiepie.ca/images/banners/yFgQ9Q6y1U6s95UVikKMJcE1qJEwky.png" alt=""/></a>
            <h4><a href="#menusectition-title2">Cookies</a></h4>
         </li>
        <li class="col-sm-4">
            <a href="#menusectition-title3"><img src="https://dev.mysweetiepie.ca/images/banners/swsxUWkzsVtTCmmUVOtIHCQXqSPmXa.png" alt=""/></a>
            <h4><a href="#menusectition-title3">Baked Speciality Items</a></h4>
        </li>
        <li class="col-sm-4">
            <a href="#menusectition-title4"><img src="https://dev.mysweetiepie.ca/images/banners/ef3MgPN8DKTRwOS3OiDakGRnRUG41Z.jpeg" alt=""/></a>
            <h4><a href="#menusectition-title4">Crazy Good Cake</a></h4>
        </li>
        <li class="col-sm-4">
            <a href="#menusectition-title5"><img src="https://dev.mysweetiepie.ca/images/banners/IBClRAeu8g1x8WpaDczhdJbwxhD3f7.png" alt=""/></a>
            <h4><a href="#menusectition-title5">Savory Pies</a></h4>
        </li>
        <div class="clearfix"></div>
    </ul>
  </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      <form action="/continue-shopping" method="POST">
      <div class="row">
          <div class="col-sm-2 stickycategorylsts hidden-sm hidden-xs">
             
              <div class="category_selector">
                  <h3> Categories</h3>
                <ul>
                    
                  @foreach($cat as $c)
                   @if(count($c['children'])>0)
                  <li><a href="#{{$c['name']}}">{{$c['name']}}</a></li>
                  @endif
                  @endforeach
                </ul>
              </div>
              <div class="addtocart_button">
                 @if($i==1) <button class="ps-btn ps-btn--yellow submit-order" type="submit" >Checkout</button>@endif
              </div>
              
          </div>
          <div class="col-sm-10">
      

        @csrf
    
<?php   $t=0; ?>
    @foreach($cat as $c)
    @if(count($c['children'])>0)

         
        <div class="ps-section__header" id="{{$c['name']}}">
          <h3 class="ps-section__title" style="color:black;" id="menusectition-title<?php echo $t ?>">{{$c['name']}}</h3>
        </div>
        
        <div class="ps-section__content cookiesoutersection menulistouter" >
         
          <div class="row" class="menu-row">
              @foreach($product as $p)
              @if($p['products']['menu_category_id']==$c['id'])
            <div class="productfull col-md-3 col-sm-6 col-xs-12 @if($p['products']->status==0) soldoutcls @endif">
              <div class="ps-product ps-product--horizontal product_outer">
                <div class="ps-product__thumbnail" style="padding:15px;">
                    <!--<small><small>{{$p['products']->picture}}</small></small>-->
                  <img src="images/products/{{$p['products']->picture}}" alt=""/>
                 @if($p['products']->status==0)<div class="soldoutoverlay"></div>@endif
                </div>
                <div class="ps-product__content">
                     <div class="productcontentleft">
                    @php $pr=explode('-',$p['products']['name']); $product_id = $p['products']['id']; @endphp
                    <h4>@if($i==0) <a href="{{url('products/'.$p['products']['slug'])}}">{{$pr[0]}}</a>@else{{$pr[0]}}@endif</h4>
                    <p class="ps-producttype"><span> @if(count($pr)>1){{$pr[1]}}@endif </span></p>
                  <p class="ps-product__price">{{getPrice($p->amount)}}</p>
                   <div class="clearfix"></div>
                   </div>
                    @if($p['products']->status==0)
                        <p style="color: red;font-size: 15px;">Sold Out</p>
                    @else
                    @if($i==1)
                      <div class="form-group--number quantitybox" style="width:200px;max-width:100%;text-align:center;margin:0px auto;">
                          
                                  <button class="minus" style="border-radius: 45px 0 0 45px;"><span>-</span></button>
                                  <input class="form-control major-qty" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="0" name="quantity[{{$product_id}}]" id="qty" readonly>
                                  <button class="plus" style="border-radius:0 45px 45px 0;"><span>+</span></button>
                                  <!--<span class="minimum-quantity hidden" style="text-align: center;color: red; font-size:90%;">Minimum Quantity Should be 18</span>-->
                                </div>
                    @endif            
                  
                   <br>
                   @endif
                  
                </div>
              </div>
            </div>
            @endif
            @endforeach
            <?php  $t++;  ?>
          </div>
        </div>

    @endif
   
    @endforeach
    <div class="orderbutton">
        @if($i==1)<button type="submit" class="ps-btn ps-btn--yellow submit-order" style="width:100%; margin-bottom: 25px;" >Checkout</button>@endif
   </div>
    

    </div>
    </div>
        </form>
  </div>
</div>


@endsection