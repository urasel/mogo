<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * SessionTables Controller
 *
 * @property SessionTable $SessionTable
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SessionTablesController extends InformationAppController {

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
		$this->SessionTable->recursive = 0;
		$this->set('sessionTables', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SessionTable->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'session table')));
		}
		$options = array('conditions' => array('SessionTable.' . $this->SessionTable->primaryKey => $id));
		$this->set('sessionTable', $this->SessionTable->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SessionTable->create();
			if ($this->SessionTable->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'session table')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->SessionTable->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'session table')), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SessionTable->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'session table')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SessionTable->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'session table')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'session table')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('SessionTable.' . $this->SessionTable->primaryKey => $id));
			$this->request->data = $this->SessionTable->find('first', $options);
		}
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
		$this->SessionTable->id = $id;
		if (!$this->SessionTable->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'session table')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SessionTable->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Session table')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Session table')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->SessionTable->recursive = 0;
		$this->set('sessionTables', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->SessionTable->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'session table')));
		}
		$options = array('conditions' => array('SessionTable.' . $this->SessionTable->primaryKey => $id));
		$this->set('sessionTable', $this->SessionTable->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->SessionTable->create();
			if ($this->SessionTable->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'session table')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->SessionTable->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'session table')), 'default', array('class' => 'error'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->SessionTable->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'session table')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->SessionTable->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'session table')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'session table')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('SessionTable.' . $this->SessionTable->primaryKey => $id));
			$this->request->data = $this->SessionTable->find('first', $options);
		}
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
		$this->SessionTable->id = $id;
		if (!$this->SessionTable->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'session table')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->SessionTable->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Session table')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Session table')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
