 @extends('fastcheckout/sweetiepie')
 
 
 @push('styles')
 <style>
     
    .fundraiser_banner {
        background: url(/imagesmsp/fundraiser.webp) no-repeat center center;
        min-height:700px;
        background-size:cover;
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
        <div class="container">
        <h2 class="text-center">Sweetie Pie Fundraiser Program Order Form</h2>
        </div>
    </div>
    


<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
      
    <div class="row">
        @if($pies)
        <div class="col-md-2 stickycategorylsts hidden-xs hidden-sm">
            <div class="category_selector">
                <h3>Pies</h3>
                <ul>
                    @foreach($pies as $pie)
                    <li><a href="#{{str_slug($pie->name)}}">{{$pie->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif
        <div class="col-md-10">
            <form action="/fundraiser/pickup-options" method="POST">
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
                                      <img src="images/products/{{$item->picture}}" alt=""/>
                                     @if($item->status==0)<div class="soldoutoverlay"></div>@endif
                                    </div>
                                    <div class="ps-product__content">
                                        <div class="productcontentleft">
                                             @php list($name,$subname)=explode('-',$item->name); $product_id = $item->id; @endphp
                                            <h4>{{$name}}</h4>
                                            <p class="ps-producttype"><span> {{isset($subname) ? $subname:''}} </span></p>
                                            <p class="ps-product__price">{{getPrice($item->prices->min()->amount)}}</p>
                                            <div class="clearfix"></div>
                                       </div>
                                       <div class="form-group--number quantitybox" style="width:220px;text-align:center;margin:0px auto;max-width:100%;">
                                              <button class="minus" style="border-radius: 45px 0 0 45px;"><span>-</span></button>
                                              <input class="form-control major-qty" type="text" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" value="0" name="quantity[{{$product_id}}]" id="qty" readonly>
                                              <button class="plus" style="border-radius:0 45px 45px 0;"><span>+</span></button>
                                              <!--<span class="minimum-quantity hidden" style="text-align: center;color: red; font-size:90%;">Minimum Quantity Should be 18</span>-->
                                        </div>
                                       @if($item->status==0)<p style="color: red;font-size: 15px;">Sold Out</p>@endif
                                       <br>
                                      
                                    </div>
                                </div>
                            </div>
                        
                        @endforeach
                    </div>
                </div>
                
            @endforeach
            
        
            <div class="orderbutton">
                    <button type="submit" class="ps-btn ps-btn--yellow submit-order" style="width:100%;">Proceed To Checkout</button>
            </div>
            </form>
            
            
        </div>
    </div>
      
    

  </div>
</div>


@endsection