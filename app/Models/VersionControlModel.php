<?php
namespace App\Models;

use CodeIgniter\Model;

class VersionControlModel extends BaseModel {
    protected $table = 'version_control';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\VersionControl';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id',
        'task_id',
        'time'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = '';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function findFromTaskId($id = false){
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asObject('App\Entities\VersionControl')->where(['task_id' => $id])->first();
    }

}

