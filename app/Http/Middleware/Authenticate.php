<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Authenticate extends Middleware
{
    /**
     * Handle unauthenticated users.
     */
    protected function redirectTo($request): ?string
    {
        // Solo para rutas web: devolver ruta de login
        if (!$request->expectsJson()) {
            return route('login');
        }
        
        return null;
    }

    /**
     * Handle an unauthenticated user.
     */
    protected function unauthenticated($request, array $guards)
    {
        abort(response()->json([
            'error' => 'Unauthorized'
        ], Response::HTTP_UNAUTHORIZED));
    }
}