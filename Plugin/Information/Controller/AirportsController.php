<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Airports Controller
 *
 * @property Airport $Airport
 * @property PaginatorComponent $Paginator
 */
class AirportsController extends InformationAppController {

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
		$this->Airport->recursive = 0;
		$this->set('airports', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Airport->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport')));
		}
		$options = array('conditions' => array('Airport.' . $this->Airport->primaryKey => $id));
		$this->set('airport', $this->Airport->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Airport->create();
			if ($this->Airport->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Airport->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Airport->Point->find('list');
		$placeTypes = $this->Airport->PlaceType->find('list');
		$airportTypes = $this->Airport->AirportType->find('list');
		$continents = $this->Airport->Continent->find('list');
		$countries = $this->Airport->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'airportTypes', 'continents', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Airport->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Airport->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Airport.' . $this->Airport->primaryKey => $id));
			$this->request->data = $this->Airport->find('first', $options);
		}
		$points = $this->Airport->Point->find('list');
		$placeTypes = $this->Airport->PlaceType->find('list');
		$airportTypes = $this->Airport->AirportType->find('list');
		$continents = $this->Airport->Continent->find('list');
		$countries = $this->Airport->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'airportTypes', 'continents', 'countries'));
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
		$this->Airport->id = $id;
		if (!$this->Airport->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Airport->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Airport')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Airport')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Airport->recursive = 0;
		$this->set('airports', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Airport->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport')));
		}
		$options = array('conditions' => array('Airport.' . $this->Airport->primaryKey => $id));
		$this->set('airport', $this->Airport->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Airport->create();
			if ($this->Airport->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Airport->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Airport->Point->find('list');
		$placeTypes = $this->Airport->PlaceType->find('list');
		$airportTypes = $this->Airport->AirportType->find('list');
		$continents = $this->Airport->Continent->find('list');
		$countries = $this->Airport->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'airportTypes', 'continents', 'countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Airport->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Airport->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Airport.' . $this->Airport->primaryKey => $id));
			$this->request->data = $this->Airport->find('first', $options);
		}
		$points = $this->Airport->Point->find('list');
		$placeTypes = $this->Airport->PlaceType->find('list');
		$airportTypes = $this->Airport->AirportType->find('list');
		$continents = $this->Airport->Continent->find('list');
		$countries = $this->Airport->Country->find('list');
		$this->set(compact('points', 'placeTypes', 'airportTypes', 'continents', 'countries'));
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
		$this->Airport->id = $id;
		if (!$this->Airport->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Airport->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Airport')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Airport')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
