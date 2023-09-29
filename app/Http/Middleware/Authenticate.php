<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        $user = $request->user();

        if ($user) {
            $role = $user->role;
    
            if ($role === 'admin') {
                return route('admin-dashboard');
            } elseif ($role === 'user') {
                return route('dashboard');
            }
        }
            return route('loginPage');
    }
}
