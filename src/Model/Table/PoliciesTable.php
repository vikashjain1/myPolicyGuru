<?php
// src/Model/Table/PoliciesTable.php
namespace App\Model\Table;

use App\Model\Entity\Policy;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PoliciesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		$this->hasMany('PoliciesAuto');

    }
	
	public function isOwnedBy($policyId, $userId)
	{
		return $this->exists(['id' => $policyId, 'user_id' => $userId]);
	}
	
	//https://www.discussdesk.com/cakephp-3-data-validation.htm
	public function validationDefault(Validator $validator){
		 $validator->requirePresence('policy_type','create')
					->notEmpty('policy_type','You must select one policy')
					->notEmpty('policy_number','Please, enter Policy number!')
					->notEmpty('policy_premium','Please, enter Policy premium!')
					->numeric('policy_premium','Please, enter numeric value of Policy Premium!')
					->notEmpty('carrier','Please, enter your Insurance Carrier!')
					->notEmpty('effective_date','Please, enter Effective Date!')
					->notEmpty('expiration_date','Please, enter Expiration Date!')
					->allowEmpty('coverage_amount')
					->numeric('coverage_amount','Please, enter numeric value of Coverage Amount!');
					return $validator;																		
	}
}