<!DOCTYPE html>
<html>
<head>
 <title>restaurants (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('restaurants') }}">restaurants Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('restaurants') }}">View All restaurants</a></li>
				<li><a href="{{ URL::to('restaurants/create')}}">Create a restaurants</a>
			</ul>
		</nav>
		<h1>All the restaurants</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message') }}</div>
		@endif
		<table class="table table-striped table-brestaurantsed">
			<thead>
				<tr>
				<th>Restaurant Name</th>
				<th>Restaurant Phone</th>
				<th>Restaurant Address 1</th>
				<th>Restaurant Address 2</th>
				<th>Suburb</th>
				<th>State</th>
				<th>Number Of Seats</th>
				<th>Country</th>
				<th>Category</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($restaurants as $key => $value)
				<tr>
				<td><a href="{{ URL::to('restaurantwithdetails/' . $value->restid)}}">{{ $value->restname }}</a></td>
				<td>{{ $value->restphone }}</td>
				<td>{{ $value->restaddress1 }}</td>
				<td>{{ $value->restaddress2 }}</td>
				<td>{{ $value->suburb }}</td>
				<td>{{ $value->state }}</td>
				<td>{{ $value->numberofseats }}</td>
				<td>{{ $value->countries->name }}</td>
				<td>{{ $value->categories->name }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the restaurants (uses the destroy
				method DESTROY /restaurants/{id} -->
				<!-- we will add this later since its a
				little more complicated than the other two buttons -->
				<!-- Show the restaurants (uses the show method
				found at GET /restaurants/{id} -->
				<a class="btn btn-small btn-success"
				href="{{ URL::to('restaurants/' . $value->restid) }}">Show
				this restaurants</a>
				<!-- Edit this restaurants (uses the edit
				method found at GET /restaurants/{id}/edit -->
				<a class="btn btn-small btn-info"
				href="{{ URL::to('restaurants/' . $value->restid . '/edit')
				}}">Edit this restaurants</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>