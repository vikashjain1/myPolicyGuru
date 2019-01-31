<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use App\Model\Entity\UserPermission;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserPermissionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

    }
}
