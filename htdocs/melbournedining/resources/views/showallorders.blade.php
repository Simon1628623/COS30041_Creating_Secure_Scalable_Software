<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Existing Orders</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<br/>
		<table border="1">
			<tr>
				<th>Registration Number</th>
				<th>Registration State</th>
				<th>Customer Name</th>
				<th>Customer Phone</th>
				<th>Vehicle Brand</th>
				<th>Vehicle Model</th>
				<th>Vehicle Year</th>
				<th>Vehicle Serial Number</th>
			</tr>
			@for($i = 0; $i < count($orders); $i++)
			<tr>
				<td>{{ $orders[$i]->regno }}</td>
				<td>{{ $orders[$i]->regstate }}</td>
				<td>{{ $orders[$i]->custname }}</td>
				<td>{{ $orders[$i]->custphone }}</td>
				<td>{{ $orders[$i]->vehbrand }}</td>
				<td>{{ $orders[$i]->vehmodel }}</td>
				<td>{{ $orders[$i]->vehyear }}</td>
				<td>{{ $orders[$i]->serialno }}</td>
			</tr>
			@endfor
		</table><br/>
		<p>{{$orders->links('vendor.pagination.bootstrap-4')}}</p>
	</div>
</body>
</html>