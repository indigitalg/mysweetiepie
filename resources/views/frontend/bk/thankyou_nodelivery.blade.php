 @extends('layouts.sweetiepie')
@section('contents')
 <div class="ps-404">
      <div class="container" style="padding-bottom:58px">
        <h3 >Hi, {{$da}}</h3>
        <h4 style="line-height: 250%;">Thank you for showing interest in our product.<br>
We will get back to you when the product is available in your city.<br>
Thank you</h4>
        <a class="ps-btn ps-btn--yellow" href="{{url('/')}}">Back To Home</a>
        
        <br/>
        <br/>
        <p>&nbsp;</p>
        
      </div>
    </div>
    
    @endsection