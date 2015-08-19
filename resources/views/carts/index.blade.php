@extends('layouts.master')
@section('content')

<div id="shopping-cart">
	<h1>Shopping Cart & Checkout</h1>
	{{-- {!! dd($products->toArray()) !!} --}}
	<table border="3">
		<tr>
			<th>#</th>
			<th>Product</th>
			<th>Product Name</th>
			<th>Unit Price</th>
			<th>Quantity</th>
			<th>Subtotal</th>
			<th>Delete</th>
		</tr>
		
		@foreach($products as $product)
			<tr>
				<td>{!! $product->id !!}</td>
				<td>
				{!! HTML::image($product->image,$product->name,array('width'=>'65','height'=>'37')) !!}
				</td>
				<td> {!!  $product->title    !!}</td>
				<td>${!! $product->price    !!}</td>
				<td> {!!  $product->quantity !!}</td>
				<td>${!! $product->price    !!}</td>
				<td>
				{!! Form::open(array('url'=>'cart/'.$product->id ,'method' => 'delete')) !!}
					{!! Form::hidden('quantity',$product->quantity) !!}
					<button value="deleteAll" name="deleteAll" type="submit" class="btn btn-default">
					{{-- <img name="deleteAllimg" src="/img/delete.png" width="20" height="20" /> --}}
					{!! HTML::image('/img/delete.png',"Delete",array('width' => '20','height' => '20')) !!}
					</button>
					@if($product->quantity>1)
						<button name="deleteQuantity" type="submit" class="btn btn-default">
						{{-- <img name="deleteQunimg" src="/img/delete.png" width="20" height="20" /> --}}

						{!! HTML::image('/img/decrease.png',"Delete",array('width' => '20','height' => '20')) !!}
						</button>
					@endif
				{!! Form::close() !!}
				
				</td>
			</tr>
		@endforeach
		{!! Form::open(array('url' => 'https://www.paypal.com/cgi-bin/webscr')) !!}
		<tr class="total">
		{{-- <td></td> --}}
			<td colspan="7"><br/>
			{{-- {!! Cart::total() !!} --}}
				Subtotal: ${!! $total !!} <br/>
				<span class="price">TOTAL: ${!! $total !!}</span><br/>
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="E-Commerce@shop.com">
				<input type="hidden" name="item_name" value="ecommerce Store Purchase">
				<input type="hidden" name="amount" value="{!! $total !!}">
				<input type="hidden" name="first_name" value="{!!Auth::user()->firstname!!}">
				<input type="hidden" name="last_name" value="{!! Auth::user()->lastname !!}">
				<input type="hidden" name="email" value="{!! Auth::user()->email !!}">

				{!! HTML::link('/','Continue Shopping',array('class'=>'tertiary-btn')) !!}
				<input type="submit" value="CHECKOUT WITH PAYBAL" class="secondary-cart-btn" />
			</td>
		</tr>
		{!! Form::close() !!}
	</table>
</div>

@stop