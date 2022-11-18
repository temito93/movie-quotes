<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->segment(2));

        URL::defaults(['locale' => $request->segment(2)]);

        return $next($request);
    }
}
