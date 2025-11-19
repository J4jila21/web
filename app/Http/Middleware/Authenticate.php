<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        // Jika admin mencoba akses dashboard
        if ($request->is('dashboard') || $request->is('dashboard/*')) {
            return '/dashboard/login';
        }

        // Default = login user
        return route('login');
    }
}
