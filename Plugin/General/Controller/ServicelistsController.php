<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * Servicelists Controller
 *
 * @property Servicelist $Servicelist
 * @property PaginatorComponent $Paginator
 */
class ServicelistsController extends GeneralAppController {

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
		$this->Servicelist->recursive = 0;
		$this->set('servicelists', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Servicelist->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'servicelist')));
		}
		$options = array('conditions' => array('Servicelist.' . $this->Servicelist->primaryKey => $id));
		$this->set('servicelist', $this->Servicelist->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Servicelist->create();
			if ($this->Servicelist->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'servicelist')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Servicelist->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'servicelist')), 'default', array('class' => 'error'));
			}
		}
		$services = $this->Servicelist->Service->find('list');
		$this->set(compact('services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Servicelist->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'servicelist')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Servicelist->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'servicelist')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'servicelist')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Servicelist.' . $this->Servicelist->primaryKey => $id));
			$this->request->data = $this->Servicelist->find('first', $options);
		}
		$services = $this->Servicelist->Service->find('list');
		$this->set(compact('services'));
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
		$this->Servicelist->id = $id;
		if (!$this->Servicelist->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'servicelist')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Servicelist->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Servicelist')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Servicelist')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Servicelist->recursive = 0;
		$this->set('servicelists', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Servicelist->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'servicelist')));
		}
		$options = array('conditions' => array('Servicelist.' . $this->Servicelist->primaryKey => $id));
		$this->set('servicelist', $this->Servicelist->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Servicelist->create();
			if ($this->Servicelist->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'servicelist')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Servicelist->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'servicelist')), 'default', array('class' => 'error'));
			}
		}
		$services = $this->Servicelist->Service->find('list');
		$this->set(compact('services'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Servicelist->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'servicelist')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Servicelist->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'servicelist')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'servicelist')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Servicelist.' . $this->Servicelist->primaryKey => $id));
			$this->request->data = $this->Servicelist->find('first', $options);
		}
		$services = $this->Servicelist->Service->find('list');
		$this->set(compact('services'));
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
		$this->Servicelist->id = $id;
		if (!$this->Servicelist->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'servicelist')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Servicelist->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Servicelist')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Servicelist')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
