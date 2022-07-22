<?php

namespace App\Controller;

use App\Controller\AppController;

class VehicletypesController extends AppController
{
	public $mainModel = 'Vehicletypes';
	public $the_table = 'vehicletypes';
	public $the_entity = 'vehicletype';
	public $the_entity_capital = 'Vehicletype';


    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Paginator'); // Include the FlashComponent

        $this->Auth->allow();
		
		$theModel = $this->mainModel;
    }

    public function index()
    {
		$theModel = $this->mainModel;

		$page_title = $this->mainModel;
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
		$add_vehicletype_title = 'Search '.$this->the_entity_capital.'s';

		$the_entity_result = $this->$theModel->newEntity();
		$this->set($this->the_entity, $the_entity_result);

		$this->set(compact('page_title','the_table','the_entity', 'add_vehicletype_title', 'theModel'));

		$searchConditions=array();
		if ($this->request->query) {
			
			if (!empty($this->request->query['title'])){
				$this->request->query['title'] = trim($this->request->query['title']);
				$searchConditions['title LIKE']= '%'.$this->request->query['title'].'%';
			}
			if (!empty($this->request->query['main'])){
				$searchConditions['main']= true;
			}
			if (!empty($this->request->query['type_id'])){
				$searchConditions['type_id']= $this->request->query['type_id'];
			}
			if (!empty($this->request->query['country_id'])){
				$searchConditions['country_id LIKE']= '%'.implode(' ',$this->request->query['country_id']).'%';
			}
			if (!empty($this->request->query['date_published_datetimepicker'])){
				$searchConditions['date_published']= $this->request->query['date_published_datetimepicker'];
			}
			if (!empty($this->request->query['created_from']) && !empty($this->request->query['created_to'])){
				$searchConditions['AND']=array(
					'created >=' => $this->request->query['created_from'],
					'created <=' => $this->request->query['created_to']
				);
			}else if (!empty($this->request->query['created_from']) && empty($this->request->query['created_to'])){
				$searchConditions['created >=']=$this->request->query['created_from'];
			}else if (empty($this->request->query['created_from']) && !empty($this->request->query['created_to'])){
				$searchConditions['created <=']=$this->request->query['created_to'];
			}
			
			if (empty($this->request->query['order_by']))$this->request->query['order_by']='id';
			if (empty($this->request->query['the_direction']))$this->request->query['the_direction']='desc';

			$paginate = [
			'conditions' => $searchConditions,
			'limit' => 100,	
			'order' => [
            $theModel.'.'.$this->request->query['order_by'] => $this->request->query['the_direction']
       		]		
			];

			$data = $this->Paginator->paginate($this->$theModel, $paginate);
			
			$this->set('searchConditions',$this->request->query);
			$this->set(compact('data'));
		}else {
			$data = $this->Paginator->paginate($this->$theModel->find());
			$this->set(compact('data'));			
		}

		$this->Render('/Pages/index');
    }



    public function add()
    {
		$theModel = $this->mainModel;
		 
        $the_entity_result = $this->$theModel->newEntity();
		
        if ($this->request->is('post')) {
			
			
						
            $the_entity_result = $this->$theModel->patchEntity($the_entity_result, $this->request->getData());
			
            // Added: Set the user_id from the session.
            $the_entity_result->user_id = $this->Auth->user('id');

            if ($this->$theModel->save($the_entity_result)) {
                $this->Flash->success(__('Your '.$this->the_entity.' has been saved.'));
				
	
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your '.$this->the_entity.'.'));
        }
        $this->set($this->the_entity, $the_entity_result);
		
		$page_title = 'Add '.$this->the_entity_capital.'s';
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
				
		$this->set(compact('page_title','the_table','the_entity'));				
		$this->Render('/Pages/add');
    }
	
	

    public function edit($id)
    {		
		$theModel = $this->mainModel;

       $the_entity_result = $this->$theModel->find('all', 
		[
		'conditions'=>[
		$theModel.'.id' =>$id 
		]
		])
            ->firstOrFail();
			 
        if ($this->request->is(['post', 'put'])) {			
			
		
            $this->$theModel->patchEntity($the_entity_result, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->$theModel->save($the_entity_result)) {
                $this->Flash->success(__('Your '.$this->the_entity.' has been updated.'));
				// Check uploaded Files
				
                return $this->redirect(['action' => 'edit', $the_entity_result['id']]);
            }
            $this->Flash->error(__('Unable to update your '.$this->the_entity.'.'));
        }


        $this->set($this->the_entity, $the_entity_result);
		
		$page_title = 'Edit '.$this->the_entity_capital.'s';
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
		
		$this->set(compact('page_title','the_table','the_entity'));
		
						
		$this->Render('/Pages/edit');
    }

	




    public function isAuthorized($user)
    {	
		return true;
    }
}