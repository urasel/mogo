<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * Points Controller
 *
 * @property Point $Point
 * @property PaginatorComponent $Paginator
 */
class PointsController extends LocationAppController {

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
		$this->Point->recursive = 0;
		$this->set('points', $this->paginate());
	}
	
	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'point')));
		}
		$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
		$this->set('point', $this->Point->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Point->create();
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Point->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'point')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThana->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'point')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'point')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThana->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
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
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'point')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Point->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Point')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Point')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Point->recursive = 0;
		$this->set('points', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'point')));
		}
		$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
		$this->set('point', $this->Point->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Point->create();
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Point->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'point')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThana->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Point->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'point')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Point->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'point')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'point')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Point.' . $this->Point->primaryKey => $id));
			$this->request->data = $this->Point->find('first', $options);
		}
		$countries = $this->Point->Country->find('list');
		$zones = $this->Point->Zone->find('list');
		$bdDistricts = $this->Point->BdDistrict->find('list');
		$bdThanas = $this->Point->BdThana->find('list');
		$placeTypes = $this->Point->PlaceType->find('list');
		$this->set(compact('countries', 'zones', 'bdDistricts', 'bdThanas', 'placeTypes'));
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
		$this->Point->id = $id;
		if (!$this->Point->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'point')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Point->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Point')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Point')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	
}
