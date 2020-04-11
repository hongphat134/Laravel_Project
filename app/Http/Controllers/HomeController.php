<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_highlight = Book::where('book_highlight',1)->take(4)->get();
        $data = Book::all();
        return view('pages.home',compact('data_highlight','data'));
    }

    public function showListBook(){
        $data_highlight = Book::where('book_highlight',1)->take(4)->get();
        $data = Book::orderBy('updated_at','desc')->paginate(5);
        return view('pages.shop',compact('data_highlight','data'));
    }

    public function showBook($url){
        $book_id = Book::where('book_url',$url)->first()->id;            
        $book = Book::where('id',$book_id)->first();        
        $data = Book::where('book_highlight',1)->take(4)->get();        
        return view('pages.product-single',compact('book','data'));
    }

    public function getFind(Request $request){
        $key = $request->key;        
        $data = Book::where('book_name','like','%'.$key.'%')->paginate(5);
        // $data->withPath('key='.$key);
        $data->appends(['key' => $key]);
        return view('pages.product',compact('key','data'));
    }

    public function getPlugin(Request $rq){
        var_dump($rq->all());
    }

    public function changeLanguage($language){
        // $lang = $request->language;
        // $language = config('app.locale');
        // if ($lang == 'en') {
        //     $language = 'en';
        // }
        // if ($lang == 'vi') {
        //     $language = 'vi';
        // }

        Session::put('language', $language);
        return redirect()->back();
    }
}
