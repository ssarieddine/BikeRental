<?php
// src/Model/Entity/Service.php
namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\ORM\Entity;

class Vehicle extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
	
	 public function parentNode() {
        return null;
    }
}
