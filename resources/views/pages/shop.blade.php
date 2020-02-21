@extends('layouts.master')
@section('content')
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="index.html">Home</a>
            <span class="breadcrumb-item active">Shop</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h2>Những loại sách nổi bật</h2>
            <div class="recomended-sec">
                <div class="row">    
                    @foreach($data_highlight as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img style='height:200px;' src="{!! asset('public/images/'.$item->book_img) !!}" alt="{{$item->book_name}}">
                            <h3>{{$item->book_name}}</h3>
                            @if($item->book_promotion == 1)                        
                            <span class="sale">Giảm giá !</span>
                            @endif                            
                            <div class="hover">
                                <a href="{{url('product-single/'.$item->book_url)}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                            </div>
                        </div>
                    </div> 
                    @endforeach                
                </div>
            </div>
            <h2>Sách mới của cửa hàng chúng tôi</h2>
            <div class="recent-book-sec">
                <div class="row">
                    <!-- 167 x 260 -->    
                    @foreach($data as $item)                
                    <div class="col-md-3">
                        <div class="item">
                            <img style="width: 167px; height: 260px;" src="{!! asset('public/images/'.$item->book_img) !!}" alt="{{$item->book_name}}">
                            <h3><a href="{{url('product-single/'.$item->book_url)}}">{{$item->book_name}}</a>
                            @if($item->book_promotion == 1)                        
                                <span class="badge badge-danger">Giảm giá</span>                         
                            </h3>                        
                            <h6>
                                <span class="price">
                                    {{number_format($item->book_price*((100 - PERCENT_OFF) * 0.01)) }}<sup>đ</sup>
                                </span>
                                <strike><sup><span class="price">{{number_format($item->book_price)}}<sup>đ</sup></span> </sup></strike>
                                / <a href="#">Mua ngay</a>
                            </h6> 
                            @else                            
                            </h3>                        
                            <h6>
                                <span class="price">{{number_format($item->book_price)}}<sup>đ</sup></span>                            
                                / <a href="#">Mua ngay</a>
                            </h6> 
                            @endif
                        </div>
                    </div>  
                    @endforeach                    
                </div>
                @include('layouts.paginating')
                <div class="btn-sec">
                    <button class="btn red-btn">Xem thêm sách</button>
                </div>
            </div>
        </div>
    </section>
@endsection