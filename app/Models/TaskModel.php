<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends BaseModel {
    protected $table = 'task';
    protected $primaryKey = 'id';
    protected $returnType = 'App\Entities\Task';

    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'id',
        'end',
        'start',
        'description',
        'priority',
        'status',
        'user_id',
        'title',
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = '';
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    /**
     * @param false $user_id
     * @param false $status
     * @return array|false
     */

    public function getTasksByUser($user_id = false) {
        if ($user_id === false) {
            return false;
        }

        return $this->asObject('App\Entities\Task')->where(['id' => $user_id])->first();
    }

    public function getAllByUser($user_id = false) {
        if ($user_id === false) {
            return false;
        }

        return $this->asObject('App\Entities\Task')->where(['user_id' => $user_id])->findAll();
    }
}

