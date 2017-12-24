<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Institutes Controller
 *
 * @property Institute $Institute
 * @property PaginatorComponent $Paginator
 */
class InstitutesController extends InformationAppController {

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
		$this->Institute->recursive = 0;
		$this->set('institutes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Institute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'institute')));
		}
		$options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
		$this->set('institute', $this->Institute->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Institute->create();
			if ($this->Institute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'institute')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Institute->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'institute')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Institute->User->find('list');
		$points = $this->Institute->Point->find('list');
		$placeTypes = $this->Institute->PlaceType->find('list');
		$this->set(compact('users', 'points', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Institute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'institute')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Institute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'institute')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'institute')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
			$this->request->data = $this->Institute->find('first', $options);
		}
		$users = $this->Institute->User->find('list');
		$points = $this->Institute->Point->find('list');
		$placeTypes = $this->Institute->PlaceType->find('list');
		$this->set(compact('users', 'points', 'placeTypes'));
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
		$this->Institute->id = $id;
		if (!$this->Institute->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'institute')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Institute->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Institute')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Institute')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Institute->recursive = 0;
		$this->set('institutes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Institute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'institute')));
		}
		$options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
		$this->set('institute', $this->Institute->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Institute->create();
			if ($this->Institute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'institute')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Institute->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'institute')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Institute->User->find('list');
		$points = $this->Institute->Point->find('list');
		$placeTypes = $this->Institute->PlaceType->find('list');
		$this->set(compact('users', 'points', 'placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Institute->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'institute')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Institute->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'institute')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'institute')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Institute.' . $this->Institute->primaryKey => $id));
			$this->request->data = $this->Institute->find('first', $options);
		}
		$users = $this->Institute->User->find('list');
		$points = $this->Institute->Point->find('list');
		$placeTypes = $this->Institute->PlaceType->find('list');
		$this->set(compact('users', 'points', 'placeTypes'));
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
		$this->Institute->id = $id;
		if (!$this->Institute->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'institute')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Institute->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Institute')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Institute')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
