<!DOCTYPE html>
<html>
<head>
<title>Create Order Detail</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{
				URL::to('orderdetails') }}">Order Details Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('orderdetails') }}">View All
				Order Details</a></li>
				<li><a href="{{ URL::to('orderdetails/create')
				}}">Create a Order Detail</a></li>
			</ul>
		</nav>
		<h1>Create a Order Detail</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::open(array('url' => 'orderdetails')) }}
		<div class="form-group">
			{{ Form::label('desc', 'Detail Description') }}
			{{ Form::text('desc', Input::old('desc'), array('class'=> 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('cost', 'Item Cost') }}
			{{ Form::text('cost', Input::old('cost'), array('class'=> 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('price', 'Item Price') }}
			{{ Form::text('price', Input::old('price'),
			array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('orderid', 'Order ID') }}
			{{ Form::text('orderid', Input::old('orderid'),
		array('class' => 'form-control')) }}
		</div>
			{{ Form::submit('Create the Order Detail!', array('class'=> 'btn btn-primary')) }}
			{{ Form::close() }}
	</div>
</body>
</html>