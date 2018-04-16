<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Motorcycles Controller
 *
 * @property Motorcycle $Motorcycle
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MotorcyclesController extends InformationAppController {

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
		$this->Motorcycle->recursive = 0;
		$this->set('motorcycles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
		$this->set('motorcycle', $this->Motorcycle->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Motorcycle->create();
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Motorcycle->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('points', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
			$this->request->data = $this->Motorcycle->find('first', $options);
		}
		$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('points', 'placeTypes'));
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
		$this->Motorcycle->id = $id;
		if (!$this->Motorcycle->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Motorcycle->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Motorcycle->recursive = 0;
		$this->set('motorcycles', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
		$this->set('motorcycle', $this->Motorcycle->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Motorcycle->create();
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Motorcycle->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
		$this->set(compact('points', 'placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Motorcycle->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Motorcycle->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'motorcycle')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'motorcycle')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Motorcycle.' . $this->Motorcycle->primaryKey => $id));
			$this->request->data = $this->Motorcycle->find('first', $options);
		}
		//$points = $this->Motorcycle->Point->find('list');
		$placeTypes = $this->Motorcycle->PlaceType->find('list');
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
		$this->Motorcycle->id = $id;
		if (!$this->Motorcycle->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'motorcycle')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Motorcycle->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Motorcycle')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
