<?php

namespace App\Http\Controllers;

use App\Modules\Ingredients\Services\BurgerImageService;

class BurgerImageController extends ImageController
{
    public function __construct(BurgerImageService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
