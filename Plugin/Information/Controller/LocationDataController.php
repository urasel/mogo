<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * LocationData Controller
 *
 * @property LocationData $LocationData
 * @property PaginatorComponent $Paginator
 */
class LocationDataController extends InformationAppController {

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
		$this->LocationData->recursive = 0;
		$this->set('locationData', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LocationData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location data')));
		}
		$options = array('conditions' => array('LocationData.' . $this->LocationData->primaryKey => $id));
		$this->set('locationData', $this->LocationData->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LocationData->create();
			if ($this->LocationData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->LocationData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->LocationData->Language->find('list');
		$locations = $this->LocationData->Location->find('list');
		$this->set(compact('languages', 'locations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->LocationData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LocationData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('LocationData.' . $this->LocationData->primaryKey => $id));
			$this->request->data = $this->LocationData->find('first', $options);
		}
		$languages = $this->LocationData->Language->find('list');
		$locations = $this->LocationData->Location->find('list');
		$this->set(compact('languages', 'locations'));
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
		$this->LocationData->id = $id;
		if (!$this->LocationData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LocationData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Location data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Location data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->LocationData->recursive = 0;
		$this->set('locationData', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->LocationData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location data')));
		}
		$options = array('conditions' => array('LocationData.' . $this->LocationData->primaryKey => $id));
		$this->set('locationData', $this->LocationData->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->LocationData->create();
			if ($this->LocationData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->LocationData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->LocationData->Language->find('list');
		$locations = $this->LocationData->Location->find('list');
		$this->set(compact('languages', 'locations'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->LocationData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LocationData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('LocationData.' . $this->LocationData->primaryKey => $id));
			$this->request->data = $this->LocationData->find('first', $options);
		}
		$languages = $this->LocationData->Language->find('list');
		$locations = $this->LocationData->Location->find('list');
		$this->set(compact('languages', 'locations'));
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
		$this->LocationData->id = $id;
		if (!$this->LocationData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LocationData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Location data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Location data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
