<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\Service;

class IngredientBackService extends Service {

    protected $fields= ['id', 'vegetarian', 'price'];
    protected $searchField = 'name';

    protected $rules = [
        "add" => [
            'price' => 'required|numeric',
            'vegetarian' => 'required|boolean',
        ],
        "update" => [
            'price' => 'required|numeric',
            'vegetarian' => 'required|boolean',
        ]
    ];

    protected function getRelationFields(){
        return ['translations'];
    }

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}

