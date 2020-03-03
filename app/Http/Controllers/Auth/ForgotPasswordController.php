<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Mail;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function getForgot(){
        return view('auth.passwords.email');
    }

    public function postForgot(Request $rq){  
        $user = User::whereEmail($rq->email)->first();

        if($user == null){
            return redirect()->back()->with(['error' => 'Email ko tồn tại!']);
        }        

        $data = ['token' => $user->remember_token,
                 'email' => $user->email]; 
        // echo $email.'-'.$token;       
        //$link = 'reset?token='.$token.'&email='.$email;
        // echo $link.'<hr>'.urlencode($link);

        $this->sendMail($user,$data);
        
        return redirect()->back()->with(['success' => 'Đã gửi thư, xin hãy kiểm tra email!']);
    }

    public function sendMail($user,$data){
        Mail::send(
            'auth.emails.message',
            ['user' => $user,'data' => $data],
            function($msg) use ($user){            
            $msg->to($user->email)->subject('Khôi phục mật khẩu');
        });
    }
}
