<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * BloodNewsDetails Controller
 *
 * @property BloodNewsDetail $BloodNewsDetail
 * @property PaginatorComponent $Paginator
 */
class BloodNewsDetailsController extends InformationAppController {

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
		$this->BloodNewsDetail->recursive = 0;
		$this->set('bloodNewsDetails', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BloodNewsDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news detail')));
		}
		$options = array('conditions' => array('BloodNewsDetail.' . $this->BloodNewsDetail->primaryKey => $id));
		$this->set('bloodNewsDetail', $this->BloodNewsDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BloodNewsDetail->create();
			if ($this->BloodNewsDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodNewsDetail->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news detail')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->BloodNewsDetail->Language->find('list');
		$bloodNews = $this->BloodNewsDetail->BloodNews->find('list');
		$this->set(compact('languages', 'bloodNews'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BloodNewsDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news detail')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodNewsDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news detail')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodNewsDetail.' . $this->BloodNewsDetail->primaryKey => $id));
			$this->request->data = $this->BloodNewsDetail->find('first', $options);
		}
		$languages = $this->BloodNewsDetail->Language->find('list');
		$bloodNews = $this->BloodNewsDetail->BloodNews->find('list');
		$this->set(compact('languages', 'bloodNews'));
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
		$this->BloodNewsDetail->id = $id;
		if (!$this->BloodNewsDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news detail')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodNewsDetail->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood news detail')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood news detail')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BloodNewsDetail->recursive = 0;
		$this->set('bloodNewsDetails', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BloodNewsDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news detail')));
		}
		$options = array('conditions' => array('BloodNewsDetail.' . $this->BloodNewsDetail->primaryKey => $id));
		$this->set('bloodNewsDetail', $this->BloodNewsDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BloodNewsDetail->create();
			if ($this->BloodNewsDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodNewsDetail->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news detail')), 'default', array('class' => 'error'));
			}
		}
		$languages = $this->BloodNewsDetail->Language->find('list');
		$bloodNews = $this->BloodNewsDetail->BloodNews->find('list');
		$this->set(compact('languages', 'bloodNews'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BloodNewsDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news detail')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodNewsDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood news detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood news detail')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodNewsDetail.' . $this->BloodNewsDetail->primaryKey => $id));
			$this->request->data = $this->BloodNewsDetail->find('first', $options);
		}
		$languages = $this->BloodNewsDetail->Language->find('list');
		$bloodNews = $this->BloodNewsDetail->BloodNews->find('list');
		$this->set(compact('languages', 'bloodNews'));
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
		$this->BloodNewsDetail->id = $id;
		if (!$this->BloodNewsDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood news detail')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodNewsDetail->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood news detail')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood news detail')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
