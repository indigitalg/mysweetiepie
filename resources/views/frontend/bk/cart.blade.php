 @extends('layouts/sweetiepie')

 @section('contents')

<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
    <div class="ps-hero__content">
      
    </div>
</div>
  
<div class="catgmain">
      <div id="page-category-title" class="top-title">
          <h2 class="text-center">Shopping Cart</h2>
      </div>
      <div class="clearfix"></div>
</div>

    <main class="ps-main">

      <div class="ps-container">

           @if(isset($basket->items) && count($basket->items) >0)

        <div class="ps-cart-listing">

          <div class="table-responsive">

             

            <table class="table ps-table ps-table--listing">

              <thead>

                <tr>

                  <th>All Products</th>

                  <th class="cartproduct_details">Price</th>

                  <th class="cartproduct_details">Quantity</th>

                  <th style="text-align:right;" class="cartproduct_details">Total</th>

                </tr>

              </thead>

              <tbody>

                  @php 

                  $i=0;

                  @endphp

                  @foreach($basket->items as $item)

                <tr>

                    <td>

                        <div class="cartproduct_details">

                      <a class="ps-product--table" href="{{url('products/'.$item->product->slug)}}"><img class="mr-15" src="{{env('PRODUCT_FILES').$item->picture}}" alt="">{{$item->product_name}}</a>

                      @if(count((array) $item->itemvariation) > 0)

                        <span class="text-warning">

                        @foreach($item->itemvariation as $variation)

                            {{$variation->flavour_name}} ({{$variation->item_qty}})

                        @endforeach

                        </span>

                        @endif

                        <a href="{{url('deleteproduct/'.$item->id)}}" onclick="javascript:return confirm('Do you want to delete this item from cart ?')"><i class="fa fa-trash" style="padding-left: 10px;"></i></a>

                        @if($item->custom_label)

                        <br>

                        <span>(Custom Label)</span>

                        @endif

                        </div>

                        <div class="mobilecartproductdetails">

                            <div class="mobilecartproduct_image">

                                <a class="ps-product--table mobilecart_img" href="{{url('products/'.$item->product->slug)}}"><img class="mr-15" src="{{env('PRODUCT_FILES').$item->picture}}" alt="productimage"></a>

                            </div>

                             <div class="mobilecartproduct_info">

                                <h5 class="productname"><a href="{{url('products/'.$item->product->slug)}}">{{$item->product_name}}</a><a href="{{url('deleteproduct/'.$item->id)}}" onclick="javascript:return confirm('Do you want to delete this item from cart ?')" class="carttrash"><i class="fa fa-trash"></i></a> </h5>

                                @if(count((array) $item->itemvariation) > 0)

                                 <span class="text-warning">

                                    @foreach($item->itemvariation as $variation)

                                    {{$variation->flavour_name}} ({{$variation->item_qty}})

                                     @endforeach

                                   </span>

                                 @endif

                             

                             @if($item->custom_label)

                                 <span>(Custom Label)</span>

                            @endif

                            <div class="form-group--number quantitybox" style="width:130px !important;text-align:center;margin:0px auto;">
                          
                              <button class="minus qtybutton" data-id="{{$item->id}}" style="border-radius: 45px 0 0 45px;vertical-align:text-bottom;"><span>-</span></button>
                              <input class="form-control major-qty " type="text" name="quantity[{{$item->product_id}}]" value="{{$item->quantity}}" id="qty-{{$item->id}}" style="background-color: transparent; width:50px; border:1px solid #666;vertical-align:text-bottom;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" readonly >
                              <button class="plus qtybutton"  data-id="{{$item->id}}"  style="border-radius:0 45px 45px 0;vertical-align:text-bottom;"><span>+</span></button>
                              <!--<span class="minimum-quantity hidden" style="text-align: center;color: red; font-size:90%;">Minimum Quantity Should be 18</span>-->
                              @csrf
                              <a href="/shop/cart/update?item={{$item->id}}" data-item="{{$item->id}}" class="update-button" id="qty-button-{{$item->id}}" style="display:none;"><i class="fa fa-refresh" aria-hidden="true" ></i> Update</a>
                              
                            </div>
                            <br/><br/>
                            <p class="mobilecarttotal">

                            <input type="hidden" value="{{$item->price_amount}}" id="amount-{{$i}}">

                            <strong>Sub Total : <span id="tot-{{$i}}">{{getPrice($item->price_amount*$item->quantity)}}</span></strong></p>

                            </div>

                        </div>

                    </td>

                  <td class="cartproduct_details">{{getPrice($item->price_amount)}}</td>

                  <td class="cartproduct_details">

                    <div class="form-group--number">

                      <!--<button class="minus" onclick="minus({{$i}});"><span>-</span></button>-->
                      <div class="form-group--number quantitybox" style="max-width:100%;text-align:center;margin:0px auto;">
                          
                          <button class="minus qtybutton" data-id="{{$item->id}}" style="border-radius: 45px 0 0 45px;vertical-align:text-bottom;"><span>-</span></button>
                          <input class="form-control major-qty " type="text" name="quantity[{{$item->product_id}}]" value="{{$item->quantity}}" id="qty-{{$item->id}}" style="background-color: transparent; width:50px; border:1px solid #666;vertical-align:text-bottom;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" readonly >
                          <button class="plus qtybutton"  data-id="{{$item->id}}"  style="border-radius:0 45px 45px 0;vertical-align:text-bottom;"><span>+</span></button>
                          <!--<span class="minimum-quantity hidden" style="text-align: center;color: red; font-size:90%;">Minimum Quantity Should be 18</span>-->
                          @csrf
                          <a href="/shop/cart/update?item={{$item->id}}" data-item="{{$item->id}}" class="update-button" id="qty-button-{{$item->id}}" style="display:none;"><i class="fa fa-refresh" aria-hidden="true" ></i> Update</a>
                          
                        </div>

                      

                      <!--<button class="plus" onclick="plus({{$i}});"><span>+</span></button>-->

                    </div>

                  </td>

                  <input type="hidden" value="{{$item->price_amount}}" id="amount-{{$i}}">

                  <td style="text-align:right;" class="cartproduct_details">

                      <strong><span id="tot-{{$i}}">{{getPrice($item->price_amount*$item->quantity)}}</span></strong></td>

                  </div>

                  </td>

                </tr>

                @php 

                  $i++;

                  @endphp

                @endforeach

              </tbody>

            </table>

           

          </div>

          

          <form action="{{url('shop/coupon')}}" method="POST" class="promocode-form">         

          <div class="row ps-cart__actions">

              <div class="col-sm-6">



                        @csrf

                     <div class="row">

                      <div class="col-sm-6 mobile-center">

                        <div class="ps-form--icon"><i class="fa fa-angle-right" onclick="$('.promocode-form').submit()"></i>

                          <input class="form-control" value="{{session('coupon')}}" type="text" name="coupon" placeholder="Promo Code" style="border-radius:40px;">

                        </div>

                      </div>

                      <div class="col-sm-6 mobile-center">

                          <button class="ps-btn ps-btn--gray visible-xs" type="submit" style="margin:5px auto !important;">Apply Promo Code</button>

                        <!--<a href="{{url('/search')}}">--><!--</a>-->

                        <span class="text-center" style="width: 100%;display: inline-block;color: red;">{{session('couponError')}}</span>

                        <span class="text-center" style="width: 100%;display: inline-block;color: green;">{{session('couponSuccess')}}</span>

                      </div>

                     </div>



              </div>

              <div class="col-sm-6 text-right mobile-center">

                    @if($basket->discount > 0)

                    <h3>Subtotal: <span> {{getPrice($basket->total)}}</span></h3>

                    <h3>Discount <span><small>({{session('coupon')}})</small></span>:  <span> {{getPrice($basket->discount_type == 'amount' ? $basket->discount : ($basket->total*$basket->discount/100))}}</span></h3>

                    @endif

                    <h3>Total: <span> {{getPrice($basket->total-($basket->discount_type == 'amount' ? $basket->discount : ($basket->total*$basket->discount/100)))}}</span></h3>

              </div>

           </div>

           <div class="row ps-cart__actions" style="border-top: 0px; padding-top: 15px;">

               <div class="col-sm-4 mobile-center">

                   <button class="ps-btn ps-btn--gray hidden-xs" type="submit">Apply Promo Code</button>

               </div>

               <div class="col-sm-4 text-center mobile-center">

                   <a class="ps-btn ps-btn--fullwidth" style="width:auto;" href="{{url('/continue-shopping')}}">Continue Shopping</a>

                </div>

              <div class="col-sm-4 text-right mobile-center">

                     

                  <a class="ps-btn  ps-btn--yellow  submit-order" href="{{url('shop/checkout')}}">Proceed to checkout</a>

              </div>

             

          </div>

          </form>

          <!--<div class="text-center">

              <a class="ps-btn ps-btn--fullwidth" style="width:auto;" href="{{url('')}}">Continue Shopping</a>

          </div>-->

        </div>

        @else

            <div class="ps-cart-listing">

                <center><font size="6px"><strong>Sorry!!! Cart is empty</strong></font></center>

            </div>

        @endif

      </div>

    </main>

    

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

   

    @endsection
    

    

    

    @push('styles')

    <style>

        .mobilecartproductdetails {

              display:none;

              text-align: left;

           } 

       @media only screen and (max-width: 767px) {

           .cartproduct_details {

              display:none;

           } 

             .mobilecartproductdetails {

              display:block;

           } 

           .ps-cart-listing .table-responsive table.ps-table td{

            white-space:normal;

            }

        } 

        @media only screen and (max-width: 600px) {

           .mobile-center {

               text-align:center !important;

               margin-bottom: 5px;

           } 

        } 

          @media only screen and (max-width: 450px) {

           .mobilecartproductdetails h5.productname {

             font-size:16px;

           } 

           .mobilecartproductdetails .mobilecartproduct_image {

               width:95px;

           }

           .mobilecartproductdetails .mobilecartproduct_info {

                width: calc(100% - 100px);

           }

          

        } 

    </style>

@endpush

    

    

    

    

@push('scripts')

        <script>

            @if(session()->has('couponSuccess') || session()->has('couponError'))

                $('html, body').animate({

                    scrollTop: $(".promocode-form").offset().top

                }, 2000);

            @endif

            $(document).ready(function(){
              $(".update-button").click(function(e){
                e.preventDefault();
                var itemid = $(this).attr("data-item");
                var url = $(this).attr("href");
                window.location = url + '&qty=' + $("#qty-"+itemid).val();
              });

              $(".qtybutton").click(function(){
                var itemid = $(this).attr("data-id");
                $("#qty-button-"+itemid).attr("style","display:inline-block");
              })
            })

        </script>

@endpush