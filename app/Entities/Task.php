<?php namespace App\Entities;

class Task extends Base {

    public $attributes = [
        //'id' => '',
        'end' => '',
        'start' => '',
        'description' => '',
        'priority' => '',
        'status' => '',
        'user_id' => '',
        'title' => ''
    ];

    protected $dates = [];

}

