<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * Hospitals Controller
 *
 * @property Hospital $Hospital
 * @property PaginatorComponent $Paginator
 */
class HospitalsController extends LocationAppController {

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
		$this->Hospital->recursive = 0;
		$this->set('hospitals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Hospital->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital')));
		}
		$options = array('conditions' => array('Hospital.' . $this->Hospital->primaryKey => $id));
		$this->set('hospital', $this->Hospital->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hospital->create();
			if ($this->Hospital->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Hospital->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Hospital->Point->find('list');
		$hospitalCategories = $this->Hospital->HospitalCategory->find('list');
		$this->set(compact('points', 'hospitalCategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Hospital->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hospital->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Hospital.' . $this->Hospital->primaryKey => $id));
			$this->request->data = $this->Hospital->find('first', $options);
		}
		$points = $this->Hospital->Point->find('list');
		$hospitalCategories = $this->Hospital->HospitalCategory->find('list');
		$this->set(compact('points', 'hospitalCategories'));
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
		$this->Hospital->id = $id;
		if (!$this->Hospital->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hospital->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hospital')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hospital')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Hospital->recursive = 0;
		$this->set('hospitals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Hospital->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital')));
		}
		$options = array('conditions' => array('Hospital.' . $this->Hospital->primaryKey => $id));
		$this->set('hospital', $this->Hospital->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Hospital->create();
			if ($this->Hospital->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Hospital->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Hospital->Point->find('list');
		$hospitalCategories = $this->Hospital->HospitalCategory->find('list');
		$this->set(compact('points', 'hospitalCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Hospital->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hospital->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Hospital.' . $this->Hospital->primaryKey => $id));
			$this->request->data = $this->Hospital->find('first', $options);
		}
		$points = $this->Hospital->Point->find('list');
		$hospitalCategories = $this->Hospital->HospitalCategory->find('list');
		$this->set(compact('points', 'hospitalCategories'));
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
		$this->Hospital->id = $id;
		if (!$this->Hospital->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hospital->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hospital')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hospital')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
