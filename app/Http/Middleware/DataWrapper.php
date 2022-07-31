<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DataWrapper
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
        $response = $next($request);

        if ($request->expectsJson()) {
            $response->setData(['data' => $response->getData()]);
        }
        if ($request->has('redirect_url')) {
            return redirect($request->get('redirect_url'));
        }
        if ($request->has('redirect_route_url')) {
            return redirect($request->get('redirect_route_url'), ['view', $request->route('resource')]);
        }

        return $response;
    }
}
