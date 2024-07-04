<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    /**
     * Maneja una solicitud entrante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        Log::info('Usuario autenticado:', ['user' => $user]);

        if ($user && $user->role === $role) {
            return $next($request);
        }

        Log::warning('Acceso no autorizado:', ['user' => $user, 'role' => $role]);
        return response('Unauthorized.', 401);
    }
}
