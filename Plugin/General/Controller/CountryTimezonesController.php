<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * CountryTimezones Controller
 *
 * @property CountryTimezone $CountryTimezone
 * @property PaginatorComponent $Paginator
 */
class CountryTimezonesController extends GeneralAppController {

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
		$this->CountryTimezone->recursive = 0;
		$this->set('countryTimezones', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CountryTimezone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country timezone')));
		}
		$options = array('conditions' => array('CountryTimezone.' . $this->CountryTimezone->primaryKey => $id));
		$this->set('countryTimezone', $this->CountryTimezone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CountryTimezone->create();
			if ($this->CountryTimezone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country timezone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryTimezone->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country timezone')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryTimezone->Country->find('list');
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
		if (!$this->CountryTimezone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country timezone')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryTimezone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country timezone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country timezone')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryTimezone.' . $this->CountryTimezone->primaryKey => $id));
			$this->request->data = $this->CountryTimezone->find('first', $options);
		}
		$countries = $this->CountryTimezone->Country->find('list');
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
		$this->CountryTimezone->id = $id;
		if (!$this->CountryTimezone->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country timezone')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryTimezone->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country timezone')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country timezone')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CountryTimezone->recursive = 0;
		$this->set('countryTimezones', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CountryTimezone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country timezone')));
		}
		$options = array('conditions' => array('CountryTimezone.' . $this->CountryTimezone->primaryKey => $id));
		$this->set('countryTimezone', $this->CountryTimezone->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CountryTimezone->create();
			if ($this->CountryTimezone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country timezone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryTimezone->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country timezone')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryTimezone->Country->find('list');
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
		if (!$this->CountryTimezone->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country timezone')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryTimezone->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country timezone')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country timezone')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryTimezone.' . $this->CountryTimezone->primaryKey => $id));
			$this->request->data = $this->CountryTimezone->find('first', $options);
		}
		$countries = $this->CountryTimezone->Country->find('list');
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
		$this->CountryTimezone->id = $id;
		if (!$this->CountryTimezone->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country timezone')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryTimezone->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country timezone')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country timezone')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
