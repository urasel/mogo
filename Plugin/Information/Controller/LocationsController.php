<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Locations Controller
 *
 * @property Location $Location
 * @property PaginatorComponent $Paginator
 */
class LocationsController extends InformationAppController {

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
		$this->Location->recursive = 0;
		$this->set('locations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location')));
		}
		$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
		$this->set('location', $this->Location->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Location->create();
			if ($this->Location->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Location->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location')), 'default', array('class' => 'error'));
			}
		}
		$this->Location->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Location.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("Location.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("Location.country_id = Country.id")
						),
					)
				)
		);
		$this->Location->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Location.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("Location.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("Location.country_id = Country.id")
						),
					)
				)
		);
		//$points = $this->Location->Point->find('list');
		$placeTypes = $this->Location->PlaceType->find('list');
		$countries = $this->Location->Country->find('list');
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
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Location->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
			$this->request->data = $this->Location->find('first', $options);
		}
		$this->Location->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Location.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("Location.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("Location.country_id = Country.id")
						),
					)
				)
		);
		//$points = $this->Location->Point->find('list');
		$placeTypes = $this->Location->PlaceType->find('list');
		$countries = $this->Location->Country->find('list');
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
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Location->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Location')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Location')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Location->recursive = 2;
			$this->Location->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Location.point_id = Point.id")
						),
					),
				)
			);
		$this->set('locations', $this->paginate());
		debug($this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location')));
		}
		$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
		$this->set('location', $this->Location->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Location->create();
			if ($this->Location->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Location->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location')), 'default', array('class' => 'error'));
			}
		}
		$this->Location->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Location.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("Location.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("Location.country_id = Country.id")
						),
					)
				)
		);
		$placeTypes = $this->Location->PlaceType->find('list');
		$countries = $this->Location->Country->find('list');
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
		if (!$this->Location->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Location->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
			$this->request->data = $this->Location->find('first', $options);
		}
		$this->Location->bindModel(array(
					'hasOne' => array(
						'Point' => array(
							'foreignKey' => false,
							'conditions' => array("Location.point_id = Point.id")
						),
						'PlaceType' => array(
							'foreignKey' => false,
							'conditions' => array("Location.place_type_id = PlaceType.id")
						),
						'Country' => array(
							'foreignKey' => false,
							'conditions' => array("Location.country_id = Country.id")
						),
					)
				)
		);
		//$points = $this->Location->Point->find('list');
		$placeTypes = $this->Location->PlaceType->find('list');
		$countries = $this->Location->Country->find('list');
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
		$this->Location->id = $id;
		if (!$this->Location->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Location->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Location')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Location')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
