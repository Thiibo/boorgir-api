<?php
namespace App\Modules\Burgers\Services;

use App\Models\Burger;
use App\Modules\Core\Services\TranslatableBackService;
use App\Modules\Core\TranslationProviders\BackTranslationsProvider;

class BurgerBackService extends TranslatableBackService {

    protected $fields= ['id', 'price'];
    protected $searchField = 'name';

    protected function getRules() {
        $supported_locales = implode(',', config('app.supported_locales'));

        return [
            "add" => [
                'price' => 'required|numeric|gt:0',
                'ingredients.*.id' => 'numeric|exists:ingredients,id',
                'translations.*.lang' => "required|distinct|in:$supported_locales",
                'translations.*.name' => 'required|string',
                'translations.*.description' => 'required|string',
            ],
            "update" => [
                'price' => 'required|numeric|gt:0',
                'ingredients.*.id' => 'numeric|exists:ingredients,id',
                'translations.*.lang' => "required|distinct|in:$supported_locales",
                'translations.*.name' => 'required|string',
                'translations.*.description' => 'required|string',
            ]
        ];
    }

    public function create($data, $ruleSet = "add")
    {
        $model = parent::create($data, $ruleSet);
        if ($this->hasErrors()) return;
        
        $ingredientIds = array_column($data['ingredients'], 'id');
        $model->ingredients()->sync($ingredientIds);
        return $model;
    }

    public function update($data, int $id, $ruleSet = "update")
    {
        $model = parent::update($data, $id, $ruleSet);
        if ($this->hasErrors()) return;
        
        $ingredientIds = array_column($data['ingredients'], 'id');
        $model->ingredients()->sync($ingredientIds);
        return $model;
    }

    public function getFullModel(string $searchQuery = '')
    {
        return parent::getFullModel($searchQuery)->with(['ingredients' => function($query) {
            $provider = new BackTranslationsProvider();
            $provider->addTranslations($query);
        }]);
    }

    public function __construct(Burger $model)
    {
        parent::__construct($model);
    }
}

