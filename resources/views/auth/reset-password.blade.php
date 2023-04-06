        @extends('layouts.master')
        @section('contents')
<div class="main-page-wrapper">
        <div class="my-account-wrapper">
            <div class="container">
            	<div class="my-account-container clearfix">
	            	
	            	<div class="my-account-detail right profile-title">
	            		<h1>{{$title}}</h1>
	            		<div class="passord-update-form">
	            			@if(Session::has('flash_message'))
								<div class="alert alert-danger center">{{ Session::get('flash_message')}}</div>
							@endif
							@if(Session::has('flash_success'))
								<div class="alert alert-success center">{{ Session::get('flash_success')}}</div>
							@endif
							
        			    <form action="{{url()->current()}}" class="form-horizontal" method="post" accept-charset="utf-8">
        			    	{{ csrf_field()}}
							<input type="hidden" name="reset_token" value="{{$token}}">
						
                    	<fieldset>
							
		                    <div class="form-group">
		                        <label for="newpassword" class="control-label label-col-30">New Password</label>
					            <div class="field-col-32 field-col">
					                <input type="password" name="password"  value="{{old('password')}}" class="input-text">
					                @if($errors->has('password'))
					                   <span class="validation_error">{{$errors->first('password')}}</span>
										
									@endif
	                            </div>
				            </div>

		                    <div class="form-group">
		                        <label for="confpassword" class="control-label label-col-31">Confirm Password</label>
					            <div class="field-col-33 field-col">
					                <input type="password" name="password_confirmation"  value="{{old('password_confirmation')}}" class="input-text">
					                @if($errors->has('password_confirmation'))
					                    <span class="validation_error">{{$errors->first('password_confirmation')}}</span>
										
									@endif
	                            </div>
				            </div>

	                    	<div class="form-group">.
	                    		<label class="control-label label-col-32">&nbsp;</label>
	            				<div class="field-col-34 field-col">
	            					
					                <button type="submit" name="submit" id="update" class="button btn-primary">Reset Password</button>
					            </div>
	                    	</div>
                   		</fieldset>
					</form>
	            		</div>
					</div>
				</div> <!-- my-account-container -->
			</div>
		</div>
</div>
        @endsection
  
