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
    public function handle(Request $request, Closure $next, $role)
    {
        // Asegúrate de que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect('/');
        }
        
        // Verifica el rol
        if (Auth::user()->role !== (int) $role) {
            return redirect('/');
        }

        return $next($request);
    }
}
