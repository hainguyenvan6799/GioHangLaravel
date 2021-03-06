{{-- <h2>{{ var_dump($products)}}</h2>

<h3>Tong so luong la: {{ $totalQty }}</h3>
<h4>Tong tien la: {{ $totalPrice }}</h4> --}}
@extends('layouts.master')

@section('title')
	Laravel Shopping Cart
@endsection

@section('content')
	@if(Session::has('cart'))
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">

				<ul class="list-group">
					@foreach($products as $p)
						<li class="list-group-item">
							<span class="badge badge-success float-right">{{ $p['qty'] }}</span>
							<strong>{{ $p['item'] }}</strong>
							<span class="label label-success">${{ $p['price'] }}</span>
							<div class="btn-group">
								<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
								<ul class="dropdown-menu">
									<li><a href="#">Reduce  by 1</a></li>
									<li><a href="#">Reduce All</a></li>
								</ul>
							</div>
						</li>
					@endforeach
				</ul>

			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<strong>Total: {{ $totalPrice }}</strong>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<a href="{{ route('checkout') }}" type="button" class="btn btn-success">Checkout</a>
			</div>
		</div>
	@else
		<div class="row">
			<div class="col-sm-6 col-md-6 col-sm-offset-3 col-md-offset-3">
				<h2>No items in Cart</h2>
			</div>
		</div>
	@endif
@endsection