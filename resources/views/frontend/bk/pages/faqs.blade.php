@extends('layouts.sweetiepie')
@section('contents')
<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px"  no-repeat cover;">
  <div class="ps-hero__content">
    
  </div>
</div>

<div class="catgmain">
    <div id="page-category-title" class="top-title">
        <h2 class="text-center">FAQ</h2>
    </div>
    <div class="clearfix"></div>
</div>
<div class="main-page-wrapper">
        <div class="faqs-wrapper" style="margin-bottom:30px !important">
            <div class="container">
            	<div class="faqs-toggels">
					<div class="faq_container clearfix">
										 
						<h3>GENERAL</h3>
							<div>
							 	<ul class="faq" style="list-style:none;">
							 		@php $num = 1 @endphp
							 		@foreach($faqs_general as $gen)
							 		 <div class="{!! $num % 2 == 0 ? 'faq-col-2 right' : 'faq-col-1 left'  !!} ">
								 		  <li class="slider_border ">
								 		  	 <div class="faq-title">
									 		  	   
									 		  	   {!!html_entity_decode($gen->question)!!}
											 </div>
												<div class="faq-cnt">
													
													{!!html_entity_decode($gen->answer)!!}
												</div>
										   
										 </li>
									</div>
									@php $num++ @endphp
									@endforeach
							</ul>
						 </div>
					 </div>	

					 <div class="faq_container clearfix">
						<h3>Substitutions</h3>
							<div>
							 	<ul class="faq" style="list-style:none;">
							 		@php $num = 1 @endphp
							 		@foreach($faqs_subs as $gen)
							 		 <div class="{!! $num % 2 == 0 ? 'faq-col-2 right' : 'faq-col-1 left'  !!} ">
								 		  <li class="slider_border ">
								 		  	 <div class="faq-title">
									 		  	   {{ $gen->question }}
											 </div>
												<div class="faq-cnt">
													{{ $gen->answer }}
												</div>
										   
										 </li>
									</div>
									@php $num++ @endphp
									@endforeach
							</ul>
						 </div>
					 </div>	

					<div class="faq_container clearfix">
						<h3>Discounts</h3>
							<div>
							 	<ul class="faq" style="list-style:none;">
							 		@php $num = 1 @endphp
							 		@foreach($faqs_discounts as $gen)
							 		 <div class="{!! $num % 2 == 0 ? 'faq-col-2 right' : 'faq-col-1 left'  !!} ">
								 		  <li class="slider_border ">
								 		  	 <div class="faq-title">
									 		  	   {{ $gen->question }}
											 </div>
												<div class="faq-cnt">
													{{ $gen->answer }}
												</div>
										   
										 </li>
									</div>
									@php $num++ @endphp
									@endforeach
							</ul>
						 </div>
					 </div>	

					 <div class="faq_container clearfix">
						<h3>Returns</h3>
							<div>
							 	<ul class="faq" style="list-style:none;">
							 		@php $num = 1 @endphp
							 		@foreach($faqs_returns as $gen)
							 		 <div class="{!! $num % 2 == 0 ? 'faq-col-2 right' : 'faq-col-1 left'  !!} ">
								 		  <li class="slider_border ">
								 		  	 <div class="faq-title">
									 		  	   {{ $gen->question }}
											 </div>
												<div class="faq-cnt">
													{{ $gen->answer }}
												</div>
										   
										 </li>
									</div>
									@php $num++ @endphp
									@endforeach
							</ul>
						 </div>
					 </div>	
				
			
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
  
