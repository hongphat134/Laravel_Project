<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\Order_detail;
use Auth,Cart,PDF,Exception;
use Carbon\Carbon;

class OrderController extends Controller
{   
    public function __construct(){
    	$this->middleware('checkout');
    }

    public function home(){
    	$data = Order::all();        
    	return view('admin.order.home',compact('data'));
    }
  
      public function getCheckout(){
      	if(Cart::count() > 0) return view('pages.checkout');
        else return redirect()->route('home');
    }

    public function postCheckout(Request $rq){
        try {
            $order = new Order;
            $order->consignee_name = $rq->txtName;
            $order->consignee_phone = $rq->txtPhone;
            $order->consignee_add = $rq->txtAddress;
            $order->consignee_email = Auth::user()->email;
            $order->order_status = 0;
            //Tình trạng này có 4 loại or hơn:
            // Chưa xử lý
            // Đang xử lý
            // Đã xử lý
            // Đã huỷ
            $order->order_situation = strcasecmp($rq->txtStatus, 'Paypal') ? 'Chưa xử lý' : 'Đã huỷ';
            $order->order_note = $rq->txtNote;   
            $order->users_id  = Auth::user()->id;
            $order->created_at = Carbon::now()->toDateTimeString();
            $order->updated_at = Carbon::now()->toDateTimeString();

            $order->save();
            foreach (Cart::content() as $item) {
                $detail = new Order_detail;
                $detail->book_id = $item->id;
                $detail->order_id = $order->id;
                $detail->orderdetail_quantity = $item->qty;
                $detail->created_at = Carbon::now()->toDateTimeString();
                $detail->updated_at = Carbon::now()->toDateTimeString();

                $detail->save();              
            }

            if(!strcasecmp($rq->txtStatus,'Paypal')){
            	return redirect()->route('paypal1',['order' => $order->id]);
            }

            Cart::destroy();
            return redirect()->route('home')->with(['alert' => 'Đặt hàng thành công!']);
        } catch (Exception $e) {
            // Phải xoá sạch $order và $detail ?
            Order::destroy($order->id);
            Order_detail::where('order_id','=',$order->id)->delete();

        	echo "Message: ".$e->getMessage();
            return redirect()->route('home')->with(['alert' => 'Đặt hàng thất bại!']);
        }
    }

    public function getEdit($id){
        $order = Order::find($id);
        return view('admin.order.update',compact('order'));
    }

    public function postEdit(Request $rq,$id){
        try {
            $order = Order::find($id);
            // var_dump($order);

            $order->consignee_name = $rq->txtName;
            $order->consignee_email = $rq->txtEmail;
            $order->consignee_phone = $rq->txtPhone;
            $order->consignee_add = $rq->txtAddress;
            // $order->order_status = $rq->txtStatus;
            // $order->order_situation = $rq->txtSituation;

            $order->save();

            return redirect()->route('order/home')->with(['success' => 'Edit Order Success!']);
        } catch (Exception $e) {
            return redirect()->route('order/home')->with(['error' => 'Edit Order Error!']);
        }
    }

    public function editStatus($id){
        $order = Order::find($id);
        $order->order_status = $order->order_status == 0 ? 1 : 0;
        $order->save();

        return redirect()->route('order/home')->with(['success' => "Edit Status of Order $id Success!"]);
    }

    public function editSituation($id,$situation){
        $order = Order::find($id);
        $order->order_situation = $situation;
        $order->save();

        return redirect()->route('order/home')->with(['success' => "Edit Situtation of Order $id Success!"]);
    }

    public function getOrderDetail($id){
        $data = Order_detail::where('order_id','=',$id)->get()->toArray();

        $pdf =  PDF::loadView('admin.order.pdf',compact('data'));
        return $pdf->stream();
    }
}
