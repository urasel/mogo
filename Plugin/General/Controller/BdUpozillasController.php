<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * BdUpozillas Controller
 *
 * @property BdUpozilla $BdUpozilla
 * @property PaginatorComponent $Paginator
 */
class BdUpozillasController extends GeneralAppController {

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
		$this->BdUpozilla->recursive = 0;
		$this->set('bdUpozillas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BdUpozilla->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd upozilla')));
		}
		$options = array('conditions' => array('BdUpozilla.' . $this->BdUpozilla->primaryKey => $id));
		$this->set('bdUpozilla', $this->BdUpozilla->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BdUpozilla->create();
			if ($this->BdUpozilla->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd upozilla')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdUpozilla->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd upozilla')), 'default', array('class' => 'error'));
			}
		}
		$bdDivisions = $this->BdUpozilla->BdDivision->find('list');
		$bdDistricts = $this->BdUpozilla->BdDistrict->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BdUpozilla->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd upozilla')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdUpozilla->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd upozilla')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd upozilla')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdUpozilla.' . $this->BdUpozilla->primaryKey => $id));
			$this->request->data = $this->BdUpozilla->find('first', $options);
		}
		$bdDivisions = $this->BdUpozilla->BdDivision->find('list');
		$bdDistricts = $this->BdUpozilla->BdDistrict->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts'));
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
		$this->BdUpozilla->id = $id;
		if (!$this->BdUpozilla->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd upozilla')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdUpozilla->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd upozilla')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd upozilla')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BdUpozilla->recursive = 0;
		$this->set('bdUpozillas', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BdUpozilla->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd upozilla')));
		}
		$options = array('conditions' => array('BdUpozilla.' . $this->BdUpozilla->primaryKey => $id));
		$this->set('bdUpozilla', $this->BdUpozilla->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BdUpozilla->create();
			if ($this->BdUpozilla->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd upozilla')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdUpozilla->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd upozilla')), 'default', array('class' => 'error'));
			}
		}
		$bdDivisions = $this->BdUpozilla->BdDivision->find('list');
		$bdDistricts = $this->BdUpozilla->BdDistrict->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BdUpozilla->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd upozilla')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdUpozilla->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd upozilla')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd upozilla')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdUpozilla.' . $this->BdUpozilla->primaryKey => $id));
			$this->request->data = $this->BdUpozilla->find('first', $options);
		}
		$bdDivisions = $this->BdUpozilla->BdDivision->find('list');
		$bdDistricts = $this->BdUpozilla->BdDistrict->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts'));
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
		$this->BdUpozilla->id = $id;
		if (!$this->BdUpozilla->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd upozilla')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdUpozilla->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd upozilla')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd upozilla')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
