<?php

namespace App\Http\Controllers;

use App\Modules\Core\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

abstract class FullApiServiceController extends ApiServiceController
{
    protected ImageService $imageService;

    public function create(Request $request): JsonResponse
    {
        $model = $this->service->create($request->all());
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->json($model, Response::HTTP_CREATED);
    }

    public function update(Request $request, int $id)
    {
        $model = $this->service->update($request->all(), $id);
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->json($model);
    }

    public function delete(int $id)
    {
        $this->imageService->deleteIfExists($id);
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        $this->service->delete($id);
        if ($this->service->hasErrors()) {
            return $this->createErrorResponse();
        }

        return response()->noContent();
    }
}
