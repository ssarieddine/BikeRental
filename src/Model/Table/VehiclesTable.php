<?php
// src/Model/Table/ServicesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class VehiclesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');

        $this->belongsToMany('Brands');
		$this->belongsToMany('Vehicletypes');
		
		 $this->belongsToMany('Attributes', [
            'joinTable' => 'attributes_vehicles',
            'foreignKey' => 'vehicle_id', 
            'targetForeignKey' => 'attribute_id'
        ]);
		

		$this->belongsTo('Brands', [
			'className' => 'Brands',
			'foreignKey' => 'brand_id',
		]);
		$this->belongsTo('Vehicletypes', [
			'className' => 'Vehicletypes',
			'foreignKey' => 'vehicletype_id',
		]);
    }

    public function beforeSave($event, $entity, $options)
    {
      
    }


    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('title')
          //  ->minLength('title', 10)
            ->maxLength('title', 255);

        return $validator;
    }

}
