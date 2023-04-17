<?php

namespace App\Controllers;

use App\Models\UserModel;

class CRUD extends AccountController {
    public function create($table) {
        $model = $this->responseModel($table);
        $entity = $this->responseEntity($table);

        $entry_id = $this->request->getPost('id');

        if ($entry_id > 0):
            $entity->id = $entry_id;
            if (auth()->user()->inGroup('admin') === true):
                $this->statusUpdate();
            endif;
        endif;

        $entity->user_id = $this->user_id;

        foreach ($this->request->getPost() as $key => $item):
            $entity->$key = $item;
        endforeach;

        $model->save($entity);

        return redirect()->back();
    }

    public function read($table, $id = false) {
        $model = $this->responseModel($table);

        if ($id ==! false):
            $version_control = $this->versionControl($id);

            if($version_control === false):
                  return false;
            endif;
        endif;

        if ($id === false):
            if (auth()->user()->inGroup('admin') === true):
                $entry = $model->getAll();
            else:
                $entry = $model->getAllByUser(user_id());
            endif;
        else:
            $entry = $model->getEntryById($id);
        endif;

        return $entry;
    }

    private function versionControl($id) {
        $version_control_model = new \App\Models\VersionControlModel();
        $version_control_entity = new \App\Entities\VersionControl();

        $version_control_task = $version_control_model->findFromTaskId($id);

        if (empty($version_control_task)):
            $version_control_entity->task_id = $id;
            $version_control_entity->time = strtotime("now");
            return $version_control_model->save($version_control_entity);
        else:
            $diff_seconds = strtotime("now") - $version_control_task->time;

            if ($diff_seconds > 180):
                $version_control_model->delete(['id' => $version_control_task->id]);

                $version_control_entity->task_id = $id;
                $version_control_entity->time = strtotime("now");
                return $version_control_model->save($version_control_entity);
            else:
                return false;
            endif;
        endif;
    }

    public function update() {
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

    private function statusUpdate() {
        $email = \Config\Services::email();

        $status = $this->request->getPost('status');
        $entry_id = $this->request->getPost('id');
        $user_id = $this->request->getPost('user_id');

        $auth_identity = new \App\Models\AuthIdentityModel();
        $user = $auth_identity->getAuthIdentity($user_id);

        switch ($status) {
            case "1":
                $status = "Genehmigt";
                break;
            case "2":
                $status = "offen";
                break;
            case "3":
                $status = "Abgelehnt";
                break;
        }

        $email->setFrom('task@planer.ch', 'Task Planer');
        $email->setTo($user->secret);

        $email->setSubject('Task Planer');
        $email->setMessage('Der Auftrag mit der ID: ' . $entry_id . " wurde " . $status);

        return $email->send();
    }
}