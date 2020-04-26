@extends('layouts.main') 
@section('content')
<main>
	    <div class="container">
		
		<!-- Start Breadcrumb -->
		<div class="row hidden-xs">
		    <div class="col-xs-12 clearfix">
			<ul class="breadcrumb">
			    <li><a href="#">Games</a></li>
			    <li class="active">Flappy Birds</li>
			</ul>
		    </div>
		</div>
		
		<!-- Start product -->
		<section id="product">
		    <div class="row">
			<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">			   
			    <div class="img-product">
				<img src="/images/clumsy-bird-thumbnail.png" alt="" class="img-responsive">
			    </div>
			    <div class="text-center">
				<p class="textsmall">{{__('PlayPoint - Unlimited access to mobile games')}}.</p>
				<p class="subtitle">{{__('Enter your mobile number to access this service')}}:</p><br>
			    </div>
			    <div>
				<form method="POST">
                @csrf
				    <div class="error"></div>
				    <p><input id="msisdn-input" type="tel" name="phone" id="phone" value="" size="9" autofocus="" placeholder="{{__('Your number')}}"></p>
				    <center><input type="submit" class="btn btn-cta" name="select" value="{{__('Login')}}"></center>
				</form>				
			    </div>			    
			</div>
		    </div>
		</section>

	    </div>
	</main>
	<!-- End Main -->

@include('footer.'.App::getLocale())
@endsection

@section('scripts')
@endsection
