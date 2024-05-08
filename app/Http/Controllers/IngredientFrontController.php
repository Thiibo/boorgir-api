<?php

namespace App\Http\Controllers;

use App\Modules\Ingredients\Services\IngredientFrontService;

class IngredientFrontController extends ApiServiceController
{
    public function __construct(IngredientFrontService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
