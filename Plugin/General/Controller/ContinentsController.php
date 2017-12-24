<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Continents Controller
 *
 * @property Continent $Continent
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContinentsController extends GeneralAppController {

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
		$this->Continent->recursive = 0;
		$this->set('continents', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Continent->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'continent')));
		}
		$options = array('conditions' => array('Continent.' . $this->Continent->primaryKey => $id));
		$this->set('continent', $this->Continent->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Continent->create();
			if ($this->Continent->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'continent')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Continent->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'continent')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Continent->Point->find('list');
		$placeTypes = $this->Continent->PlaceType->find('list');
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
		if (!$this->Continent->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'continent')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Continent->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'continent')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'continent')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Continent.' . $this->Continent->primaryKey => $id));
			$this->request->data = $this->Continent->find('first', $options);
		}
		$points = $this->Continent->Point->find('list');
		$placeTypes = $this->Continent->PlaceType->find('list');
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
		$this->Continent->id = $id;
		if (!$this->Continent->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'continent')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Continent->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Continent')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Continent')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Continent->recursive = 0;
		$this->set('continents', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Continent->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'continent')));
		}
		$options = array('conditions' => array('Continent.' . $this->Continent->primaryKey => $id));
		$this->set('continent', $this->Continent->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Continent->create();
			if ($this->Continent->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'continent')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Continent->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'continent')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Continent->Point->find('list');
		$placeTypes = $this->Continent->PlaceType->find('list');
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
		if (!$this->Continent->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'continent')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Continent->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'continent')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'continent')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Continent.' . $this->Continent->primaryKey => $id));
			$this->request->data = $this->Continent->find('first', $options);
		}
		$points = $this->Continent->Point->find('list');
		$placeTypes = $this->Continent->PlaceType->find('list');
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
		$this->Continent->id = $id;
		if (!$this->Continent->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'continent')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Continent->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Continent')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Continent')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
