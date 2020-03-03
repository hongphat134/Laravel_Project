@extends('layouts.master')
@section('content')
<body> 
    @if(session('alert'))
        {{ session('alert') }}
    @endif
    <section class="slider">         
        <div class="container">
            <div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item">
                    <div class="slide">
                        <img src="public/images/slide1.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Chào mừng đến với cửa hàng sách</h3>
                                <h5>Khám phá những quyển sách hay nhất cùng với chúng tôi</h5>
                                <a href="#" class="btn">cửa hàng sách</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="public/images/slide2.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Chào mừng đến với cửa hàng sách</h3>
                                <h5>Khám phá những quyển sách hay nhất cùng với chúng tôi</h5>
                                <a href="#" class="btn">cửa hàng sách</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="public/images/slide3.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Chào mừng đến với cửa hàng sách</h3>
                                <h5>Khám phá những quyển sách hay nhất cùng với chúng tôi</h5>
                                <a href="#" class="btn">cửa hàng sách</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="slide">
                        <img src="public/images/slide4.jpg" alt="slide1">
                        <div class="content">
                            <div class="title">
                                <h3>Chào mừng đến với cửa hàng sách</h3>
                                <h5>Khám phá những quyển sách hay nhất cùng với chúng tôi</h5>
                                <a href="#" class="btn">cửa hàng sách</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="recomended-sec">
        <div class="container">
            <div class="title">
                <h2>Những quyển sách nổi bật</h2>
                <hr>
            </div>
            <div class="row">   
                @foreach($data_highlight as $item)                             
                <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <!-- <img style="width: 135px; height: 218px;" src="public/images/img1.jpg" alt="img"> -->
                        <img style="width: 135px; height: 218px;" src="{!! asset('public/images/'.$item->book_img) !!}" alt="{{$item->book_name}}" />
                        <h3>{{$item->book_name}}</h3>
                        @if($item->book_promotion == 1)                        
                        <span class="sale">Giảm giá !</span>
                        @endif
                        <div class="hover">
                            <!-- <a href="product-single"> -->
                            <a href="{{url('product-single/'.$item->book_url)}}">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div> 
                @endforeach  
                <!-- <div class="col-lg-3 col-md-6">
                    <div class="item">
                        <img src="public/images/img2.jpg" alt="img">
                        <h3>How to write a book...</h3>                        
                        <span class="sale">Sale !</span>
                        <div class="hover">
                            <a href="product-single">
                            <span><i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </a>
                        </div>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <section class="about-sec">
        <div class="about-img">
            <figure style="background:url(public/images/about-img.jpg)no-repeat;"></figure>
        </div>
        <div class="about-content">
            <h2>Về cửa hàng,</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. Lorem Ipsum has been the book. </p>
            <p>It has survived not only fiveLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and</p>
            <div class="btn-sec">
                <a href="shop.html" class="btn yellow">cửa hàng sách</a>
                <a href="login.html" class="btn black">subscriptions</a>
            </div>
        </div>
    </section>
    <section class="recent-book-sec">
        <div class="container">
            <div class="title">
                <h2>Gợi ý cho bạn</h2>
                <hr>
            </div>
            <div class="row">
                <!-- 165 x 260 -->    
                @foreach($data as $item) 
                 <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <a href="{{url('product-single/'.$item->book_url)}}">
                            <img style="width: 165px; height: 260px" src="{!! asset('public/images/'.$item->book_img) !!}" alt="{{$item->book_name}}" title="{{$item->book_name}}">                        
                        </a>
                        <h3><a href="{{url('product-single/'.$item->book_url)}}">{{$item->book_name}}</a>
                        @if($item->book_promotion == 1)                        
                            <span class="badge badge-danger">Giảm giá</span>                         
                        </h3>                        
                        <h6>
                            <span class="price">
                                {{number_format($item->book_price*((100 - PERCENT_OFF) * 0.01)) }}<sup>đ</sup>
                            </span>
                            <strike><sup><span class="price">{{number_format($item->book_price)}}<sup>đ</sup></span> </sup></strike>
                            / <!-- <a href="{{ url('./addCart/'.$item->id.'/'.$item->book_name.'/'.$item->book_img.'/'.$item->book_price) }}">Mua ngay</a> -->
                            <a href="{{ route('addItem',[$item->id]) }}">Mua ngay</a>
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
                <!-- <div class="col-lg-2 col-md-3 col-sm-4">
                    <div class="item">
                        <img style="width: 165px; height: 260px" src="public/images/r1.jpg" alt="img">
                        <h3><a href="#">Keepers of the kalachakara</a></h3>
                        <h6><span class="price">500.000<sup>đ</sup></span> / <a href="#">Buy Now</a></h6>
                    </div>
                </div>  -->
            </div>
            <div class="btn-sec">
                <a href="#" class="btn red-btn">Xem thêm sách</a>
            </div>
        </div>
    </section>
    <section class="features-sec">
        <div class="container">
            <ul>
                <li>
                    <span class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                    <h3>SAFE SHOPPING</h3>
                    <h5>Safe Shopping Guarantee</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
                <li>
                    <span class="icon return"><i class="fa fa-reply-all" aria-hidden="true"></i></span>
                    <h3>30- DAY RETURN</h3>
                    <h5>Moneyback guarantee</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
                <li>
                    <span class="icon chat"><i class="fa fa-comments" aria-hidden="true"></i></span>
                    <h3>24/7 SUPPORT</h3>
                    <h5>online Consultations</h5>
                    <h6>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</h6>
                </li>
            </ul>
        </div>
    </section>
    <section class="offers-sec" style="background:url(public/images/offers.jpg)no-repeat;">
        <div class="cover"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Top 50% OFF on Selected</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="products.html" class="btn blue-btn">view all books</a>
                        <span class="icon-point percentage">
                            <img src="public/images/precentagae.png" alt="">
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="detail">
                        <h3>Shop $ 500 Above and Get Extra!</h3>
                        <h6>We are now offering some good discount 
                    on selected books go and shop them</h6>
                        <a href="products.html" class="btn blue-btn">view all books</a>
                        <span class="icon-point amount"><img src="images/amount.png" alt=""></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial-sec">
        <div class="container">
            <div id="testimonal" class="owl-carousel owl-theme">
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
                <div class="item">
                    <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's printer took a galley of type and Scrambled it to make a type and typesetting industry. been the book</h3>
                    <div class="box-user">
                        <h4 class="author">Susane Mathew</h4>
                        <span class="country">Australia</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="left-quote">
            <img src="public/images/left-quote.png" alt="quote">
        </div>
        <div class="right-quote">
            <img src="public/images/right-quote.png" alt="quote">
        </div>
    </section>
@endsection