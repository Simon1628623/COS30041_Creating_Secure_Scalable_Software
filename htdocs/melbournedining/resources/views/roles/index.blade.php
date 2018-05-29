<!DOCTYPE html>
<html>
<head>
 <title>roles (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('roles') }}">roles Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('roles') }}">View All roles</a></li>
				<li><a href="{{ URL::to('roles/create')}}">Create a roles</a>
			</ul>
		</nav>
		<h1>All the roles</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message') }}</div>
		@endif
		<table class="table table-striped table-brolesed">
			<thead>
				<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $key => $value)
				<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->name }}</td>
				<td>{{ $value->created_at }}</td>
				<td>{{ $value->updated_at }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the roles (uses the destroy
				method DESTROY /roles/{id} -->
				<!-- we will add this later since its a
				little more complicated than the other two buttons -->
				<!-- Show the roles (uses the show method
				found at GET /roles/{id} -->
				<a class="btn btn-small btn-success"
				href="{{ URL::to('roles/' . $value->id) }}">Show
				this roles</a>
				<!-- Edit this roles (uses the edit
				method found at GET /roles/{id}/edit -->
				<a class="btn btn-small btn-info"
				href="{{ URL::to('roles/' . $value->id . '/edit')
				}}">Edit this roles</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>