<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Stadia Controller
 *
 * @property Stadium $Stadium
 * @property PaginatorComponent $Paginator
 */
class StadiaController extends InformationAppController {

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
		$this->Stadium->recursive = 0;
		$this->set('stadia', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Stadium->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium')));
		}
		$options = array('conditions' => array('Stadium.' . $this->Stadium->primaryKey => $id));
		$this->set('stadium', $this->Stadium->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Stadium->create();
			if ($this->Stadium->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Stadium->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Stadium->Point->find('list');
		$placeTypes = $this->Stadium->PlaceType->find('list');
		$countries = $this->Stadium->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Stadium->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Stadium->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Stadium.' . $this->Stadium->primaryKey => $id));
			$this->request->data = $this->Stadium->find('first', $options);
		}
		$points = $this->Stadium->Point->find('list');
		$placeTypes = $this->Stadium->PlaceType->find('list');
		$countries = $this->Stadium->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'countries'));
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
		$this->Stadium->id = $id;
		if (!$this->Stadium->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Stadium->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Stadium')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Stadium')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Stadium->recursive = 0;
		$this->set('stadia', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Stadium->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium')));
		}
		$options = array('conditions' => array('Stadium.' . $this->Stadium->primaryKey => $id));
		$this->set('stadium', $this->Stadium->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Stadium->create();
			if ($this->Stadium->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Stadium->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Stadium->Point->find('list');
		$placeTypes = $this->Stadium->PlaceType->find('list');
		$countries = $this->Stadium->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Stadium->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Stadium->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'stadium')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'stadium')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Stadium.' . $this->Stadium->primaryKey => $id));
			$this->request->data = $this->Stadium->find('first', $options);
		}
		$points = $this->Stadium->Point->find('list');
		$placeTypes = $this->Stadium->PlaceType->find('list');
		$countries = $this->Stadium->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'countries'));
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
		$this->Stadium->id = $id;
		if (!$this->Stadium->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'stadium')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Stadium->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Stadium')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Stadium')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
