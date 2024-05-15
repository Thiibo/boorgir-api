<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\ImageService;

class IngredientImageService extends ImageService {
    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}