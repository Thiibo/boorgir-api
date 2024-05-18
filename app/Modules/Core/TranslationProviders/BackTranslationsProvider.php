<?php
namespace App\Modules\Core\TranslationProviders;

class BackTranslationsProvider {
    public function addTranslations($query)
    {
        return $query->with('translations');
    }
}
