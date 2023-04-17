<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Shield\Entities\User;
use Config\Services;

class UserModel extends \CodeIgniter\Shield\Models\UserModel {
    protected $DBGroup = 'default';
    protected $table = 'users';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'App\Entities\User';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id',
        'username',
        'first_name',
        'last_name',
        'status',
        'status_message',
        'active',
        'last_active'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [
        'saveEmailIdentity'
    ];
    protected $beforeUpdate = [];
    protected $afterUpdate = [
        'saveEmailIdentity'
    ];
    protected $beforeFind = [];
    protected $afterFind = ['fetchIdentities'];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getAllUser(){
        return $this->asObject('App\Entities\User')->findAll();
    }

    // Methods
    public function getUser($id = false): object|array|null {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asObject('App\Entities\User')->where(['id' => $id])->first();
    }

    public function getUserByEmail($id) {
        $auth_identity_model = new \App\Models\AuthIdentityModel();
        return $auth_identity_model->getAuthIdentity($id);
    }

    public function getUsersByGroup($user_group = null) {
        $auth_groups_user_model = new \App\Models\AuthGroupsUserModel();
        $user_ids = [];

        $users = $auth_groups_user_model->asArray()->select('user_id')->where(['group' => $user_group])->findAll();

        if (!empty($users)):
            foreach ($users as $group_user) {
                $user_ids[] = $group_user['user_id'];
            }

            if (!is_null($user_group)) {
                $this->whereIn('id', $user_ids);
            }
        endif;

        return $this->findAll();
    }
}
