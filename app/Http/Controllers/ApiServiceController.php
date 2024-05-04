<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Core\Services\Service;

abstract class ApiServiceController extends Controller
{
    protected Service $service;

    public function find($id)
    {
        $model = $this->service->find($id);
        return response()->json($model);
    }

    public function all(Request $request)
    {
       throw new \Exception('Not implemented');
    }
}

