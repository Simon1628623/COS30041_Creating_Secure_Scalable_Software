<!DOCTYPE html>
<html>
<head>
<title>Show Order</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ URL::to('orders')}}">Orders Alert</a>
		</div>
		<ul class="nav navbar-nav">
			<li><a href="{{ URL::to('orders') }}">View All
			Orders</a></li>
			<li><a href="{{ URL::to('orders/create') }}">Create a
			Order</a>
		</ul>
		</nav>
		<h1>Showing {{ $order->regno }}</h1>
		<div class="jumbotron text-center">
			<p>Registration Number: {{ $order->regno }}</p>
			<p>Registration State: {{ $order->regstate }}</p>
			<p>Customer Name: {{ $order->custname }}</p>
			<p>Customer Phone: {{ $order->custphone }}</p>
			<p>Vehicle Brand: {{ $order->vehbrand }}</p>
			<p>Vehicle Model: {{ $order->vehmodel }}</p>
			<p>Vehicle Year: {{ $order->vehyear }}</p>
			<p>Vehicle Serial Number: {{ $order->serialno }}</p>
		</div>
		<h1>Create a Order Detail</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		@if (Session::has('message'))
		<div class="alert alert-info">
			{{Session::get('message') }}
		</div>
		@endif
		{{ Form::open(array('url' => 'orders/createorderdetailswithorderid')) }}
		<div class="form-group">
			{{ Form::label('desc', 'Detail Description') }}
			{{ Form::text('desc', Input::old('desc'),
			array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('cost', 'Item Cost') }}
			{{ Form::text('cost', Input::old('cost'),
			array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('price', 'Item Price') }}
			{{ Form::text('price', Input::old('price'),
			array('class' => 'form-control')) }}
		</div>
		{{ Form::hidden('orderid', $order->orderid,
		array('id' => 'orderid')) }}
		{{ Form::submit('Create the Order Detail!',
		array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
	</div>
</body>
</html>