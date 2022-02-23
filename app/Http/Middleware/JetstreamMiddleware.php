<?php

namespace App\Http\Middleware;

use App\Models\Order;
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
        $sit = Auth::user()->cad_atualizado;

        if($sit == 'n') {
            return redirect()->route('profile.show-cms');
        }

            return $next($request);

    }
}
