<!DOCTYPE html>
<html>
<head>
 <title>Edit comments</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('comments') }}">comments Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('comments') }}">View All comments</a></li>
				<li><a href="{{ URL::to('comments/create') }}">Create a comments</a>
			</ul>
		</nav>
		<h1>Edit {{ $comments->id }}</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($comments, array('route' => array('comments.update', $comments->id),
		'method' => 'PUT')) }}
		<div class="form-group">
			{{ Form::label('id', 'ID') }}
			{{ Form::text('id', Input::old('id'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Content') }}
			{{ Form::text('content', Input::old('content'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('created_at', 'Cureated At') }}
			{{ Form::text('created_at', Input::old('created_at'), array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{ Form::label('updated_at', 'Updated At') }}
			{{ Form::text('updated_at', Input::old('updated_at'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('post_id', 'Post ID') }}
			{{ Form::text('post_id', Input::old('post_id'), array('class' => 'form-control'))}}
		</div>
		<div class="form-group">
			{{ Form::label('user_id', 'User ID') }}
			{{ Form::text('user_id', Input::old('user_id'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::open(array('url' => 'comments/' . $comments->id, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete this comments', array('class' => 'btn btn-warning'))}}
			{{ Form::close() }}
		</div>
		{{ Form::submit('Edit the comments!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
</body>
</html>