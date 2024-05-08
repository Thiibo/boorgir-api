<?php

namespace App\Modules\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;
use Symfony\Component\HttpFoundation\Response;

class ResponseGenerator
{
    public function createErrorResponse(MessageBag $errors, int $statusCode): JsonResponse
    {
        return response()->json([
            "success" => false,
            "errors" => $errors
        ], $statusCode);
    }

    public function createSuccessResponse($message, int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            "success" => true,
            "message" => $message
        ], $statusCode);
    }
}
