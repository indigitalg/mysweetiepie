@extends('layouts.sweetiepie')
@section('contents')
<div class="ps-hero bg--cover" data-background="{{url('imagesmsp/product.jpg')}}" style="height:300px !important;min-height:0px">
    <div class="ps-hero__content">
        <h1>My Account</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">My Account</li>
          </ol>
        </div>
      </div>
</div>
<div class="ps-product-collection">
    <div class="ps-container">
        <div class="ps-section__content">
            <ul class="tab-list" role="tablist">
                <li class="active"><a href="{{url('/myaccount')}}">My Account</a></li>
                <li class=""><a href="{{url('myaccount/profile')}}">Manage Profile</a></li>
                <li class=""><a href="{{url('myaccount/password')}}">Change Password</a></li>
                <li class=""><a href="{{url('/myaccount/orders')}}">My Orders</a></li>
                <li class=""><a href="{{url('/signout')}}">Logout</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab_1">
              <div class="ps-block--product-set">
                <div class="ps-block__content" style="width:100%;">
                    <!--<div class="heading-wr"><h3>My Account</h3></div>-->
	        		<p><strong>Welcome to your account area, here you can manage your account settings.</strong></p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
<!--<div class="container" style="padding-top:100px">
    <div class="col-sm-4">
	
	        	<div class="account-sidebar-wr left" style="width: 200px;line-height: 28px;border-radius:6px">
	        		<article style="display:block">
	        		</article>
	        	</div>	
	        	</div>
	        	 <div class="col-sm-8">
	        	<div class="my-account-detail right" >
	        		<div class="heading-wr"><h3>My Account</h3></div>
	        		<article>Welcome to your account area, here you can manage your account settings.</article>
				</div>
				</div>
			</div>-->
@endsection
  
