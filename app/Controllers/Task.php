<?php
namespace App\Controllers;

class Task extends AccountController {
    public function index() {
        $crud = new CRUD();
        $tasks = $crud->read("Task");

        $data = [
            "tasks" => $tasks
        ];

        return view('be/Task', $data);
    }

    public function updateAjax($id){
        $crud = new CRUD();
        $task = $crud->read("Task", $id);
        $task = json_encode($task->toArray());

        echo $task;
    }
    public function deleteAjax($id){
        $crud = new CRUD();
        $task = $crud->delete("Task", $id);
        $task = json_encode($task);

        echo $task;
    }
}