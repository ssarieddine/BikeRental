<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class AttributesVehiclesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		

		$this->belongsTo('Attributes', [
			'className' => 'Attributes',
			'foreignKey' => 'attribute_id',
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
        return $validator;
    }

}
