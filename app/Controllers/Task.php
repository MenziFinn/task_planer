<?php
namespace App\Controllers;

use App\Models\UserModel;

class Task extends AccountController {
    public function index() {
        $crud = new CRUD();
        $tasks = $crud->read("Task",);

        $user_model = new \App\Models\UserModel();
        $users = $user_model->getAllUser();

        $data = [
            "tasks" => $tasks,
            "users" => $users,
            "admin" => auth()->user()->inGroup('admin'),
        ];

        return view('be/Task', $data);
    }

    public function updateAjax($id){
        $crud = new CRUD();
        $task = $crud->read("Task", $id);
        if($task === false):
            $task = json_encode(["error" => "Wird bereits bearbeitet versuchen Sie es in par Minuten wider"]);
        else:
            $task = json_encode($task->toArray());
        endif;
        echo $task;
    }
    public function deleteAjax($id){
        $crud = new CRUD();
        $task = $crud->delete("Task", $id);
        $task = json_encode($task);

        echo $task;
    }
}