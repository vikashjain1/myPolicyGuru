<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class AgentsUsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		$this->belongsTo('Users');

    }
}
