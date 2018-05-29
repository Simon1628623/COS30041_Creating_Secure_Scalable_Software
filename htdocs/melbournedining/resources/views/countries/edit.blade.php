<!DOCTYPE html>
<html>
<head>
 <title>Edit countries</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('countries') }}">countries Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('countries') }}">View All countries</a></li>
				<li><a href="{{ URL::to('countries/create') }}">Create a countries</a>
			</ul>
		</nav>
		<h1>Edit {{ $countries->id }}</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($countries, array('route' => array('countries.update', $countries->id),
		'method' => 'PUT')) }}
		<div class="form-group">
			{{ Form::label('name', 'Country Name') }}
			{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::open(array('url' => 'countries/' . $countries->id, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete this countries', array('class' => 'btn btn-warning'))}}
			{{ Form::close() }}
		</div>
		{{ Form::submit('Edit the countries!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
</body>
</html>