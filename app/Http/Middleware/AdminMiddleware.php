<?php

namespace App\Http\Middleware;

use App\Enums\UserTypesEnum;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if(!auth()->check()) return redirect()->route('login');
        if(auth()->user()->user_type->value === UserTypesEnum::ADMIN->value) return $next($request);
        return response('Not authorized !', 403);
    }
}
