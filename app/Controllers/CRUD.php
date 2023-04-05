<?php

namespace App\Controllers;

class Tasks extends BaseController {

    
    public function index() {
        return view('welcome_message');
    }

    protected $request;

    public function __construct()
    {
        $this->request = service('request');
    }

    public function generateCrud($table, $action)
    {
        $config = include('tables.php');
        $model = new $config[$table]['model']();
        $entity = new $config[$table]['entity']();

        switch ($action) {
            case 'create':
                $data = $this->request->getPost($config[$table]['fields']);
                $entity->fill($data);
                if (!$model->save($entity)) {
                       // do error shit
                }
                // ausgabe an view das es erfolgreich gsi isch
                break;
            case 'read':
                $data['rows'] = $model->findAll();
              // date an di view schicke
                break;
            case 'update':
                $data = $this->request->getPost($config[$table]['fields']);
                $entity->fill($data);
                if (!$model->save($entity)) {
                       // do error shit
                }
                // ausgabe an view das es erfolgreich gsi isch
                break;
            case 'delete':
                $model->delete($this->request->getPost('id'));
                // ausgabe an view das es erfolgreich gsi isch
                break;
            default:
                throw new InvalidArgumentException('Invalid action');
        }
    }

    public function create($table)
    {
        $this->generateCrud($table, 'create');
    }

    public function read($table)
    {
        $this->generateCrud($table, 'read');
    }

    public function update($table)
    {
        $this->generateCrud($table, 'update');
    }

    public function delete($table)
    {
        $this->generateCrud($table, 'delete');
    } 

    private function responseModel($model_name){

    }
}
