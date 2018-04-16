<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * MotorcycleModels Controller
 *
 * @property MotorcycleModel $MotorcycleModel
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MotorcycleModelsController extends InformationAppController {

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
		$this->MotorcycleModel->recursive = 0;
		$this->set('motorcycleModels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MotorcycleModel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle model')));
		}
		$options = array('conditions' => array('MotorcycleModel.' . $this->MotorcycleModel->primaryKey => $id));
		$this->set('motorcycleModel', $this->MotorcycleModel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MotorcycleModel->create();
			if ($this->MotorcycleModel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle model')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->MotorcycleModel->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle model')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->MotorcycleModel->PlaceType->find('list');
		$this->set(compact('placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MotorcycleModel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle model')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MotorcycleModel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle model')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle model')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('MotorcycleModel.' . $this->MotorcycleModel->primaryKey => $id));
			$this->request->data = $this->MotorcycleModel->find('first', $options);
		}
		$placeTypes = $this->MotorcycleModel->PlaceType->find('list');
		$this->set(compact('placeTypes'));
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
		$this->MotorcycleModel->id = $id;
		if (!$this->MotorcycleModel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle model')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MotorcycleModel->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle model')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle model')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->MotorcycleModel->recursive = 0;
		$this->set('motorcycleModels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->MotorcycleModel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle model')));
		}
		$options = array('conditions' => array('MotorcycleModel.' . $this->MotorcycleModel->primaryKey => $id));
		$this->set('motorcycleModel', $this->MotorcycleModel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->MotorcycleModel->create();
			if ($this->MotorcycleModel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle model')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->MotorcycleModel->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle model')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->MotorcycleModel->PlaceType->find('list');
		$this->set(compact('placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->MotorcycleModel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle model')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MotorcycleModel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle model')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle model')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('MotorcycleModel.' . $this->MotorcycleModel->primaryKey => $id));
			$this->request->data = $this->MotorcycleModel->find('first', $options);
		}
		$placeTypes = $this->MotorcycleModel->PlaceType->find('list');
		$this->set(compact('placeTypes'));
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
		$this->MotorcycleModel->id = $id;
		if (!$this->MotorcycleModel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle model')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MotorcycleModel->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle model')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle model')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
