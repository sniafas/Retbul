<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckUsers
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
        echo("middleware");
        $user = Auth:user();
        if($user->hasRole(['admin','support'])){
            return $next($request);
        }
        return redirect('/dashboard');
    }
}
