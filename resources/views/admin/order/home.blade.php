@extends('admin.layouts.master')
@section('content')
	<h3>Order List</h3>
	<button></button>
	<table class="table table-striped table-bordered table-hover dataTable display nowrap dtr-inline" id="myDatatable" role="grid" border=1>
		<thead>
			<tr role="row">
				<th>ID</th>
				<th>Consignee Name</th>
				<th>Consignee Email</th>
				<th>Consignee Phone</th>				
				<th>Consignee Address</th>
				<th>Order Status</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key => $item)
			<tr role="row" class="{{ ($key%2)?'even':'odd' }}">
				<td>{{$item->id}}</td>
				<td>{{$item->consignee_name}}</td>
				<td>{{$item->consignee_email}}</td>
				<td>{{$item->consignee_phone}}</td>	
				<td>{{$item->consignee_add}}</td>	
				<td>{{$item->order_status}}</td>	
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
				<th>Consignee Name</th>
				<th>Consignee Email</th>
				<th>Consignee Phone</th>				
				<th>Consignee Address</th>
				<th>Order Status</th>
				<th></th>
			</tr>
		</tfoot>
	</table>		
@stop