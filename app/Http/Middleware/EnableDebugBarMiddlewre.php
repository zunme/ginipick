<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Debugbar;

class EnableDebugBarMiddlewre
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        ;
        if ( ( env('DEBUGBAR_USE',false) === true || ( env('DEBUGBAR_USE_ADMIN',false) && \Str::startsWith( \Route::current()->getName(),'admin.') ) ) && ($request->ip() == env('DEBUGBAR_IP','1') || auth()->user()?->can('view_role')||auth()->user()?->can('view_debug')) ) {
            /*
            config()->set('debugbar.enabled', true);
            */
            Debugbar::enable();
        }else {
            /*
            config()->set('app.debug', true);
            */
            Debugbar::disable();
        }
        return $next($request);
    }
}
