<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * BdUnions Controller
 *
 * @property BdUnion $BdUnion
 * @property PaginatorComponent $Paginator
 */
class BdUnionsController extends GeneralAppController {

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
		$this->BdUnion->recursive = 0;
		$this->set('bdUnions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BdUnion->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd union')));
		}
		$options = array('conditions' => array('BdUnion.' . $this->BdUnion->primaryKey => $id));
		$this->set('bdUnion', $this->BdUnion->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BdUnion->create();
			if ($this->BdUnion->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd union')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdUnion->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd union')), 'default', array('class' => 'error'));
			}
		}
		$bdDivisions = $this->BdUnion->BdDivision->find('list');
		$bdDistricts = $this->BdUnion->BdDistrict->find('list');
		$bdThanas = $this->BdUnion->BdThana->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts', 'bdThanas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BdUnion->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd union')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdUnion->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd union')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd union')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdUnion.' . $this->BdUnion->primaryKey => $id));
			$this->request->data = $this->BdUnion->find('first', $options);
		}
		$bdDivisions = $this->BdUnion->BdDivision->find('list');
		$bdDistricts = $this->BdUnion->BdDistrict->find('list');
		$bdThanas = $this->BdUnion->BdThana->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts', 'bdThanas'));
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
		$this->BdUnion->id = $id;
		if (!$this->BdUnion->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd union')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdUnion->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd union')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd union')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BdUnion->recursive = 0;
		$this->set('bdUnions', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BdUnion->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd union')));
		}
		$options = array('conditions' => array('BdUnion.' . $this->BdUnion->primaryKey => $id));
		$this->set('bdUnion', $this->BdUnion->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BdUnion->create();
			if ($this->BdUnion->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd union')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdUnion->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd union')), 'default', array('class' => 'error'));
			}
		}
		$bdDivisions = $this->BdUnion->BdDivision->find('list');
		$bdDistricts = $this->BdUnion->BdDistrict->find('list');
		$bdThanas = $this->BdUnion->BdThana->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts', 'bdThanas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BdUnion->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd union')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdUnion->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd union')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd union')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdUnion.' . $this->BdUnion->primaryKey => $id));
			$this->request->data = $this->BdUnion->find('first', $options);
		}
		$bdDivisions = $this->BdUnion->BdDivision->find('list');
		$bdDistricts = $this->BdUnion->BdDistrict->find('list');
		$bdThanas = $this->BdUnion->BdThana->find('list');
		$this->set(compact('bdDivisions', 'bdDistricts', 'bdThanas'));
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
		$this->BdUnion->id = $id;
		if (!$this->BdUnion->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd union')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdUnion->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd union')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd union')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
