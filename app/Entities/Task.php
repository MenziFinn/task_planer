<?php namespace App\Entities;

class Task extends Base {

    public $attributes = [
        // 'id'=> '',
        'title' => null,
        'description' => null,
        'due_date' => null,
        'completed' => false
    ];

    protected $dates = ['due_date'];

}

