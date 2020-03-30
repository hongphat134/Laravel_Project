<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\Publisher;
use PDF;
use Carbon\Carbon;
use Exception;

class BookController extends Controller
{
    public function home(){
    	$data = Book::all();
    	return view('admin.book.home',compact('data'));
    }
    
    public function getAdd(){
        $listCat = Category::all('id','cat_name');
        $listPub = Publisher::all('id','pub_name');
    	return view('admin.book.insert',compact('listCat','listPub'));
    }

    public function postAdd(Request $rq){
        try{
            $book = new Book;

            $book->book_name = $rq->txtBookName;
            $book->book_url = str_slug($rq->txtBookName);

            $file = $rq->txtImg;

            //Mã hoá: str_rd(5) + now() + str_slug
            $book->book_img = Carbon::now()->timestamp.'_'.str_random(5).'_'.$book->book_url.'.'.$file->getClientOriginalExtension(); 

            $file->move('public/images',$book->book_img);

            $book->book_description = $rq->txtDes;
            $book->book_price = $rq->txtBookPrice;
            $book->book_highlight = $rq->txtBookHighlight;
            $book->book_promotion = $rq->txtBookPromotion;
            $book->book_quantity = $rq->txtBookQuantity;
            $book->pub_id = $rq->txtPublisher;
            $book->cat_id = $rq->txtCategory;
            $book->created_at = Carbon::now()->toDateTimeString();
            $book->updated_at = Carbon::now()->toDateTimeString();

            echo $book->book_img;
            
            $book->save();
            
            //test catch
            //echo 1/0;
            
            return redirect()->route('book/home')->with(['success' => 'Add Book Success!']);    
        }
        catch(Exception $e){
            echo "Message: ".$e->getMessage();
            return redirect()->route('book/home')->with(['error' => 'Add Book Failed!']);       
        }
    }

    public function getEdit($id){
        $book = Book::find($id);
        $listCat = Category::all('id','cat_name');
        $listPub = Publisher::all('id','pub_name');
        //var_dump($book);
        return view('admin.book.update',compact('book','listCat','listPub'));
    }

    public function postEdit(Request $rq,$id){
        try{            
            $book = Book::find($id);
            
            $book->book_name = $rq->txtBookName;
            $book->book_url = str_slug($rq->txtBookName);

            $file = $rq->txtImg ? $rq->txtImg : null;

            //Mã hoá: str_rd(5) + now() + str_slug
            if($file != null){
                $book->book_img = Carbon::now()->timestamp.'_'.str_random(5).'_'.$book->book_url.'.'.$file->getClientOriginalExtension(); 

                $file->move('public/images',$book->book_img);
            }

            $book->book_description = $rq->txtDes;
            $book->book_price = $rq->txtBookPrice;
            $book->book_highlight = $rq->txtBookHighlight;
            $book->book_promotion = $rq->txtBookPromotion;
            $book->book_quantity = $rq->txtBookQuantity;
            $book->pub_id = $rq->txtPublisher;
            $book->cat_id = $rq->txtCategory;
            $book->updated_at = Carbon::now()->toDateTimeString();

             // dd($book);
            
            $book->save();
           
            return redirect()->route('book/home')->with(['success' => 'Edit Book Success!']);    
        }
        catch(Exception $e){
            echo "Message: ".$e->getMessage();
            return redirect()->route('book/home')->with(['error' => 'Edit Book Failed!']);       
        }
    }

    public function delete($id){
        try {
           Book::destroy($id);

           return redirect()->route('book/home')->with(['success' => 'Delete Book Success!']);    
        } catch (Exception $e) {
            echo "Message: ".$e->getMessage();
            return redirect()->route('book/home')->with(['error' => 'Delete Book Failed!']);             
        }
    }

    public function pdf(){        
        $data = Book::all();        
        $pdf = PDF::loadView('admin.book.pdf',compact('data'));
        return $pdf->stream();
        // download với tên file list_book với folder chỉ định
        //return $pdf->download('list_book.pdf');

        //Tự động download file với folder trong hàm save() và chuyển trang pdf với tên là download
        // return PDF::loadView('admin.book.pdf',compact('data'))->save('C:/Users/Phat/Downloads/Compressed/myfile.pdf')->stream('download.pdf');

        //PDF::loadView('admin.book.pdf',compact('data'))->setPaper('a2', 'landscape')->setWarnings(false)->save('C:/Users/Phat/Downloads/Compressed/myfile.pdf');
    }
}
