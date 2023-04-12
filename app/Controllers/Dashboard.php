<?php
namespace App\Controllers;

class Dashboard extends AccountController {

    /**
     * @return string
     */
    public function index() {
        $data = [

        ];

        return view('be/Dashboard', $data);
    }
}