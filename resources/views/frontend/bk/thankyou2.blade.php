 @extends('fastcheckout/sweetiepie')
@section('contents')
 <style>
 .subscrbtn-confirm{
     padding-top:70px;
     padding-bottom:70px;
 }
.leadgen-success{
   margin-top:50px;
   margin-bottom:50px;
   box-shadow: rgba(0,0,0,.24) 0px 3px 8px !important;
   width:600px;
   margin-left:auto;
   margin-right:auto;
   padding: 40px 20px;
   text-align: center;
   max-width:100%;
 }
.leadgen-success p{
  font-size: 17px;
  line-height: 36px;
  margin-bottom: 25px;    
}
@media only screen and (max-width:992px) {
.subscrbtn-confirm{
     padding-top:50px;
     padding-bottom:50px;
} 
.leadgen-success{
    margin-top:25px;
    margin-bottom:25px;
}
}
 </style>
<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px;">
    <div class="ps-hero__content">
        
    </div>
</div>
<div class="fundraiser-banner">
	<img src="/imagesmsp/sweetiepie_sweetiepie_piedrive_banner.jpg" alt="Sweetie Pie Fundraising Pie Drive" title="Sweetie Pie Fundraising Pie Drive" />
</div> 
<div class="subscrbtn-confirm">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="leadgen-success">
                    <p>Thank you for your subscription. Your subscription has been confirmed. You’ve been added to our list.</p>
                    <a class="ps-btn ps-btn--yellow" href="{{url('/')}}">Back To Home</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection