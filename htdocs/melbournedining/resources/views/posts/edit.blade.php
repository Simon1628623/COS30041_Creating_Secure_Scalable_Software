<!DOCTYPE html>
<html>
<head>
 <title>Edit posts</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('posts') }}">posts Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('posts') }}">View All posts</a></li>
				<li><a href="{{ URL::to('posts/create') }}">Create a posts</a>
			</ul>
		</nav>
		<h1>Edit {{ $posts->id }}</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($posts, array('route' => array('posts.update', $posts->id),
		'method' => 'PUT')) }}
		<div class="form-group">
			{{ Form::label('content', 'Content') }}
			{{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('restaurant_id', 'Restaurant ID') }}
			{{ Form::text('restaurant_id', Input::old('restaurant_id'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('user_id', 'User ID') }}
			{{ Form::text('user_id', Input::old('user_id'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::open(array('url' => 'posts/' . $posts->id, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete this posts', array('class' => 'btn btn-warning'))}}
			{{ Form::close() }}
		</div>
		{{ Form::submit('Edit the posts!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
</body>
</html>