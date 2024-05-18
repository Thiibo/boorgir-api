<?php
namespace App\Modules\Core\TranslationProviders;

class FrontTranslationsProvider {
    public function addTranslations($query)
    {
        $language = app()->getLocale();
        $modelTable = $query->getModel()->getTable();
        $modelLanguagesTable = $query->getModel()->translations()->getRelated()->getTable();

        return $query
            ->join($modelLanguagesTable, "$modelLanguagesTable.item_id", '=', "$modelTable.id")
            ->where("$modelLanguagesTable.lang", '=', $language);
    }
}
