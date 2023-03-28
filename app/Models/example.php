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
        'class',
        'key',
        'value',
        'type',
        'context',
        'created_at',
        'updated_at',
        'currency',
        'sport_autofill',
        'combination',
        'stake'
    ];

    protected $useTimestamps = false;
    protected $createdField = '';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [];
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
}

