<?php

namespace App\Controllers;

class Tasks extends BaseController {

    
    public function index() {
        return view('welcome_message');
    }

    public function save($id) {
        $model = new Example();
        $data = [
            'class' => 'example-class',
            'key' => 'example-key',
            'value' => 'example-value',
            'type' => 'example-type',
            'context' => 'example-context',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'currency' => 'USD',
            'sport_autofill' => 'example-sport-autofill',
            'combination' => 'example-combination',
            'stake' => 10.0
        ];
        $model->insert($data);
    }

    public function update($id) {
        $model = new Example();
        $data = [
            'class' => 'updated-class',
            'key' => 'updated-key',
            'value' => 'updated-value',
            'type' => 'updated-type',
            'context' => 'updated-context',
            'updated_at' => date('Y-m-d H:i:s'),
            'currency' => 'EUR',
            'sport_autofill' => 'updated-sport-autofill',
            'combination' => 'updated-combination',
            'stake' => 20.0
        ];
        $model->update($id, $data);
    }

    public function delete($id) {
        $model = new Example();
        $model->delete($id);
    }

    private function responseModel($model_name){

    }
}
