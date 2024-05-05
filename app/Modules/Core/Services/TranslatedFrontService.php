<?php
namespace App\Modules\Core\Services;

abstract class TranslatedFrontService extends Service {
    
    public function getFullModel()
    {
        $language = app()->getLocale();
        $modelTable = $this->model->getTable();
        $modelLanguagesTable = $this->model->translations()->getRelated()->getTable();

        return $this->model
            ->join($modelLanguagesTable, "$modelLanguagesTable.item_id", '=', "$modelTable.id")
            ->where("$modelLanguagesTable.lang", '=', $language)
            ->select($this->fields);
    }
}
