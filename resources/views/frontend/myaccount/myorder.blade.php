@extends('layouts.sweetiepie')
@section('contents')
<div class="ps-hero bg--cover" data-background="{{url('imagesmsp/product.jpg')}}" style="height:300px !important;min-height:0px">
<div class="ps-hero__content">
        <h1>My Orders</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">My Orders</li>
          </ol>
        </div>
      </div>
</div>
<div class="ps-product-collection">
    <div class="ps-container">
        <div class="ps-section__content">
            <ul class="tab-list" role="tablist">
                <li ><a href="{{url('/myaccount')}}">My Account</a></li>
                <li class=""><a href="{{url('myaccount/profile')}}">Manage Profile</a></li>
                <li class=""><a href="{{url('myaccount/password')}}">Change Password</a></li>
                <li class="active"><a href="{{url('/myaccount/orders')}}">My Orders</a></li>
                <li ><a href="{{url('/signout')}}">Logout</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab_1">
              <div class="ps-block--product-set">
                <div class="ps-block__content" style="width:100%;">
                    <!--<div class="heading-wr"><h3>Your Account</h3></div>-->
	        		<!--<article>Welcome to your account area, here you can manage your account settings.</article>-->
	        		<div class="row">
	        		    <div class="col-sm-12">
	        		        @if(isset($orders) && count((array) $orders) > 0)
                            <div class="ps-cart-listing">
                              <div class="table-responsive">
                                 
                                <table class="table ps-table ps-table--listing">
                                  <thead>
                                    <tr>
                                      <th>Invoice#</th>
                                      <th>Date</th>
                                      <th>Invoice Total</th>
                                      <th></th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @php 
                                      $m=0;
                                      $i=0;
                                      @endphp
                                      @foreach($orders as $order)
                                    <tr>
                                     
                                      <td>{{$order->invoice_id}}</td>
                                      <td>
                                        {{date('m d, Y',strtotime($order->created_at))}}
                                      </td>
                                      
                                      <td>{{getPrice($order->grandtotal)}}</td>
                                      <td></td>
                                    </tr>
                                    
                                    @endforeach
                                  </tbody>
                                </table>
                               
                              </div>
                             
                            </div>
                            @else
                                <div class="ps-cart-listing">
                                    <center><font size="6px"><strong>Sorry!!! No Orders Availiable</strong></font></center>
                                </div>
                            @endif
	        		    </div>
	        		</div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!--<div class="container" style="padding-top:100px">
    <div class="col-sm-4">
	
	        	<div class="account-sidebar-wr left" style="width: 300px;line-height: 28px;border-radius:6px">
	        		<article style="display:block">
	        		</article>
	        	</div>	
	        	</div>
	        	 <div class="col-sm-8">
	        	 
     <main class="ps-main">
      <div class="ps-container">
           @isset($orders)
        <div class="ps-cart-listing">
          <div class="table-responsive">
             
            <table class="table ps-table ps-table--listing">
              <thead>
                <tr>
                  <th>Invoice#</th>
                  <th>Date</th>
                  <th>Invoice Total</th>
                  <th></th>
                  
                </tr>
              </thead>
              <tbody>
                  @php 
                  $m=0;
                  $i=0;
                  @endphp
                  @foreach($orders as $order)
                <tr>
                 
                  <td>{{$order->invoice_id}}</td>
                  <td>
                    {{date('m d, Y',strtotime($order->created_at))}}
                  </td>
                  
                  <td>{{getPrice($order->grandtotal)}}</td>
                  <td></td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
           
          </div>
         
        </div>
        @else
                        <div class="ps-cart-listing">
                            <center><font size="6px"><strong>Sorry!!! No Orders Availiable</strong></font></center>
                        </div>
                        @endif
      
    </main>
     
				</div>
			</div>  my-account-container -->
		
@endsection
  
