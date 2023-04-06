 @extends('layouts/sweetiepie')
 @section('contents')
<style>
html{
   scroll-behavior: smooth;
}
.orderbutton_mobile{
    background-color:#f993c3;
    color:#fff;
    position: fixed;
     bottom: 0px;
     width:100%;
     padding:15px;
     text-align:center;
} 
.orderbutton_mobile a{
    color:#000;
    text-transform: uppercase;
    font-size: 19px;
    font-family: 'ChunkFive';
    word-wrap: break-word;
    margin-top: 4px;
    display: block;
}

#category_icons {
    margin: 0px;
    padding:0px;
    list-style: none;
    overflow:hidden;
}

#category_icons li {
    list-style: none;
    text-align:center;
    margin-bottom: 20px;
    
}

#category_icons li img {
    max-height: 100px;
    width:auto;
}


@media only screen and (max-width: 640px) {
  .orderbutton_mobile{
      display:block !important;
  }
}

</style>
<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
    <div class="ps-hero__content">
              
    </div>
</div>
  
<div class="catgmain">
      <img src="/imagesmsp/PieDrive_MedicAlert.jpg" style="max-width:100%;height:auto;" />
      <div class="clearfix"></div>
</div>

<div class="ps-home-product ps-menu-product bg--cover" data-background="">
  <div class="ps-container">
  
  
  
         
        <div class="ps-section__header">
          <!--<h3 class="ps-section__title" style="color:black;" id="menusectition-title">Medicalert</h3>-->
        </div>
        

        
        <div class="ps-section__content cookiesoutersection menulistouter">
         
          <div class="row" class="menu-row">
               
               
            @foreach($product as $p)
            @if($p['products']['menu_category_id']==1 || $p['products']['menu_category_id']==7)
            
            <div class="productfull col-md-3 col-sm-6 col-xs-12 @if($p['products']->status==0) soldoutcls @endif">
                
              <div class="ps-product ps-product--horizontal product_outer">
                 
                <div class="ps-product__thumbnail" style="padding:15px;">
                  <img src="images/products/{{$p['products']->picture}}" alt=""/><a class="ps-product__overlay" href="{{ url('products/'.$p['products']['slug']) }}"></a>
                 @if($p['products']->status==0)<div class="soldoutoverlay"></div>@endif
                </div>
                <div class="ps-product__content">
                    @php $pr=explode('-',$p['products']['name']);@endphp
                    <h4><a class="ps-product__title" href="{{ url('products/'.$p['products']['slug']) }}">{{$pr[0]}}</a></h4>
                    <p class="ps-producttype"><span> @if(count($pr)>1){{$pr[1]}}@endif </span></p>
                    @if(isset($p['products']['nutrition']) && $p['products']['nutrition'] != '' )
                        <div class="nutrient_details"><a href="#" class="nutrientinfo" data-pic="/images/nutrition_info/{{$p['products']->nutrition}}"><img src="/images/nutrition_info/nutrients_icon.png" alt="nutrients_info"/></a></div>
                    @endif
                  <p class="ps-product__price">{{getPrice($p->amount)}}</p>
                   @if($p['products']->status==0)<p style="color: red;font-size: 15px;">Sold Out</p>@endif
                </div>
              </div>
            </div>
              
            @endif
            @endforeach
            

            
          </div>
        </div>


  </div>
</div>



<div style="height:100px;">&nbsp;</div>
@endsection
@section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Add to Cart</a>
</div>
@endsection