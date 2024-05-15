<?php
namespace App\Modules\Burgers\Services;

use App\Models\Burger;
use App\Modules\Core\Services\ImageService;

class BurgerImageService extends ImageService {
    public function __construct(Burger $model)
    {
        parent::__construct($model);
    }
}