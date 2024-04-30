<?php

namespace App\Modules\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\MessageBag;

class ErrorCreator
{
    public function createErrorResponse(MessageBag $errors, int $statusCode): JsonResponse
    {
        return response()->json([
            "success" => false,
            "errors" => $errors
        ], $statusCode);
    }
}
