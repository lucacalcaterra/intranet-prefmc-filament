<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountInfoMiddleware
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
        if (/*\Request::path() !== 'info' && */(\Auth::User()->team_id === NULL || \Auth::User()->qualifica_id === NULL)) {
            // if (\Auth::User()->username) {
            return \Redirect::to('info');
        }

        return $next($request);
    }
}
