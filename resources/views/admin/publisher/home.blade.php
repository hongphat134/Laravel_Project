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
	<h3>Publisher List</h3>
	<button><a href="{{ route('publisher.getAdd') }}">Thêm</a></button>
	<table class="table table-striped table-bordered table-hover dataTable display nowrap dtr-inline" id="myDatatable" role="grid" border=1>
		<thead>
			<tr role="row">
				<th>ID</th>
				<th>Pub Name</th>
				<th>Pub Url</th>
				<th>Pub Des</th>								
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key => $item)
			<tr role="row" class="{{ ($key%2)?'even':'odd' }}">
				<td>{{$item->id}}</td>
				<td>{{$item->pub_name}}</td>
				<td>{{$item->pub_url}}</td>
				<td>{{$item->pub_des}}</td>				
				<td>
					<a href="{{ route('publisher.delete',[$item->id]) }}">
						<button>
							<i class="fa fa-trash"></i>
						</button>
					</a>
					<a href="{{ route('publisher.getEdit',[$item->id])}}">
						<button>
							<i class="fa fa-edit"></i>
						</button>
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr role="row">
				<th>ID</th>
				<th>Pub Name</th>
				<th>Pub Url</th>
				<th>Pub Des</th>								
				<th></th>
			</tr>
		</tfoot>
	</table>		
@stop