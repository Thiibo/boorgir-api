<?php

namespace App\Http\Controllers;

use App\Modules\Ingredients\Services\IngredientImageService;

class IngredientImageController extends ImageController
{
    public function __construct(IngredientImageService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
