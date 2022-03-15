<?php

namespace App\Http\Middleware;

use Closure;
use Debugbar;
use Illuminate\Http\Request;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Session;


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
        if ($request->route()->getName() !== 'filament.pages.profilo' && (\Auth::User()->team_id === NULL || \Auth::User()->qualifica_id === NULL)) {

            Filament::notify('warning', 'Devi completare i dati del tuo profilo prima di proseguire!', isAfterRedirect: true);

            return redirect()->to(route('filament.pages.profilo'));
        }

        return $next($request);
    }
}
