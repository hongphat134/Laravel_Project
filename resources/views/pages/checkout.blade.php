@extends('layouts/master')
@section('content')
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">About</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
        	<div class="row">
	            <div class="col-md-7">
	            	<h1 class="text-center"><strong>Checkout</strong></h1>
		        	<form action="{{ route('payment')}}" method="post">
		        		{{csrf_field()}}
		            	<input type="text" name="txtName" class="form-control" placeholder="Consignee Name..." required>
		            	<input type="text" name="txtPhone" class="form-control" placeholder="Consignee Phone..." onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
		            	<input type="text" name="txtAddress" class="form-control" placeholder="Consignee Address..." required>
		            	<textarea name="txtNote" id="" cols="30" rows="10" class="form-control" placeholder="Your Note...."></textarea>
		            	<div class="row">
		            		<div class="col-8"><label class="float-right payment" for="Payment">Your Payment:</label></div>
			            	<div class="col-4">
			            		<select class="form-control" name="txtStatus" id="" >
				            		<option value="Cash">Cash</option>
				            		<option value="Paypal">Paypal</option>
				            	</select>	
			            	</div>	
		            	</div>
	            		<button class="btn btn-checkout form-control">Checkout</button>
	            	</form>	
	            </div>
				
	            <div class="col-md-5">
	            	<h1 class="text-center"><strong>Order</strong></h1>
	            	@foreach(Cart::content() as $item)
					<div class="row">
            			<div class="col-6">{{$item->name}}</div>
            			<div class="col-2"> x {{$item->qty}}</div>
            			<div class="col-4">{{number_format($item->price)}}<sup>đ</sup></div>
            		</div>
	            	@endforeach
	            </div>	
        	</div>
            
            
    </section>
@endsection