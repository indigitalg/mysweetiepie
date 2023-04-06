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
    width:100%;
}
.stickycategorylsts{
    position:sticky;
    top:20px;
}
.sticky_orderbutton.orderbutton {
    margin-bottom: 0px;
    position: sticky;
    bottom: 0px;
    left: 0;
    right: 0;
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
    
    <div class="catgmain">
      <div id="page-category-title" class="top-title">
          <h2 class="text-center">Holiday Menu</h2>
      </div>
      <div class="clearfix"></div>
</div>
    


<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
      <form action="/holidayseason/shop/options" method="POST">
    <div class="row">
        @if($categories)
        <div class="col-md-2 stickycategorylsts hidden-xs hidden-sm">
            
            <div class="category_selector">
                <h3>Menu</h3>
                <ul>
                    @foreach($categories as $categ)
                    <li><a href="#{{str_slug($categ->name)}}">{{$categ->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="addtocart_button" style="font-family:ChunkFive; font-size:110%; text-transform: none; margin-bottom: 15px;">
                 <button class="ps-btn ps-btn--yellow submit-order hidden-xs" type="submit" style="font-size:120%;padding: 10px 15px;" >Checkout</button>
            </div>
            
            
        </div>
        @endif
        
        
        <div class="col-md-10">
            
            @csrf
            
            
            @foreach($pies as $pie) 
                <div class="ps-section__header">
                  <h3 class="ps-section__title" style="color:black;" id="{{str_slug($pie->name)}}">{{$pie->name}}</h3>
                </div>
                
                <div class="ps-section__content cookiesoutersection menulistouter">
                    <div class="row" class="menu-row">
                        @foreach($pie->children as $item)
                            
                            <div class="productfull col-md-3 col-sm-6 col-xs-12 @if($item->status==0) soldoutcls @endif" >
                                <div class="ps-product ps-product--horizontal product_outer">
                                    <div class="ps-product__thumbnail" style="padding:15px;">
                                      <img src="/images/products/{{$item->picture}}" alt=""/>
                                     @if($item->status==0)<div class="soldoutoverlay"></div>@endif
                                    </div>
                                    <div class="ps-product__content">
                                        <div class="productcontentleft">
                                             @php $names =explode('-',$item->name); $product_id = $item->id; @endphp
                                            <h4>{{$names[0]}}</h4>
                                            <p class="ps-producttype"><span> {{$names[1] ?? ''}} </span></p>
                                            <p class="ps-product__price">{{getPrice($item->prices->min()->amount)}}</p>
                                            <div class="clearfix"></div>
                                       </div>
                                       @if($item->status==0)
                                            <p style="color: red;font-size: 15px;">Sold Out</p>
                                       @else
                                            <div class="form-group--number quantitybox" style="width:220px;text-align:center;margin:0px auto;max-width:100%;">
                                                  <button class="minus" style="border-radius: 45px 0 0 45px;"><span>-</span></button>
                                                  <input class="form-control major-qty" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="0" name="quantity[{{$product_id}}]" id="qty" readonly>
                                                  <button class="plus" style="border-radius:0 45px 45px 0;"><span>+</span></button>
                                                  <!--<span class="minimum-quantity hidden" style="text-align: center;color: red; font-size:90%;">Minimum Quantity Should be 18</span>-->
                                            </div>
                                       @endif
                                       
                                       
                                       <br>
                                      
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                    </div>
                </div>
                
            @endforeach
            
        
            <div class="sticky_orderbutton orderbutton visible-xs" style="margin:0px;padding:5px;padding-bottom:0px;background:#FFF;">
                    <button type="submit" class="ps-btn ps-btn--yellow submit-order" style="width:100%;">Proceed To Checkout</button>
            </div>
            
            
            
        </div>
        </form>
    </div>
    

  </div>
</div>


@endsection