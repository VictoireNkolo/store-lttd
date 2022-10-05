<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            //Vérifier si la requête contient le prefix lb_admin
            session()->flash('error', 'Connectez-vous pour avoir accès à cette ressource !');
            return route('login.form');
            //sinon le laisser passer au front
        }
    }
}
