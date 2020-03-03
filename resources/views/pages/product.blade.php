@extends('layouts.master')
@section('content')
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="{{url('/')}}">Trang chủ</a>
            <span class="breadcrumb-item active">Sản phẩm</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h2>Kết quả tìm kiếm với từ khoá: <span class="badge badge-danger">{{$key}}</span></h2>
            <div class="recent-book-sec">
                <div class="row">
                    <!-- 167 x 260 -->        
                    @foreach($data as $item)
                    <div class="col-md-3">
                        <div class="item">
                            <a href="{{url('product-single/'.$item->book_url)}}">
                                <img style="width: 167px; height: 260px;" src="{!! asset('public/images/'.$item->book_img) !!}" alt="{{$item->book_name}}" title="{{$item->book_name}}">
                            </a>
                            <h3><a href="{{url('product-single/'.$item->book_url)}}"><strong>{{$item->book_name}}</strong></a></h3>
                            @if($item->book_promotion == 1)                        
                            <span class="badge badge-danger">Giảm giá</span>                         
                            </h3>                        
                            <h6>
                                <span class="price">
                                    {{number_format($item->book_price*((100 - PERCENT_OFF) * 0.01)) }}<sup>đ</sup>
                                </span>
                                <strike><sup><span class="price">{{number_format($item->book_price)}}<sup>đ</sup></span> </sup></strike>
                                / <a href="{{ route('addItem',[$item->id]) }}">Mua ngay</a>
                            </h6> 
                            @else                            
                            </h3>                        
                            <h6>
                                <span class="price">{{number_format($item->book_price)}}<sup>đ</sup></span>                            
                                / <a href="{{ route('addItem',[$item->id]) }}">Mua ngay</a>
                            </h6> 
                            @endif
                        </div>
                    </div>                         
                    @endforeach           
                </div>                               
                @include('layouts.paginating')                
            </div>
        </div>
    </section>
@endsection