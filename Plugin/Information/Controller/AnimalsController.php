<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Animals Controller
 *
 * @property Animal $Animal
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AnimalsController extends InformationAppController {

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
		$this->Animal->recursive = 0;
		$this->set('animals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Animal->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'animal')));
		}
		$options = array('conditions' => array('Animal.' . $this->Animal->primaryKey => $id));
		$this->set('animal', $this->Animal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Animal->create();
			if ($this->Animal->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'animal')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Animal->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'animal')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Animal->Point->find('list');
		$placeTypes = $this->Animal->PlaceType->find('list');
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
		if (!$this->Animal->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'animal')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Animal->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'animal')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'animal')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Animal.' . $this->Animal->primaryKey => $id));
			$this->request->data = $this->Animal->find('first', $options);
		}
		$points = $this->Animal->Point->find('list');
		$placeTypes = $this->Animal->PlaceType->find('list');
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
		$this->Animal->id = $id;
		if (!$this->Animal->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'animal')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Animal->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Animal')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Animal')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Animal->recursive = 0;
		$this->set('animals', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Animal->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'animal')));
		}
		$options = array('conditions' => array('Animal.' . $this->Animal->primaryKey => $id));
		$this->set('animal', $this->Animal->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Animal->create();
			if ($this->Animal->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'animal')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Animal->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'animal')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Animal->Point->find('list');
		$placeTypes = $this->Animal->PlaceType->find('list');
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
		if (!$this->Animal->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'animal')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Animal->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'animal')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'animal')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Animal.' . $this->Animal->primaryKey => $id));
			$this->request->data = $this->Animal->find('first', $options);
		}
		$points = $this->Animal->Point->find('list');
		$placeTypes = $this->Animal->PlaceType->find('list');
		$this->set(compact('points', 'placeTypes'));
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
		$this->Animal->id = $id;
		if (!$this->Animal->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'animal')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Animal->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Animal')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Animal')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
