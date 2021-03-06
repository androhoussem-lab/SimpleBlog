<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserIsBlogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $roles = $user->roles;
        foreach ($roles as $role ){
            if ($role->role == 'Blogger'){
                return $next($request);
            }
        }
        return view('errors.notblogger');
    }
}
