<?php

namespace App\Http\Middleware;

use Closure;

class MemberMw
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
        if ($request->user()->role != 'member')
        {
            
            return redirect('/admin');
        }

        return $next($request);
    }
}
