@extends('layouts.master')
@section('content')
@include('errors.error')
<div id="new-account">
	<h2>Create New Account</h2>

		{!! Form::open(array('url' => 'users')) !!}
		<p>
		<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''  }}">
			{!! Form::label('First name') !!}
			{!! $errors->first('firstname','<span class="help-block">:message</span>') !!}
			{!! Form::text('firstname',null,['class' => 'form-control']) !!}
		</div>
		</p>

		<p>
		<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''  }}">
			{!! Form::label('Last name') !!}
			{!! $errors->first('lastname','<span class="help-block">:message</span>') !!}
			{!! Form::text('lastname',null,['class' => 'form-control']) !!}
		</div>
		</p>

		<p>
		<div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
			{!! Form::label('Email') !!}
			{!! $errors->first('email','<span class="help-block">:message</span>') !!}
			{!! Form::text('email',null,['class' => 'form-control']) !!}
		</div>
		</p>

		<p>
		<div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
			{!! Form::label('Password') !!}
			{!! $errors->first('password','<span class="help-block">:message</span>') !!}
			{!! Form::password('password',['class' => 'form-control']) !!}
		</div>
		</p>

		<p>
		<div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''  }}">
			{!! Form::label('Confirm Password') !!}
			{!! $errors->first('password_confirmation','<span class="help-block">:message</span>') !!}
			{!! Form::password('password_confirmation',['class' => 'form-control']) !!}
		</div>
		</p>

		<p>
		<div class="form-group {{ $errors->has('telephone') ? 'has-error' : ''  }}">
			{!! Form::label('Telephone') !!}
			{!! $errors->first('telephone','<span class="help-block">:message</span>') !!}
			{!! Form::text('telephone',null,['class' => 'form-control']) !!}
		</div>
		</p>

		{!! Form::submit('CREATE NEW ACCOUNT',array('class' => 'secondary-cart-btn')) !!}
		{!! Form::close() !!}
	
</div><!-- end new Accoutn -->

@stop