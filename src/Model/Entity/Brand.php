<?php
// src/Model/Entity/Event.php
namespace App\Model\Entity;

use Cake\Collection\Collection;
use Cake\ORM\Entity;

class Brand extends Entity
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
