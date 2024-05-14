<?php
namespace App\Modules\Core\Services;

use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Validator;

abstract class Service {
    protected $model;
    protected $fields;
    protected $searchField;
    protected $errors;

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
        $model = $this->getFullModel()->find($id);
        if ($model === null) {
            $this->errors = new MessageBag(["id" => trans('validation.exists', ['attribute' => 'id'])]);
            return;
        }

        return $model;
    }

    public function all(int $perPage, string $query = '')
    {
        return $this->getFullModel($query)->paginate($perPage)->withQueryString();
    }

    public function create($data, $ruleSet = "add")
    {
        $this->validate($data, $ruleSet);
        if ($this->hasErrors()) return;
        return $this->model->create($data);
    }

    public function update($data, int $id, $ruleSet = "update")
    {
        $this->validate($data, $ruleSet);
        $model = $this->find($id);
        if ($this->hasErrors()) return;

        $model->update($data);

        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->find($id);
        if ($this->hasErrors()) return;

        return $model->delete();
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
