<?php
namespace App\Modules\Core\Services;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

abstract class Service {
    protected $model;
    protected $errors;

    public function __construct($model)
    {
        $this->errors = new MessageBag();
        $this->model = $model;
    }

    protected function getRules()
    {
        return [];
    }

    public function validate($data, $ruleSet)
    {
        $rules = $this->getRules()[$ruleSet];

        $this->errors = new MessageBag();
        $validator = Validator::make($data, $rules);
        if($validator->fails()){
            $this->errors = $validator->errors();
        }        
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        return $this->errors->isNotEmpty();
    }
}