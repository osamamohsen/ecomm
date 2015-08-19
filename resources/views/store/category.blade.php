@extends('layouts.master')
@section('promo')
<?php use App\libs\Availablity; ?>

<section id="promo-alt">
	<div id="promo1">
		<h1>The brand new Macbook</h1>
		<p>with special price<span class="bold">Today only!</span></p>
		<a href="#" class="secondary-btn">READ MORE</a>
		<img src="/img/macbook.png" alt="MacBook pro">
	</div><!-- End div Promo1 -->
	
	<div id="promo2">
		<h2>The Iphone 5 is now<br/>available in our store</h2>
		<a href="" alt="Read more">READ MORE
		<img src="/img/right-arrow.gif"></a>
		<img src="/img/iphone.png" alt="iPhone">
	</div><!-- End div Promo2 -->

	<div id="promo3">
		<img src="/img/thunderbolt.png" alt="Thunderbolt">
		<h2>The 27<br>Thunderbolt Dispaly<br>Simply Stunning</h2>
		<a href="">READ MORE
		<img src="/img/right-arrow.gif"></a>
	</div><!-- End div Promo3 -->

</section><!-- End Promo secitomn -->
@stop

@section('content')

<h2>{!! $category->name !!}</h2>
<hr>
<aside id="categories-menu">
	<h3>CATEGORIES</h3>
	@foreach($catnav as $cat)
		 <li>
		 <a href="/store/category/{!! $cat->id !!}">
		    {!! $cat->name !!}
		 </a> 
	 @endforeach
</aside>

<div id="listings">
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
		Availablity: 
		<span class="{!!Availablity::displayClass($product->availablity )!!}">{!! Availablity::display($product->availablity)!!}
		</span>
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
</div><!-- End listings div -->

@stop

@section('pagination')

<section id="pagination">
	{!! $products->render() !!}
</section><!-- End Pagination -->
@stop
