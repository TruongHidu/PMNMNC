<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next) {
        $age = session('age');
    
        if (!is_numeric($age) || $age < 18) {
            return response("Không đủ tuổi để truy cập");
        }
    
        return $next($request);
    }
    
}
