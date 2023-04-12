<?php


class TaskModel extends BaseModel {
    protected $table = 'tasks';
    protected $primaryKey = 'id';

    protected $returnType = 'App\Entities\Tasks';

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

}

