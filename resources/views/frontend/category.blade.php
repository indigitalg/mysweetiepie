<?php session_start();?>
@extends('layouts/sweetiepie')
@section('contents')
  <div class="ps-hero bg--cover" style="height:130px !important;min-height:0px;">
      <div class="ps-hero__content">
        
      </div>
  </div>
    
    <div class="catgmain category_banner" style="background-image:url(/assets/images/category_background.jpg); background-size:cover;">
        <h2>{!! $category->name !!}</h2>
        <div class="clearfix"></div>
    </div>
    
    <main class="ps-shop catgmain categoryfull_list">
        
    
      <div class="col-sm-12">
      <div class="ps-shop__wrapper">
          
          @if(isset($products) && count($products)>0)
            <form action="{{url()->current()}}" method="POST" id="sort">
             
            </form>
            
          @endif
        
        <div class="ps-row" style="position:relative;">
           
            <div class="col-sm-3 col-md-2 categorysidebar_left">
                 <form action="{{url('/category')}}" method="post">
                @csrf()
                <div class="categorylisting_sidebar">
                    <h4 class="toggle-category-listing category_title">CATEGORIES</h4>
                    <div id="sidebar-category-listing">
                      @foreach($categories as $category1)
                      @if($category1->status > 0)
                      <p><u>
                          <a href="{{url('category/'.$category1->slug)}}">{{$category1->name}}</a>
                      </u>
                      </p>
                      <ul>
                      @if(count($category1->children)>0)
                      @foreach($category1->children as $child)
                        <li><a href="{{url('category/'.$child->slug)}}">{{$child->name}}</li>
                      </p>
                      @endforeach
                      @endif
                      </ul>
                      @endif
                      @endforeach
                    </div>
                 </div>
                 <div class="menubutton">
                    <a href="{{url('menu')}}">View Our <br/> <span> Menu </span></a> 
                 </div>
                 <p></p>
               </form>   
            </div>
           
            <div class="col-sm-9 col-md-10">
                
              
                <div class="category_breadcrumb">
                   <p> <a href="#">PIES</a>  >
                   <!--<a href="#">SWEETIE PIES</a>  >  -->
                   <a href="#">{!! $category->name !!}</a></p>
                </div>
                 <div class="category_description">
                     <p>{!! $category->description != '' && $category->description != 'null' ? $category->description:'' !!}</p>
                  </div>
                <div class="clearfix"></div>
                 <div class="categoryboxes_outer">
                <!--<p>Show 1-{{count($products)}}  of {{count($products)}}  result</p>-->
            @if(isset($products) && count($products)>0)
            @php $givediscount = discountAvailable(); @endphp
                @foreach($products as $product)
                 <?php /* $addprice = $product->prices[0]->provprices->where('province',session('province',0))->first(); 
                                    $addamount = isset($addprice) ? ($addprice->amount ?? 0):0; */ ?>
            
             <div class="ps-column catgclass @if($product->status==0) soldoutcls @endif">
                 <center>
                <div class="ps-product" >
                   
              <div class="ps-product__thumbnail"><img src="{{$product->image}}" alt=""><a class="ps-product__overlay" href="{{ url('products/'.$product->slug) }}"></a>
                     @if($product->status==0)<div class="soldoutoverlay"></div>@endif
                  </div>
                  <div class="ps-product__content">
                      @php
                      $s=explode('-',$product->name);
                      @endphp
                  <h4> <a class="ps-product__title" href="{{ url('products/'.$product->slug) }}">{{$s[0]}}</a> </h4>
                        <p class="ps-producttype"><span>@if(count($s)>1) {{$s[1]}} @endif</span></p>
                         @if($product->nutrition!='')
                            <div class="nutrient_details"><a href="#" class="nutrientinfo" data-pic="/images/nutrition_info/{{$product->nutrition}}"><img src="/images/nutrition_info/nutrients_icon.png" alt="nutrients_info"/></a></div>
                        @endif
                     {{--   <p class="ps-product__price">
                        @if($givediscount)
                            <span class="product-start-prize"  style="text-decoration: line-through;">
                                <span class="price-span">{{getPrice($product->prices->min('amount')+$addamount)}}</span>
                            </span> | 
                            <span class="product-start-prize">
                                <span class="price-span">{{getDiscountedPrice($product->prices->min('amount')+$addamount)}}</span>
                            </span><br/>
                            <span>({{getDiscountText('OFF')}})</span>
                        @else
                            <span class="product-start-prize">

                                 @if(count($product->prices)>1) From @endif  <span class="price-span">
                                    @php if(getspacialLowestPrice($product)) { @endphp
                                            ${{ getspacialLowestPrice($product) }}
                                    @php } else { @endphp 
                                            {{getPrice($product->prices->min('amount')+$addamount)}}
                                    @php } @endphp 
                                </span>
                            </span>
                        @endif
                    </p>   --}}
                    @if($product->status==0)<p style="color: red;font-size: 15px;">Sold Out</p>@endif
                  </div>
                  @if($product->status==0)<div class="soldoutoverlay"></div>@endif
             
               </div>
              </center>
         
              </div> 
           
          @endforeach
      
          @else
            <div class="text-center">
                <big><strong>Sorry No Products Availiable</strong></big>
                <p>&nbsp;</p>
            </div>
          @endif
          
           </div>
          
        </div>
        
        </div>
      </div>
      </div>
      <!--style="@if(isset($coupon_applied)) display:block; @endif"-->
      
<!--<div id="myModal" class="modal" >-->
  <!-- Modal content -->
<!--  <div class="modal-content">-->
<!--    <span class="close">&times;</span>-->
<!--    <p>@if(isset($coupon_applied) && $coupon_applied=='false') Invalid coupon code @else Coupon code successfully applied @endif</p>-->
<!--  </div>-->

<!--</div>-->
<div class="modal fade @if(isset($coupon_applied)) in @endif" tabindex="-1" role="dialog" id="coupon-confirm" style="margin-left:auto;margin-right:auto;@if(isset($coupon_applied)) display:block; @endif">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <h3 style="padding: 50px 15px; text-align:center;">@if(isset($coupon_applied) && $coupon_applied=='false') Invalid coupon code @else Coupon code successfully applied @endif</h3>
    </div>
    <div class="modal-footer text-center" style="text-align: center !important;">
        <a style="margin-bottom:15px;display:inline-block;"><button type="button" class="ps-btn" id="coupon-close" >Close</button></a> &nbsp; 
        
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    </main>
 
 <!--<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
 
@endsection

@push('styles')
<style>
 
    .ps-shop.catgmain{
        display:flex;
    }
    @media only screen and (max-width: 991px) {
  .ps-row .ps-column.catgclass:nth-child(3n+1){
    clear:left;
    }
    .ps-row .ps-column.catgclass:nth-child(4n+1){
    clear:none;
    }
}
  @media only screen and (max-width: 767px) {
       .ps-row .ps-column.catgclass:nth-child(3n+1){
    clear:none;
    }
  
  }
  
  #price-range {
    height: 5px !important;  
    background: #DDD !important;
    border-radius: 0px !important;
    border: none !important;
  }
  
  #price-range .ui-slider-handle {
      border-radius: 50%;
      background:#f993c3 !important;
      border: none;
  }
  
  #price-range .ui-slider-range {
      background:#f993c3 !important;
  }
 
 
 .modal-content {
    border-radius:0px;
    padding:15px;
}
.modal-content img{
    width:275px;
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
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
 
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}




.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
.categorysidebar_left{
    z-index:auto;
}
#exampleModal .modal-dialog button.close{
    position:absolute;
    top:0;
    right:-4px;
}
 </style>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@push('scripts')

<script>

<?php 
        $amount = request()->has('amount') ? explode('-',str_replace(' ','',str_replace('$','',request()->amount))):[3, 50];
?>

    $( function() {
    
    $(".toggle-category-listing").click(function(){
      $("#sidebar-category-listing").toggle();
    })

		$( "#price-range" ).slider({
			range: true,
			min: 1,
			max: 50,
			values: [ {{$amount[0]}}, {{$amount[1]}} ],
			slide: function( event, ui ) {
				$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			}
		});
		
		$( "#amount" ).val( "$" + $( "#price-range" ).slider( "values", 0 ) +
			" - $" + $( "#price-range" ).slider( "values", 1 ) );
	} );
	var modal = document.getElementById("myModal");
	var span = document.getElementsByClassName("close")[0];
$(".close").click(function(e){
            $("#coupon-confirm").fadeOut(500);
        });
        $("#coupon-close").click(function(e){
            $("#coupon-confirm").fadeOut(500);
        });
$(document).click(function(event) {
    $("#coupon-confirm").fadeOut(500);
  //if you click on anything except the modal itself or the "open modal" link, close the modal
  
});

</script>
@endpush

