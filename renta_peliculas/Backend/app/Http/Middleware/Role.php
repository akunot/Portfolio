<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roleId): Response
    {
        $roleId = (int) $roleId;

        if (!Auth::check()) {
            // Si no está autenticado, redirige al login
            return redirect('/login');
        }
        // dd("eee", Auth::user()->role_id, $roleId);
            
        // Verifica si el usuario tiene el rol adecuado
        if (Auth::user()->role_id !== $roleId) {
            // Retorna un 403 si el rol no coincide
            abort(403, 'Acceso denegado.');
        }
        
        return $next($request);
    }
}

