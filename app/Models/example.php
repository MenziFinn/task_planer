<?php

namespace App\Models;

use CodeIgniter\Model;

class Example extends Model {
    protected $table = 'settings';
    protected $primaryKey = 'id';

    protected $returnType = 'App\Entities\Settings';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id',
        'title',
        'description',
        'due_date',
        'completed'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = '';

    protected $validationRules = [
        'id' => 'require',
        'title' => 'require',
        'description' => 'require',
        'due_date' => 'require',
        'completed' => 'require'
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * @param false $user_id
     * @param false $status
     * @return array|false
     */
    public function getSettingsByUserId($user_id = false) {
        if ($user_id === false) {
            return false;
        }

        return $this->asObject('App\Entities\Settings')->where(['id' => $user_id])->first();
    }

    public function getAllAufgaben() {
        return $this->findAll();
    }

    public function getAufgaben($id) {
        return $this->find($id);
    }

    public function createAufgaben($data) {
        return $this->insert($data);
    }

    public function updateAufgaben($id, $data) {
        return $this->update($id, $data);
    }

    public function deleteAufgaben($id) {
        return $this->delete($id);
    }

}

