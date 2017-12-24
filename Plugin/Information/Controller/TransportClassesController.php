<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportClasses Controller
 *
 * @property TransportClass $TransportClass
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportClassesController extends InformationAppController {

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
		$this->TransportClass->recursive = 0;
		$this->set('transportClasses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportClass->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport class')));
		}
		$options = array('conditions' => array('TransportClass.' . $this->TransportClass->primaryKey => $id));
		$this->set('transportClass', $this->TransportClass->find('first', $options));
	}
	
	public function ajaxtrclass($id = null) {
		$this->layout = 'ajax';
		$id = $this->params->query['transportId'];
		$options = array('conditions' => array('TransportClass.transport_type_id' => $id),'order'=>'TransportClass.name ASC');
		$this->set('transportClasses', $this->TransportClass->find('list', $options));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportClass->create();
			if ($this->TransportClass->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport class')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportClass->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport class')), 'default', array('class' => 'error'));
			}
		}
		$transportTypes = $this->TransportClass->TransportType->find('list');
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
		if (!$this->TransportClass->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport class')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportClass->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport class')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport class')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportClass.' . $this->TransportClass->primaryKey => $id));
			$this->request->data = $this->TransportClass->find('first', $options);
		}
		$transportTypes = $this->TransportClass->TransportType->find('list');
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
		$this->TransportClass->id = $id;
		if (!$this->TransportClass->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport class')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportClass->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport class')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport class')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportClass->recursive = 0;
		$this->set('transportClasses', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportClass->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport class')));
		}
		$options = array('conditions' => array('TransportClass.' . $this->TransportClass->primaryKey => $id));
		$this->set('transportClass', $this->TransportClass->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TransportClass->create();
			if ($this->TransportClass->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport class')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportClass->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport class')), 'default', array('class' => 'error'));
			}
		}
		$transportTypes = $this->TransportClass->TransportType->find('list');
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
		if (!$this->TransportClass->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport class')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportClass->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport class')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport class')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportClass.' . $this->TransportClass->primaryKey => $id));
			$this->request->data = $this->TransportClass->find('first', $options);
		}
		$transportTypes = $this->TransportClass->TransportType->find('list');
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
		$this->TransportClass->id = $id;
		if (!$this->TransportClass->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport class')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportClass->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport class')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport class')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
