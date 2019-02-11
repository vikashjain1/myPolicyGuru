<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use App\Model\Entity\User;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
						 $this->belongsTo('UserType');
						 $this->hasMany('AgentsUsers');

    }	
	
	public function validationAdd(Validator $validator)
    {
        $validator
			->email('email')
			->requirePresence('email')
			->notEmpty('email', 'An email address is required.');
			//->notBlank('email', 'An email address is required.');

		$validator
			->requirePresence('password')
			->notEmpty('password', 'A password is required.')
			->add('password', 'minlength',['rule' => ['minlength', 5]]);

		$validator
			->requirePresence('cnfpassword')
			->notEmpty('cnfpassword', 'A Confirm Password is required.')
			->add('cnfpassword', 'minlength',['rule' => ['minlength', 5]])
			->sameAs('cnfpassword','password','Passwords and Confirm Password are not equal.');
		
		return $validator;
    }
	
	public function validationEdit (Validator $validator){
		$validator->requirePresence('first_name')
			->notEmpty('first_name','First Name cannot be left empty.')
			->notEmpty('last_name','Last Name cannot be left empty.')
			->notEmpty('address','Address cannot be left empty.')
			->notEmpty('city','City cannot be left empty.')
			->notEmpty('state','State cannot be left empty.')
			->notEmpty('zip','Zip cannot be left empty.');
		return $validator;																		
	}
	
	public function validationEditagent (Validator $validator){
		$validator->requirePresence('first_name')
			->notEmpty('first_name','First Name cannot be left empty.')
			->notEmpty('last_name','Last Name cannot be left empty.')
			->notEmpty('address','Address cannot be left empty.')
			->notEmpty('city','City cannot be left empty.')
			->notEmpty('state','State cannot be left empty.')
			->notEmpty('zip','Zip cannot be left empty.');
			
		return $validator;																		
	}
	
	public function validationChangepwd(Validator $validator)
    {
		$validator
			->requirePresence('oldpassword')
			->notEmpty('oldpassword', 'Old Password cannot be left blank.')
			->notBlank('email', 'An email address is required.')
			->add('oldpassword', 'minlength',['rule' => ['minlength', 5]]);

		$validator
			->requirePresence('newpwd')
			->notEmpty('newpwd', 'New Password cannot be left blank.')
			->add('newpwd', 'minlength',['rule' => ['minlength', 5]]);

		$validator
			->requirePresence('cnfpassword')
			->notEmpty('cnfpassword', 'Confirm Password cannot be left blank.')
			->add('cnfpassword', 'minlength',['rule' => ['minlength', 5]])
			->sameAs('cnfpassword','newpwd','New Passwords and Confirm Password are not equal.');
		
		return $validator;
    }
	
	/**
	* Returns a rules checker object . It is used  for validating data
	* I used it her to check if email is unique 
	**/
	public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        return $rules;
    }
}
