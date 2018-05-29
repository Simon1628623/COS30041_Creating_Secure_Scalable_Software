<!DOCTYPE html>
<html>
<head>
<title>Show restaurants</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('restaurants') }}">restaurants Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('restaurants') }}">View All restaurants</a></li>
				<li><a href="{{ URL::to('restaurants/create') }}">Create a restaurants</a>
			</ul>
		</nav>
		<h1>Showing {{ $restaurants->restid }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $restaurants->restid }}</p>
			<p>Restaurant Name: {{ $restaurants->restname }}</p>
			<p>Restaurant Phone: {{ $restaurants->restphone }}</p>
			<p>Restaurant Address 1: {{ $restaurants->restaddress1 }}</p>
			<p>Restaurant Address 2: {{ $restaurants->restaddress2 }}</p>
			<p>Suburb: {{ $restaurants->suburb }}</p>
			<p>State: {{ $restaurants->state }}</p>
			<p>Number Of Seats: {{ $restaurants->numberofseats }}</p>
			<p>Country ID: {{ $restaurants->country_id }}</p>
			<p>Category ID: {{ $restaurants->category_id }}</p>
		</div>
	</div>
</body>
</html>