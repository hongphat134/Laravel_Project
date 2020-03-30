@extends('admin.layouts.master')
@section('content')
	<h3>User List</h3>
	<table class="table table-striped table-bordered table-hover dataTable display nowrap dtr-inline" id="myDatatable" role="grid" border=1>
		<thead>
			<tr role="row">
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>User Type</th>				
				<th>Remmember Token</th>				
			</tr>
		</thead>
		<tbody>
			@foreach($data as $key => $item)
			<tr role="row" class="{{ ($key%2)?'even':'odd' }}">
				<td>{{$item->id}}</td>
				<td>{{$item->name}}</td>
				<td>{{$item->email}}</td>
				<td>{{ $item->userstype_id == 1 ? 'Admin':'User'}}</td>	
				<td>{{$item->remember_token}}</td>	
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr role="row">
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>User Type</th>				
				<th>Remmember Token</th>				
			</tr>
		</tfoot>
	</table>		

@stop