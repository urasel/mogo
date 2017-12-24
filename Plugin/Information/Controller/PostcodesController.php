<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * Postcodes Controller
 *
 * @property Postcode $Postcode
 * @property PaginatorComponent $Paginator
 */
class PostcodesController extends InformationAppController {

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
		$this->Postcode->recursive = 0;
		$this->set('postcodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Postcode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'postcode')));
		}
		$options = array('conditions' => array('Postcode.' . $this->Postcode->primaryKey => $id));
		$this->set('postcode', $this->Postcode->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Postcode->create();
			if ($this->Postcode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'postcode')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Postcode->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'postcode')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->Postcode->PlaceType->find('list');
		$points = $this->Postcode->Point->find('list');
		$countries = $this->Postcode->Country->find('list');
		$bdDivisions = $this->Postcode->BdDivision->find('list');
		$bdDistricts = $this->Postcode->BdDistrict->find('list');
		$bdThanas = $this->Postcode->BdThana->find('list');
		$this->set(compact('placeTypes', 'points', 'countries', 'bdDivisions', 'bdDistricts', 'bdThanas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Postcode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'postcode')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Postcode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'postcode')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'postcode')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Postcode.' . $this->Postcode->primaryKey => $id));
			$this->request->data = $this->Postcode->find('first', $options);
		}
		$placeTypes = $this->Postcode->PlaceType->find('list');
		$points = $this->Postcode->Point->find('list');
		$countries = $this->Postcode->Country->find('list');
		$bdDivisions = $this->Postcode->BdDivision->find('list');
		$bdDistricts = $this->Postcode->BdDistrict->find('list');
		$bdThanas = $this->Postcode->BdThana->find('list');
		$this->set(compact('placeTypes', 'points', 'countries', 'bdDivisions', 'bdDistricts', 'bdThanas'));
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
		$this->Postcode->id = $id;
		if (!$this->Postcode->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'postcode')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Postcode->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Postcode')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Postcode')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Postcode->recursive = 0;
		$this->set('postcodes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Postcode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'postcode')));
		}
		$options = array('conditions' => array('Postcode.' . $this->Postcode->primaryKey => $id));
		$this->set('postcode', $this->Postcode->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Postcode->create();
			if ($this->Postcode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'postcode')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Postcode->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'postcode')), 'default', array('class' => 'error'));
			}
		}
		$placeTypes = $this->Postcode->PlaceType->find('list');
		//$points = $this->Postcode->Point->find('list');
		$countries = $this->Postcode->Country->find('list');
		$bdDivisions = $this->Postcode->BdDivision->find('list');
		$bdDistricts = $this->Postcode->BdDistrict->find('list');
		$bdThanas = $this->Postcode->BdThanas->find('list');
		$this->set(compact('placeTypes', 'points', 'countries', 'bdDivisions', 'bdDistricts', 'bdThanas'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Postcode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'postcode')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Postcode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'postcode')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'postcode')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Postcode.' . $this->Postcode->primaryKey => $id));
			$this->request->data = $this->Postcode->find('first', $options);
		}
		$placeTypes = $this->Postcode->PlaceType->find('list');
		//$points = $this->Postcode->Point->find('list');
		$countries = $this->Postcode->Country->find('list');
		$bdDivisions = $this->Postcode->BdDivision->find('list');
		$bdDistricts = $this->Postcode->BdDistrict->find('list');
		$bdThanas = $this->Postcode->BdThanas->find('list');
		$this->set(compact('placeTypes', 'points', 'countries', 'bdDivisions', 'bdDistricts', 'bdThanas'));
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
		$this->Postcode->id = $id;
		if (!$this->Postcode->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'postcode')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Postcode->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Postcode')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Postcode')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
