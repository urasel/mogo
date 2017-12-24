<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * BloodDonars Controller
 *
 * @property BloodDonar $BloodDonar
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BloodDonarsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BloodDonar->recursive = 0;
		$this->set('bloodDonars', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BloodDonar->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donar')));
		}
		$options = array('conditions' => array('BloodDonar.' . $this->BloodDonar->primaryKey => $id));
		$this->set('bloodDonar', $this->BloodDonar->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BloodDonar->create();
			if ($this->BloodDonar->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donar')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodDonar->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donar')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->BloodDonar->User->find('list');
		$bloodGroups = $this->BloodDonar->BloodGroup->find('list');
		$sexes = $this->BloodDonar->Sex->find('list');
		$countries = $this->BloodDonar->Country->find('list');
		$zones = $this->BloodDonar->Zone->find('list');
		$bdDivisions = $this->BloodDonar->BdDivision->find('list');
		$bdDistricts = $this->BloodDonar->BdDistrict->find('list');
		$bdThanas = $this->BloodDonar->BdThana->find('list');
		$this->set(compact('users', 'bloodGroups', 'sexes', 'countries', 'zones', 'bdDivisions', 'bdDistricts', 'bdThanas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BloodDonar->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donar')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodDonar->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donar')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donar')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodDonar.' . $this->BloodDonar->primaryKey => $id));
			$this->request->data = $this->BloodDonar->find('first', $options);
		}
		$users = $this->BloodDonar->User->find('list');
		$bloodGroups = $this->BloodDonar->BloodGroup->find('list');
		$sexes = $this->BloodDonar->Sex->find('list');
		$countries = $this->BloodDonar->Country->find('list');
		$zones = $this->BloodDonar->Zone->find('list');
		$bdDivisions = $this->BloodDonar->BdDivision->find('list');
		$bdDistricts = $this->BloodDonar->BdDistrict->find('list');
		$bdThanas = $this->BloodDonar->BdThana->find('list');
		$this->set(compact('users', 'bloodGroups', 'sexes', 'countries', 'zones', 'bdDivisions', 'bdDistricts', 'bdThanas'));
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
		$this->BloodDonar->id = $id;
		if (!$this->BloodDonar->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donar')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodDonar->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood donar')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood donar')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BloodDonar->recursive = 0;
		$this->set('bloodDonars', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BloodDonar->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donar')));
		}
		$options = array('conditions' => array('BloodDonar.' . $this->BloodDonar->primaryKey => $id));
		$this->set('bloodDonar', $this->BloodDonar->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BloodDonar->create();
			if ($this->BloodDonar->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donar')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodDonar->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donar')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->BloodDonar->User->find('list');
		$bloodGroups = $this->BloodDonar->BloodGroup->find('list');
		$sexes = $this->BloodDonar->Sex->find('list');
		$countries = $this->BloodDonar->Country->find('list');
		$zones = $this->BloodDonar->Zone->find('list');
		$bdDivisions = $this->BloodDonar->BdDivision->find('list');
		$bdDistricts = $this->BloodDonar->BdDistrict->find('list');
		$bdThanas = $this->BloodDonar->BdThanas->find('list');
		$this->set(compact('users', 'bloodGroups', 'sexes', 'countries', 'zones', 'bdDivisions', 'bdDistricts', 'bdThanas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BloodDonar->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donar')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodDonar->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donar')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donar')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodDonar.' . $this->BloodDonar->primaryKey => $id));
			$this->request->data = $this->BloodDonar->find('first', $options);
		}
		$users = $this->BloodDonar->User->find('list');
		$bloodGroups = $this->BloodDonar->BloodGroup->find('list');
		$sexes = $this->BloodDonar->Sex->find('list');
		$countries = $this->BloodDonar->Country->find('list');
		$zones = $this->BloodDonar->Zone->find('list');
		$bdDivisions = $this->BloodDonar->BdDivision->find('list');
		$bdDistricts = $this->BloodDonar->BdDistrict->find('list');
		$bdThanas = $this->BloodDonar->BdThanas->find('list');
		$this->set(compact('users', 'bloodGroups', 'sexes', 'countries', 'zones', 'bdDivisions', 'bdDistricts', 'bdThanas'));
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
		$this->BloodDonar->id = $id;
		if (!$this->BloodDonar->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donar')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodDonar->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood donar')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood donar')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
