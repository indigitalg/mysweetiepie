@extends('layouts.sweetiepie')
@section('contents')
    <div class="ps-hero__content" style="height:300px !important;min-height:0px">
        <h1>Retrieve Password</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="active">Retrieve Password</li>
          </ol>
        </div>
    </div>
    <br>
    
    <center>
     <div>
         @if(isset($user))
								<div style="text-align:center;padding-top: 25px;">
									<p>
										{!!$user->firstname.' '.$user->lastname!!}, please check your email for Password reset link
									</p>

								</div>
								@else
      <div class="container">
        <h4 style="line-height: 250%;">Forget Your Password?</h4>
        	<form action="" class="form-horizontal" method="post" accept-charset="utf-8">
        	    @csrf
        <div class="form-group">
         <label>Enter your Email</label>
         <input type="text" class="form-control" style="border-radius:40px;width:300px" placeholder="Enter Your email Id" name="email">   
         <input type="hidden" name="retrieve" value="password">
        </div>
        
        <button type="submit" class="ps-btn ps-btn--yellow submit-order"> Retrieve your Password</button>
        </form>
        
      </div>
      @endif
     </div>
    </center>
   
    @endsection