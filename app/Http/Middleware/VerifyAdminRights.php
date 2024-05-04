<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Modules\Users\Services\UserService;

class VerifyAdminRights
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()->is_admin) {
            return response()->json(["message" => "Unauthorized."], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
