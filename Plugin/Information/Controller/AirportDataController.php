<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * AirportData Controller
 *
 * @property AirportData $AirportData
 * @property PaginatorComponent $Paginator
 */
class AirportDataController extends InformationAppController {

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
		$this->AirportData->recursive = 0;
		$this->set('airportData', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AirportData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport data')));
		}
		$options = array('conditions' => array('AirportData.' . $this->AirportData->primaryKey => $id));
		$this->set('airportData', $this->AirportData->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AirportData->create();
			if ($this->AirportData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->AirportData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->AirportData->Language->find('list');
		$airports = $this->AirportData->Airport->find('list');
		$this->set(compact('languages', 'airports'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->AirportData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AirportData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AirportData.' . $this->AirportData->primaryKey => $id));
			$this->request->data = $this->AirportData->find('first', $options);
		}
		$languages = $this->AirportData->Language->find('list');
		$airports = $this->AirportData->Airport->find('list');
		$this->set(compact('languages', 'airports'));
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
		$this->AirportData->id = $id;
		if (!$this->AirportData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AirportData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Airport data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Airport data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AirportData->recursive = 0;
		$this->set('airportData', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AirportData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport data')));
		}
		$options = array('conditions' => array('AirportData.' . $this->AirportData->primaryKey => $id));
		$this->set('airportData', $this->AirportData->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AirportData->create();
			if ($this->AirportData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->AirportData->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport data')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->AirportData->Language->find('list');
		$airports = $this->AirportData->Airport->find('list');
		$this->set(compact('languages', 'airports'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AirportData->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport data')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AirportData->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport data')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport data')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AirportData.' . $this->AirportData->primaryKey => $id));
			$this->request->data = $this->AirportData->find('first', $options);
		}
		$languages = $this->AirportData->Language->find('list');
		$airports = $this->AirportData->Airport->find('list');
		$this->set(compact('languages', 'airports'));
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
		$this->AirportData->id = $id;
		if (!$this->AirportData->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport data')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AirportData->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Airport data')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Airport data')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
