<?php
// src/Controller/CommunitiesController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Network\Email\Email;
use App\Model\Table\CommunitiesResponses;
//use App\Model\Entity\ClaimType;


class CommunitiesController extends AppController
{
    public function initialize()
    {
        parent::initialize();
		//Configure::write('debug', 0);
        $this->session = $this->request->session();
				 //TableRegistry::get('CommunitiesResponses');
		$this->loadModel('CommunitiesResponses');
		$this->loadModel('CommunitiesLikes');
		$this->loadComponent('RequestHandler');
		//		$this->authUserId = $this->Auth->User('id');

        //$this->viewBuilder()->helpers(['MyHelper']);

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	
	public function beforeFilter(Event $event) {
		//parent::beforeFilter($event);
		
		if($this->authUserId){
			//$this->Auth->allow();
			$this->Auth->allow($this->loggedInUserAllowedActions);	
		}
    }

    public function view()
	{
		$allPosts = $this->Paginator->paginate($this->Communities->find('all' )->contain(['CommunitiesLikes'=>function ($q) {
    return $q
        ->select(['CommunitiesLikes.status', 'CommunitiesLikes.id','CommunitiesLikes.community_id'])
        ->where(['CommunitiesLikes.status' => _LIKED_STATUS]);
},'CommunitiesResponses']));
		//pr($allPosts);die;
        $this->set(compact('allPosts'));
	}
	
	public function yourPost()
	{
		$allPosts = $this->Paginator->paginate($this->Communities->find('all', [
					'conditions' => ['Communities.user_id' => $this->authUserId]])->contain(['CommunitiesLikes'=>function ($q) {
    return $q
        ->select(['CommunitiesLikes.status', 'CommunitiesLikes.id','CommunitiesLikes.community_id'])
        ->where(['CommunitiesLikes.status' => _LIKED_STATUS]);
},'CommunitiesResponses']));
        $this->set(compact('allPosts'));
	}
	
	public function yourResponses()
	{
	
		$allPosts = $this->Paginator->paginate($this->CommunitiesResponses->find('all', [
					'conditions' => 
					['CommunitiesResponses.user_id' => $this->authUserId]
					])
					->contain(['Communities']))->toArray();
					$myResponse = [];
					$cntResp=1;
					$cntLikes=0;
		$selectListquery =  $this->CommunitiesResponses->find('list', [
					'keyField' => 'id',
					'valueField' => 'community_id'
					])->toArray();
					
		$totResps=[];				
		$totLikes=[];							
					
		$selectListqueryLikes = $this->CommunitiesLikes
					->find('list', [
						'keyField' => 'id',
						'valueField' => 'community_id'
					])->where(['status'=>_LIKED_STATUS])
					->toArray();
					
		$totResps = [];					
		$totLikes = [];
		foreach($selectListquery  as $id => $community_id){
			$totResps[$community_id][$id]=$id;
		}
		foreach($selectListqueryLikes  as $id => $community_id){
			$totLikes[$community_id][$id]=$id;
		}
		$countResponse = $countLikes =0;
					
		foreach($allPosts  as $value){
			if(isset($totResps[$value->community_id]))
				$countResponse = count($totResps[$value->community_id]);
			if(isset($totLikes[$value->community_id]))
				$countLikes = count($totLikes[$value->community_id]);
		
			$myResponse[$value->community_id]=['details'=>$value['community']->details,'subject'=>$value['community']->subject,'community_id'=>$value->community_id,'countResponse'=>$countResponse,'countLikes'=>$countLikes];
			
				
		}
					//$allPostsitems = $allPosts->items;
					//pr($myResponse);die;
        $this->set(compact('myResponse'));
	}
	
	public function yourLikes()
	{
		$allPosts = $this->Paginator->paginate($this->CommunitiesLikes->find('all', [
					'conditions' => ['CommunitiesLikes.user_id' => $this->authUserId
					,'CommunitiesLikes.status'=>_LIKED_STATUS]])->contain(['Communities']))->toArray();
					$myResponse = [];
					$cntResp=[];
					
					$selectListquery = $this->CommunitiesResponses
    ->find('list', [
        'keyField' => 'id',
        'valueField' => 'community_id'
    ])
        ->toArray();
					
					$selectListqueryLikes = $this->CommunitiesLikes
    ->find('list', [
        'keyField' => 'id',
        'valueField' => 'community_id'
    ])->where(['status'=>1])
        ->toArray();
		$totResps=[];	

					
		$totLikes=[];
		//	pr($selectListquery);die;
		
					foreach($selectListquery  as $id => $community_id){
						$totResps[$community_id][$id]=$id;
					}
					foreach($selectListqueryLikes  as $id => $community_id){
						$totLikes[$community_id][$id]=$id;
					}
					$countResponse = $countLikes =0;
					foreach($allPosts  as $value){
						if(isset($totResps[$value->community_id]))
							$countResponse = count($totResps[$value->community_id]);
						if(isset($totLikes[$value->community_id]))
							$countLikes = count($totLikes[$value->community_id]);
					
						$myResponse[$value->community_id]=['details'=>$value['community']->details,'subject'=>$value['community']->subject,'community_id'=>$value->community_id,'countResponse'=>$countResponse,'countLikes'=>$countLikes];
							//	pr($totResps[$value->community_id]);
						//die;
					}
					//$allPostsitems = $allPosts->items;
					//pr($myResponse);die;
        $this->set(compact('myResponse'));
	}
	
    public function add()
    {
		$this->set('errorMsg','');
        $community = $this->Communities->newEntity();

		// Data now looks like
        if ($this->request->is('post')) {
			$postedData = $this->request->data;
			$community = $this->Communities->patchEntity($community, $postedData);
			$community->user_id = $this->authUserId;
			if ($this->Communities->save($community)) {
				$this->Flash->success(__('Your community details has been saved.'));
				return $this->redirect(['action' => 'view']);
			}
				
			$errdata='';
			if(count($community->errors())>0){
				foreach($community->errors() as $ind =>$value){
					$errdata .='<br/>';//pr($value);
					echo $errdata .= implode(",",array_values($value));
				}	
				$this->set('errorMsg',$errdata);//pr($community->errors());die;
			}		
			$this->Flash->error(__('Unable to add your community.'));		
		}

        $this->set('community', $community);
    }
	
	
	public function addresponse()
    {
		$this->set('errorMsg','');
		 $this->loadModel('CommunitiesResponses');
        //$CommunitiesResponses = 
		$CommunitiesResponses = $this->CommunitiesResponses->newEntity();
		// Data now looks like
        if ($this->request->is('post')) {
			$postedData = $this->request->data;

			//pr($postedData);die;
			$CommunitiesResponses = $this->CommunitiesResponses->patchEntity($CommunitiesResponses, $postedData);
			$CommunitiesResponses->user_id = $this->authUserId;
			if ($this->CommunitiesResponses->save($CommunitiesResponses)) {
				$this->Flash->success(__('Your community response has been saved.'));
				return $this->redirect(['action' => 'view']);
			}
				
			$errdata='';
			if(count($CommunitiesResponses->errors())>0){
				foreach($CommunitiesResponses->errors() as $ind =>$value){
					$errdata .='<br/>';//pr($value);
					echo $errdata .= implode(",",array_values($value));
				}	
				$this->set('errorMsg',$errdata);//pr($community->errors());die;
			}		
			$this->Flash->error(__('Unable to add your community response.'));		
		}

        $this->set('CommunitiesResponses', $CommunitiesResponses);
    }
	
	// add community post like 
	 public function addlike($CommunityId,$status)
    {
		
		$this->viewBuilder()->layout(false);
		//$this->autoRender = false;
		// Data now looks like
        $this->set('errorMsg','');
		$numRowsCommunitiesLikes =0;
		if (!empty($CommunityId)) {
			$numRowsCommunityId = $this->Communities->find()->where(['id'=>$CommunityId])->count();
			if($numRowsCommunityId >0){
			$CommunitiesLikesTable = TableRegistry::get('CommunitiesLikes');
			$article = $CommunitiesLikesTable->newEntity();

			$article->user_id = $this->authUserId;
			$article->community_id = $CommunityId;
			  $article->status = $status;
			$getIdComm =   $CommunitiesLikesTable->find()->where(['community_id'=>$CommunityId,
			'user_id'=>$this->authUserId])->toArray();
			
			if(isset($getIdComm[0]->id) && !empty($getIdComm[0]->id))
				$article->id =	$getIdComm[0]->id;
			if ($CommunitiesLikesTable->save($article)) {
					$conditions =['status'=>_LIKED_STATUS,'community_id'=>$CommunityId];
					
				// The $article entity contains the id now
			    $id = $article->id;
			    $numRowsCommunitiesLikes = $this->CommunitiesLikes->find()->where($conditions)->count();
				$this->set('numRowsCommunitiesLikes',$numRowsCommunitiesLikes);			
				//  $this->Flash->success(__('Your had liked this post .'));
			}
			}
			 $this->set('communityId',$CommunityId);
		}
}

	public function response($id)
	{
		
		
		$postedData = $this->request->data;
		if(empty($id)){
			$id= $postedData['id'];
		}
		//die;
		
		$community = $this->Communities->findById($id)->firstOrFail();
		$numRowsLiked = $this->CommunitiesLikes->find()->where(['user_id'=>$this->authUserId,
		'community_id'=>$id,'status'=>_LIKED_STATUS])->count();
		$numRowsResponses = $this->CommunitiesResponses->find()->where(['user_id'=>
		$this->authUserId,'community_id'=>$id])->count();
		$this->set('numRowsLiked',$numRowsLiked);
		$this->set('numRowsResponses',$numRowsResponses);

		if ($this->request->is(['post', 'put'])) {
			$community = $this->Communities->patchEntity($community, $postedData);
			$community->user_id = $this->authUserId;
			if ($this->Communities->save($community)) {
				$this->Flash->success(__('Your community details has been updated.'));
				return $this->redirect(['action' => 'edit', $id]);
			}
			$errdata='';

			if(count($community->errors())>0){
				foreach($community->errors() as $ind =>$value){
					$errdata .='<br/>';
					$errdata .= implode(",",array_values($value));
				}
				$this->set('errorMsg',$errdata);
			}
			$this->Flash->error(__('Unable to response.'));
		}									
		$this->set('community', $community);
		//exit;
	}
	
	
	public function allresponse($communityId)
	{
		
		//Configure::write('debug', 0);
		$this->viewBuilder()->layout(false);
		if(!empty($communityId)){
			$allPostsResponse = $this->Communities->find('all',[
					'conditions' => ['Communities.id' => $communityId]])->contain(['CommunitiesResponses'])->toArray();
			//	$allPostsResponse = $this->CommunitiesResponses->find('all',[
			//		'conditions' => ['CommunitiesResponses.community_id' => $communityId]])->contain(['Communities'])->toArray();

		}		//pr($allPostsResponse);die;
										
        $this->set(compact('allPostsResponse'));
	}
}
