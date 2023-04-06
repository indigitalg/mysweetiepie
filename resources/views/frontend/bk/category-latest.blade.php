  @extends('layouts/sweetiepie')
 @section('contents')
  <div class="ps-hero bg--cover" style="height:150px !important;min-height:0px"  no-repeat cover;">
      <div class="ps-hero__content">
        
      </div>
    </div>
    
    <div class="catgmain">
    <div class="col-sm-12">
        <div id="page-category-title" style="background-color:#f993c3;color:white;">
            <h2 class="text-center" style="color:white;padding:10px;">{!! $category->name !!}</h2>
        </div>
        </div>
        <div class="clearfix"></div>
    </div>
    </div>
    
    <main class="ps-shop catgmain">
        
    
      <div class="col-sm-12">
      <div class="ps-shop__wrapper">
          
          @if(isset($products) && count($products)>0)
            <form action="{{url()->current()}}" method="POST" id="sort">
                <!--<div class="ps-shop__sort">-->
                  
                  
                <!--    @csrf-->
                <!--    <select name="sort" id="productsSort" onchange="document.forms['sort'].submit();" class="ps-select">-->
                <!--        <option value="priority_asc" {{'priority_asc' == old('sort') ? 'selected':''}}>Sort: Best Match</option>-->
                <!--        <option value="price_asc" {{'price_asc' == old('sort') ? 'selected':''}}>Price: Low to High</option>-->
                <!--        <option value="price_desc" {{'price_desc' == old('sort') ? 'selected':''}}>Price: High to Low</option>-->
                <!--        <option value="name_asc" {{'name_asc' == old('sort') ? 'selected':''}}>Alphabetical: A to Z</option>-->
                <!--        <option value="name_desc" {{'name_desc' == old('sort') ? 'selected':''}}>Alphabetical: Z to A</option>-->
                <!--    </select>-->
                <!--</div>-->
            </form>
            
          @endif
        
        <div class="ps-row">
            <div class="col-sm-3 col-md-2">
                <div style="margin:25px 0px;">
                    <h4>CATEGORIES</h4>
                    @foreach($categories as $category)
                    <p>
                    <input type="checkbox" name="category[]" value="{{$category->id}}">&nbsp;&nbsp;{{$category->name}}
                    </p>
                    @endforeach
                </div>
                <div style="margin:25px 0px;">
                    <h4>FILTER BY PRICE</h4>
                    <input type="range" name="price_range" min="1" max="100" value="10" class="slider">
                    <p>Value: <span id="demo"></span></p>
                </div>
                <div style="margin:25px 0px;">
                    <button style="border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;border:1px solid #CC0000;background:#FFF;padding:5px 15px;">Filter</button>
                </div>
                <div style="margin:25px 0px;">
                    <h4>FILTER BY</h4>
                    <p>
                    <input type="checkbox" name="large" value="large">&nbsp;&nbsp;Large
                    </p>
                    <p>
                    <input type="checkbox" name="medium" value="medium">&nbsp;&nbsp;Medium
                    </p>
                    <p>
                    <input type="checkbox" name="small" value="small">&nbsp;&nbsp;Small
                    </p>
                </div>
            </div>
            <div class="col-sm-9 col-md-10">
                <!--<p>Show 1-{{count($products)}}  of {{count($products)}}  result</p>-->
            @if(isset($products) && count($products)>0)
            @php $givediscount = discountAvailable(); @endphp
                @foreach($products as $product)
                 <?php $addprice = $product->prices[0]->provprices->where('province',session('province',0))->first(); 
                                    $addamount = isset($addprice) ? ($addprice->amount ?? 0):0;
                                 
                                ?>
             <div class="ps-column catgclass"><center>
                <div class="ps-product">
                  <div class="ps-product__thumbnail"><img src="{{$product->image}}" alt=""><a class="ps-product__overlay" href="{{ url('products/'.$product->slug) }}"></a>
                    
                  </div>
                  <div class="ps-product__content"><a class="ps-product__title" href="{{ url('products/'.$product->slug) }}" style="font-size:21px">{{$product->name}}</a>

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
                                    From <span class="price-span">
                                        @php if(getspacialLowestPrice($product)) { @endphp
                                                ${{ getspacialLowestPrice($product) }}
                                        @php } else { @endphp 
                                                {{getPrice($product->prices->min('amount')+$addamount)}}
                                        @php } @endphp 
                                    </span>
                                </span>
                        @endif
                    </p>
                  </div>
                </div></center>
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

    </main>
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
 </style>
 <script>
var slider = document.getElementById("price_range");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
    @endsection
