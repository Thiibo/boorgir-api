<?php

namespace App\Http\Controllers;

use App\Modules\Burgers\Services\BurgerBackService;
use App\Modules\Burgers\Services\BurgerImageService;

class BurgerBackController extends FullApiServiceController
{
    public function __construct(BurgerBackService $service, BurgerImageService $imageService)
    {
        parent::__construct();
        $this->service = $service;
        $this->imageService = $imageService;
    }
}
