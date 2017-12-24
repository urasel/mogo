<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * CountryCurrencies Controller
 *
 * @property CountryCurrency $CountryCurrency
 * @property PaginatorComponent $Paginator
 */
class CountryCurrenciesController extends GeneralAppController {

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
		$this->CountryCurrency->recursive = 0;
		$this->set('countryCurrencies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CountryCurrency->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country currency')));
		}
		$options = array('conditions' => array('CountryCurrency.' . $this->CountryCurrency->primaryKey => $id));
		$this->set('countryCurrency', $this->CountryCurrency->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CountryCurrency->create();
			if ($this->CountryCurrency->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country currency')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryCurrency->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country currency')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryCurrency->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CountryCurrency->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country currency')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryCurrency->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country currency')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country currency')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryCurrency.' . $this->CountryCurrency->primaryKey => $id));
			$this->request->data = $this->CountryCurrency->find('first', $options);
		}
		$countries = $this->CountryCurrency->Country->find('list');
		$this->set(compact('countries'));
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
		$this->CountryCurrency->id = $id;
		if (!$this->CountryCurrency->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country currency')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryCurrency->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country currency')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country currency')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CountryCurrency->recursive = 0;
		$this->set('countryCurrencies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CountryCurrency->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country currency')));
		}
		$options = array('conditions' => array('CountryCurrency.' . $this->CountryCurrency->primaryKey => $id));
		$this->set('countryCurrency', $this->CountryCurrency->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CountryCurrency->create();
			if ($this->CountryCurrency->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country currency')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryCurrency->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country currency')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryCurrency->Country->find('list');
		$this->set(compact('countries'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->CountryCurrency->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country currency')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryCurrency->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country currency')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country currency')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryCurrency.' . $this->CountryCurrency->primaryKey => $id));
			$this->request->data = $this->CountryCurrency->find('first', $options);
		}
		$countries = $this->CountryCurrency->Country->find('list');
		$this->set(compact('countries'));
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
		$this->CountryCurrency->id = $id;
		if (!$this->CountryCurrency->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country currency')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryCurrency->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country currency')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country currency')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
