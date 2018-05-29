<!DOCTYPE html>
<html>
<head>
<title>Show Restaurants</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('restaurants')
				}}">Restaurant Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('restaurants') }}">View All
				Restaurants</a></li>
				<li><a href="{{ URL::to('restaurants/create') }}">Create a
				Restaurant</a>
			</ul>
		</nav>
		<h1>Showing {{ $restaurants->restname }}</h1>
		<div class="jumbotron text-center">
			<p>ID: {{ $restaurants->restid }}</p>
			<p>Name: {{ $restaurants->restname }}</p>
			<p>Phone: {{ $restaurants->restphone }}</p>
			<p>Address 1: {{ $restaurants->restaddress1 }}</p>
			<p>Address 2: {{ $restaurants->restaddress2 }}</p>
			<p>Suburb: {{ $restaurants->suburb }}</p>
			<p>State: {{ $restaurants->state }}</p>
			<p>Number of Seats: {{ $restaurants->numberofseats }}</p>
			<p>Country: {{ $restaurants->countries->name }}</p>
			<p>Category: {{ $restaurants->categories->name }}</p>
									
		</div>
		<h1>{{ $restaurants->restid }} Restaurants Posts</h1>
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
				<th>Content</th>
				<th>Created At</th>
				<th>User name</th>
				<th>Country</th>
				</tr>
			</thead>
			<tbody>
				@foreach($posts = $restaurants->posts as $value)
				<tr>
				<td>{{ $value->content }}</td>
				<td>{{ $value->created_at }}</td>
				<td>{{ $value->users->name }}</td>
				<td>{{ $value->users->countries->name }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
					{{ Form::open(array('url' => 'restaurantwithdetails/' .
					$value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Post',
					array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}
					<!-- show the nerd (uses the show method found
					at GET /nerds/{id} -->
					<a class="btn btn-small btn-success" href="{{
					URL::to('posts/' . $value->id) }}">Show this Post</a>
					<!-- edit this nerd (uses the edit method found
					at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{
					URL::to('posts/' . $value->id . '/edit') }}">Edit
					this Post</a>
				</td>
				</tr>				
				@foreach($value->comments as $child_comments)
				<tr>
				<td>{{ $child_comments->content }}</td>
				<td>{{ $child_comments->created_at }}</td>
				<td>{{ $child_comments->users->name }}</td>
				<td>{{ $child_comments->users->countries->name }}</td>
				<!-- we will also add show, edit, and delete buttons -->
				<td>
					{{ Form::open(array('url' => 'restaurantwithdetails/' .
					$child_comments->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Comment',
					array('class' => 'btn btn-warning')) }}
					{{ Form::close() }}
					<!-- show the nerd (uses the show method found
					at GET /nerds/{id} -->
					<a class="btn btn-small btn-success" href="{{
					URL::to('comments/' . $child_comments->id) }}">Show Comment Details</a>
					<!-- edit this nerd (uses the edit method found
					at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{
					URL::to('comments/' . $child_comments->id . '/edit') }}">Edit
					this Comment</a>
				</td>
				</tr>
				@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>