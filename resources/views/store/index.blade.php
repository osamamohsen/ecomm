@extends('layouts.master')
@section('promo')

<?php 
use App\libs\Availablity;
// use Availablity;
?>

<section id="promo">
	<div id="promo-details">
		<h1>Today Deals</h1>
		<p>Checkout this section of<br/>
		products at a discount price.</p>
		<a href="#" class="default-btn">STOP NOW</a>
	</div>
	<img src="/img/promo.png" alt="Promotional Ad">
</section>

@stop

@section('content')
<h2 class="page-header">All Products</h2>
<div id="products">
	@foreach ($products as $product)
	
	<div class="product">
		{!! Form::label('id',$product->id,['class' => 'hidden']) !!}
		{{-- {!! Form::label('id',$product->id) !!} --}}
		<a href="/store/{!! $product->id !!}">
		<img src="{!! $product->image !!}" alt="{!! $product->title !!}" class="feature"
			width="240" height="127">
		</a>		
		<h3><a href="/store/{!! $product->id !!}">{!! $product->title !!}</a></h3>
		<p style="min-height:147px; max-height:147px; overflow:hidden;">
		{!! $product->describtion !!}</p>
		
		<h5>
		Availablity: 
		<span class="{!!Availablity::displayClass($product->availablity )!!}">{!! Availablity::display($product->availablity)!!}
		</span>
		</h5>
		<p>
			{!! Form::open(array('url' => 'cart')) !!}
			{!! Form::token() !!}
			{!! Form::hidden('product_id',$product->id) !!}
			{!! Form::hidden('qunatitiy',1) !!}
{{-- cart-btn --}}
			<button type="submit" class="{!! Availablity::ProductAdded($product->id) !!}">
			<span class="price">{!! $product->price !!}</span>
			{!! HTML::image('/img/white-cart.gif','Add To Cart') !!}			
			ADD TO CART
			</button>

			{!! Form::token() !!}
			{!! Form::close() !!}
		</p>
	

{{-- 
<a href="#" class="cart-btn">
			<span class="price">{!! $product->price !!}</span>
			<img src="/img/white-cart.gif" alt="Add To Card">ADD TO CART
			</a> --}}
	</div><!-- End Product -->
	@endforeach

</div><!-- End Products -->

@stop
@section('pagination')

<section id="pagination">
	{!! $products->render() !!}
</section><!-- End Pagination -->
@stop