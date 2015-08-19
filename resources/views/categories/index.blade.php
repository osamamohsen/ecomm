
@extends('layouts.master')
@section('content')
	<div id="admin">
		<h1>Category Admin Panel</h1>
		<p>Here you can view, delete, and create new categories.</p>
		<h2>Categories</h2><hr>
		<ul>
			@foreach($categories as $category)
				<li>
	{!! $category->name !!} -
	{!! Form::open(array('url' => 'categories/'.$category->id , 'class' => 'form-inline' ,'method' => 'delete')) !!}

{!! Form::hidden('id',$category->id) !!}
{!! Form::submit('delete') !!}

	{!! Form::close() !!}

				</li>
			@endforeach

		</ul>
		<h2>Create New Category</h2><hr>
		@include('errors/error')
		
		{!! Form::open(array('url' => 'categories')) !!}
		<p>
		<div class="form-group {{ $errors->has('name') ? 'has-error' : ''  }}">
			{!! Form::label('name') !!}
			{!! $errors->first('name','<span class="help-block">:message</span>') !!}
			{!! Form::text('name',null,['class' => 'form-control']) !!}
		</div>
		</p>

		{!! Form::submit('Create Category' , array('class' => 'secondary-cart-btn')) !!}

		{!! Form::close() !!}
		</div><!-- end Admin -->

@stop