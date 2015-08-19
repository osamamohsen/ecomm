<?php use App\libs\Availablity; ?>

@extends('layouts.master')

@section('search-keyword')
<hr>
<section id="search-keyword">
	<h1>Search Result For:- <span class="page-header">{!! $keyword !!}</span></h1>
</section>

@stop

@section('content')

<div id="search-results">
	
	@foreach ($products as $product)
	<div class="product">

		<a href="/store/{!! $product->id !!}">
			<img src="{!! $product->image !!}" alt="{!! $product->title !!}" class="feature"
			width="240" height="127">
		</a>
		
		<h3><a href="/store/view/{!! $product->id !!}">{!! $product->title !!}</a></h3>
		
		<p style="min-height:147px; max-height:147px; overflow:hidden;">
		{!! $product->describtion !!}</p>
		
		<h5>
		{{-- Availablity: 
		<span class="{!!Availablity::displayClass($product->availablity )!!}">{!! Availablity::display($product->availablity)!!}
		</span> --}}
		</h5>
		<p>
			{!! Form::open(array('url' => 'store/addtocart')) !!}
			{!! Form::hidden('id',$product->id) !!}
			{!! Form::hidden('qunatitiy',1) !!}
			<button type="submit" class="cart-btn">
			<span class="price">{!! $product->price !!}</span>
			{!! HTML::image('/img/white-cart.gif','Add To Cart') !!}			
			ADD TO CART
			</button>

			{!! Form::close() !!}
		</p>

	</div><!-- End Product -->
	@endforeach

</div><!-- end search Result-->

@stop 