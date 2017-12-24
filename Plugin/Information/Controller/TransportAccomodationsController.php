<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportAccomodations Controller
 *
 * @property TransportAccomodation $TransportAccomodation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportAccomodationsController extends InformationAppController {

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
		$this->TransportAccomodation->recursive = 0;
		$this->set('transportAccomodations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportAccomodation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport accomodation')));
		}
		$options = array('conditions' => array('TransportAccomodation.' . $this->TransportAccomodation->primaryKey => $id));
		$this->set('transportAccomodation', $this->TransportAccomodation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportAccomodation->create();
			if ($this->TransportAccomodation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport accomodation')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportAccomodation->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport accomodation')), 'default', array('class' => 'error'));
			}
		}
		$transportRoutes = $this->TransportAccomodation->TransportRoute->find('list');
		$transportClasses = $this->TransportAccomodation->TransportClass->find('list');
		$transportServices = $this->TransportAccomodation->TransportService->find('list');
		$this->set(compact('transportRoutes', 'transportClasses', 'transportServices'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportAccomodation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport accomodation')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportAccomodation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport accomodation')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport accomodation')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportAccomodation.' . $this->TransportAccomodation->primaryKey => $id));
			$this->request->data = $this->TransportAccomodation->find('first', $options);
		}
		$transportRoutes = $this->TransportAccomodation->TransportRoute->find('list');
		$transportClasses = $this->TransportAccomodation->TransportClass->find('list');
		$transportServices = $this->TransportAccomodation->TransportService->find('list');
		$this->set(compact('transportRoutes', 'transportClasses', 'transportServices'));
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
		$this->TransportAccomodation->id = $id;
		if (!$this->TransportAccomodation->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport accomodation')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportAccomodation->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport accomodation')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport accomodation')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportAccomodation->recursive = 0;
		$this->set('transportAccomodations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportAccomodation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport accomodation')));
		}
		$options = array('conditions' => array('TransportAccomodation.' . $this->TransportAccomodation->primaryKey => $id));
		$this->set('transportAccomodation', $this->TransportAccomodation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TransportAccomodation->create();
			if ($this->TransportAccomodation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport accomodation')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportAccomodation->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport accomodation')), 'default', array('class' => 'error'));
			}
		}
		$transportRoutes = $this->TransportAccomodation->TransportRoute->find('list');
		$transportClasses = $this->TransportAccomodation->TransportClass->find('list');
		$transportServices = $this->TransportAccomodation->TransportService->find('list');
		$this->set(compact('transportRoutes', 'transportClasses', 'transportServices'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TransportAccomodation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport accomodation')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportAccomodation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport accomodation')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport accomodation')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportAccomodation.' . $this->TransportAccomodation->primaryKey => $id));
			$this->request->data = $this->TransportAccomodation->find('first', $options);
		}
		$transportRoutes = $this->TransportAccomodation->TransportRoute->find('list');
		$transportClasses = $this->TransportAccomodation->TransportClass->find('list');
		$transportServices = $this->TransportAccomodation->TransportService->find('list');
		$this->set(compact('transportRoutes', 'transportClasses', 'transportServices'));
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
		$this->TransportAccomodation->id = $id;
		if (!$this->TransportAccomodation->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport accomodation')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportAccomodation->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport accomodation')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport accomodation')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
