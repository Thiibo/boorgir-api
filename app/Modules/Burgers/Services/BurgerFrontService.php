<?php
namespace App\Modules\Burgers\Services;

use App\Models\Burger;
use App\Modules\Core\Services\TranslatedFrontService;

class BurgerFrontService extends TranslatedFrontService {

    protected $fields= ['burgers.id', 'name', 'description', 'price'];
    protected $searchField = 'name';

    protected function getRelationFields()
    {
        return ['ingredients'];
    }

    public function __construct(Burger $model)
    {
        parent::__construct($model);
    }
}

