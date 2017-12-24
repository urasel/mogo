<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * PlaceDatas Controller
 *
 * @property PlaceData $PlaceData
 * @property PaginatorComponent $Paginator
 */
class PlaceDatasController extends LocationAppController {

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
		$this->PlaceData->recursive = 0;
		$this->set('placeData', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place data')));
		}
		$options = array('conditions' => array('PlaceData.' . $this->PlaceData->primaryKey => $id));
		$this->set('placeData', $this->PlaceData->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceData->create();
			if ($this->PlaceData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->PlaceData->Language->find('list');
		$topics = $this->PlaceData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PlaceData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceData.' . $this->PlaceData->primaryKey => $id));
			$this->request->data = $this->PlaceData->find('first', $options);
		}
		$languages = $this->PlaceData->Language->find('list');
		$topics = $this->PlaceData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
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
		$this->PlaceData->id = $id;
		if (!$this->PlaceData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Place data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Place data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlaceData->recursive = 0;
		$this->set('placeData', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlaceData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place data')));
		}
		$options = array('conditions' => array('PlaceData.' . $this->PlaceData->primaryKey => $id));
		$this->set('placeData', $this->PlaceData->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PlaceData->create();
			if ($this->PlaceData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->PlaceData->Language->find('list');
		$topics = $this->PlaceData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PlaceData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceData.' . $this->PlaceData->primaryKey => $id));
			$this->request->data = $this->PlaceData->find('first', $options);
		}
		$languages = $this->PlaceData->Language->find('list');
		$topics = $this->PlaceData->Topic->find('list');
		$this->set(compact('languages', 'topics'));
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
		$this->PlaceData->id = $id;
		if (!$this->PlaceData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Place data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Place data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
