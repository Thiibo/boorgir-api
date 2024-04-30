<?php
namespace App\Modules\Ingredients\Services;

use App\Modules\Core\Services\Service;
use App\Models\Ingredient;

class IngredientService extends Service {

    protected $fields= ['id', 'name'];
    protected $searchField = 'name';

    protected $rules = [
        'name'
    ];

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}

