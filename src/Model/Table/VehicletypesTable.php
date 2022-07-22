<?php
// src/Model/Table/AboutsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Query;
use Cake\Utility\Text;
use Cake\Validation\Validator;

class VehicletypesTable extends Table
{
    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
		
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
