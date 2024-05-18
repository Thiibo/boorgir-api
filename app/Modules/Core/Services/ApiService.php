<?php
namespace App\Modules\Core\Services;

use Illuminate\Support\MessageBag;

abstract class ApiService extends Service {
    protected $fields;
    protected $searchField;

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

    public function getFullModel()
    {
        return $this->model->select($this->fields);
    }
}
