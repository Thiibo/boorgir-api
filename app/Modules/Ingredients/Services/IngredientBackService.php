<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\Service;

class IngredientBackService extends Service {

    protected $fields= ['id', 'vegetarian', 'price'];
    protected $searchField = 'name';
    protected $translatable = true;

    protected $rules = [
        "add" => [
            'price' => 'required|numeric',
            'vegetarian' => 'required|boolean',
            'translations.*.lang' => 'required|string',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'required|string',
        ],
        "update" => [
            'price' => 'required|numeric',
            'vegetarian' => 'required|boolean',
            'translations.*.lang' => 'required|string',
            'translations.*.name' => 'required|string',
            'translations.*.description' => 'required|string',
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

