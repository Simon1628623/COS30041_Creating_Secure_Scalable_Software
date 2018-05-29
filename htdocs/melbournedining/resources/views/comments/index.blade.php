<!DOCTYPE html>
<html>
<head>
 <title>comments (Index)</title>
 <link rel="stylesheet"
href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('comments') }}">comments Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('comments') }}">View All comments</a></li>
				<li><a href="{{ URL::to('comments/create')}}">Create a comments</a>
			</ul>
		</nav>
		<h1>All the comments</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{Session::get('message') }}</div>
		@endif
		<table class="table table-striped table-bcommentsed">
			<thead>
				<tr>
				<th>ID</th>
				<th>Content</th>
				<th>Created At</th>
				<th>Updated At</th>
				<th>Post ID</th>
				<th>User ID</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($comments as $key => $value)
				<tr>
				<td>{{ $value->id }}</td>
				<td>{{ $value->content }}</td>
				<td>{{ $value->created_at }}</td>
				<td>{{ $value->updated_at }}</td>
				<td>{{ $value->post_id }}</td>
				<td>{{ $value->user_id }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the comments (uses the destroy
				method DESTROY /commentss/{id} -->
				<!-- we will add this later since its a
				little more complicated than the other two buttons -->
				<!-- Show the comments (uses the show method
				found at GET /commentss/{id} -->
				<a class="btn btn-small btn-success"
				href="{{ URL::to('comments/' . $value->id) }}">Show
				this comments</a>
				<!-- Edit this comments (uses the edit
				method found at GET /commentss/{id}/edit -->
				<a class="btn btn-small btn-info"
				href="{{ URL::to('comments/' . $value->id . '/edit')
				}}">Edit this comments</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>