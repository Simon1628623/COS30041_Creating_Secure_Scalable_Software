<!DOCTYPE html>
<html>
<head>
<title>Show Order</title>
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{ URL::to('orders')
				}}">Orders Alert</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{ URL::to('orders') }}">View All
				Orders</a></li>
				<li><a href="{{ URL::to('orders/create') }}">Create a
				Order</a></li>
				<li><a href="{{ URL::to('orders/createorderdetailswithorderid/' . $order->orderid) }}">Create a Order Detail</a> </li>
			</ul>
		</nav>
		<h1>Showing {{ $order->regno }}</h1>
		<div class="jumbotron text-center">
			<p>Registration Number: {{ $order->regno }}</p>
			<p>Registration State: {{ $order->regstate }}</p>
			<p>Customer Name: {{ $order->custname }}</p>
			<p>Customer Phone: {{ $order->custphone }}</p>
			<p>Vehicle Brand: {{ $order->vehbrand }}</p>
			<p>Vehicle Model: {{ $order->vehmodel }}</p>
			<p>Vehicle Year: {{ $order->vehyear }}</p>
			<p>Vehicle Serial Number: {{ $order->serialno }}</p>
		</div>
		<h1>{{ $order->regno }} Order Details</h1>
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
				@foreach($order->orderdetails as $key => $value)
				<tr>
				<td>{{ $value->desc }}</td>
				<td>{{ $value->cost }}</td>
				<td>{{ $value->price }}</td>
				<!-- we will also add show, edit, and delete
				buttons -->
				<td>
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