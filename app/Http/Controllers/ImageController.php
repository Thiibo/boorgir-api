<?php

namespace App\Http\Controllers;

use App\Modules\Core\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class ImageController extends Controller
{
    protected ImageService $service;

    public function upload(Request $request, $id): JsonResponse
    {
        $model = $this->service->upload($id, $request->all());
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->json($model, Response::HTTP_CREATED);
    }

    public function get($id)
    {
        $filePath = $this->service->get($id);
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->file($filePath);
    }

    protected function createErrorResponse(): JsonResponse
    {
        $errors = $this->service->getErrors();
        return $this->responseGenerator->createErrorResponse($errors, Response::HTTP_BAD_REQUEST);
    }
}
