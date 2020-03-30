<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function home(){
    	$data = User::all();
    	return view('admin.user.home',compact('data'));
    }
}
