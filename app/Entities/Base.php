<?php namespace App\Entities;

use CodeIgniter\Entity;
use CodeIgniter\I18n\Time;

class Base extends Entity {
    protected $attributes = [];

    protected $dates = [];

    public function __get($key) {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }
    }

    public function __set(string $key, $value = NULL) {
        if (array_key_exists($key, $this->attributes)) {
            if (is_array($value)) {
                $value = json_encode($value);
            }
            $this->attributes[$key] = $value;
        }
    }

}
