<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSupplierAdmin
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
        if(!auth()->check()){
            return redirect('/');
        }

        if(auth()->user()->level_id == 3){
            abort(403);
        }
        return $next($request);
    }
}
