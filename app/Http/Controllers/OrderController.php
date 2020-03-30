<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;

class OrderController extends Controller
{
    public function home(){
    	$data = Order::all();
    	return view('admin.order.home',compact('data'));
    }
}
