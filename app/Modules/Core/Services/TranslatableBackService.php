<?php
namespace App\Modules\Core\Services;

abstract class TranslatableBackService extends Service {

    public function create($data, $ruleSet = "add")
    {
        $model = parent::create($data, $ruleSet);
        $model->translations()->createMany($data['translations']);

        return $model;
    }

    public function update($data, int $id, $ruleSet = "update")
    {
        $model = parent::update($data, $id, $ruleSet);
        
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
        return parent::getFullModel()
            ->with('translations')
            ->whereHas('translations', function ($query) use ($searchQuery) {
                $query->where($this->searchField, 'LIKE', "%$searchQuery%");
            });
    }
}
