  @extends('layouts/sweetiepie')

 @section('contents')

 <div class="ps-hero bg--cover" data-background="images/hero/product.jpg" style="height:300px !important;min-height:0px">

      <div class="ps-hero__content">

        <h1> Product Page</h1>

        <div class="ps-breadcrumb">

          <ol class="breadcrumb">

            <li><a href="{{url('/')}}">Home</a></li>

            <li class="active">Product List</li>

          </ol>

        </div>

      </div>

    </div>

    <main class="ps-shop catgmain">

        <div class="col-sm-9">

      <div class="ps-shop__wrapper">



        <div class="ps-shop__sort">

            @if($term)

            <div class="heading-wr"><h1>Search result for {{$term}}</h1></div>

            @endif

          <p>Show 1-{{count($products)}} of {{count($products)}} result</p>

          <select class="ps-select" title="Default Sorting">

            <option value="1">Option 1</option>

            <option value="2">Option 2</option>

            <option value="3">Option 3</option>

          </select>

        </div>

        <div class="ps-row">

             @foreach($products as $product)

          <div class="ps-column">

            <div class="ps-product">

              <div class="ps-product__thumbnail"><img src="{{$product->image}}" alt=""><a class="ps-product__overlay" href="{{$product->image}}"></a>


              </div>

              <div class="ps-product__content"><a class="ps-product__title" href="{{ url('products/'.$product->slug) }}">{{$product->name}}</a>

                

                <p class="ps-product__price">{{getPrice($product->prices->min('amount'))}}</p>

              </div>

            </div>

          </div>

          @endforeach

         

         

          

          

         

          

          

          

          

          

          

          

          

          

          

        </div>


      </div>

      </div>

      <div class="col-sm-3">

      <aside class="ps-sidebar">

        <aside class="widget widget_sidebar widget_category">

          <h3 class="widget-title">Categories</h3>

          <ul class="ps-list--checked">

             @foreach($categories as $ca)

             

            <li>{{$ca->name}}</li>

           

           

            @endforeach

          </ul>

        </aside>

        <aside class="widget widget_filter widget_sidebar">

          <h3 class="widget-title">Filter Price</h3>

          <div class="ps-slider" data-default-min="0" data-default-max="500" data-max="1000" data-step="100" data-unit="$"></div>

          <p class="ps-slider__meta">Price:<span class="ps-slider__value ps-slider__min"></span>-<span class="ps-slider__value ps-slider__max"></span></p><a class="ac-slider__filter ps-btn ps-btn--sm" href="#">Search</a>

        </aside>

        

        

      </aside>

      </div>

    </main>

    

    </div>

          <style>

        .ps-row .ps-column:nth-child(4n+1){

    clear:left;

    }

    </style>

    @endsection