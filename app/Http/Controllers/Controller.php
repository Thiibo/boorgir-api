<?php

namespace App\Http\Controllers;

use App\Modules\Helpers\ResponseGenerator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected ResponseGenerator $responseGenerator;

    public function __construct() {
        $this->responseGenerator = new ResponseGenerator();
    }
}
