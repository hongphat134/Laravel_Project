<?php

namespace App\Http\Middleware;

use Closure,Auth;

class RedirectCheckout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect('/login')->with(['error'=>'Bạn cần phải đăng nhập để tiếp tục thanh toán!']);
        }
        return $next($request);
    }
}
