<?php

namespace App\Controllers;

class CRUD extends BaseController {
    public function create($table) {
    }

    public function read($table, $id) {
        //dynamisch model aus url (im Config/Routes.php kasch luege wie es ufbaut isch und wie zum wert kunsch)
        $model = $this->responseModel($table);

        //Im Base Model e Function mache wo getEntryById heisst und id uslist
        $single_entry = $model->getEntryById($id);

        $data = [
            "entry" => $single_entry
        ];

        return view('crud', $data);
    }

    public function update($table) {
    }

    public function delete($table) {
    }

    private function responseModel($model_name) {
        $model_name = ucfirst($model_name);
        $model_name = $model_name . "Model";

        $modelClass = 'App\Models\\' . $model_name;

        if (!class_exists($modelClass)) {
            echo "This Model doesn't exists";
            exit();
        }

        return new $modelClass();
    }

    private function responseEntity($entity_name) {
        $entity_name = ucfirst($entity_name);

        $entityClass = 'App\Entities\\' . $entity_name;

        if (!class_exists($entityClass)) {
            echo "This Entity doesn't exists";
            exit();
        }

        return new $entityClass();
    }
}