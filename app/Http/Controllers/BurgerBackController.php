<?php

namespace App\Http\Controllers;

use App\Modules\Burgers\Services\BurgerBackService;

class BurgerBackController extends FullApiServiceController
{
    public function __construct(BurgerBackService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
