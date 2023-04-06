 @extends('layouts/sweetiepie')
 @section('contents')
<div class="ps-hero bg--cover" data-background="/imagesmsp/menu.jpg">
      <div class="ps-hero__content">
        <h1> Menu </h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Menu</li>
          </ol>
        </div>
      </div>
    </div>
    @foreach($cat as $c)
    <div class="ps-home-product bg--cover" data-background="">
      <div class="ps-container">
          @if($c['name'] != 'Cookies')
        <div class="ps-section__header">
          <h3 class="ps-section__title" style="color:black">{{$c['name']}}</h3>
        </div>
        @endif
        <div class="ps-section__content cookiesoutersection">
         
          <div class="row">
              @foreach($product as $p)
              @if($p['cid']==$c['id'])
            <div class="col-sm-4">
              <div class="ps-product ps-product--horizontal">
                <div class="ps-product__thumbnail"><img src="{{$p->image}}" alt=""><a class="ps-product__overlay" href="{{ url('products/'.$p['pslug']) }}"></a>
                  <!--<ul class="ps-product__actions">-->
                  <!--  <li><a href="#" data-tooltip="Quick View"><i class="ba-magnifying-glass"></i></a></li>-->
                  <!--  <li><a href="#" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>-->
                  <!--  <li><a href="#" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>-->
                  <!--</ul>-->
                </div>
                <div class="ps-product__content"><a class="ps-product__title" href="{{ url('products/'.$p['pslug']) }}">{{$p['pname']}}</a>
                  <!--<p><a href="product-list.html">Bakery</a> - <a href="product-list.html">Sweet</a> - <a href="product-list.html">Bio</a></p>-->
                  <!--<select class="ps-rating">-->
                  <!--  <option value="1">1</option>-->
                  <!--  <option value="1">2</option>-->
                  <!--  <option value="1">3</option>-->
                  <!--  <option value="1">4</option>-->
                  <!--  <option value="2">5</option>-->
                  <!--</select>-->
                  <p class="ps-product__price">{{getPrice($p->pamount)}}</p>
                </div>
              </div>
            </div>
            @endif
            @endforeach
            
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @endsection