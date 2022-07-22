<?php
// src/Model/Entity/Award.php
namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\ORM\Entity;

class Vehicletype extends Entity
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
