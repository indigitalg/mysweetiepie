@extends('layouts.sweetiepie')
@section('contents')
	<div class="ps-hero bg--cover" style="height:130px !important;min-height:0px">
		<div class="ps-hero__content">
		
		</div>
	</div>

	<div class="catgmain">
		<div id="page-category-title" class="top-title">
			<h2 class="text-center">Login</h2>
		</div>
		<div class="clearfix"></div>
	</div>       

	<center>
		<p>&nbsp;</p>
		<h3>Customer area</h3>
		<div class="container">
			<div class="signin-page-wrapper">
			
				<div class="signin-row clearfix">
					<div class="col-sm-4 col-sm-offset-4">
					<div class="signin-form-wr left">
						<form action="{{url()->current()}}" class="form-horizontal" method="post" accept-charset="utf-8">
							{{ csrf_field() }}

							@if(session()->has('message'))
								{{session('message')}}	
							@endif

							<input type="hidden" name="visitor" value="customer" />   

							<div class="form-group">
								<label form="username" class="control-label label-col-16">Username</label>
								<div class="field-col-16 field-col">
									<input type="text" name="email" class="form-control">
									<span class="validation_error">{{$errors->first('email')}}</span>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="control-label label-col-17">Password</label>
								<div class="field-col-17 field-col">
									<input type="password" name="password" autocomplete="off" class="form-control">
									<span class="validation_error">{{$errors->first('password')}}</span>
								</div>
							</div>

							<div class="form-group">
							<div class="field-col-18 field-col">
									<button type="submit" name="submit" class="ps-btn custimize-bs" id="buttonGradient" value="Sign-in">Sign-in</button>
								</div>
							</div>
							<div>
								<div class="recover-block-wr">
									<a href="{{url('/signup')}}">Do not have an account? Sign Up</a><br>
									<a href="{{url('/retrieve-account')}}">Forget your Username or Password?</a>
								</div>
							</div>
						

							
							<p>&nbsp;</p>
							<p>&nbsp;</p>
							<p>&nbsp;</p>
					</form>
							
						<!-- <a href="{{url('/register')}}" class="button btn-primary">Do not have an account? Sign Up</a> -->
					</div>
					</div>
					
				</div>
			</div><!--  end of signin-page-wrapper -->
		</div>
	</center> 
		
@endsection


@section('bottom_scripts')


	<script>
		window.fbAsyncInit = function() {
			FB.init({
			appId      : '{your-app-id}',
			cookie     : true,
			xfbml      : true,
			version    : '{api-version}'
			});
			
			FB.AppEvents.logPageView();   
			
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "https://connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>


@endsection
  
