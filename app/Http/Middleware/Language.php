<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Config;
use App;
class Language
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
        if (Session::has('locales')){
            $locales = Session::get('locales', Config::get('app.locales'));
        }else{
            $locales = 'en';
        }

        App::setLocale($locales);
        return $next($request);
    }
}
