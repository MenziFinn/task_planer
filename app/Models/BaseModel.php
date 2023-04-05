<?php namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model {
    protected $table = '';
    protected $primaryKey = '';
    protected $returnType = '';
    protected $allowedFields = [];

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function get_by_field($field_name, $field_value) {
        return $this->asObject($this->returnType)->where([$field_name => $field_value])->findAll();
    }

    public function get_one_by_field($field_name, $field_value) {
        return $this->asObject($this->returnType)->where([$field_name => $field_value])->first();
    }

    public function get_by_fields($where_array): array {
        return $this->asObject($this->returnType)->where($where_array)->findAll();
    }

    public function get_id_by_field($field_name, $field_value) {
        $object = $this->asObject($this->returnType)->where([$field_name => $field_value])->first();
        if (is_object($object)):
            return $object->{$this->primaryKey};
        else:
            exit('Kein Objekt (' . $this->table . ') mit Feld:' . $field_name . ' und Wert:' . $field_value . '');
            dd();
        endif;
    }

    public function getVar($var_name) {
        if(!isset($this->$var_name)) {
            return null;
        }
        return $this->$var_name;
    }

    public function get_table_fields() {
        return $this->getFieldNames($this->table);
    }

    public function getAllowedFields() {
        return $this->allowedFields;
    }

    public function getAll() {
        return $this->findAll();
    }

    public function getEntryById($id = false) {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asObject($this->returnType)->where(['id' => $id])->first();
    }

    public function getPrimaryKeyField() {
        return $this->primaryKey;
    }


    public function getEntries() {
        return $this->asObject($this->returnType)->findAll();
    }

}
