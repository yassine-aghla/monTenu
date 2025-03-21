<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
    
        $user = Auth::user();
    
        \Log::info('Permission vérifiée : ' . $permission); 
    
        if (!$user->hasPermission($permission)) {
            abort(403, 'Accès interdit');
        }
    
        return $next($request);
    }
}
