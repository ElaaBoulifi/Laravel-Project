<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AddUserRole
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
        if ($request->is('register')) {
            // Add the "role" attribute to the registration request
            $request->merge(['role' => 'default']); // Set the default role

            // You can customize the role assignment logic here based on your requirements
        }
        return $next($request);
    }
}
