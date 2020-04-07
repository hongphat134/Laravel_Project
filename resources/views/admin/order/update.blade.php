@extends('admin.layouts.master')
@section('content')
	<form action="{{ route('order.postEdit',[$order->id]) }}" method="post">
		{{csrf_field()}}
		<div class="control-group">
			Consignee Name: <input type="text" class="form-control" name="txtName" value="{{$order->consignee_name}}" required>
		</div>
		<div class="control-group">
			Consignee Email: <input type="email" class="form-control" name="txtEmail" value="{{$order->consignee_email}}" required>
		</div>
		<div class="control-group">
			Consignee Phone: <input type="text" class="form-control" name="txtPhone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$order->consignee_phone}}" required>
		</div>
		<div class="control-group">
			Consignee Address: <input type="text" class="form-control" name="txtAddress" value="{{$order->consignee_add}}" required>
		</div>

		<!-- <div class="control-group" dir="rtl">
	        <label for="input-tags">:Order Status</label>
	        <select name="txtStatus" class="select-state" placeholder="Select a state..." required>
	        	<option value="0">Chưa thanh toán</option>
	        	<option value="1" {{$order->order_status == 1 ? 'selected' : ''}}>Đã thanh toán</option>>
	        </select>
	    </div>	
		<div class="control-group" dir="rtl">
	        <label for="input-tags">:Order Situation</label>
	        <select name="txtSituation" class="select-state" placeholder="Select a situation..." required>
	        	<option value="Chưa xử lý" {{ !strcasecmp($order->order_situation,'Chưa xử lý')?'selected' : ''}}>Chưa xử lý</option>
	        	<option value="Đang xử lý" {{ !strcasecmp($order->order_situation,'Đang xử lý')?'selected' : ''}}>Đang xử lý</option>
	        	<option value="Đã xử lý" {{ !strcasecmp($order->order_situation,'Đã xử lý')?'selected' : ''}}>Đã xử lý</option>
	        	<option value="Đã huỷ" {{ !strcasecmp($order->order_situation,'Chưa huỷ')?'selected' : ''}}>Đã huỷ</option>
	        </select>
	    </div> -->
		
		<div class="control-group">
			<button type="submit" class="form-control btn btn-primary">Lưu</button>
		</div>
	</form>
	<script>
		 $('.select-state').selectize({
	    	plugins: ['remove_button'],
	        persist: false,
	        createOnBlur: true,
	        create: true
	    });
	</script>
@endsection