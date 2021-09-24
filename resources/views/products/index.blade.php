@extends('layouts.app')

@section('content')

	<div class="products">
		@foreach($products as $product)
			<a class="product-row no-link" href="{{ route('products.show', $product) }}">
				<img src="{{ url($product->image ?? 'img/placeholder.jpg') }}" alt="{{ $product->title }}" class="rounded">
				<div class="product-body">
					<div>
						<h5 class="product-title"><span>{{ $product->title }}</span><em>&euro;{{ $product->price }}</em></h5>
						@unless(empty($product->description))
							<p>{{ $product->description }}</p>
						@endunless

						@if ($product->discount > 0) <!-- https://laravel.com/docs/8.x/blade#if-statements -->
							<div class="discount-price">
								<p>Nu <b>{{ $product->discount }}%</b> korting! Orginele prijs: <b>€{{ $product->getOriginal('price') }}</b></p> <!-- getOriginal: https://laravel.com/docs/8.x/eloquent#examining-attribute-changes -->
							</div>
						@endif
					</div>
					<button class="btn btn-primary">Meer info &amp; bestellen</button>
				</div>
			</a>
		@endforeach
	</div>

@endsection