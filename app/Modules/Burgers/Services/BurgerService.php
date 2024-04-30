<?php
namespace App\Modules\Ingredients\Services;

use App\Modules\Core\Services\Service;
use App\Models\Burger;

class BurgerService extends Service {

    protected $fields= ['id', 'name'];
    protected $searchField = 'name';

    protected $rules = [
        'name'
    ];

    public function __construct(Burger $model)
    {
        parent::__construct($model);
    }
}

