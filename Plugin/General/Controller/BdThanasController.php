<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * BdThanas Controller
 *
 * @property BdThana $BdThana
 * @property PaginatorComponent $Paginator
 */
class BdThanasController extends GeneralAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BdThana->recursive = 0;
		$this->set('bdThanas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BdThana->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd thana')));
		}
		$options = array('conditions' => array('BdThana.' . $this->BdThana->primaryKey => $id));
		$this->set('bdThana', $this->BdThana->find('first', $options));
	}
	
	public function getLocation(){
		$this->autoRender = false;
		$this->layout = 'ajax';
		$menu = ClassRegistry::init('Getlocation');
        if ($this->params['url']['term'] != '') {
			$strMatch = $this->params['url']['term'];
			$matchTerm = str_replace(' ','%',$this->params['url']['term']);
			$selectFirst = explode(' ',$this->params['url']['term']);
			$selectFirst = $selectFirst[0];
			$currentLng = $this->Session->read('Config.language');
			if($currentLng == 'bn'){
				$fieldName = 'bn_name';
			}else{
				$fieldName = 'name';
			}
            $countries = $menu->find('all', array(
                'conditions' => array(
									'OR' => array(
												array('Getlocation.divisiondata LIKE ' 	=> $strMatch . "%"),
												)
									),
				'order' => array("CASE WHEN `Getlocation`.`divisiondata` LIKE '$strMatch' THEN 0 WHEN `Getlocation`.`divisiondata` LIKE '%$strMatch%' THEN 1  ELSE 2  END , `Getlocation`.`divisiondata` ASC"),
				'fields' => array(
								'Getlocation.division_id',
								"Getlocation.division_$fieldName",
								'Getlocation.country_id',
								"Getlocation.country_$fieldName",
								"Getlocation.divisiondata",
								),
				'group' => 'Getlocation.divisiondata',
                'limit' => 20
                    )
            );
			
			$results = array();
			$rpa['Result'] = '';
            foreach ($countries as $k => $v) {
				if($v['Getlocation']['division_id'] != null){
					$rpa['Result']['id'] 	= 'd_'.$v['Getlocation']['division_id'];
					$rpa['Result']['label'] = $v['Getlocation']['divisiondata'];
				}else{
					$rpa['Result']['id'] 	= 'c_'.$v['Getlocation']['country_id'];
					$rpa['Result']['label'] = $v['Getlocation']['divisiondata'];
				}
				
                array_push($results, $rpa['Result']);
            }
            //debug($results);exit;
            echo json_encode($results);
        }
        
	
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BdThana->create();
			if ($this->BdThana->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd thana')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdThana->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd thana')), 'default', array('class' => 'error'));
			}
		}
		$bdDistricts = $this->BdThana->BdDistrict->find('list');
		$this->set(compact('bdDistricts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BdThana->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd thana')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdThana->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd thana')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd thana')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdThana.' . $this->BdThana->primaryKey => $id));
			$this->request->data = $this->BdThana->find('first', $options);
		}
		$bdDistricts = $this->BdThana->BdDistrict->find('list');
		$this->set(compact('bdDistricts'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BdThana->id = $id;
		if (!$this->BdThana->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd thana')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdThana->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd thana')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd thana')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BdThana->recursive = 0;
		$this->set('bdThanas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BdThana->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd thana')));
		}
		$options = array('conditions' => array('BdThana.' . $this->BdThana->primaryKey => $id));
		$this->set('bdThana', $this->BdThana->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BdThana->create();
			if ($this->BdThana->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd thana')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdThana->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd thana')), 'default', array('class' => 'error'));
			}
		}
		$bdDistricts = $this->BdThana->BdDistrict->find('list');
		$this->set(compact('bdDistricts'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BdThana->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd thana')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdThana->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd thana')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd thana')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdThana.' . $this->BdThana->primaryKey => $id));
			$this->request->data = $this->BdThana->find('first', $options);
		}
		$bdDistricts = $this->BdThana->BdDistrict->find('list');
		$this->set(compact('bdDistricts'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->BdThana->id = $id;
		if (!$this->BdThana->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd thana')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdThana->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd thana')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd thana')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
