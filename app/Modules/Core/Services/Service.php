<?php
namespace App\Modules\Core\Services;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

abstract class Service {
    protected $model;
    protected $fields;
    protected $searchField;
    protected $errors;
    protected $translatable;

    public function __construct($model)
    {
        $this->model = $model;
        $this->errors = new MessageBag();
    }

    protected function getRules()
    {
        return [];
    }

    protected function getRelationFields()
    {
        return [];
    }

    public function find($id)
    {
        return $this->getFullModel()->find($id);
    }


    public function create($data, $ruleSet = "add")
    {
        $this->validate($data, $ruleSet);
        if ($this->hasErrors()) return;
        $model = $this->model->create($data);
        if ($this->translatable) $model->translations()->createMany($data['translations']);

        return $model;
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

    public function update($data, int $id, $ruleSet = "update")
    {
        $this->validate($data, $ruleSet);
        if ($this->hasErrors()) return;
        return $this->model->where('id', $id)->update($data);
    }
    
    public function getFullModel()
    {
        return $this->model
            ->select($this->fields)
            ->with($this->getRelationFields());
    }

    public function getErrors(){
        return $this->errors;
    }

    public function hasErrors(){
        return $this->errors->isNotEmpty();
    }
}
