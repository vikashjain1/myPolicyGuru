<?php
namespace App\Model\Entity;
use Cake\ORM\Entity;


class UserType extends Entity
{
     protected $_accessible = [
	 
	         'user_type_code' => true,

	 '*' => false];
	
}
