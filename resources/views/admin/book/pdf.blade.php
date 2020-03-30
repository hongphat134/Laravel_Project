<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDF</title>
</head>
<body>
	<div class="container">
	<h3>Book List</h3>
	<button>Thêm</button>
	<table class="table table-striped table-bordered table-hover" border=1>
		<thead>
			<tr>
				<th>ID</th>
				<th>Book Name</th>
				<th>Book Url</th>
				<th>Book img</th>
				<th>Book price</th>
				<th>Book highlight</th>
				<th>Book promotion</th>
				<th>Book quantity</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->book_name}}</td>
				<td>{{$item->book_url}}</td>
				<td>{{$item->book_img}}</td>
				<td>{{$item->book_price}}</td>
				<td>{{$item->book_highlight}}</td>
				<td>{{$item->book_promotion}}</td>
				<td>{{$item->book_quantity}}</td>
				<td>
					<a href="">Xoá</a>
					<a href="">Sửa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>	
</div>
</body>
</html>