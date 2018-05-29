<!DOCTYPE html>
<html>
<head>
 <title>Edit Restaurant</title>
 <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('restaurants') }}">Restaurants Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('restaurants') }}">View All Restaurants</a></li>
				<li><a href="{{ URL::to('restaurants/create') }}">Create a Restaurant</a>
			</ul>
		</nav>
		<h1>Edit {{ $restaurants->restid }}</h1>
		<!-- if there are creation errors, they will show here -->
		{{ HTML::ul($errors->all()) }}
		{{ Form::model($restaurants, array('route' => array('restaurants.update', $restaurants->restid), 'method' => 'PUT')) }}
		<div class="form-group">
			{{ Form::label('restname', 'Restaurant Name') }}
			{{ Form::text('restname', Input::old('restname'), array('class' => 'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('restphone', 'Restaurant Phone') }}
			{{ Form::text('restphone', Input::old('restphone'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('restaddress1', 'Restaurant Address 1') }}
			{{ Form::text('restaddress1', Input::old('restaddress1'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('restaddress2', 'Restaurant Address 2') }}
			{{ Form::text('restaddress2', Input::old('restaddress2'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('suburb', 'Suburb') }}
			{{ Form::text('suburb', Input::old('suburb'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('state', 'State') }}
			{{ Form::text('state', Input::old('state'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('numberofseats', 'Number of Seats') }}
			{{ Form::text('numberofseats', Input::old('numberofseats'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('country_id', 'Country ID') }}
			{{ Form::text('country_id', Input::old('country_id'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::label('category_id', 'Category ID') }}
			{{ Form::text('category_id', Input::old('category_id'), array('class' => 'formcontrol'))}}
		</div>
		<div class="form-group">
			{{ Form::open(array('url' => 'restaurants/' . $restaurants->restid, 'class' => 'pull-right')) }}
			{{ Form::hidden('_method', 'DELETE') }}
			{{ Form::submit('Delete this Restaurant', array('class' => 'btn btn-warning'))}}
			{{ Form::close() }}
		</div>
		{{ Form::submit('Edit the Restaurant!', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
</body>
</html>