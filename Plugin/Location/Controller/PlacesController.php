<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * Places Controller
 *
 * @property Place $Place
 * @property PaginatorComponent $Paginator
 */
class PlacesController extends LocationAppController {

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
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place')));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Place->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Place')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Place')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Place->recursive = 0;
		$this->set('places', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place')));
		}
		$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
		$this->set('place', $this->Place->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Place->create();
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Place->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Place->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Place->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Place.' . $this->Place->primaryKey => $id));
			$this->request->data = $this->Place->find('first', $options);
		}
		$users = $this->Place->User->find('list');
		$points = $this->Place->Point->find('list');
		$placeTypes = $this->Place->PlaceType->find('list');
		$countries = $this->Place->Country->find('list');
		$zones = $this->Place->Zone->find('list');
		$bdDistricts = $this->Place->BdDistrict->find('list');
		$bdThanas = $this->Place->BdThana->find('list');
		$this->set(compact('users', 'points', 'placeTypes', 'countries', 'zones', 'bdDistricts', 'bdThanas'));
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
		$this->Place->id = $id;
		if (!$this->Place->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Place->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Place')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Place')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
