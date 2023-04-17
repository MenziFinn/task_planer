<?php namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class VersionControl extends Base {
    protected $attributes = [
        'id' => '',
        'task_id' => '',
        'time' => ''
    ];

    protected $dates = [
    ];
}
