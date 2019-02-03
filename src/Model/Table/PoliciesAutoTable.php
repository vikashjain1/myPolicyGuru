<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use App\Model\Entity\PolicyAuto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PoliciesAutoTable extends Table
{
    public function initialize(array $config)
    {
		    parent::initialize($config);
			
			$this->addBehavior('Timestamp');

    }
	
	
}
