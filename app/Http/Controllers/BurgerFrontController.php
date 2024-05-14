<?php

namespace App\Http\Controllers;

use App\Modules\Burgers\Services\BurgerFrontService;

class BurgerFrontController extends ApiServiceController
{
    public function __construct(BurgerFrontService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
