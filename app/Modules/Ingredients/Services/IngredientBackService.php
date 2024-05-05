<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\Service;

class IngredientBackService extends Service {

    protected $fields= ['id', 'vegetarian', 'price'];
    protected $searchField = 'name';

    protected $rules = [
        'name'
    ];

    protected function getRelationFields(){
        return ['translations'];
    }

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}

