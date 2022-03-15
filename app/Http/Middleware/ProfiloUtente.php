<?php

namespace App\Http\Middleware;

use Closure;


class ProfiloUtente
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
            return redirect('/admin/profilo');
        }

        return $next($request);
    }
}
