<?php
namespace App\Controller;
use Cake\Core\Configure;
use App\Controller\AppController;
use App\Model\Table\Users;
use App\Model\Table\AgentsUsers;


class AgentsController extends AppController{
    public function initialize()
    {	
		parent::initialize();
		Configure::write('debug', 1);
        $this->loadModel('Users');
        $this->loadModel('AgentsUsers');

		$this->loadComponent('Flash'); // Include the FlashComponent
		// Auth component allow visitors to access add action to register  and access logout action 
		if($this->authUserId){
			if($this->Auth->User('user_type_code')!=_AGENT_CODE){
				//return $this->redirect(['controller' => 'Users', 'action' => 'dashboard']);
			}
			$this->Auth->allow($this->loggedInUserAllowedActions);	
		}else{
			$this->Auth->allow([ 'add','login']);
		}
    }
	
	public function dashboard()
	{
		//$this->viewBuilder()->layout('home');

		if($this->Auth->User()){
			 
			 
		}
		
	}
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user_type_code =  $this->Users->find('all', [
					'conditions' => ['email' => $this->request->data['email']]
				])->first()->user_type_code;
           // $userEmail = $this->Users->findByEmail($this->data['email'])->id;
		   if($user_type_code!=_AGENT_CODE){
				return $this->Flash->error(__('Invalid username or password, try again.'));
			}
			
			// Auth component identify if sent user data belongs to a user
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect(['action'=>'dashboard']);
			}
			$this->Flash->error(__('Invalid username or password, try again.'));
		}
	}
	
	public function logout(){
		$this->request->session()->destroy();
		$this->Flash->success('You successfully have logged out');	
		return $this->redirect(['action'=>'login']);
	}
	
	public function index()
	{
		$this->set('users',$this->Users->find('all'));		
	}
	
	public function view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user',$user);
	}
	
	public function add()
	{
		$user = $this->Users->newEntity();
		if($this->request->is('post')) {
			
			$this->request->data['user_type_code'] = _AGENT_CODE;
			$this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)){
				$this->Flash->success(__('Your account has been registered .'));				
				return $this->redirect(['controller' => 'Agents', 'action' => 'login']);
			}

			$errdata='';
			if(count($user->errors())>0){
				foreach($user->errors() as $ind =>$value){
					$errdata .='<br/>';
					$errdata .= implode(",",array_values($value));
				}
				$this->set('errorMsg',$errdata);
			}		
			$this->Flash->error(__('Unable to register your account.'));
		}
		$this->set('user',$user);
	}
	
	public function changepwd()
	{
		$id = $this->Auth->User('id');
		$user = $this->Users->get($id);
		if ($this->request->is(['post', 'put'])) {
			
			if (($this->request->data['oldpassword']) && !empty($this->request->data['newpwd'])){
			
			if((new DefaultPasswordHasher)->check($this->request->data['oldpassword'],$user['password'])){
				$this->request->data['password']= $this->request->data['newpwd'];
				$this->Users->patchEntity($user, $this->request->data);
			
				if ($this->Users->save($user)) {
					$this->Flash->success(__('Your password  has been updated.'));
					return $this->redirect(['action' => 'changepwd']);
				}
			$errdata='';
			if(count($user->errors())>0){
				foreach($user->errors() as $ind =>$value){
					$errdata .='<br/>';
					$errdata .= implode(",",array_values($value));

				}	
				$this->set('errorMsg',$errdata);
			}			
			$this->Flash->error(__('Unable to update your password .'));
			}		
		else{
								//$this->Flash->error(__('Invalid old password .'));
								$this->set('errorMsg','Invalid old password ');
			

			}
					$this->set('user', $user);

         
		}
	}}
	
	public function viewUser()
	{
		$custData = $this->AgentsUsers->find('all',['conditions'=>['agent_id'=>$this->authUserId]])->contain(['Users'])->toArray();
		//pr($custData);die;
		//$user = $this->Users->find('all',['conditions'=>[]]);
		$this->set('custData',$custData);
	}
	
	public function addUser()
	{
		$user = $this->Users->newEntity();
		$AgentsUsers = $this->AgentsUsers->newEntity();
		if($this->request->is('post')) {
			//pr($this->request->data);die;
			//$this->request->data['name']= $this->request->data['first_name'].''.$this->request->data['last_name'];
			//$this->request-data['last_name'] = $this->request-data['first_name'] ='';
			$this->request->data['user_type_code'] = _NORMAL_CODE;
			$this->Users->patchEntity($user, $this->request->data);
			$resultUser = $this->Users->save($user);
			if($resultUser){
				$user_id = $resultUser->id;
				$newarr =['user_id'=>$user_id,'agent_id'=>$this->authUserId];
				$this->AgentsUsers->patchEntity($AgentsUsers, $newarr);

				$this->AgentsUsers->save($AgentsUsers);
				$this->Flash->success(__('Customer has been added successfully!! .'));				
				return $this->redirect(['controller' => 'Agents', 'action' => 'viewUser']);
			}

			$errdata='';
			if(count($user->errors())>0){
				foreach($user->errors() as $ind =>$value){
					$errdata .='<br/>';
					$errdata .= implode(",",array_values($value));
				}
				$this->set('errorMsg',$errdata);
			}		
			$this->Flash->error(__('Unable to add  this account.'));
		}
		$this->set('user',$user);
	}
	
	public function edit()
	{
		$user = $this->Users->get($this->authUserId);
		if ($this->request->is(['post', 'put'])) {
			$this->Users->patchEntity($user, $this->request->data);
			//pr($user->errors());die;
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Your profile data has been updated.'));
				return $this->redirect(['action' => 'edit']);
			}
			$errdata='';
			if(count($user->errors())>0){
				foreach($user->errors() as $ind =>$value){
					$errdata .='<br/>';
					$errdata .= implode(",",array_values($value));

				}	
				$this->set('errorMsg',$errdata);
			}			
			$this->Flash->error(__('Unable to update your profile .'));
		}
		$this->set('user', $user);
	}
	
	
	public function editUser($userId)
	{
		if($userId){

		$user = $this->Users->get($userId);
		//pr($user);die;
		if ($this->request->is(['post', 'put'])) {
			//$this->request->data['name']= $this->request->data['first_name'].''.$this->request->data['last_name'];
			
			$this->Users->patchEntity($user, $this->request->data);
			//pr($user->errors());die;
			if ($this->Users->save($user)) {
				$this->Flash->success(__('Your profile data has been updated.'));
				return $this->redirect(['action' => 'viewUser']);
			}
			$errdata='';
			if(count($user->errors())>0){
				foreach($user->errors() as $ind =>$value){
					$errdata .='<br/>';
					$errdata .= implode(",",array_values($value));

				}	
				$this->set('errorMsg',$errdata);
			}			
			$this->Flash->error(__('Unable to update customer profile .'));
		}
		$this->set('user', $user);
		}
	}
	
	public function delete($id)
	{
		$this->request->allowMethod(['post', 'delete']);
	
		$user = $this->Users->get($id);
		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}		
		
	}	
}
?>