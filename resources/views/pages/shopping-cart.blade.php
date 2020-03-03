@extends('layouts.master')
@section('content')
	@if(Cart::count() > 0)
	<table border=1>
		<tr>
			<td>Action</td>
			<td>Action</td>
			<td>Tên sách</td>
			<td>Hình ảnh</td>
			<td>Giá</td>
			<td>Số lượng</td>
		</tr>		 
	@foreach(Cart::content() as $item)
		<tr>
		<form action="{{ route('updateItem',$item->rowId) }}" method="GET" >	
			<td>								
				<button type="submit" class="fa fa-edit"></button>
			</td>
			<td>								
				<a class="fa fa-close" href="{{ route('removeItem',$item->rowId) }}"></a>
			</td>
			<td>{{$item->name}}</td>
			<td><img style="width: 100px; height: 150px;" src="{{ asset('./public/images/'.$item->options->img) }}" alt="{{$item->name}}"></td>
			<td>{{ number_format($item->price) }}<sup>đ</sup></td>
			<td><input type="number" name="qty" value="{{$item->qty}}" min=1 max=99></td>
		</form>
		</tr>		 
	@endforeach	
	</table>
	<hr>
	<div><a href="{{ route('destroyItems') }}">Xoá toàn bộ giỏ hàng</a></div>
	@else Giỏ hàng rỗng!
	@endif
	<div>
	Tổng tiền: {{ number_format((double)Cart::total(),3,',','.') }}<sup>đ</sup> <hr> 
	Subtotal: {{ number_format((double)Cart::subtotal(),3,',','.') }}<sup>đ</sup> <hr>
	Tax: {{ number_format((double)Cart::tax(),3,',','.') }}<sup>đ</sup> <hr>
	</div>
@endsection