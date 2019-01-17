<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use App\Model\Table\UsersTable;
use App\Model\Entity\User;

class CustomersController extends AppController{

    public function initialize()
    {
        parent::initialize();
        $this->session = $this->request->session();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
	
	public function beforeFilter(Event $event) {
		if($this->Auth->User('id')){
			$this->Auth->allow();
		}
    }
	
	public function view()
    {		
		$customers = $this->Paginator->paginate($this->Users->find('all', [
					'conditions' => ['Users.id' => $this->Auth->User('id')]]));
        $this->set(compact('customers'));
    }
	
	public function customer_view($id)
	{
		$user = $this->Users->get($id);
		$this->set('user',$user);
	}
	
	public function add()
	{
		
	}
	
	public function edit()
	{
		
	}
	
	public function delete($id)
	{
		
	}	
}
?>