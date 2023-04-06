       @extends('layouts/sweetiepie')
 @section('contents')
 <style>
     #covid-policy {
    border: 2px solid #57b470;
    background: #cce5d3;
    padding: 20px;
    margin-bottom: 20px;
     }
}
 </style>
  <div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
      <div class="ps-hero__content">
        
      </div>
  </div>
    
  <div class="catgmain">
        <div id="page-category-title" class="top-title">
            <h2 class="text-center">Policies</h2>
        </div>
        <div class="clearfix"></div>
  </div>
<div class="main-page-wrapper">
        <div class="shopping-policy-wrapper">
            <div class="container">
            	<div class="shopping-policy-details page-description">
					<!--<h1>{{$title}}</h1>-->

					<!--<div id="covid-policy">-->

					<!--	<div class="row">-->
					<!--		<div class="col-md-6">-->
					<!--			<p><img src="/img/covid-big.png" /> During this time of anxiety and uncertainty, I wanted to reach out to say we are thinking of you as we navigate the current health crisis together. I also wanted to let you know that our company continues to prioritize the safety and well-being of our team members, their families and our customers.</p>-->

					<!--			<p>Bouquet Canada is continuing to deliver smiles during the COVID19 outbreak. We have made changes to our delivery procedures to ensure the safety of our employees and your recipients.</p>-->

					<!--			<div class="clearfix"></div>-->

					<!--			<h4>1. Touch Less Delivery</h4>-->
					<!--			<h4>2. FREE E-Card "Just say Hi"</h4>-->

					<!--			<p>During this time, we can only offer flexible delivery dates. We will do our best to try and accommodate your delivery request but ask for your understanding with our two day flexibility</p>-->

					<!--			<p>Now is a time to think of each other, to connect with each other and to care for each other. We just want you to know that we care about you and your continued well-being, and that all of us at Bouquet Canada.COM, Inc. are thinking of you.  </p><br/><br/>-->


					<!--			<p>-->
					<!--			Thank You <br/><br/>-->

					<!--			The Bouquet Canada Team </p>-->

					<!--		</div>-->
					<!--		<div class="col-md-6">-->

					<!--			<div style="height: 150px; width: 100%;" class="hidden-xs hidden-sm"></div>-->

					<!--			<div class="video-container">-->
					<!--				<iframe src="https://www.youtube.com/embed/Ix_TTmcsEmg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
									
					<!--			</div>-->

					<!--		</div>-->
					<!--	</div>-->

					

					<!--</div>-->



					<!--<p>Bouquet Canada offers fresh flowers, plants and gifts for all occasions. Our gifts are either hand delivered by a florist or shipped in a gift box. Please note that select flowers, plants and specialty gifts are shipped in a box and delivered by an overnight national courier. Same day delivery is only available for items delivered by our partner florists.</p>-->
					<div class="faq_container clearfix">

						<div >
						 	<ul class="faq">
						 		@php $num = 1 @endphp
						 		@foreach($policies as $policy)
						 		 <div class="{!! $num % 2 == 0 ? 'faq-col-2 right' : 'faq-col-1 left'  !!} ">
							 		  <li class="slider_border ">
							 		  	 <div class="faq-title">
								 		  	   {{ $policy->question }}
										 </div>
											<div class="faq-cnt">
												{{ $policy->answer }}
											</div>
									   
									 </li>
								</div>
								@php $num++ @endphp
								@endforeach
							</ul>
											
						</div> <!-- faq-col-1 -->
						<div class="faq-col-2 right" style="display: none">
							<ul class="faq">
						 		<li class="slider_border">
									<div class="faq-title">
										Do you offer same day delivery?
									</div>
									<div class="faq-cnt">
										Absolutely! Orders placed as late as 12:00 PM in the recipient’s time zone are eligible for same day delivery.
									</div>
								</li>
								<li class="slider_border">
									<div class="faq-title">
										Do you have any delivery restrictions?
									</div>
									<div class="faq-cnt">
										We are unable to deliver to recipients in Intensive Care Units (ICU) or Critical Care Units (CCU) because most hospitals do not allow it. If your intended recipient is in a hospital ICU or CCU we will hold the order until they are moved to a regular room and is able to receive flowers. A fresh bouquet will be delivered as soon as possible.

										Additionally, we cannot deliver to cruise ships, airport terminals, train stations, post office (P.O.) boxes, and some RR regions. We may also have limited access to college and university campuses depending on the institution’s policies.
									</div>
								</li>
								<li class="slider_border">
									<div class="faq-title">
										Do you deliver to military installations?
									</div>
									<div class="faq-cnt">
										Due to the perishable nature of our products and the security policies of many military installations, we are unable to deliver to military installations.
									</div>
								</li>
								<li class="slider_border">
									<div class="faq-title">
										Can I specify a delivery time for my order?
									</div>
									<div class="faq-cnt">
										You may select your preferred delivery date but we do not guarantee delivery times. Our deliveries are made between the hours of 9:00 AM and 7:00 PM to residences and 9:00 AM and 5:00PM to businesses in the recipient’s time zone. Delivery times during peak seasons are extended until 9:00 PM in the recipient’s time zone. If we are given a 24 hour notice we can arrange for a timed delivery at a premium rate of $14.99 - this can only be arranged via telephone.
									</div>
								</li>
								<li class="slider_border">
									<div class="faq-title">
										What if my intended recipient is not available at the time of delivery?
									</div>
									<div class="faq-cnt">
										If the recipient is not available at the delivery address specified we will typically leave the order with a neighbour or, if possible, in a safe place at the delivery address. Alternatively, we may attempt re-delivery later in the day. If this is not feasible or the recipient is unavailable when a later delivery is attempted we will leave a calling card on their door explaining what has happened. This card will provide the recipient with our contact information so they can call us and arrange for collection or re-delivery of their gift. Due to the fresh nature of our products, we cannot be held responsible for failed delivery attempts because your intended recipient is unavailable. After 24 hours of failed delivery attempts and/or lack of contact from the intended recipient items will be returned to the respective shipping location and you will be notified.
										<div style="margin-top:8px;border-bottom:1px dotted"><i class="fa fa-info-circle"></i> Please note that rerouting a delivery that we’ve already attempted to deliver to another address may incur an additional delivery charge of $14.99 CAD.</div>
									</div>
								</li>
							</ul>
						</div> <!-- faq-col-2 -->
					</div> <!-- faq_container -->
				</div>
			</div>
		</div>
</div>
        @endsection
  @section('order')
<div class="orderbutton_mobile" style="display:none;">
    <a href="{{url('continue-shopping')}}">Place your order now</a>
</div>
@endsection
@push('styles')
<style>
   ul {
        list-style: none;
   }

   ul.faq {
        list-style:none;
   }
   
   ul.faq li {
        list-style:none;
    }
</style>
@endpush


@push('scripts')
<script>

    
    $(document).ready(function() {
         
        $("li .faq-title").click(function() {
                $(this).next().toggle("linear");
                        $(this).toggleClass("rotate");
        });
        
    });

</script>

@endpush