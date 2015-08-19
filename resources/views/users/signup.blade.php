@extends('layouts.master')
@section('content')
@include('errors.error')

<section id="new-account">
	<h2>I have an account</h2>
	{!! Form::open(array('action' => 'UsersController@postsignin' )) !!}
		<p> 
		<div class="form-group">
			<img src="/img/email.gif" alt="Email Address">
			{!! Form::text('email' , null , 
			array('class' => 'form-control','placeholder' => 'E-mail Address')) !!}
		</div>

		</p>

		<p>
		<div class="form-group">

			<img src="/img/password.gif" alt="Password">
			{!! Form::password('password', 
			array('class' => 'form-control' ,'placeholder' => 'Password')) !!}
		</div>
		</p> 	
		{!! Form::submit('SIGN IN', ['class' => 'btn btn-info']) !!}
	
	{!! Form::close() !!}
</section> <!-- End sign in -->

<section id="signup">
	<h2>I'm a new customer</h2>
	<h3>You can create a new account in just a few simple steps.<br/>
	Click below to begin.</h3>
	<a href="users/create" class="default-btn">CREATE NEW ACCOUNT</a>
</section><!-- End sign out -->

@stop