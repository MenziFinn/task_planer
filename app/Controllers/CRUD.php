<?php

namespace App\Controllers;

class Tasks extends BaseController {

    
    public function index() {
        return view('welcome_message');
    }
// Ladet eine aufgabe anhand der id und gibt es an eine view weiter
    public function show($id) {
        $model = new example();
        $data['setting'] = $model->getAufgaben($id);
        return view('in die entsprechende view leiten', $data);
    }

//ladet alle aufgaben und gibt sie an eine view weiter
    public function showAll() {
    $model = new example();
        $data['setting'] = $model->getAllAufgaben();
        return view('in die entsprechende view leiten', $data);
    }

    //speichert neue Aufgabe in DB
    public function save(RequestInterface $request) {
        $model = new example();
        $aufgabe = new \App\Entities\Settings($request->getPost());
        if (!$model->save($aufgabe)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
        return redirect()->to('/Settings')->with('success', 'aufgabe created successfully!');

    }

    // leitet an view weiter wo die daten bearbeitet werden können
    public function edit($id) {
        $model = new example();
        $data['setting'] = $model->getAufgaben($id);
        return view('in die entsprechende view leiten', $data);
    }
//akutallisiert die bearbeiteten daten in DB
    public function update(RequestInterface $request, $id) {
        $model = new example();
        $aufgabe = new \App\Entities\Settings($request->getPost());
        $aufgabe->id = $id;
        if (!$model->save($aufgabe)) { 
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
        return redirect()->to('/Settings')->with('success', 'aufgabe updated successfully!');
    }
//löscht alle daten aus der db einer besimmten Aufgabe
    public function delete($id) {
        $model = new example();
        if (!$model->delete($id)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
        return redirect()->to('/Settings')->with('success', 'aufgabe deleted successfully!');
    }



    private function responseModel($model_name){

    }
}
