<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * MotorcycleSpecifications Controller
 *
 * @property MotorcycleSpecification $MotorcycleSpecification
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MotorcycleSpecificationsController extends InformationAppController {

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
		$this->MotorcycleSpecification->recursive = 0;
		$this->set('motorcycleSpecifications', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MotorcycleSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle specification')));
		}
		$options = array('conditions' => array('MotorcycleSpecification.' . $this->MotorcycleSpecification->primaryKey => $id));
		$this->set('motorcycleSpecification', $this->MotorcycleSpecification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MotorcycleSpecification->create();
			if ($this->MotorcycleSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->MotorcycleSpecification->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle specification')), 'default', array('class' => 'error'));
			}
		}
		$motorcycles = $this->MotorcycleSpecification->Motorcycle->find('list');
		$this->set(compact('motorcycles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MotorcycleSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle specification')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MotorcycleSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle specification')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('MotorcycleSpecification.' . $this->MotorcycleSpecification->primaryKey => $id));
			$this->request->data = $this->MotorcycleSpecification->find('first', $options);
		}
		$motorcycles = $this->MotorcycleSpecification->Motorcycle->find('list');
		$this->set(compact('motorcycles'));
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
		$this->MotorcycleSpecification->id = $id;
		if (!$this->MotorcycleSpecification->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle specification')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MotorcycleSpecification->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle specification')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle specification')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MotorcycleSpecification->recursive = 0;
		$this->set('motorcycleSpecifications', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MotorcycleSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle specification')));
		}
		$options = array('conditions' => array('MotorcycleSpecification.' . $this->MotorcycleSpecification->primaryKey => $id));
		$this->set('motorcycleSpecification', $this->MotorcycleSpecification->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MotorcycleSpecification->create();
			if ($this->MotorcycleSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->MotorcycleSpecification->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle specification')), 'default', array('class' => 'error'));
			}
		}
		$motorcycles = $this->MotorcycleSpecification->Motorcycle->find('list');
		$this->set(compact('motorcycles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MotorcycleSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle specification')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MotorcycleSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle specification')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('MotorcycleSpecification.' . $this->MotorcycleSpecification->primaryKey => $id));
			$this->request->data = $this->MotorcycleSpecification->find('first', $options);
		}
		$motorcycles = $this->MotorcycleSpecification->Motorcycle->find('list');
		$this->set(compact('motorcycles'));
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
		$this->MotorcycleSpecification->id = $id;
		if (!$this->MotorcycleSpecification->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle specification')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MotorcycleSpecification->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle specification')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle specification')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
