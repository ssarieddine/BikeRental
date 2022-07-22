<?php

namespace App\Controller;

use App\Controller\AppController;

class AttributesController extends AppController
{
	public $mainModel = 'Attributes';
	public $the_table = 'attributes';
	public $the_entity = 'attribute';
	public $the_entity_capital = 'Attribute';
	

	/*=== === Belongs To === ===*/
	public $mainModelBelongsTo = 'Vehicles';
	public $the_tableBelongsTo = 'vehicles';
	public $the_entityBelongsTo = 'vehicles';
	public $the_entity_capitalBelongsTo = 'Vehicles';
	
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
        $this->loadComponent('Paginator'); // Include the FlashComponent

		
		$theModel = $this->mainModel;
		
		/* === Retrieveing belongs to lists === */
		if (!empty($this->mainModelBelongsTo))$this->setBelongsTo($theModel);
		/* === Retrieveing belongs to lists END === */
    }

    public function index()
    {
		$theModel = $this->mainModel;
		$themainModelBelongsTo = $this->mainModelBelongsTo;

		$page_title = $this->mainModel;
		$the_table = $this->the_table;
		$the_entity = $this->the_entity;
		$add_new_title = 'Search '.$this->the_entity_capital.'s';

		$the_entity_result = $this->$theModel->newEntity();
		$this->set($this->the_entity, $the_entity_result);

		$this->set(compact('page_title','the_table','the_entity', 'add_new_title', 'theModel'));
		 
			$data = $this->Paginator->paginate($this->$theModel->find()->contain(['Vehicles']));
			$this->set(compact('data'));

		$this->Render('/Pages/indexattribute');
    }



    public function add()
    {
		$theModel = $this->mainModel;
		 
        $the_entity_result = $this->$theModel->newEntity();
		
        if ($this->request->is('post')) {	
			
			if (!empty($this->request->getData()['vehicle_id'])){
				$this->request->data['selected_vehicles'] = implode(',', $this->request->getData()['vehicle_id']);
			}
						
            $the_entity_result = $this->$theModel->patchEntity($the_entity_result, $this->request->getData());
			

            if ($this->$theModel->save($the_entity_result)) {
				
				if (!empty($this->request->getData()['vehicle_id'])){
				$this->loadModel('AttributesVehicles');
					foreach ($this->request->getData()['vehicle_id'] as $i => $value){
						// Need to add to many to many table 
						//AttributesVehiclesTable
						$enVehicles = $this->AttributesVehicles->newEntity();

						$enVehicles->vehicle_id = $this->request->getData()['vehicle_id'][$i];
						$enVehicles->attribute_id = $the_entity_result->id;
						// Saving corresponding data 
						$this->AttributesVehicles->save($enVehicles);
					}
					
				}
				
				

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
			
			if (!empty($this->request->getData()['vehicle_id'])){
				$this->request->data['selected_vehicles'] = implode(',', $this->request->getData()['vehicle_id']);
				
				
					$this->loadModel('AttributesVehicles');
					// deleting first
					foreach ($this->request->getData()['vehicle_id'] as $i => $value){	
						$query = $this->AttributesVehicles->query();
						$query->delete()
							->where(['attribute_id' => $id])
							->execute();
					} // foreach end 
							
							
					foreach ($this->request->getData()['vehicle_id'] as $i => $value){
						// Need to add to many to many table 					
						$enVehicles = $this->AttributesVehicles->newEntity();
						$enVehicles->vehicle_id = $this->request->getData()['vehicle_id'][$i];
						$enVehicles->attribute_id = $id;
						// Saving corresponding data 
						$this->AttributesVehicles->save($enVehicles);
					}
				
				
				
				
			}
			
            $this->$theModel->patchEntity($the_entity_result, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->$theModel->save($the_entity_result)) {
                $this->Flash->success(__('Your '.$this->the_entity.' has been updated.'));

                return $this->redirect(['action' => 'edit', $the_entity_result['id']]);
            }
            $this->Flash->error(__('Unable to update your '.$this->the_entity.'.'));
        }
		
		if (!empty($the_entity_result->selected_vehicles)){
			$the_entity_result->vehicle_id = explode(',',$the_entity_result->selected_vehicles);
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
	
}
