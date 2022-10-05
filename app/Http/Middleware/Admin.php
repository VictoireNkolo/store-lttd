<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest() || !Auth::user()->role == 'admin') {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                session()->flash('error', 'Vous n\'avez pas accès à cette ressource, contacter l\'administrateur de votre plateforme !');
                return redirect()->route('lb_admin.login.form');
            }
        }
        return $next($request);
    }
}
