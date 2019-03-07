<?php

namespace App\Http\Middleware;

use Closure;

class CheckisContador
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
            if (Auth::user()->isAdmin == null) {
                return $next($request);                
            }
        }

        // return redirect('/Forbbiden');
        abort(403, 'Acceso denegado, Este contenido no se encuentra disponible.');
    }
}
