<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $job = $request->route('job') ?? '';
        $id = $request->route('id') ?? '';

        session(['jobId' => $job.'/job/'.$id]);

        if ((Auth::user() && Auth::user()->role == 'Admin')  || !Auth::user()) {
            return redirect('/user/login');
        }

        return $next($request);
    }
}
