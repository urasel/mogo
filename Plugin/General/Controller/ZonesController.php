<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Zones Controller
 *
 * @property Zone $Zone
 * @property PaginatorComponent $Paginator
 */
class ZonesController extends GeneralAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Security->unlockedActions = array('ajaxzone','ajaxdistrict','ajaxthana','districts');
		if ($this->action == 'ajaxzone') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'ajaxdistrict') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'ajaxthana') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
		if ($this->action == 'districts') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Zone->recursive = 0;
		$this->set('zones', $this->paginate());
	}
	public function ajaxzone($id = null) {
		//debug($this->params->query);exit;
		$this->layout = 'ajax';
		$this->loadModel('BdDivision');
		$id = $this->params->query['countryid'];
		$divisions = $this->BdDivision->find('list',array('conditions' => array('BdDivision.country_id' => $id),'order'=>'BdDivision.name ASC'));
		//debug($divisions);exit;
		$this->set('bdDivisions', $divisions);
		
	}
	public function ajaxtrzone($id = null) {
		//debug($this->params);exit;
		$this->layout = 'ajax';
		$this->loadModel('BdDistrict');
		$label = $this->params->query['label'];
		$fieldname = $this->params->query['fieldname'];
		$id = $this->params->query['country'];
		$divisions = $this->BdDistrict->find('list',array('conditions' => array('BdDistrict.country_id' => $id),'order'=>'BdDistrict.name ASC'));
		//debug($divisions);exit;
		$this->set(compact('divisions','fieldname','label'));
		
	}
	public function ajaxpointgroup() {
		$this->layout = 'ajax';
		//debug($this->params);exit;
		$id = $this->params->data['placetypeid'];
		//debug($id);exit;
		//$options = array('conditions' => array('BdDistrict.country_id' => $id));
		$this->loadModel('PointGroup');
		$pointGroups = $this->PointGroup->find('list',array('conditions' => array('PointGroup.place_type_id' => $id),'order'=>'PointGroup.name ASC'));
		$this->set(compact('pointGroups','id'));
		
	}
	public function admin_ajaxzone($id = null) {
		// debug($this->request->data['countryid']);exit;
		$this->layout = 'ajax';
		$id = $this->params->query['countryid'];
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__('Invalid zone'));
		}
		if($id == 18){
		$this->loadModel('BdDivision');
		//$options = array('conditions' => array('BdDistrict.country_id' => $id));
		$this->set('zones', $this->BdDivision->find('list',array('order'=>'BdDivision.name ASC')));
		}else{
		$options = array('conditions' => array('Zone.country_id' => $id),'order'=>'Zone.name ASC');
		$this->set('zones', $this->Zone->find('list', $options));
		}
		
	}
	public function zones() {
		// debug($this->request->data['countryid']);exit;
		$this->autoRender = false;
		$this->layout = 'ajax';
		//debug($this->params->query);exit;
		$this->loadModel('BdDistrict');
		if (isset($this->params->query['term']) && $this->params->query['term'] != '') {
			$countryId = $this->params->query['country'];
            $zones = $this->BdDistrict->find('list', array(
				'fields'=>array('id','name'),
                'conditions' => array('BdDistrict.name LIKE ' => $this->params->query['term'] . "%",'BdDistrict.country_id' => $countryId),
                'limit' => 100
                    )
            );
            //debug($zones);exit;
			$results = array();
            foreach ($zones as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $k;
                $rpa['Result']['label'] = $v;
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
		
	}
	public function trlocation() {
		//debug($this->params->query);exit;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->loadModel('TransportLocation');
		$countryId = $this->params->query['country'];
		
		if (isset($this->params->query['term']) && $this->params->query['term'] != '') {
            $zones = $this->TransportLocation->find('list', array(
				'fields'=>array('id','name'),
				'group' => array('name'),
                'conditions' => array('TransportLocation.name LIKE ' => $this->params->query['term']. "%",'TransportLocation.country_id' => $countryId)
                )
            );
            //debug($zones);exit;
			$results = array();
            foreach ($zones as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $k;
                $rpa['Result']['label'] = $v;
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
		
	}
	public function districts() {
		//debug($this->params->query);exit;
		$this->autoRender = false;
		$this->layout = 'ajax';
		$this->loadModel('BdThana');
		$countryId = $this->params->query['country'];
		if (isset($this->params->query['term']) && $this->params->query['term'] != '') {
            $zones = $this->BdThana->find('list', array(
				'fields'=>array('id','name'),
                'conditions' => array('BdThana.name LIKE ' => $this->params->query['term']. "%",'BdThana.country_id' => $countryId)
                )
            );
            //debug($zones);exit;
			$results = array();
            foreach ($zones as $k => $v) {
				//debug($pa);
                $rpa['Result']['id'] = $k;
                $rpa['Result']['label'] = $v;
                array_push($results, $rpa['Result']);
            }
            //debug($results);
            echo json_encode($results);
        }
		
	}
	public function ajaxdistrict($id = null) {
		$this->layout = 'ajax';
		$id = $this->params->query['districtid'];
		$this->loadModel('BdDistrict');
		$options = array('conditions' => array('BdDistrict.bd_division_id' => $id),'order'=>'BdDistrict.name ASC');
		$this->set('bdDistricts', $this->BdDistrict->find('list', $options));
	}
	
	public function ajaxthana($id = null) {
		$this->layout = 'ajax';
		$id = $this->params->query['districtid'];
		$this->loadModel('BdThana');
		$options = array('conditions' => array('BdThana.bd_district_id' => $id),'order'=>'BdThana.name ASC');
		$this->set('bdThanas', $this->BdThana->find('list', $options));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'zone')));
		}
		$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
		$this->set('zone', $this->Zone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Zone->create();
			if ($this->Zone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'zone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Zone->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'zone')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->Zone->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'zone')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Zone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'zone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'zone')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
			$this->request->data = $this->Zone->find('first', $options);
		}
		$countries = $this->Zone->Country->find('list');
		$this->set(compact('countries'));
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
		$this->Zone->id = $id;
		if (!$this->Zone->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'zone')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Zone->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Zone')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Zone')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Zone->recursive = 0;
		$this->set('zones', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'zone')));
		}
		$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
		$this->set('zone', $this->Zone->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Zone->create();
			if ($this->Zone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'zone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Zone->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'zone')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->Zone->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Zone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'zone')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Zone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'zone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'zone')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Zone.' . $this->Zone->primaryKey => $id));
			$this->request->data = $this->Zone->find('first', $options);
		}
		$countries = $this->Zone->Country->find('list');
		$this->set(compact('countries'));
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
		$this->Zone->id = $id;
		if (!$this->Zone->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'zone')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Zone->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Zone')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Zone')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
