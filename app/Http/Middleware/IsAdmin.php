<?php

namespace App\Http\Middleware;

use App\Http\Models\User;
use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\IsAdmin;

use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }

        abort(403, 'Accès non autorisé.');
    }
}
