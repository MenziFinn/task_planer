<?php

return [
    'tasks' => [
        'model' => 'App\Models\TaskModel',
        'entity' => 'App\Entities\Task',
        'table' => 'tasks',
        'fields' => [
            'title',
            'description',
            'due_date',
            'completed'
        ],
        'validationRules' => [
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'completed' => 'required'
        ]
    ],

];
