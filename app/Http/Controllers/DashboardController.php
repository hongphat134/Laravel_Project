<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class DashboardController extends Controller
{
    public function index(){
    	$data = Book::all();
    	return view('admin.home',compact('data'));
    }
}
