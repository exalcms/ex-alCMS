<?php

namespace App\Http\Middleware;

use App\Http\Controllers\ExcmsController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autorizador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!$request->is('login') && Auth::guest()){
            return redirect('login');
        }
        return $next($request);
    }
}
