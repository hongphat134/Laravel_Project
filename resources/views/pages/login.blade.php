@extends('layouts/master')
@section('content')
<div class="breadcrumb">
        <div class="container">
            <a class="breadcrumb-item" href="{{ url('/')}}">Trang chủ</a>
            <span class="breadcrumb-item active">Đăng nhập</span>
        </div>
    </div>
    <section class="static about-sec">
        <div class="container">
            <h1>Đăng nhập</h1>
            <p>Điền đầy đủ thông tin đăng nhập </p>
            <div class="form">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-dismissible">    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>                    
                        @foreach($errors->all() as $err)
                            {{$err }}
                        @endforeach
                    </div>
                @endif
                @if(session('thongbao'))
                    <div class="alert alert-danger alert-dismissible">    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('thongbao')}}
                    </div>
                @endif
                <form action="login1" method="post">
                    <!-- <input type="hidden" name="_token" value="{{csrf_token()}}"> -->
                    {{csrf_field()}}
                    <div class="row">                       
                        <div class="col-md-5">
                            <input type="email" name="email" placeholder="Enter Email Address">
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-md-5">
                            <input type="password" name="password" placeholder="Enter Password">
                            <span class="required-star">*</span>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <button class="btn black">Đăng nhập</button>
                            <h5>Chưa đăng ký? <a href="register.html">Đăng ký tại đây</a></h5>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection