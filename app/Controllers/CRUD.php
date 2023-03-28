<?php

namespace App\Controllers;

class Tasks extends BaseController {
    public function index() {
        return view('welcome_message');
    }

    public function save($model, $id) {
        $model = $this->responseModel($model);
    }

    public function update($model, $id) {

    }

    public function delete($model, $id) {

    }

    private function responseModel($model_name){

    }
}
