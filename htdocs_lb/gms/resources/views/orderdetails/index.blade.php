<!DOCTYPE html>
<html>
<head>
<title>Order Detail (Index)</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{
				URL::to('orderdetails') }}">Order Details Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('orderdetails') }}">View All
				Order Details</a></li>
				<li><a href="{{ URL::to('orderdetails/create')
				}}">Create a Order Detail</a></li>
			</ul>
		</nav>
		<h1>All the Order Details</h1>
		<!-- will be used to show any messages -->
		@if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message')}}</div>
		@endif
		<table class="table table-striped table-bordered">
			<thead>
				<tr>
				<th>Detail Description</th>
				<th>Item Cost</th>
				<th>Item Price</th>
				<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orderdetails as $key => $value)
				<tr>
				<td>{{ $value->desc }}</td>
				<td>{{ $value->cost }}</td>
				<td>{{ $value->price }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
				<!-- delete the nerd (uses the destroy method
				DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little
				more complicated than the other two buttons -->
				{{ Form::open(array('url' => 'orderdetails/' .
				$value->detailid, 'class' => 'pull-right')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete this Order Detail',
				array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
				<!-- show the nerd (uses the show method found
				at GET /nerds/{id} -->
				<a class="btn btn-small btn-success" href="{{
				URL::to('orderdetails/' . $value->detailid) }}">Show this Order
				Detail</a>
				<!-- edit this nerd (uses the edit method found
				at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{
				URL::to('orderdetails/' . $value->detailid . '/edit') }}">Edit
				this Order Detail</a>
				</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>
</html>