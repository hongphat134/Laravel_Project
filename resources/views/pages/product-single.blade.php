@extends('layouts/master')
@section('content')
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="{{ url('/')}}">Home</a>
            <span class="breadcrumb-item active">Chi tiết sách</span>
        </div>
    </div>
    <section class="product-sec">

        <div class="container">            
            <!-- {{var_dump($book)}}             -->
            <h1>{{$book->book_name}}</h1>
            <div class="row">
                <div class="col-md-6 slider-sec">
                    <!-- main slider carousel -->
                    <div id="myCarousel" class="carousel slide">
                        <!-- main slider carousel items -->
                        <div class="carousel-inner">
                            <!-- 360 x 576 -->
                            <div class="active item carousel-item" data-slide-number="0">         
                                <img style='width: 360px; height: 576px;' src="{{ asset('public/images/'.$book->book_img)}}" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="1">              
                                <img style='width: 360px; height: 576px;' src="{{ asset('public/images/'.$book->book_img)}}" class="img-fluid">
                            </div>
                            <div class="item carousel-item" data-slide-number="2">
                                <img style='width: 360px; height: 576px;' src="{{ asset('public/images/'.$book->book_img)}}" class="img-fluid">
                            </div>

                        </div>
                        <!-- main slider carousel nav controls -->
                        <ul class="carousel-indicators list-inline">
                            <!-- 115 x 184 -->                           
                            <li class="list-inline-item active">
                                <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#myCarousel">
                                <img src="{{ asset('public/images/'.$book->book_img)}}" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-1" data-slide-to="1" data-target="#myCarousel">
                                <img src="{{ asset('public/images/'.$book->book_img)}}" class="img-fluid">
                            </a>
                            </li>
                            <li class="list-inline-item">
                                <a id="carousel-selector-2" data-slide-to="2" data-target="#myCarousel">
                                <img src="{{ asset('public/images/'.$book->book_img)}}" class="img-fluid">
                            </a>
                            </li>
                        </ul>
                    </div>
                    <!--/main slider carousel-->
                </div>
                <div class="col-md-6 slider-content">
                    <p>{{$book->book_description}}</p>
                    <ul>
                        <!-- <li>
                            <span class="name">Digital List Price</span><span class="clm">:</span>
                            <span class="price">$4.71</span>
                        </li> -->
                        @if($book->book_promotion == 1)
                        <li>
                            <span class="name">Giá gốc</span><span class="clm">:</span>
                            <span class="price">{{number_format($book->book_price)}}<sup>đ</sup></span>
                        </li>
                        @endif
                        <li>
                            <span class="name">Giá</span><span class="clm">:</span>     
                            <span class="price final">
                                {{number_format($book->book_price*((100 - PERCENT_OFF) * 0.01))}}<sup>đ</sup>
                            </span>
                        </li>
                        @if($book->book_promotion == 1)
                        <li><span class="save-cost">Tiết kiệm {{ number_format(($book->book_price - ($book->book_price * ((100 - PERCENT_OFF) * 0.01)))) }}<sup>đ</sup> ({{PERCENT_OFF}}%)</span></li>
                        @endif
                    </ul>                    
                    <div class="btn-sec">
                        <button class="btn ">Thêm vào giỏ hàng</button>
                        <button class="btn black">Mua ngay</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related-books">
        <div class="container">
            <h2>Có thể bạn sẽ quan tâm những cuốn sách này</h2>
            <div class="recomended-sec">
                <div class="row">
                    <!-- 135 x 218 -->   
                    @foreach($data as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <img style='width: 135px; height: 218px;' src="{{ asset('public/images/'.$item->book_img) }}" alt="img">
                            <h3>{{$item->book_name}}</h3>
                            @if($item->book_promotion == 1)                        
                            <span class="sale">Giảm giá !</span>
                            @endif                            
                            <div class="hover">
                                <a href="{{url('product-single/'.$item->book_url)}}"><span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></a>
                            </div>
                        </div>
                    </div>  
                    @endforeach                                     
                </div>
            </div>
        </div>
    </section>
@endsection