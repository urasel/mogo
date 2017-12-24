<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * BabyNames Controller
 *
 * @property BabyName $BabyName
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BabyNamesController extends InformationAppController {

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
		$this->BabyName->recursive = 0;
		$this->set('babyNames', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BabyName->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'baby name')));
		}
		$options = array('conditions' => array('BabyName.' . $this->BabyName->primaryKey => $id));
		$this->set('babyName', $this->BabyName->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BabyName->create();
			if ($this->BabyName->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'baby name')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BabyName->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'baby name')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->BabyName->PlaceType->find('list');
		$sexes = $this->BabyName->Sex->find('list');
		$this->set(compact('placeTypes', 'sexes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BabyName->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'baby name')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BabyName->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'baby name')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'baby name')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BabyName.' . $this->BabyName->primaryKey => $id));
			$this->request->data = $this->BabyName->find('first', $options);
		}
		$placeTypes = $this->BabyName->PlaceType->find('list');
		$sexes = $this->BabyName->Sex->find('list');
		$this->set(compact('placeTypes', 'sexes'));
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
		$this->BabyName->id = $id;
		if (!$this->BabyName->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'baby name')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BabyName->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Baby name')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Baby name')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BabyName->recursive = 0;
		$this->set('babyNames', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BabyName->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'baby name')));
		}
		$options = array('conditions' => array('BabyName.' . $this->BabyName->primaryKey => $id));
		$this->set('babyName', $this->BabyName->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BabyName->create();
			if ($this->BabyName->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'baby name')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BabyName->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'baby name')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->BabyName->PlaceType->find('list');
		$sexes = $this->BabyName->Sex->find('list');
		$this->set(compact('placeTypes', 'sexes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BabyName->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'baby name')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BabyName->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'baby name')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'baby name')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BabyName.' . $this->BabyName->primaryKey => $id));
			$this->request->data = $this->BabyName->find('first', $options);
		}
		$placeTypes = $this->BabyName->PlaceType->find('list');
		$sexes = $this->BabyName->Sex->find('list');
		$this->set(compact('placeTypes', 'sexes'));
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
		$this->BabyName->id = $id;
		if (!$this->BabyName->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'baby name')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BabyName->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Baby name')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Baby name')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
