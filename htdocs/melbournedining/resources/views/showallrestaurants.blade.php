<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Existing Restaurants</title>
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
	<div class="container">
		<br/>
		<table border="1">
			<tr>
				<th>Restaurant ID</th>
				<th>Restaurant Name</th>
				<th>Restaurant Phone</th>
				<th>Restaurant Address Line 1</th>
				<th>Restaurant Address Line 2</th>
				<th>Suburb</th>
				<th>State</th>
				<th>Number of Seats</th>
			</tr>
			@for($i = 0; $i < count($restaurants); $i++)
			<tr>
				<td>{{ $restaurants[$i]->restid }}</td>
				<td>{{ $restaurants[$i]->restname }}</td>
				<td>{{ $restaurants[$i]->restphone }}</td>
				<td>{{ $restaurants[$i]->restaddress1 }}</td>
				<td>{{ $restaurants[$i]->restaddress2 }}</td>
				<td>{{ $restaurants[$i]->suburb }}</td>
				<td>{{ $restaurants[$i]->state }}</td>
				<td>{{ $restaurants[$i]->numberofseats }}</td>
			</tr>
			@endfor
		</table><br/>
		<p>{{$restaurants->links('vendor.pagination.bootstrap-4')}}</p>
	</div>
</body>
</html>