<?php

namespace App\Http\Controllers;

use App\Modules\Core\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class ApiServiceController extends Controller
{
    protected ApiService $service;

    public function find($id)
    {
        $model = $this->service->find($id);
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->json($model);
    }

    public function all(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $query = $request->input('query', '');
        $results = $this->service->all($perPage, $query);
        
        return response()->json($results);
    }

    protected function createErrorResponse(): JsonResponse
    {
        $errors = $this->service->getErrors();
        return $this->responseGenerator->createErrorResponse($errors, Response::HTTP_BAD_REQUEST);
    }
}

