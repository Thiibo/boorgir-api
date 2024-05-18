<?php
namespace App\Modules\Core\Services;

use App\Modules\Core\TranslationProviders\FrontTranslationsProvider;

abstract class TranslatedFrontService extends ApiService {
    public function getFullModel(string $searchQuery = '')
    {
        $model = parent::getFullModel();
        $provider = new FrontTranslationsProvider();
        return $provider->addTranslations($model)->where($this->searchField, "LIKE", "%$searchQuery%")->select($this->fields);
    }
}
