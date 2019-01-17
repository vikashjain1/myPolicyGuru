<?php
// src/Model/Table/ClaimsTable.php
namespace App\Model\Table;

use App\Model\Entity\Policy;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ClaimsTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }
	
	public function isOwnedBy($articleId, $userId)
	{
		return $this->exists(['id' => $articleId, 'user_id' => $userId]);
	}
	
	public function validationDefault(Validator $validator){
		 $validator->requirePresence('claim_type','create')
					->notEmpty('claim_type','You must select one claim')
					->notEmpty('claim_number','Please, enter Claim Number!')
					->notEmpty('policy_number','Please, enter Policy Number!')
					->notEmpty('loss_date','Please, enter Loss Date!')
					->notEmpty('adjustor_name','Please, enter Adjustor!')
					->notEmpty('adjustor_phone_number','Please, enter Adjustor Phone Number!')
					->notEmpty('adjustor_email','Please, enter Adjustor Email!');
					return $validator;																		
	}
}
