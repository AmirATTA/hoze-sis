<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PerventLogin
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            return redirect(route('dashboard.index'));
        } else {
            return $next($request);
        }

    }
}
