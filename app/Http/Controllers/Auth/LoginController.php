<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $rq){        
        if (Auth::attempt(['email' => $rq->email, 'password' => $rq->password])) {
            // Authentication passed...
            if(Auth::user()->userstype_id == 2) return redirect()->route('home');
            else return redirect()->route('admin/home');
        }
        else return redirect()->back()->with(['error' => 'Đăng nhập thất bại!']);                          
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
