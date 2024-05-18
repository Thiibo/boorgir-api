<?php
namespace App\Modules\Burgers\Services;

use App\Models\Burger;
use App\Modules\Core\Services\TranslatedFrontService;
use App\Modules\Core\TranslationProviders\FrontTranslationsProvider;

class BurgerFrontService extends TranslatedFrontService {

    protected $fields= ['burgers.id', 'name', 'description', 'price'];
    protected $searchField = 'name';

    public function getFullModel(string $searchQuery = '')
    {
        return parent::getFullModel($searchQuery)->with(['ingredients' => function($query) {
            $provider = new FrontTranslationsProvider();
            $provider->addTranslations($query)->select(['ingredients.id', 'name', 'description', 'vegetarian', 'price']);
        }]);
    }

    public function __construct(Burger $model)
    {
        parent::__construct($model);
    }
}

