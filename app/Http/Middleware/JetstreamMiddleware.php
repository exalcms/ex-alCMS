<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JetstreamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->role;
        $nome = Auth::user()->nome_guerra;

        if($role == 0) {
            dd($nome);
        }else{
            return $next($request);
        }

    }
}
