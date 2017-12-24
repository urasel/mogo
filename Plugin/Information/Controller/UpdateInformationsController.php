<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * UpdateInformations Controller
 *
 * @property UpdateInformation $UpdateInformation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UpdateInformationsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');
	
	public function beforeFilter() {
		$this->Security->unlockedActions = array('add');
		if ($this->action == 'add') {
			$this->Security->csrfCheck = false;
			$this->Security->validatePost = false;
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UpdateInformation->recursive = 0;
		$this->set('updateInformations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UpdateInformation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'update information')));
		}
		$options = array('conditions' => array('UpdateInformation.' . $this->UpdateInformation->primaryKey => $id));
		$this->set('updateInformation', $this->UpdateInformation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		//debug($this->request->query);exit;
		$class = $this->request->query['a'];
		$itemname = $this->request->query['b'];
		$itemid = $this->request->query['c'];
		if ($this->request->is('post')) {
			$this->UpdateInformation->create();
			//debug($this->request->data);exit;
			$userData = $this->Session->read('Auth.User');
			$userID = $userData['id'];
			$stringlength = strlen($this->request->data['UpdateInformation']['itemname']);
			$cutlength = strlen($stringlength);
			$combindedID = $this->request->data['UpdateInformation']['itemid'];
			$passcounter = substr($this->request->data['UpdateInformation']['itemid'],0,$cutlength);
			if($passcounter != $stringlength){
				throw new NotFoundException(__('Invalid Item'));
			}
			$id = substr($combindedID,$cutlength);
			unset($this->request->data['UpdateInformation']['itemname']);
			$this->request->data['UpdateInformation']['itemid'] = $id;
			$this->request->data['UpdateInformation']['user_id'] = $userID;
			if ($this->UpdateInformation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'update information')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => '/');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->UpdateInformation->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'update information')), 'default', array('class' => 'error'));
			}
		}
		$this->set(compact('class','itemname','itemid'));
		$users = $this->UpdateInformation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->UpdateInformation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'update information')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UpdateInformation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'update information')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'update information')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('UpdateInformation.' . $this->UpdateInformation->primaryKey => $id));
			$this->request->data = $this->UpdateInformation->find('first', $options);
		}
		$users = $this->UpdateInformation->User->find('list');
		$this->set(compact('users'));
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
		$this->UpdateInformation->id = $id;
		if (!$this->UpdateInformation->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'update information')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UpdateInformation->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Update information')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Update information')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UpdateInformation->recursive = 0;
		$this->set('updateInformations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UpdateInformation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'update information')));
		}
		$options = array('conditions' => array('UpdateInformation.' . $this->UpdateInformation->primaryKey => $id));
		$this->set('updateInformation', $this->UpdateInformation->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UpdateInformation->create();
			if ($this->UpdateInformation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'update information')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->UpdateInformation->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'update information')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->UpdateInformation->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UpdateInformation->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'update information')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UpdateInformation->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'update information')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'update information')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('UpdateInformation.' . $this->UpdateInformation->primaryKey => $id));
			$this->request->data = $this->UpdateInformation->find('first', $options);
		}
		$users = $this->UpdateInformation->User->find('list');
		$this->set(compact('users'));
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
		$this->UpdateInformation->id = $id;
		if (!$this->UpdateInformation->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'update information')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UpdateInformation->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Update information')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Update information')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
