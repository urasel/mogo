<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportServiceProviders Controller
 *
 * @property TransportServiceProvider $TransportServiceProvider
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportServiceProvidersController extends InformationAppController {

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
		$this->TransportServiceProvider->recursive = 0;
		$this->set('transportServiceProviders', $this->paginate());
	}
	
	public function ajaxtrserviceprovider($id = null) {
		$this->layout = 'ajax';
		$id = $this->params->query['transportId'];
		$options = array('conditions' => array('TransportServiceProvider.transport_type_id' => $id),'order'=>'TransportServiceProvider.name ASC');
		$this->set('transportServiceProviders', $this->TransportServiceProvider->find('list', $options));
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportServiceProvider->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service provider')));
		}
		$options = array('conditions' => array('TransportServiceProvider.' . $this->TransportServiceProvider->primaryKey => $id));
		$this->set('transportServiceProvider', $this->TransportServiceProvider->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportServiceProvider->create();
			if ($this->TransportServiceProvider->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service provider')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportServiceProvider->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service provider')), 'default', array('class' => 'error'));
			}
		}
		$transportTypes = $this->TransportServiceProvider->TransportType->find('list');
		$points = $this->TransportServiceProvider->Point->find('list');
		$placeTypes = $this->TransportServiceProvider->PlaceType->find('list');
		$this->set(compact('transportTypes', 'points', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportServiceProvider->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service provider')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportServiceProvider->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service provider')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service provider')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportServiceProvider.' . $this->TransportServiceProvider->primaryKey => $id));
			$this->request->data = $this->TransportServiceProvider->find('first', $options);
		}
		$transportTypes = $this->TransportServiceProvider->TransportType->find('list');
		$points = $this->TransportServiceProvider->Point->find('list');
		$placeTypes = $this->TransportServiceProvider->PlaceType->find('list');
		$this->set(compact('transportTypes', 'points', 'placeTypes'));
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
		$this->TransportServiceProvider->id = $id;
		if (!$this->TransportServiceProvider->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service provider')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportServiceProvider->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport service provider')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport service provider')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportServiceProvider->recursive = 0;
		$this->set('transportServiceProviders', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportServiceProvider->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service provider')));
		}
		$options = array('conditions' => array('TransportServiceProvider.' . $this->TransportServiceProvider->primaryKey => $id));
		$this->set('transportServiceProvider', $this->TransportServiceProvider->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TransportServiceProvider->create();
			if ($this->TransportServiceProvider->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service provider')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportServiceProvider->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service provider')), 'default', array('class' => 'error'));
			}
		}
		$transportTypes = $this->TransportServiceProvider->TransportType->find('list');
		//$points = $this->TransportServiceProvider->Point->find('list');
		$placeTypes = $this->TransportServiceProvider->PlaceType->find('list');
		$this->set(compact('transportTypes', 'placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TransportServiceProvider->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service provider')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportServiceProvider->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport service provider')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport service provider')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportServiceProvider.' . $this->TransportServiceProvider->primaryKey => $id));
			$this->request->data = $this->TransportServiceProvider->find('first', $options);
		}
		$transportTypes = $this->TransportServiceProvider->TransportType->find('list');
		//$points = $this->TransportServiceProvider->Point->find('list');
		$placeTypes = $this->TransportServiceProvider->PlaceType->find('list');
		$this->set(compact('transportTypes','placeTypes'));
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
		$this->TransportServiceProvider->id = $id;
		if (!$this->TransportServiceProvider->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport service provider')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportServiceProvider->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport service provider')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport service provider')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
