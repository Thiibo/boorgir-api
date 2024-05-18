<?php
namespace App\Modules\Core\Services;

use App\Modules\Core\TranslationProviders\BackTranslationsProvider;

abstract class TranslatableBackService extends ApiService {

    public function create($data, $ruleSet = "add")
    {
        $model = parent::create($data, $ruleSet);
        if ($this->hasErrors()) return;
        $model->translations()->createMany($data['translations']);

        return $model;
    }

    public function update($data, int $id, $ruleSet = "update")
    {
        $model = parent::update($data, $id, $ruleSet);
        if ($this->hasErrors()) return;
        
        foreach ($data["translations"] as $translation) {
            $entry = $model->translations()
                ->where('item_id', '=', $model->getKey())
                ->where('lang', '=', $translation["lang"]);
            
            if ($entry->exists()) {
                $entry->update($translation);
            } else {
                $model->translations()->create($translation);
            }
        }

        return $model;
    }

    public function getFullModel(string $searchQuery = '')
    {
        $model = parent::getFullModel();
        $provider = new BackTranslationsProvider();
        return $provider->addTranslations($model)
            ->whereHas('translations', function ($query) use ($searchQuery) {
                $query->where($this->searchField, 'LIKE', "%$searchQuery%");
            });
    }
}
