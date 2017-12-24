<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * CountryDetails Controller
 *
 * @property CountryDetail $CountryDetail
 * @property PaginatorComponent $Paginator
 */
class CountryDetailsController extends GeneralAppController {

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
		$this->CountryDetail->recursive = 0;
		$this->set('countryDetails', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CountryDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country detail')));
		}
		$options = array('conditions' => array('CountryDetail.' . $this->CountryDetail->primaryKey => $id));
		$this->set('countryDetail', $this->CountryDetail->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CountryDetail->create();
			if ($this->CountryDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryDetail->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country detail')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->CountryDetail->User->find('list');
		$countries = $this->CountryDetail->Country->find('list');
		$this->set(compact('users', 'countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CountryDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country detail')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country detail')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryDetail.' . $this->CountryDetail->primaryKey => $id));
			$this->request->data = $this->CountryDetail->find('first', $options);
		}
		$users = $this->CountryDetail->User->find('list');
		$countries = $this->CountryDetail->Country->find('list');
		$this->set(compact('users', 'countries'));
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
		$this->CountryDetail->id = $id;
		if (!$this->CountryDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country detail')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryDetail->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country detail')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country detail')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CountryDetail->recursive = 0;
		$this->set('countryDetails', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CountryDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country detail')));
		}
		$options = array('conditions' => array('CountryDetail.' . $this->CountryDetail->primaryKey => $id));
		$this->set('countryDetail', $this->CountryDetail->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CountryDetail->create();
			if ($this->CountryDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryDetail->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country detail')), 'default', array('class' => 'error'));
			}
		}
		$users = $this->CountryDetail->User->find('list');
		$countries = $this->CountryDetail->Country->find('list');
		$this->set(compact('users', 'countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CountryDetail->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country detail')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryDetail->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country detail')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country detail')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryDetail.' . $this->CountryDetail->primaryKey => $id));
			$this->request->data = $this->CountryDetail->find('first', $options);
		}
		$users = $this->CountryDetail->User->find('list');
		$countries = $this->CountryDetail->Country->find('list');
		$this->set(compact('users', 'countries'));
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
		$this->CountryDetail->id = $id;
		if (!$this->CountryDetail->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country detail')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryDetail->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country detail')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country detail')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
