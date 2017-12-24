<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportRouteSpecifications Controller
 *
 * @property TransportRouteSpecification $TransportRouteSpecification
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class TransportRouteSpecificationsController extends InformationAppController {

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
		$this->TransportRouteSpecification->recursive = 0;
		$this->set('transportRouteSpecifications', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportRouteSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route specification')));
		}
		$options = array('conditions' => array('TransportRouteSpecification.' . $this->TransportRouteSpecification->primaryKey => $id));
		$this->set('transportRouteSpecification', $this->TransportRouteSpecification->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportRouteSpecification->create();
			if ($this->TransportRouteSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportRouteSpecification->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route specification')), 'default', array('class' => 'error'));
			}
		}
		$transportTypes = $this->TransportRouteSpecification->TransportType->find('list');
		$this->set(compact('transportTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportRouteSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route specification')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportRouteSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route specification')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportRouteSpecification.' . $this->TransportRouteSpecification->primaryKey => $id));
			$this->request->data = $this->TransportRouteSpecification->find('first', $options);
		}
		$transportTypes = $this->TransportRouteSpecification->TransportType->find('list');
		$this->set(compact('transportTypes'));
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
		$this->TransportRouteSpecification->id = $id;
		if (!$this->TransportRouteSpecification->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route specification')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportRouteSpecification->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport route specification')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport route specification')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportRouteSpecification->recursive = 0;
		$this->set('transportRouteSpecifications', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportRouteSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route specification')));
		}
		$options = array('conditions' => array('TransportRouteSpecification.' . $this->TransportRouteSpecification->primaryKey => $id));
		$this->set('transportRouteSpecification', $this->TransportRouteSpecification->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TransportRouteSpecification->create();
			if ($this->TransportRouteSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportRouteSpecification->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route specification')), 'default', array('class' => 'error'));
			}
		}
		$transportTypes = $this->TransportRouteSpecification->TransportType->find('list');
		$this->set(compact('transportTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TransportRouteSpecification->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route specification')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportRouteSpecification->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport route specification')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport route specification')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportRouteSpecification.' . $this->TransportRouteSpecification->primaryKey => $id));
			$this->request->data = $this->TransportRouteSpecification->find('first', $options);
		}
		$transportTypes = $this->TransportRouteSpecification->TransportType->find('list');
		$this->set(compact('transportTypes'));
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
		$this->TransportRouteSpecification->id = $id;
		if (!$this->TransportRouteSpecification->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport route specification')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportRouteSpecification->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport route specification')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport route specification')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
	
	public function ajaxtrroutespecification($id = null) {
		$this->layout = 'ajax';
		$id = $this->params->query['transportId'];
		$options = array('conditions' => array('TransportRouteSpecification.transport_type_id' => $id),'order'=>'TransportRouteSpecification.name ASC');
		$this->set('transportRouteSpecifications', $this->TransportRouteSpecification->find('list', $options));
		
	}
}
