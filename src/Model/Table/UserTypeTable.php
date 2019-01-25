<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UserTypeTable extends Table
{
    public function initialize(array $config)
    {
		    parent::initialize($config);
			//$this->setTable('roles');
			$this->setPrimaryKey('user_type_code');
			$this->addBehavior('Timestamp');

    }
	
	
}
