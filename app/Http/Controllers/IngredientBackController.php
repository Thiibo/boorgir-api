<?php

namespace App\Http\Controllers;

use App\Modules\Ingredients\Services\IngredientBackService;
use App\Modules\Ingredients\Services\IngredientImageService;

class IngredientBackController extends FullApiServiceController
{
    public function __construct(IngredientBackService $service, IngredientImageService $imageService)
    {
        parent::__construct();
        $this->service = $service;
        $this->imageService = $imageService;
    }
}
