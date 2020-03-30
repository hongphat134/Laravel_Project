@extends('admin.layouts.master')
@section('content')
	@if(session('success'))
		<script>
			toastr["success"]( "{{ session('success')}}" , "Success")
		</script>
	@endif
	@if(session('error'))
		<script>
			toastr["error"]( "{{ session('error') }}" , "Error")
		</script>
	@endif
	<h3>Book List</h3>
	<button><a href="{{ route('book.getAdd') }}"><h4>Thêm</h4></a></button>
	<table class="table table-striped table-bordered table-hover dataTable display nowrap dtr-inline" id="myDatatable" role="grid" border=1>
		<thead>
			<tr role="row">
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
			@foreach($data as $key => $item)
			<tr role="row" class="{{ ($key%2)?'even':'odd' }}">
				<td>{{$item->id}}</td>
				<td>{{$item->book_name}}</td>
				<td>{{$item->book_url}}</td>
				<td>{{$item->book_img}}</td>
				<td>{{number_format($item->book_price)}}<sup>đ</sup></td>				
				<td>
					@if($item->book_highlight == 1)
						<div class="alert alert-success">Nổi bật</div>			
					@endif
				</td>				
				<td>
					@if($item->book_promotion == 1)
						<div class="alert alert-danger">Khuyến mãi</div>				
					@endif
				</td>
				<td>{{$item->book_quantity}}</td>
				<td>
					<a href="{{ route('book.delete',[$item->id])}}"><button><i class="fa fa-trash"></i></button></a>
					<a href="{{ route('book.getEdit',[$item->id])}}"><button><i class="fa fa-edit"></i></button></a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr role="row">
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
		</tfoot>
	</table>		
@stop