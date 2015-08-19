@extends('layouts.master')
@section('content')

<div id="shopping-cart">
	<h1>Shopping Cart & Checkout</h1>
	<form action="https://www.paybal.com/cgi-bin/webscr" method="post">
	<table border="1">
		<tr>
			<th>#</th>
			<th>Product Name</th>
			<th>Unit Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
		</tr>
		@foreach($products as $product)
			<tr>
				<td>{!! $product->id !!}</td>
				<td>
				{!! HTML::image($product->image,$product->name,array('width'=>'65','height'=>'37')) !!}
					{{-- <img src="/img/main-product.png" alt="Product" width="65" height="37"/> --}}
					${!! $product->name !!}
				</td>
				<td>{!! $product->price !!}</td>
				<td>
				{!! $product->quantitiy !!}
				</td>
				<td>
					${!! $product->price !!}
					<a href="/store/removeitem/{!! $product->identifier !!}">
					{!! HTML::image('/img/remove.gif','Remove Product') !!}
					</a>
				</td>
			</tr>
		@endforeach
		<tr class="total">
			<td colspan="5">
				Subtotal: ${!! Cart::total() !!} <br/>
				<span>TOTAL: ${!! Cart::total() !!}</span>
				
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="office@shop.com">
				<input type="hidden" name="item_name" value="ecommerce Store Purchase">
				<input type="hidden" name="amount" value="{!! Card::total() !!}">
				<input type="hidden" name="firs_tname" value="{!!Auth::user()->firstname!!}">
				<input type="hidden" name="last_name" value="{!! Auth::user()->lastname !!}">
				<input type="hidden" name="email" value="{!! Auth->user()->email !!}">

				{!! HTML::link('/','Continue Shopping',array('class'=>'tertiary-btn')) !!}
				<input type="submit" value="CHECKOUT WITH PAYBAL" class="secondary-cart-btn" />
			</td>
		</tr>
	</table>
	</form>
</div>

@stop