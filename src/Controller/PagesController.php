<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Mailer\Email;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * Displays a view
     *
     * @param array ...$path Path segments.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display(...$path)
    {
		$today = date("Y-m-d G:i:s");
		$this->layout='frontend';
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
		
		$theVehicles = false;
		$theAttributes = false;
		$this->loadModel('Vehicles');
		$this->loadModel('Attributes');
		$this->loadModel('AttributesVehicles');
		
		$theVehicles=$this->Vehicles->find('all',[
		'order' => ['Vehicles.vehicletype_id' => 'asc','Vehicles.id' => 'desc']
		])->contain(['Brands', 'Vehicletypes']);
		$theVehicles=$theVehicles->toArray();
		
		if (!empty($theVehicles)){
			foreach ($theVehicles as $v=>$value){
				$theVehiclesAtt = false;
				$theVehiclesAtt=$this->AttributesVehicles->find('all',[
				'conditions' => ['AttributesVehicles.vehicle_id' => $theVehicles[$v]['id'],
				]
				])->contain(['Attributes']);
				$theVehiclesAtt=$theVehiclesAtt->toArray();
				if (!empty($theVehiclesAtt)){
					$theVehicles[$v]['the_attributes'] = $theVehiclesAtt;
				}
			} // foreach end 
		}

        $this->set(compact('page','subpage','theVehicles','theAttributes'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }

		
	public function backend()
    {
		$page_title='Welcome to the Backend';
		
		$this->set(compact('page_title'));
	}
	

}