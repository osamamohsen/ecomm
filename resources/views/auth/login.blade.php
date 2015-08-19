@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<!-- <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}"> -->
					{!! Form::open(array('action' => 'UsersController@postsignin' )) !!}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6 form-group">
							{!! Form::email('email', '' ,array('class' => 'form-control')) !!}
								{{-- <input type="email" class="form-control" name="email" value="{{ old('email') }}"> --}}
							
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6 form-group">
								{!! Form::password('password',array('class' => 'form-control')) !!}
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
							{{--	<b utton type="submit" class="btn btn-primary">Login</button> --}}
								{!! Form::submit('Login',array('class' => 'btn btn-primary')) !!}
								
								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
