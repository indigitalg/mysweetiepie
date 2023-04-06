  @extends('layouts/sweetiepie')
 @section('contents')
@if($category->name=="Crazy Good Cake") 

 <div class="ps-hero bg--cover" data-background="/imagesmsp/cgc.jpg" style="height:300px !important;min-height:0px"  no-repeat cover;">
@elseif($category->name=="Sweetiepies")
  <div class="ps-hero bg--cover" data-background="/imagesmsp/sweetiePies.jpg" style="height:300px !important;min-height:0px"  no-repeat cover;">
@elseif($category->name=="Savory Pies")
  <div class="ps-hero bg--cover" data-background="/imagesmsp/savoryPies.jpg" style="height:300px !important;min-height:0px"  no-repeat cover;">
 @endif
      <div class="ps-hero__content">
        @if(isset($category)) <h1> {!! $category->name !!}</h1>@endif
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            @if(isset($category))<li class="active">{!! $category->name !!} </li>@endif
          </ol>
        </div>
      </div>
    </div>
    <main class="ps-shop catgmain">
      <div class="col-sm-12">
      <div class="ps-shop__wrapper">
          
          @if(isset($products) && count($products)>0)
            <form action="{{url()->current()}}" method="POST" id="sort">
                <div class="ps-shop__sort">
                  <p>Show 1-{{count($products)}}  of {{count($products)}}  result</p>
                  
                    @csrf
                    <select name="sort" id="productsSort" onchange="document.forms['sort'].submit();" class="ps-select">
                        <option value="priority_asc" {{'priority_asc' == old('sort') ? 'selected':''}}>Sort: Best Match</option>
                        <option value="price_asc" {{'price_asc' == old('sort') ? 'selected':''}}>Price: Low to High</option>
                        <option value="price_desc" {{'price_desc' == old('sort') ? 'selected':''}}>Price: High to Low</option>
                        <option value="name_asc" {{'name_asc' == old('sort') ? 'selected':''}}>Alphabetical: A to Z</option>
                        <option value="name_desc" {{'name_desc' == old('sort') ? 'selected':''}}>Alphabetical: Z to A</option>
                    </select>
                </div>
            </form>
            
          @endif
        
        <div class="ps-row">
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
    @endsection
