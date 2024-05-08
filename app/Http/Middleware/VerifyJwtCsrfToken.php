<?php

namespace App\Http\Middleware;

use App\Modules\Helpers\ResponseGenerator;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

class VerifyJwtCsrfToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (
            $request->cookie('X-XSRF-TOKEN') !== auth()->payload()->get('X-XSRF-TOKEN')
        ) {
            $responseGenerator = new ResponseGenerator();
            $errors = new MessageBag(["general" => "Invalid request"]);
            return $responseGenerator->createErrorResponse($errors, Response::HTTP_BAD_REQUEST);
        }

        return $next($request);
    }
}
