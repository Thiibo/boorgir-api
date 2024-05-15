<?php
namespace App\Modules\Ingredients\Services;

use App\Models\Ingredient;
use App\Modules\Core\Services\TranslatableBackService;

class IngredientBackService extends TranslatableBackService {

    protected $fields= ['id', 'vegetarian', 'price'];
    protected $searchField = 'name';

    protected function getRules() {
        $supported_locales = implode(',', config('app.supported_locales'));

        return [
            "add" => [
                'price' => 'required|numeric|gt:0',
                'vegetarian' => 'required|boolean',
                'translations.*.lang' => "required|distinct|in:$supported_locales",
                'translations.*.name' => 'required|string',
                'translations.*.description' => 'required|string',
            ],
            "update" => [
                'price' => 'required|numeric|gt:0',
                'vegetarian' => 'required|boolean',
                'translations.*.lang' => "required|distinct|in:$supported_locales",
                'translations.*.name' => 'required|string',
                'translations.*.description' => 'required|string',
            ]
        ];
    }

    public function __construct(Ingredient $model)
    {
        parent::__construct($model);
    }
}

