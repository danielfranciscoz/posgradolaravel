<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckisAdmin
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
        if (Auth::guard(null)->check()) {
            if (Auth::user()->isAdmin) {
                return $next($request);                
            }
        }

        // return redirect('/Forbbiden');
        abort(403, 'Acceso denegado, Este contenido no se encuentra disponible.');
    }
}
