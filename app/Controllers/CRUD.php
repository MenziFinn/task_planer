<?php

namespace App\Controllers;

class CRUD extends AccountController {
    public function create($table) {
        $model = $this->responseModel($table);
        $entity = $this->responseEntity($table);

        foreach ($this->request->getPost() as $key => $item):
            $entity->$key = $item;
        endforeach;

        $entity->user_id = $this->user_id;

        $model->save($entity);

        return redirect()->back();
    }

    public function read($table, $id = false) {
        $model = $this->responseModel($table);

        if ($id === false):
            //check on user level
            $entry = $model->getAll();
        else:
            $entry = $model->getEntryById($id);
        endif;

        return $entry;
    }

    public function update($table, $id) {
            $model = $this->responseModel($table);
            $entity = $this->responseEntity($table);
        
            //$entry = $model->getEntryById($id);

$entry ->user_id = $this->user_id;
        
            foreach ($this->request->getPost() as $key => $item):
                $entry->$key = $item;
            endforeach;
        
            $model->save($entry);
        

            return $model->save($entry);
        }

    public function delete($table, $id) {
        $model = $this->responseModel($table);
        return $model->delete(['id' => $id]);
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