<?php
// src/Controller/PoliciesController.php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Network\Email\Email;

class PoliciesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
		//Configure::write('debug', 0);
        $this->session = $this->request->session();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
		$this->loadModel('PoliciesAuto');
		$this->loadModel('PolicyTypes');		$this->loadComponent('RequestHandler');

    }
	
	public function beforeFilter(Event $event) {
		//parent::beforeFilter($event);
		if($this->authUserId){
			//$this->Auth->allow(['edit','addtest']);
			$this->Auth->allow($this->loggedInUserAllowedActions);	
		}
    }

    public function index()
    {
        return $this->redirect(['action' => 'add']);
        $articles = $this->Paginator->paginate($this->Policies->find());
        $this->set(compact('articles'));
    }

    public function list()
    {
		if ($this->request->is('post')) {
			$postedData = $this->request->data;
			if(isset($postedData['policy_type']) && !empty($postedData['policy_type'])){
			$policy_type = $postedData['policy_type'];
			return $this->redirect(['action' => 'add',$policy_type]);

			
			}
			
		}
		$selectListquery = $this->PolicyTypes->find('list',[		
							'keyField' => 'id',
							'valueField' => 'policy_name'	
		]);
		$selectListdata = $selectListquery->toArray();
		$this->set('selectListdata', $selectListdata);
		
		$articles = $this->Paginator->paginate($this->Policies->find('all', [
					'conditions' => ['Policies.user_id' => $this->authUserId]]));
        $this->set(compact('articles'));
		
    }

    public function add($policyTypeId='')
    {
		$this->set('errorMsg','');
        $article = $this->Policies->newEntity();
		
		$fileuplodStatus=true;
		$policy_typeStatus=true;
		$selectListquery = $this->PolicyTypes->find('list',[		
							'keyField' => 'id',
							'valueField' => 'policy_name'	
		]);
		$selectListdata = $selectListquery->toArray();
		$policyType = $selectListdata[$policyTypeId];
		$this->set('selectListdata', $selectListdata);
		$this->set('policyType', $policyType);
		$this->set('policy_type', $policyTypeId);

		// Data now looks like
        if ($this->request->is('post')) {
			$postedData = $this->request->data;
				
			if(!empty($postedData['expiration_date']))
				$postedData['expiration_date'] = Date("Y-m-d",strtotime($postedData['expiration_date']));
									
			if(!empty($postedData['effective_date']))
				$postedData['effective_date'] = Date("Y-m-d",strtotime($postedData['effective_date']));

			if(isset($postedData['policy_path']['name']) && !empty($postedData['policy_path']['name'])){	
				$filename =  basename($postedData['policy_path']['name']);
				$tmp_name = $postedData['policy_path']["tmp_name"];
				$extFile = pathinfo($filename, PATHINFO_EXTENSION);
				$timestmpFilename = strtotime(Date('Y-m-d H:i:s')).".".$extFile;
				$destPath = WWW_ROOT.DS.'policyfiles'.DS.$timestmpFilename;
				$fileuplodSucess =  move_uploaded_file($tmp_name, $destPath);
				if($fileuplodSucess){			
					$postedData['policy_path'] = $timestmpFilename;
				}else{								
					$fileuplodStatus= false;	
				}
			}
			if($fileuplodStatus===false){
				//$this->set('errorMsg','File not uploaded .');
				$this->Flash->error(__('File not uploaded'));
			} else {
				//pr($postedData);die;
				$article = $this->Policies->patchEntity($article, $postedData);
				$article->user_id = $this->authUserId;
				$policyData= $this->Policies->save($article);
				if ($this->Policies->save($article)) {
					
					///
					$policyId = $policyData->id;
					//$deletePoliciesAuto = $this->PoliciesAuto->deleteAll(['policy_id'=>$policyId ]);
					if(isset($postedData['id']))
					unset($postedData['id']);
					for($i=0;$i<count($postedData['covered_items']);$i++ ){
						$newarr =['policy_id'=>$policyId,
						'make'=>(isset($postedData['make'][$i]))?$postedData['make'][$i]:'',
						'covered_items'=>(isset($postedData['covered_items'][$i]))?$postedData['covered_items'][$i]:'',
						'model'=>(isset($postedData['model'][$i]))?$postedData['model'][$i]:'',
						'license_plate'=>(isset($postedData['license_plate'][$i]))?$postedData['license_plate'][$i]:'',
						'full_cost_replace'=>(isset($postedData['full_cost_replace'][$i]) && $postedData['full_cost_replace'][$i]==1)?1:0,
						'vin'=>(isset($postedData['vin'][$i]))?$postedData['vin'][$i]:'',
						'comp_deduct'=>(isset($postedData['comp_deduct'][$i]))?$postedData['comp_deduct'][$i]:'',
						'medical_pip'=>(isset($postedData['medical_pip'][$i]))?$postedData['medical_pip'][$i]:'',
						'liability_limit'=>(isset($postedData['liability_limit'][$i]))?$postedData['liability_limit'][$i]:'',
						'motor_limits'=>(isset($postedData['motor_limits'][$i]))?$postedData['motor_limits'][$i]:'',
						'tow_limits'=>(isset($postedData['tow_limits'][$i]))?$postedData['tow_limits'][$i]:'',
						'gap_or_lease'=>(isset($postedData['gap_or_lease'][$i]) && $postedData['gap_or_lease'][$i]==1)?1:0,
						'accident_forgive'=>(isset($postedData['accident_forgive'][$i]) && $postedData['accident_forgive'][$i]==1)?1:0

						
						
						];
						$PoliciesAuto = $this->PoliciesAuto->newEntity();
						$PoliciesAuto= $this->PoliciesAuto->patchEntity($PoliciesAuto, $newarr);
						$this->PoliciesAuto->save($PoliciesAuto);
					}
					
					///
					$this->Flash->success(__('Your policy details has been saved.'));
					return $this->redirect(['action' => 'add',$policyTypeId]);
				}
				$errdata='';
				if(count($article->errors())>0){
					foreach($article->errors() as $ind =>$value){
						$errdata .='<br/>';//pr($value);
						$errdata .= implode(",", array_values($value));
					}
					$this->set('errorMsg',$errdata);//pr($article->errors());die;
				}
				$this->Flash->error(__('Unable to add your policy.'));	
			}
		}
        $this->set('article', $article);
		$articles = $this->Paginator->paginate($this->Policies->find('all', [
					'conditions' => ['Policies.user_id' => $this->authUserId]]));
        $this->set(compact('articles'));
    }
	
	public function edit($id)
	{
		$postedData = $this->request->data;
		//pr($postedData );die;
		$fileuplodStatus=true;
		$policy_typeStatus=true;
		//$PolicyTypes = TableRegistry::get('PolicyTypes');

		$selectListquery = $this->PolicyTypes->find('list',[		
						'keyField' => 'id',
						'valueField' => 'policy_name'	
		]);
		
		$selectListdata = $selectListquery->toArray();
		$this->set('selectListdata', $selectListdata);
		if(empty($id)){
			$id= $postedData['id'];
		}//die;
		
		$policy = $this->Policies->findById($id)->contain('PoliciesAuto')->firstorfail();
		//pr($policy);die;
		//$topicId = (int)$this->request->params['pass'][0];
		// check if the topic is owned by the user 
		if ($this->Policies->isOwnedBy($id, $this->authUserId)) {
		//return true;
		}else{
		//return false;	
		}	
		if ($this->request->is(['post', 'put'])) {
				

			if(!empty($postedData['expiration_date']))
				$postedData['expiration_date'] = Date("Y-m-d",strtotime($postedData['expiration_date']));
									
			if(!empty($postedData['effective_date']))
				$postedData['effective_date'] = Date("Y-m-d",strtotime($postedData['effective_date']));

			if(isset($postedData['policy_path']['name']) && !empty($postedData['policy_path']['name'])){				
				$filename =  basename($postedData['policy_path']['name']);
				$tmp_name = $postedData['policy_path']["tmp_name"];
				$extFile = pathinfo($filename, PATHINFO_EXTENSION);
				$timestmpFilename = strtotime(Date('Y-m-d H:i:s')).".".$extFile;
				$destPath = WWW_ROOT.DS.'policyfiles'.DS.$timestmpFilename;
				$fileuplodSucess =  move_uploaded_file($tmp_name, $destPath);
				if($fileuplodSucess){			
					$postedData['policy_path'] = $timestmpFilename;
				}else{
					$fileuplodStatus= false;				
				}
			}
			
			if($fileuplodStatus===false){
				//$this->set('errorMsg','File not uploaded  .');
				$this->Flash->error(__('File not uploaded  .'));
			}
			else{
				
				$policy = $this->Policies->patchEntity($policy, $postedData);
				$policy->user_id = $this->authUserId;
				$policyData = $this->Policies->save($policy);
				if ($policyData) {
					$policyId = $policyData->id;
					$deletePoliciesAuto = $this->PoliciesAuto->deleteAll(['policy_id'=>$policyId ]);
					unset($postedData['id']);
					for($i=0;$i<count($postedData['covered_items']);$i++ ){
						$newarr =[
						'policy_id'=>$policyId,
						'make'=>(isset($postedData['make'][$i]))?$postedData['make'][$i]:'',
						'covered_items'=>(isset($postedData['covered_items'][$i]))?$postedData['covered_items'][$i]:'',
						'model'=>(isset($postedData['model'][$i]))?$postedData['model'][$i]:'',
						'license_plate'=>(isset($postedData['license_plate'][$i]))?$postedData['license_plate'][$i]:'',
						'full_cost_replace'=>(isset($postedData['full_cost_replace'][$i]) && $postedData['full_cost_replace'][$i]==1)?1:0,
						'vin'=>(isset($postedData['vin'][$i]))?$postedData['vin'][$i]:'',
						'comp_deduct'=>(isset($postedData['comp_deduct'][$i]))?$postedData['comp_deduct'][$i]:'',
						'medical_pip'=>(isset($postedData['medical_pip'][$i]))?$postedData['medical_pip'][$i]:'',
						'liability_limit'=>(isset($postedData['liability_limit'][$i]))?$postedData['liability_limit'][$i]:'',
						'motor_limits'=>(isset($postedData['motor_limits'][$i]))?$postedData['motor_limits'][$i]:'',
						'tow_limits'=>(isset($postedData['tow_limits'][$i]))?$postedData['tow_limits'][$i]:'',
						'gap_or_lease'=>(isset($postedData['gap_or_lease'][$i]) && $postedData['gap_or_lease'][$i]==1)?1:0,
						'accident_forgive'=>(isset($postedData['accident_forgive'][$i]) && $postedData['accident_forgive'][$i]==1)?1:0			
						//array endss below 
						];
						$PoliciesAuto = $this->PoliciesAuto->newEntity();
						$PoliciesAuto= $this->PoliciesAuto->patchEntity($PoliciesAuto, $newarr);
						$this->PoliciesAuto->save($PoliciesAuto);
					}

					$this->Flash->success(__('Your policy details has been updated.'));
					return $this->redirect(['action' => 'edit',$policyId]);
				}
				$errdata='';
				if(count($policy->errors())>0){
					foreach($policy->errors() as $ind =>$value){
						$errdata .='<br/>';
						$errdata .= implode(",", array_values($value));
					}
					$this->set('errorMsg',$errdata);
				}		
				$this->Flash->error(__('Unable to edit your policy.'));
			}
		}										
		$this->set('policy', $policy);
		$policies = $this->Paginator->paginate($this->Policies->find('all', [
					'conditions' => ['Policies.user_id' => $this->authUserId]]));
        $this->set(compact('policies'));
	}

	public function download($filename=''){
		if(!empty($filename)){
			$destPath = WWW_ROOT.DS.'policyfiles';
			header('Content-Description: File Transfer');
			header('Content-Type: application/force-download');
			header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($filename));
			ob_clean();
			flush();
			readfile($destPath.DS.$filename); //showing the path to the server where the file is to be download
			exit;
		}
	}
	
	
	public function addautovehicles($cnt){
	$this->viewBuilder()->layout(false);
		$this->set('elemId',$cnt);		
        //echo 'done';
		//die('hua');
		
	}
	public function addtest($cnt)
	{	
		//Configure::write('debug', 0);
		$this->viewBuilder()->layout(false);
		$this->set('elemId',$cnt);		
        //echo 'done';
		//die('hua');
	}
}