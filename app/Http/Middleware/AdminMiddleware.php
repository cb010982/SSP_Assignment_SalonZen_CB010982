<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
      
            if (Auth::user() &&  Auth::user()->role == 'admin') {
                return $next($request);
            }
        
            return redirect('/');
        }
        
    /**
     * Check if the user is an admin based on specific criteria.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return bool
     */
    protected function userIsAdmin($user)
    {
        // Implement your admin-checking logic here
        // For example, you could check for a specific role or permission

        // Replace the condition below with your own logic
        return $user->hasRole('admin'); // Assuming you have a role-based system
    }
}
