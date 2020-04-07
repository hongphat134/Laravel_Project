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
	<h3>Order List</h3>
	<table class="table table-striped table-bordered table-hover dataTable display nowrap dtr-inline" id="myDatatable" role="grid" border=1>
		<thead>
			<tr role="row">
				<th>ID</th>
				<th>Consignee Name</th>
				<th>Consignee Email</th>
				<th>Consignee Phone</th>				
				<th>Consignee Address</th>
				<th>Order Status</th>
				<th>Order Situation</th>
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
				<!-- <td>{{$item->order_status == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}</td>	 -->
				<!-- <td>{{$item->order_situation}}</td> -->
				<td>
					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle form-control" type="button" data-toggle="dropdown">{{$item->order_status == 0 ? 'Chưa thanh toán' : 'Đã thanh toán'}}
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					    <li><a href="{{ route('order.editStatus',[$item->id])}}">{{$item->order_status == 1 ? 'Chưa thanh toán' : 'Đã thanh toán'}}</a></li>
					  </ul>
					</div>
				</td>
				<td>
					<div class="dropdown">
					  <button class="btn btn-primary dropdown-toggle form-control" type="button" data-toggle="dropdown">{{$item->order_situation}}
					  <span class="caret"></span></button>
					  <ul class="dropdown-menu">
					  	<li><a href="{{ route('order.editSituation',[$item->id,'Chưa xử lý'])}}">Chưa xử lý</a></li>
					    <li><a href="{{ route('order.editSituation',[$item->id,'Đang xử lý'])}}">Đang xử lý</a></li>
					    <li><a href="{{ route('order.editSituation',[$item->id,'Đã xử lý'])}}">Đã xử lý</a></li>
					    <li><a href="{{ route('order.editSituation',[$item->id,'Đã huỷ'])}}">Đã huỷ</a></li>
					  </ul>
					</div>
				</td>
				<td>
					<a href="{{ route('order.getEdit',[$item->id])}}">
						<button>
							<i class="fa fa-edit"></i>
						</button>
					</a>
					<a href="{{ route('order.pdf',[$item->id])}}">
						<button>
							<i class="fa fa-file-pdf"></i>
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
				<th>Order Situation</th>
				<th></th>
			</tr>
		</tfoot>
	</table>		
@stop