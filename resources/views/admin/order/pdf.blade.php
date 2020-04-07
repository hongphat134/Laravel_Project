<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDF</title>
	<style>
		label{
			text-align: center;
			font-size: 150%;
		}
		table{
			width: 100%;
		}
		th,td{
			text-align: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<label for="Title"><h2>Order Detail</h2></label>
		<table border=2>
			<thead>
				<tr>
					<th>Book id</th>
					<th>Order id</th>
					<th>qty</th>
					<th>Created</th>
					<th>Updated</th>
				</tr>
			</thead>
			<tbody>
				@foreach($data as $item)
				<tr>
					<td>{{$item['book_id']}}</td>
					<td>{{$item['order_id']}}</td>
					<td>{{$item['orderdetail_quantity']}}</td>
					<td>{{$item['created_at']}}</td>
					<td>{{$item['updated_at']}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>	
	</div>
</body>
</html>