<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $level)
    {
        if ($request->user()->level == $level) {
            return $next($request);
        } else {
            if (auth()->user()->level == 'admin') {
                return redirect('/admin');
            } elseif (auth()->user()->level == 'petugas') {
                return redirect('/petugas');
            }
        }
    }
}
