  @extends('layouts/sweetiepie')
 @section('contents')

  <div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
      <div class="ps-hero__content">
        
      </div>
  </div>
    
  <div class="catgmain">
        <div id="page-category-title" class="top-title">
            <h2 class="text-center">{!! request()->term != '' ? count($products) . ' result for search  "'.request()->term.'"':'Showing all ' . count($products) . ' products... ' !!}</h2>
        </div>
        <div class="clearfix"></div>
  </div>

    
    <main class="ps-shop catgmain">
        
    
      <div class="col-sm-12">
      <div class="ps-shop__wrapper">
          
        
        
        <div class="ps-row">
            <div class="col-sm-3 col-md-2 categorysidebar_left">
                 <form action="{{url('/category')}}" method="post">
                @csrf()
                <div class="categorylisting_sidebar">
                    <h4 class="toggle-category-listing category_title">CATEGORIES</h4>
                    <div id="sidebar-category-listing">
                      @foreach($categories as $category1)
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
                      @endforeach
                    </div>
                 </div>
                 <div class="menubutton">
                    <a href="/menu">View Our <br/> <span> Menu </span></a> 
                 </div>
                 <p></p>
               </form>   
            </div>
            <div class="col-sm-9 col-md-10">

              <div class="ps-shop__sort">

                <p>Showing result 1-{{count($products)}} of {{count($products)}} </p>
              
            
                @if(isset($products) && count($products)>0)
                  <form action="{{url()->current()}}" method="POST" id="sort">
                     
                         @csrf
                         <input type="hidden" value="{{$term}}" name="term">
                         <select name="sort" value="" id="productsSort" onchange="document.forms['sort'].submit();" class="ps-select">
                         <option value="" >Default Sorting</option>
                             <option value="price_asc" >Price: Low to High</option>
                             <option value="price_desc" >Price: High to Low</option>
                             <option value="name_asc" >Alphabetical: A to Z</option>
                             <option value="name_desc" >Alphabetical: Z to A</option>
                           
                         </select>
                    
                  </form>
                  
                @endif


              </div>

              <div class="clearfix" style="float:none;clear:both;"></div>

              <div  style="float:none;clear:both;">
            
            <?php 
          
                  if($sort_value == 'price_asc'){
                       $sorted = $products->sortBy(function($prod){
                         return ($prod->prices[0]->amount ?? 0);
                       });
                      }
                       elseif($sort_value == 'price_desc')
                       {
                       $sorted = $products->sortByDesc(function($prod){
                        return ($prod->prices[0]->amount ?? 0);
                      });
                     }
                     elseif($sort_value == 'name_asc')
                     {
                     $sorted = $products->sortBy(function($prod){
                      return ($prod->name[0] ?? 0);
                    });
                  }
                  elseif($sort_value == 'name_desc')
                  {
                  $sorted = $products->sortByDesc(function($prod){
                   return ($prod->name[0] ?? 0);
                 });
               }else{
                $sorted = $products;
               }
           ?>
            @if(isset($products) && count($products)>0)
            @php $givediscount = discountAvailable(); @endphp
                @foreach($sorted as $product)
                 <?php $addprice = $product->prices[0]->provprices->where('province',session('province',0))->first(); 
                                    $addamount = isset($addprice) ? ($addprice->amount ?? 0):0; ?>
             <div class="ps-column catgclass @if($product->status==0) soldoutcls @endif">
              <center>
                <div class="ps-product" >
                  <div class="ps-product__thumbnail"><img src="{{$product->image}}" alt=""><a class="ps-product__overlay" href="{{ url('products/'.$product->slug) }}"></a>
                     @if($product->status===0)<div class="soldoutoverlay"></div>@endif
                  </div>
                  @php $pr=explode('-',$product->name);@endphp
                  <div class="ps-product__content"><a class="ps-product__title" href="{{ url('products/'.$product->slug) }}" style="font-size:21px">{{$pr[0]}}</a>
                    <p class="ps-producttype"><span> @if(count($pr)>1){{$pr[1]}}@endif </span></p>
                    <p class="ps-product__price">
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
                                @if(count($product->prices)>1) From @endif <span class="price-span"><big>
                                    @php if(getspacialLowestPrice($product)) { @endphp
                                            ${{ getspacialLowestPrice($product) }}
                                    @php } else { @endphp 
                                            {{getPrice($product->prices->min('amount')+$addamount)}}
                                    @php } @endphp </big>
                                </span>
                            </span>
                        @endif
                    </p>
                     @if($product->status==0)<p style="color: red;font-size: 15px;">Sold Out</p>@endif
                  </div>
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

    </main>
 
 <!--<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
 
@endsection

@push('styles')
<style>
  .ps-row .ps-column.catgclass:nth-child(4n+1){
    clear:left;
    }
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
      .ps-row .ps-column.catgclass:nth-child(2n+1){
    clear:left;
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

</script>
@endpush

