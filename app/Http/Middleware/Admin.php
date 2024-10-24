<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->level != 'admin') {
            return redirect()->route('auth.home')
                ->withError('Anda bukan admin!');
        }
        return $next($request);
    }
}