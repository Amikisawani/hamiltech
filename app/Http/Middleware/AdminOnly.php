<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOnly
{
    public function handle(Request $request, Closure $next)
    {
        // Simple vérification (à améliorer plus tard avec un vrai système auth)
        if ($request->ip() !== '127.0.0.1') {
            abort(403, 'Accès réservé à l’admin.');
        }

        return $next($request);
    }
}

