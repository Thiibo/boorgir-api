<?php

namespace App\Http\Controllers;

use App\Modules\Ingredients\Services\IngredientBackService;

class IngredientBackController extends FullApiServiceController
{
    public function __construct(IngredientBackService $service)
    {
        $this->service = $service;
    }
}
