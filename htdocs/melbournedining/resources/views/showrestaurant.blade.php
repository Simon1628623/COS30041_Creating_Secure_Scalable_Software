<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Restaurants</title>
	<style>
		table,tr,th,td {
			border-style: solid;
		}
	</style>
</head>
<body>
	<table>
		<thead>
			<tr>
			  <th>Restaurants</th>
			  <th>Location</th>
			  <th>Cuisine</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($data as $d)		
			<tr>
				<td>{{$d['Restaurant']}}</td>
				<td>{{$d['Location']}}</td>
				<td>{{$d['Cuisinie']}}</td>
			</tr>			
			@endforeach
		</tbody>
	</table>
</body>
</html>