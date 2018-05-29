<!DOCTYPE html>
<html>
<head>
 <title>users (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('users') }}">users Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('users') }}">View All users</a></li>
				<li><a href="{{ URL::to('users/create')}}">Create a users</a>
			</ul>
		</nav>
		<h1>All the users</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message') }}</div>
		@endif
		<table class="table table-striped table-busersed">
			<thead>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Password</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Country ID</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $key => $value)
				<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
				<td>{{ $value->password }}</td>
				<td>{{ $value->created_at }}</td>
				<td>{{ $value->updated_at }}</td>
				<td>{{ $value->country_id }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the users (uses the destroy
				method DESTROY /users/{id} -->
				<!-- we will add this later since its a
				little more complicated than the other two buttons -->
				<!-- Show the users (uses the show method
				found at GET /users/{id} -->
				<a class="btn btn-small btn-success"
				href="{{ URL::to('users/' . $value->id) }}">Show
				this users</a>
				<!-- Edit this users (uses the edit
				method found at GET /users/{id}/edit -->
				<a class="btn btn-small btn-info"
				href="{{ URL::to('users/' . $value->id . '/edit')
				}}">Edit this users</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>