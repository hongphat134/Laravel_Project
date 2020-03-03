<!DOCTYPE html>
<html lang="en">
<base href="{{asset('')}}">
<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#03a6f3">
    <link rel="stylesheet" href="{{url('public/css/bootstrap.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('public/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{url('public/css/styles.css')}}">    
</head>
<header>
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a href="#" class="web-url">learnlaravel.com</a></div>
                    <div class="col-md-6">
                        <h5>Miễn phí vận chuyển + giao hàng tận nơi</h5></div>
                    <div class="col-md-3">
                        <span class="ph-number">Call : 0938 123 456</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html"><img src="public/images/logo.png" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        @include('layouts.navigate')
                        <div class="cart my-2 my-lg-0">
                            <a href="{{ route('shopping-cart')}}">
                                <span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="quntity">{{ Cart::count()}}</span>
                            </a>                        
                        </div>
                        @include('layouts.search')
                    </div>
                </nav>
            </div>
        </div>
    </header>