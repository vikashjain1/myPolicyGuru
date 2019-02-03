<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;



use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Network\Email\Email;
use App\Model\Table\UserTypeTable;
//use App\Model\Entity\UserType;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
	public $userCodes =[];
	public $userActions =[];
	public $loggedInUserAllowedActions =[];
	public $currentAction ='';
	public $authUserId ='';

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
				$this->loadModel('UserType');

        //$this->loadComponent('RequestHandler');
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
		'authorize'=> 'Controller',
		'authenticate' => [
			'Form' => [
				// fields used in login form
				'fields' => [
					'username' => 'email',
					'password' => 'password'
				]
			]
		],
		// login Url
		// if unauthorized user go to an unallowed action he will be redirected to this url
		
		//'authError' => 'Did you really think you are allowed to see that?',
		]);
		// Allow the display action so our pages controller still works and  user can visit index and view actions.
		//$this->Auth->allow(['index','display','view']);
		
		//$UserType = TableRegistry::get('UserType');
		$this->authUserId = $this->Auth->User('id');

		$selectUserTypeCodeListquery = $this->UserType->find('list',[		
							'keyField' => 'id',
							'valueField' => 'code'	
		]);
		$this->userCodes = $selectUserTypeCodeListquery->toArray();
		$this->set('userCodes',$this->userCodes);
		
		$UserPermissions = TableRegistry::get('UserPermissions');
		
		$selectUserTypeCodeActionsControllers = $UserPermissions->find('all',
		['conditions'=>
			['user_type_code'=>$this->Auth->User('user_type_code'),'status'=>_AUTHORIZE_ACTION]
		]
		);
		$userActionsData = $selectUserTypeCodeActionsControllers->toArray();
		$cnt=0;
		foreach($userActionsData as $val){
			$this->userActions[$val->controller_name][$cnt]=$val->action_name;
			
			$cnt++;
		}
		$currentController 	 = $this->request->params['controller'].'Controller';
		$this->currentAction = $this->request->params['action'];
		
		if (array_key_exists($currentController,$this->userActions))
		{
			if(in_array($this->currentAction,$this->userActions[$currentController]))
				$this->loggedInUserAllowedActions = $this->userActions[$currentController];
			else{
				$this->Flash->error('You cannot access that page');
		
				return $this->redirect(['controller' => 'Home', 'action' => 'display']);

			}
			
		}
 // pr($this->loggedInUserAllowedActions);
  // die;
    }


	public function isAuthorized($user)
	{
		
		//$this->Flash->error('You aren\'t allowed');
		//return false;
	}
	
	public function beforeFilter(Event $event)
	{
		$this->Auth->allow(['display']);
		
		
	//	pr($this->request->params['controller']);
		//echo $this->request->params['action'];

		//$this->userActions = $selectUserTypeCodeActionsControllers->toArray();
		//$this->set('userCodes',$this->userCodes);
		//pr($this->userActions);die;
	}
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
	 
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}


?>