<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\TranslatedFrontService;

class IngredientService extends TranslatedFrontService {

    protected $fields= ['ingredients.id', 'name', 'description', 'vegetarian', 'price'];
    protected $searchField = 'name';

    protected $rules = [
        'name'
    ];

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}

