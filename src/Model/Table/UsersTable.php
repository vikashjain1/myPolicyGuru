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
    }
	
	public function validationDefault(Validator $validator){
		 $validator->requirePresence('name','You must enter your name')
					 ->add('name', [
						'length' => [
						'rule' => ['minLength', 6],
						'message' => 'Name need to be at least 6 characters long',
						]
					])
					->notEmpty('name','Please, enter your name !')
					->notEmpty('password','Please, enter your password !')
					->add('password', [
					'compare' => [
						'rule' => ['compareWith', 'cnfpassword'],
						'message'=>"Password mismatch password confirm !"
						]
					])
					->notEmpty('city','Please, enter your city  !')
					->notEmpty('state','Please, enter your state  !')
					->notEmpty('address','Please, enter your address  !')

					->notEmpty('email','Please, enter your email  !')
					->add('email', [
					'email' => [
						'rule' => ['email'],
						'message'=>" Please, enter a valid email!"
						]
					])						
					->numeric('zip','Please, enter  valid zip code !');		
					//->date('birthdate','Please, enter valid bith date !')	;

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
