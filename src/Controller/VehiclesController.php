<?php

namespace App\Controller;

use App\Controller\AppController;

class VehiclesController extends AppController
{
	public $mainModel = 'Vehicles';
	public $the_table = 'vehicles';
	public $the_entity = 'vehicle';
	public $the_entity_capital = 'Vehicle';
	

	/*=== === Belongs To === ===*/
	public $mainModelBelongsTo = 'Brands';
	public $the_tableBelongsTo = 'brands';
	public $the_entityBelongsTo = 'brand';
	public $the_entity_capitalBelongsTo = 'Brand';	
	
	/*=== === Belongs To Two === ===*/
	public $mainModelBelongsToTwo = 'Vehicletypes';
	public $the_tableBelongsToTwo = 'vehicletypes';
	public $the_entityBelongsToTwo = 'vehicletype';
	public $the_entity_capitalBelongsToTwo = 'Vehicletype';


    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Paginator'); // Include the FlashComponent

		
		$theModel = $this->mainModel;
		
		/* === Retrieveing belongs to lists === */
		if (!empty($this->mainModelBelongsTo))$this->setBelongsTo($theModel);
		if (!empty($this->mainModelBelongsToTwo))$this->setBelongsToTwo($theModel);
		/* === Retrieveing belongs to lists END === */
    }

    public function index()
    {
		$theModel = $this->mainModel;

		$page_title = $this->mainModel;
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
		$add_new_title = 'Search '.$this->the_entity_capital.'s';

		$the_entity_result = $this->$theModel->newEntity();
		$this->set($this->the_entity, $the_entity_result);

		$this->set(compact('page_title','the_table','the_entity', 'add_new_title', 'theModel'));

		$searchConditions=array();
		
			$data = $this->Paginator->paginate($this->$theModel->find()->contain(['Brands', 'Vehicletypes']));
			$this->set(compact('data'));		

		$this->Render('/Pages/indexvehicles');
    }
	




    public function add()
    {
		$theModel = $this->mainModel;
		 
        $the_entity_result = $this->$theModel->newEntity();
		
        if ($this->request->is('post')) {

            $the_entity_result = $this->$theModel->patchEntity($the_entity_result, $this->request->getData());

            if ($this->$theModel->save($the_entity_result)) {
                $this->Flash->success(__('Your '.$this->the_entity.' has been saved.'));
				
				return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your '.$this->the_entity.'.'));
        }
        $this->set($this->the_entity, $the_entity_result);
		
		$page_title = 'Add '.$this->the_entity_capital;
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
				
		$this->set(compact('page_title','the_table','the_entity'));				
		$this->Render('/Pages/add');
    }
	
	public function setBelongsTo($theModel){
		
		$theModelBelongsTo = $this->mainModelBelongsTo;
		$thetableBelongsTo = $this->the_tableBelongsTo;
		$$thetableBelongsTo=$this->$theModel->$theModelBelongsTo->find('list');
		
		$this->set($thetableBelongsTo, $$thetableBelongsTo);		
	}
	public function setBelongsToTwo($theModel){
		
		$theModelBelongsToTwo = $this->mainModelBelongsToTwo;
		$thetableBelongsToTwo = $this->the_tableBelongsToTwo;
		$$thetableBelongsToTwo=$this->$theModel->$theModelBelongsToTwo->find('list');
		
		$this->set($thetableBelongsToTwo, $$thetableBelongsToTwo);		
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

            $this->$theModel->patchEntity($the_entity_result, $this->request->getData());
            if ($this->$theModel->save($the_entity_result)) {
                $this->Flash->success(__('Your '.$this->the_entity.' has been updated.'));
                return $this->redirect(['action' => 'edit', $the_entity_result['id']]);
            }
            $this->Flash->error(__('Unable to update your '.$this->the_entity.'.'));
        }

 
        $this->set($this->the_entity, $the_entity_result);
		
		$page_title = 'Edit '.$this->the_entity_capital;
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
		
		$this->set(compact('page_title','the_table','the_entity'));
		
						
		$this->Render('/Pages/edit');
    }
  


    public function isAuthorized($user)
    {	
		return true;
    }
	public function book($vid){
		
			$enVehicles = $this->Vehicles->newEntity();
			$enVehicles->id = $vid;
			$enVehicles->rented = true;
			$enVehicles->rent_date = date('Y-m-d');
	
		// Saving corresponding data 
		$this->Vehicles->save($enVehicles);
		
		 $this->Flash->success(__('Booked Successfully'));
		 $this->redirect('/');
	}
	
}
