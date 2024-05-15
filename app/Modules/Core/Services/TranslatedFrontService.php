<?php
namespace App\Modules\Core\Services;

abstract class TranslatedFrontService extends ApiService {
    public function getFullModel(string $query = '')
    {
        $language = app()->getLocale();
        $modelTable = $this->model->getTable();
        $modelLanguagesTable = $this->model->translations()->getRelated()->getTable();

        return parent::getFullModel()
            ->join($modelLanguagesTable, "$modelLanguagesTable.item_id", '=', "$modelTable.id")
            ->where("$modelLanguagesTable.lang", '=', $language)
            ->where($this->searchField, "LIKE", "%$query%")
            ->select($this->fields);
    }
}
