<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class customauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $session = session();
        $userData = $session->get('user_data');
    
        // Check if 'admin_data' session is empty
        if (empty($userData)) {
            return redirect()->to('/');
        }
        // Continue processing the request if 'admin_data' is not empty
      
        return $next($request);
    }
}
