<?php

namespace Yasha\Backend\Http\Middleware;

use Closure;

class SetLocaleFromSession
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (session()->has('locale')) {
            \App::setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}