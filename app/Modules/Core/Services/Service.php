<?php
namespace App\Modules\Core\Services;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

abstract class Service {
    protected $model;
    protected $fields;
    protected $searchField;
    protected $errors;
    protected $rules;

    public function __construct($model)
    {
        $this->model = $model;
        $this->errors = new MessageBag();
    }

    protected function getRelationFields(){
        return [];
    }

    public function find($id)
    {
        return $this->model
            ->select($this->fields)
            ->with($this->getRelationFields())
            ->find($id);
    }


    public function create($data, $ruleSet = "add")
    {
        $this->validate($data, $ruleSet);
        if ($this->hasErrors()) return;
        $quote = $this->model->create($data);
        return $quote;
    }

    public function validate($data, $ruleSet)
    {
        $rules = isset($this->rules[$ruleSet]) ? $this->rules[$ruleSet] : $this->rules;

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
