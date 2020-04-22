@extends('layouts.master')

@section('title')
	Laravel Shopping Cart
@endsection

@section('styles')
	
@endsection

@section('content')

@if(Session::has('success'))
<div class="row">
	<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
		<div class="alert alert-success" id="charge-message">
			{{ Session::get('success') }}
		</div>
	</div>
</div> 
@endif

@foreach($products->chunk(3) as $productsChunk)
	<div class="row">

		@foreach($productsChunk as $p)
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="{{$p->imagePath}}" width="100%" alt="..." class="img-responsive">
					<div class="caption">
						<h3>{{$p->title}}</h3>
						<p>{{$p->description}}</p>
						<div class="clearfix">
							<div class="pull-right price">${{$p->price}}</div>
							<a href="add-to-cart/{{$p->id}}" class="btn btn-primary" role="button">Add to cart</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach

	</div>
@endforeach

@endsection	