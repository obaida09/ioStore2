<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

class Roles
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
        $routeName = Route::getFacadeRoot()->current()->uri();
        $route = explode('/', $routeName);
        $roleRoutes = Role::distinct()->whereNotNull('allowed_route')->pluck('allowed_route')->toArray();

        // dd($request->user()->hasRole('admin'));

        if (auth()->check()) {
            $allowedRoute = auth()->user()->roles[0]->allowed_route;
            if (!in_array($route[0], $roleRoutes)) {
                if ($allowedRoute == 'admin') {
                    return redirect()->route('admin.index');
                }
                return $next($request);
            } else {
                if ($route[0] != $allowedRoute) {
                    $path = $route[0] == $allowedRoute ? $route[0] . '.login' : '' . $allowedRoute . 'admin.login';
                    return redirect()->route($path);
                } else {
                    return $next($request);
                }
            }
        } else {
            $routeDestination = in_array($route[0], $roleRoutes) ? $route[0] . '.login' : 'login';
            // $path = $route[0] != '' ? $routeDestination : $allowedRoute . '.index';
            return redirect()->route($routeDestination);
        }
    }
}
