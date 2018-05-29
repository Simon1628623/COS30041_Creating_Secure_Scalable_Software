<!DOCTYPE html>
<html>
<head>
<title>Show Order Detail</title>
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
		<h1>Showing {{ $orderdetail->detailid }}</h1>
		<div class="jumbotron text-center">
			<p>Description: {{ $orderdetail->desc }}</p>
			<p>Item Cost: {{ $orderdetail->cost }}</p>
			<p>Item Price: {{ $orderdetail->price }}</p>
		</div>
	</div>
</body>
</html>