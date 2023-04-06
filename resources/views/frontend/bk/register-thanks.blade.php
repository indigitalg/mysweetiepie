 @extends('layouts.sweetiepie')
@section('contents')
 <div class="ps-404">
      <div class="container">
        <h3 >Thank You</h3>
        <h4 style="line-height: 250%;">	@if(!empty($successMsg))
                           <font color="blue">{{ $successMsg }}</font>
                        @endif</h4>
                        
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
        <a class="ps-btn ps-btn--yellow" href="{{url('/signin')}}">Login Now</a>
        
      </div>
    </div>
    <div class="ps-site-features">
      <div class="ps-container">
        <div class="row">
          
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
            <div class="ps-block--iconbox"><i class="ba-biscuit-1"></i>
              <h4>Master Chef<span> WITH PASSION</h4>
              <p>Shop zillions of finds, with new arrivals added daily.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
            <div class="ps-block--iconbox"><i class="ba-flour"></i>
              <h4>Natural Materials<span> protect your family</h4>
              <p>We always ensure the safety of all products of store</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
            <div class="ps-block--iconbox"><i class="ba-cake-3"></i>
              <h4>Attractive Flavor <span>ALWAYS LISTEN</span></h4>
              <p>We offer a 24/7 customer hotline so you’re never alone if you have a question.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection