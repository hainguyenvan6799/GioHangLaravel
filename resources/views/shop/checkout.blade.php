@extends('layouts.master')

@section('title')
	Checkout Shopping Cart
@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/checkout.css') }}">
@endsection	

@section('content')
<div class="container">
	<div class="col-md-6 col-sm-4 col-md-offset-4 col-sm-offset-3">
		<h1>CheckOut</h1>
		<h4>Your Total: ${{ $total }}</h4>

		@if(Session::has('error'))
			<div id="charge-error" class="alert alert-danger">
				{{ Session::get('error') }}
			</div>
		@endif

		@if(Session::has('success'))
			<div class="alert alert-success">
				{{ Session::get('success') }}
			</div>
		@endif
		{{-- <div class="alert alert-danger" id="charge-error {{ !Session::has('error') ? 'hidden' : ''  }}">
			{{ Session::get('error') }}
		</div> --}}
		
		<form method="post" action="{{ route('checkout') }}" id="checkout-form">
			{{csrf_field()}}

				<div class="col-xs-12">
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" class="form-control" required="">
					</div>
				</div>

				<div class="col-xs-12">
					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" id="address_zip" name="address" class="form-control" required="">
					</div>
				</div>

				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-name">Card Holder Name</label>
						<input type="text" id="card-name" class="form-control" required="">
					</div>
				</div>

				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-email">Email</label>
						<input type="text" id="card-name" name="email" class="form-control" required="">
					</div>
				</div>
				<hr>
				{{-- <div class="col-xs-12">
					<div class="form-group">
						<label for="card-number">Credit Card Number</label>
						<input type="text" id="card-number" class="form-control" required="">
					</div>
				</div> --}}

				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-element">Credit or debit card</label>
						<div id="card-element">
					      <!-- A Stripe Element will be inserted here. -->
					    </div>
					</div>
				</div>

				<div id="card-errors" role="alert"></div>

				{{-- <div class="col-xs-12">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group" style="margin-left: 15px;">
								<label for="card-expiry-month">Expiration Month</label>
								<input type="text" id="card-expiry-month" class="form-control" required="">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group" style="margin-left: 25px;">
								<label for="card-expiry-year">Expiration Year</label>
								<input type="text" id="card-expiry-year" class="form-control" required="">
							</div>
						</div>
					</div>
				</div>

				<div class="col-xs-12">
					<div class="form-group">
						<label for="card-cvc">CVC</label>
						<input type="text" id="card-cvc" class="form-control" required="">
					</div>
				</div> --}}
				<button type="submit" class="btn btn-success">Buy Now</button>
		</form>
	</div>
</div>
@endsection

@section('scripts')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://js.stripe.com/v3/"></script>
	<script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection

{{-- https://viblo.asia/p/dung-thu-stripe-phan-1-maGK7j1D5j2 --}}
{{-- https://www.youtube.com/watch?v=EildM6OMcoQ&list=PL0ASNGtxbBEBpj907J9Qmw1PbtwJp6n1B&index=14 --}}