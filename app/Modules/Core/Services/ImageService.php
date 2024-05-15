<?php
namespace App\Modules\Core\Services;

use Illuminate\Support\MessageBag;

abstract class ImageService extends Service {
    protected function getRules() {
        $modelTable = $this->model->getTable();

        return [
            "file" => [
                'file' => 'required|mimes:jpg,png,jpeg,gif,svg',
            ],
            "id" => [
                'id' => "exists:$modelTable",
            ],
        ];
    }

    public function upload(int $id, $data)
    {
        $this->validate(['id' => $id], 'id');
        if ($this->hasErrors()) return;

        $this->validate($data, 'file');
        if ($this->hasErrors()) return;

        $directoryPath = $this->getFileDirectoryPath();
        $success = $data['file']->move($directoryPath, $id);

        if (!$success) {
            $this->errors = new MessageBag(["file" => "File upload failed"]);
        }
    }

    public function deleteIfExists(int $id)
    {
        $this->validate(['id' => $id], 'id');
        if ($this->hasErrors()) return;

        $directoryPath = $this->getFileDirectoryPath();
        $filePath = "$directoryPath/$id";
        if (!file_exists($filePath)) return;

        $success = unlink($filePath);
        if (!$success) {
            $this->errors = new MessageBag(["file" => "File delete failed"]);
        }
    }

    private function getFileDirectoryPath()
    {
        $modelTable = $this->model->getTable();
        return storage_path("app/images/$modelTable");
    }
}
