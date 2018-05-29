<!DOCTYPE html>
<html>
<head>
 <title>Roles User (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('roles_user') }}">roles_user Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('roles_user') }}">View All roles_user</a></li>
				<li><a href="{{ URL::to('roles_user/create')}}">Create a roles_user</a>
			</ul>
		</nav>
		<h1>All the roles_user</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message') }}</div>
		@endif
		<table class="table table-striped table-broles_usered">
			<thead>
				<tr>
				<th>User ID</th>
				<th>Role ID</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles_user as $key => $value)
				<tr>
				<td>{{ $value->user_id }}</td>
				<td>{{ $value->role_id }}</td>
				<td>{{ $value->created_at }}</td>
				<td>{{ $value->updated_at }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the roles_user (uses the destroy
				method DESTROY /roles_user/{user_id} -->
				<!-- we will add this later since its a
				little more complicated than the other two buttons -->
				<!-- Show the roles_user (uses the show method
				found at GET /roles_user/{user_id} -->
				<a class="btn btn-small btn-success"
				href="{{ URL::to('roles_user/' . $value->user_id) }}">Show
				this roles_user</a>
				<!-- Edit this roles_user (uses the edit
				method found at GET /roles_user/{user_id}/edit -->
				<a class="btn btn-small btn-info"
				href="{{ URL::to('roles_user/' . $value->user_id . '/edit')
				}}">Edit this roles_user</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>