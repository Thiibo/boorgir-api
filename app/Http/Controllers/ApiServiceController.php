<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Core\Services\Service;
use App\Modules\Helpers\ErrorCreator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class ApiServiceController extends Controller
{
    protected Service $service;

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
       throw new \Exception('Not implemented');
    }

    protected function createErrorResponse(): JsonResponse
    {
        $errors = $this->service->getErrors();
        $errorCreator = new ErrorCreator();
        return $errorCreator->createErrorResponse($errors, Response::HTTP_BAD_REQUEST);
    }
}

