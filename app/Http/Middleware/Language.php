<?php
namespace App\Http\Middleware;

use Closure;
use Session;

class Language {

    public static function handle($request, Closure $next)
    {
		if(!Session::has('locale'))
		{
		   Session::put('locale', config('app.locale'));
		}

		app()->setLocale(Session::get('locale'));

		return $next($request);

   }

}