<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Session::get('language', config('app.locale'));
        //    switch ($language) {
        //     case 'en':
        //         $language = 'en';
        //         break;
            
        //     default:
        //         $language = 'vi';
        //         break;
        // }
        
        App::setLocale($language);
        echo __('message.welcome');
        return $next($request);
    }
}
