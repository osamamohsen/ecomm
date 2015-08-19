
@extends('layouts.master')
@section('content')
	<div id="admin">
		<h1>Product Admin Panel</h1>
		<p>Here you can view, delete, and create new product.</p>
		<h2>Products</h2><hr>
		<ul>
			@foreach($products as $product)
				<li>
				<img src="{!! $product->image !!}" width="50">
	{!! $product->title !!} -
	{!! Form::open(array('url' => 'products/'.$product->id , 'class' => 'form-inline' ,'method' => 'delete')) !!}

{!! Form::hidden('id',$product->id) !!}
{!! Form::submit('delete') !!}
{{-- {!! Form::image('/img/remove.gif') !!} --}}

	{!! Form::close() !!} -

	{!! Form::open(array('url' => 'products/'.$product->id ,'class' => 'form-inline','method'=>'put')) !!}
		{!! Form::hidden('id',$product->id) !!}
		{!! Form::select('availablity',array('1'=>'In Stuck','0'=>'Out Stuck'),$product->availablity) !!}
{!! Form::submit('Update') !!}

	{!! Form::close() !!}

				</li>
			@endforeach

		</ul>

         {{-- ('category_id','title','describtion','price','availablity','image'); --}}
		<h2>Create New Product</h2><hr>
         @include('errors.error')
		
		{!! Form::open(array('url' => 'products','files'=>true)) !!}
		<p>
		<div class="form-group">
			{!! Form::label('category_id','Category') !!}
			{!! Form::select('category_id',$categories,null,array('class' => 'form-control')) !!}
		</div>
		</p>
		<p>
		<div class="form-group {{ $errors -> has('title') ? 'has-error' : '' }}">
			{!! Form::label('title') !!}
			{!! $errors->first('title','<span class="help-block">:message</span>') !!}
			{!! Form::text('title',null,array('class' => 'form-control')) !!}
		</div>
		</p>
		<p>
		<div class="form-group {{ $errors -> has('describtion') ? 'has-error' : '' }}">
			{!! Form::label('describtion') !!}
			{!! $errors->first('describtion','<span class="help-block">:message</span>') !!}
			{!! Form::textarea('describtion',null,array('class' => 'form-control')) !!}
		</div>
		</p>
		<p>
		<div class="form-group {{ $errors -> has('price') ? 'has-error' : '' }}">
			{!! Form::label('price') !!}
			{!! $errors->first('price','<span class="help-block">:message</span>') !!}
			{!! Form::text('price',null,array('class' => 'form-control')) !!}
		</div>
		</p>

		<p>
			<div class="form-group {{ $errors -> has('image') ? 'has-error' : '' }}">
			{!! Form::label('image') !!}
			{!! $errors->first('image','<span class="help-block">:message</span>') !!}
			{!! Form::file('image',array('class' => 'form-control')) !!}
		</div>
		</p>

		{!! Form::submit('Create Product' , array('class' => 'secondary-cart-btn')) !!}

		{!! Form::close() !!}
		</div><!-- end Admin -->

@stop