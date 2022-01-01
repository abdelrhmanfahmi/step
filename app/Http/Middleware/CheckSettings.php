<?php

namespace App\Http\Middleware;

use App\Setting;
use Closure;

class CheckSettings
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
        if(Setting::count() > 0){
            return redirect()->route('settings.index' , app()->getLocale());
        }
        return $next($request);
    }
}
