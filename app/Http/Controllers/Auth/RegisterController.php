<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $rq){
        //Kiểm tra confirm password
        if(strcasecmp($rq->password_confirmation,$rq->password)) return redirect()->back()->with(['error' => 'Confirm Password is not incorrect!']);

        //Kiểm tra email có bị trùng ko?
        $check_user = User::whereEmail($rq->email)->first();

        if($check_user == null){
            $user = new User;
            $user->name = $rq->name;
            $user->email = $rq->email;
            $user->password = bcrypt($rq->password);
            $user->remember_token = $rq->_token;
            // 1 là quản trị viên, 2 là khách hàng
            $user->userstype_id = 2;
            $user->created_at = Carbon\Carbon::now()->toDateTimeString();
            $user->updated_at = Carbon\Carbon::now()->toDateTimeString();

            $user->save();

            Auth::login($user);

            return redirect()->route('login');
        }
        else return redirect()->back()->with(['error' => 'Email đã tồn tại!']);        
    }
}
