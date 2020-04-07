<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Order_detail;
use App\User;
use App\Book;

use DB;


class DashboardController extends Controller
{
    public function index(){
    	//Tổng số lượng hàng bán ra theo tháng
    	$listTotalBookSell = Order_detail::select(
		    		DB::raw('SUM(orderdetail_quantity) as sum'),
		    		DB::raw('MONTH(created_at) as month'))
    			->groupBy(DB::raw('MONTH(created_at)'))
    			->get()->toArray();
    	// SELECT SUM(orderdetail_quantity),MONTH(created_at) FROM `order_detail` GROUP BY MONTH(created_at)

    	//Tổng số lượng đơn đặt hàng theo tháng
    	$listTotalOrder = Order::select(
		    		DB::raw('COUNT(id) as count'),
		    		DB::raw('MONTH(created_at) as month'))
				->groupBy(DB::raw('MONTH(created_at)'))
				->get()->toArray();

    	//Tổng số ng` tạo acc theo tháng
    	$listTotalUser = User::select(
		    		DB::raw('COUNT(id) as count'),
		    		DB::raw('MONTH(created_at) as month'))
				->groupBy(DB::raw('MONTH(created_at)'))
				->get()->toArray();

    	

    	//Easypie Chart
    	//% số lượng hàng bán ra trên tổng số lượng tồn kho
		$totalBook = Book::sum('book_quantity');
		$totalBookSell = Order_detail::sum('orderdetail_quantity');
		$bookSellRate = floor(($totalBookSell / $totalBook) * 100);
		//echo $bookSellRate;

    	//% số lượng đơn đh bị huỷ trên tổng số đơn hàng
    	$totalCanceledOrder = Order::where('order_situation','Đã huỷ')->count(); 
    	$totalOrder = Order::count();
    	$CanceledOrderRate = floor(($totalCanceledOrder / $totalOrder) * 100);
    	// echo $CanceledOrderRate;

    	//% số lượng đơn đh chưa xử lý trên tổng số đơn hàng
    	$totalUnhandleOrder = Order::where('order_situation','Chưa xử lý')->count(); 
    	$UnhandleOrderRate = floor(($totalUnhandleOrder / $totalOrder) * 100);
    	// echo $UnhandleOrderRate;

    	//% số lượng đơn đh đang xử lý trên tổng số đơn hàng
    	$totalHandingOrder = Order::where('order_situation','Đang xử lý')->count(); 
    	$HandingOrderRate = floor(($totalHandingOrder / $totalOrder) * 100);
    	// echo $HandingOrderRate;
		return view('admin.home',compact('listTotalBookSell','listTotalOrder','bookSellRate','listTotalUser','CanceledOrderRate','UnhandleOrderRate','HandingOrderRate'));
    }
}
