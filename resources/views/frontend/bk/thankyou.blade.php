 @extends('layouts.sweetiepie')
@section('contents')
 <div class="ps-404">
      <div class="container" style="padding-bottom:58px">
        <h3 >Thank You</h3>
        <h4 style="line-height: 250%;">Thank you for your Order. Your confirmation Is {{$basket->order->invoice_id}}.<br/>
                            Please check your email for your order confirmation.<br/>
                            Thank You  
                            From The Sweetiepie Team</h4>
        <a class="ps-btn ps-btn--yellow" href="{{url('/')}}">Back To Home</a>
        
        <br/>
        <br/>
        <p>&nbsp;</p>
        
      </div>
    </div>
    <script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol ) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try{
  var pageTracker = _gat._getTracker("UA-22591984-31");
  pageTracker._trackPageview();
   @php  echo $googlecode @endphp
   pageTracker._trackTrans(); //submits transaction to the Analytics servers
} catch(err) {}
</script>
    @endsection