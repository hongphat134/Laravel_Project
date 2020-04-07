<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\PayPalService as PayPalSvc;
use Auth,Cart;
use App\Order;

class PayPalTestController extends Controller
{
    private $paypalSvc;

    public function __construct(PayPalSvc $paypalSvc)
    {
        //parent::__construct();

        $this->paypalSvc = $paypalSvc;
    }

    public function index($order_id)
    {    	
    	foreach (Cart::content() as $key => $item) {
    		$data[] = [
    			'name' => $item->name,
    			'quantity' => $item->qty,
    			'price' => ($item->price/USD_RATE),
    			'sku' => $key
    		];
    	}
        
        $transactionDescription = "Vietnamese";

        $paypalCheckoutUrl = $this->paypalSvc
                                  // ->setCurrency('eur')
                                  ->setReturnUrl(url('paypal/status',['order_id' => $order_id]))
                                  // ->setCancelUrl(url('paypal/status'))
                                  ->setItem($data)
                                  ->createPayment($transactionDescription);

        if ($paypalCheckoutUrl) return redirect($paypalCheckoutUrl);
	    else dd(['Error']);		    		
    }

    public function status($order_id)
    {
        $paymentStatus = $this->paypalSvc->getPaymentStatus();
        //dd($paymentStatus);
        if($paymentStatus->state == 'approved'){
            $order = Order::find($order_id);
            $order->order_status = 1;
            $order->order_situation = 'Chưa xử lý';
            $order->save();

        	Cart::destroy();
        	return redirect()->route('home')->with(['alert' => 'Đặt hàng wa PayPal thành công!']);
        }
        else
        	return redirect()->route('cart')->with(['alert' => 'Đặt hàng thất bại!']);
        }

    public function paymentList()
    {
        $limit = 10;
        $offset = 0;

        $paymentList = $this->paypalSvc->getPaymentList($limit, $offset);

        dd($paymentList);
    }

    public function paymentDetail($paymentId)
    {
        $paymentDetails = $this->paypalSvc->getPaymentDetails($paymentId);

        dd($paymentDetails);
    }
}
