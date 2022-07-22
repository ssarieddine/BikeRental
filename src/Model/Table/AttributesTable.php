<?php
// src/Model/Table/ServicesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class AttributesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		
		 $this->belongsToMany('Vehicles', [
            'joinTable' => 'attributes_vehicles',
            'foreignKey' => 'attribute_id', 
            'targetForeignKey' => 'vehicle_id'
        ]);

		$this->belongsTo('Vehicles', [
			'className' => 'Vehicles',
			'foreignKey' => 'vehicle_id',
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
