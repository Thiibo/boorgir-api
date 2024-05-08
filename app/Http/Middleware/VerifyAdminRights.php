<?php

namespace App\Http\Middleware;

use App\Modules\Helpers\ResponseGenerator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

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
            $responseGenerator = new ResponseGenerator();
            $errors = new MessageBag(["general" => "Unauthorized."]);
            return $responseGenerator->createErrorResponse($errors, Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
