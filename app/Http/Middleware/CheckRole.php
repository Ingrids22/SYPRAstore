<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $guard = Auth::guard();

        if ($guard->check()) {
            switch ($guard->getName()) {
                case 'customer':
                    $user = $guard->user();
                    if ($user->role === $role) {
                        return $next($request);
                    }
                    break;

                case 'admin':
                    $user = $guard->user();
                    if ($user->role === $role) {
                        return $next($request);
                    }
                    break;

                default:
                    // Otros tipos de guardia si es necesario
                    break;
            }
        }

        // Si el usuario no tiene el rol correcto, puedes redirigirlo o retornar una respuesta de error.
        return response('Unauthorized.', 401);
    }
}
