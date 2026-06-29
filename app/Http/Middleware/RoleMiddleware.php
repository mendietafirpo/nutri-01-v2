<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // 1. Verificar autenticación
        if (!Auth::check()) {
            return redirect('/');
        }
        
        // 2. Verificar si el rol del usuario está en la lista permitida
        // El operador ...$roles convierte los parámetros en un array
        if (!in_array(Auth::user()->role, $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}
