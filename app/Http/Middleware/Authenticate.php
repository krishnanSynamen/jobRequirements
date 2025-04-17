<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        Log::error($request->route('id'));
        session(['jobId' => $request->route('id') ?? '']);
        Log::error(session('jobId'));

        return $request->expectsJson() ? null : route('login');
    }
}
