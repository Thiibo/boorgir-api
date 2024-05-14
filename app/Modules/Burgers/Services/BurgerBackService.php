<?php
namespace App\Modules\Burgers\Services;

use App\Models\Burger;
use App\Modules\Core\Services\TranslatableBackService;

class BurgerBackService extends TranslatableBackService {

    protected $fields= ['id', 'price'];
    protected $searchField = 'name';

    protected function getRules() {
        $supported_locales = implode(',', config('app.supported_locales'));

        return [
            "add" => [
                'price' => 'required|numeric',
                'translations.*.lang' => "required|distinct|in:$supported_locales",
                'translations.*.name' => 'required|string',
                'translations.*.description' => 'required|string',
            ],
            "update" => [
                'price' => 'required|numeric',
                'translations.*.lang' => "required|distinct|in:$supported_locales",
                'translations.*.name' => 'required|string',
                'translations.*.description' => 'required|string',
            ]
        ];
    }

    public function __construct(Burger $model)
    {
        parent::__construct($model);
    }
}

