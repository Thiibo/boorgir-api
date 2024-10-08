<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\TranslatedFrontService;

class IngredientFrontService extends TranslatedFrontService {

    protected $fields= ['ingredients.id', 'name', 'description', 'vegetarian', 'price'];
    protected $searchField = 'name';

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}

