<?php namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class User extends \CodeIgniter\Shield\Entities\User {
    protected $attributes = [
        'id' => '',
        'username' => '',
        'first_name' => '',
        'last_name' => '',
        'status' => '',
        'status_message' => '',
        'active' => '',
        'last_active' => ''
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
