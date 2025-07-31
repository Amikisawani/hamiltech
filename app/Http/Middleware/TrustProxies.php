<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

/**
 * Middleware to trust proxies.
 */

class TrustProxies extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
        /**
     * Les proxys de confiance.
     *
     * @var array|string|null
     */
    protected $proxies = '*';

    /**
     * Les en-têtes que l'application doit utiliser pour détecter les proxys.
     *
     * @var int
     */
        protected $headers = 
        Request::HEADER_X_FORWARDED_FOR |
        Request::HEADER_X_FORWARDED_HOST |
        Request::HEADER_X_FORWARDED_PORT |
        Request::HEADER_X_FORWARDED_PROTO;
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
    }
}
