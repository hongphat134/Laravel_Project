<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetPasswordRequest;
use App\User;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }

    public function getResetPassword($token,$email){
        return view('auth.passwords.reset',compact('token','email'));
    }

    public function postResetPassword(ResetPasswordRequest $rq){
        //Kiểm tra Confirm Password
        // if(strcasecmp($rq->password_confirmation,$rq->password)) return redirect()->back()->with(['error' => 'Confirm password is not incorrect!']);

        $user = User::whereEmail($rq->email)->first();

        //Kiểm tra email
        if($user == null) return redirect()->back()->with(['error'=>'Email không chính xác']);

        //Kiểm tra token (phòng ngừa TH điền email khác)
        if(strcasecmp($user->remember_token,$rq->token)) return redirect()->back()->with(['error'=>'Email không chính xác']);

        $user->password = bcrypt($rq->password);
        $user->remember_token = $rq->token;

        $user->update();

        return redirect()->back()->with(['success' => 'Cập nhật thành công!']);
    }
}
