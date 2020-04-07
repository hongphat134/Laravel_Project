<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Cart;

class CartController extends Controller
{

    public function getShoppingCart(){
    	return view('pages.shopping-cart');
    }

    public function getRowId($id){
        return Cart::content()->where('id',$id)->first()->rowId;
        // $rowId = Cart::search(function($cartItem,$rowId) use ($id){
        //     return $cartItem->id == $id ? $rowId:null;
        // });
        // return $rowId->first()->rowId;
    }

    public function addItem($id){
    	$book = Book::find($id);   	    	

        //Kiểm tra xem có tìm dc sách có id = $id ko?
        if($book == null) return redirect()->back()->with(['error' => 'Lỗi tìm sách']);

        if($book->book_quantity > 1){
            //TH sản phẩm khuyến mãi
            if($book->book_promotion == 1) $book->book_price *= (100 - PERCENT_OFF) * 0.01;
            Cart::add(
                array(
                    'id' => $book->id,
                    'name' => $book->book_name,                
                    'price' => $book->book_price,                
                    'qty' => 1,                    
                    'options' => 
                    [
                        'img' => $book->book_img
                    ],                    
                )
            );  
        }
        
        //TH sách hết hàng
        else return redirect()->back()->with(['alert' => 'Sách đã hết hàng!']);
    	                    
        return redirect()->route('shopping-cart');
    }

    public function removeItem($rowId){        
        //$rowId = $this->getRowId($id);  
        if($rowId != null)  Cart::remove($rowId);
        return redirect()->route('shopping-cart');   
    }

    public function updateItem($rowId,Request $rq){    
        Cart::update($rowId,$rq->qty);
        return redirect()->route('shopping-cart');      
    }

    public function destroyItems(){
    	Cart::destroy();
   		return redirect()->route('shopping-cart');
    }
}
