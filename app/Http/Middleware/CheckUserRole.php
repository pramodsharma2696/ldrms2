<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();

        if ($user) {
            $role = $user->role;

            if ($role === 'admin') {
                return redirect()->route('admin-dashboard');
            } elseif ($role === 'user') {
                return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}
