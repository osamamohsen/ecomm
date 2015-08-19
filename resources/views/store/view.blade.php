@extends('layouts.master')

@section('content')
<?php use App\libs\Availablity; ?>

<div id="product-image">
	<img src="{!! $product->image !!}" alt="{!! $product->title !!}">
	
</div> <!-- End Product Image -->

<div id="product-details">
	<h1>{!! $product->title !!}</h1>
	<p>{!! $product->describtion !!}</p>
	<hr/>
	{!! Form::open(array('url' => '/cart')) !!}
	{!! Form::token() !!}
{{-- 		{!! Form::label('quantity','QTY') !!}
		{!! Form::text('quantity',1,array('maxlength'=>2)) !!} --}}
		{!! Form::hidden('product_id',$product->id) !!}
		<button type="submit" class="{!! Availablity::ProductAdded($product->id) !!}">
			<span class="price">{!! $product->price !!}</span>
			{!! HTML::image('/img/white-cart.gif','ADD TO CART') !!}
			ADD TO CART
		</button>
		{!! Form::close() !!}
		{!! Form::close() !!}
</div><!-- End Product Details -->

<div id="product-info">
	<p class="price">${!! $product->price !!}</p>
	<p>
		Availablity: 
		<span class="{!!Availablity::displayClass($product->availablity )!!}">{!! Availablity::display($product->availablity)!!}
		</span>
	</p>
	<p>Product Code : <span>{!! $product->id !!}</span></p>
</div><!-- end Produc Info -->
@stop