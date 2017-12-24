<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * CountryCities Controller
 *
 * @property CountryCity $CountryCity
 * @property PaginatorComponent $Paginator
 */
class CountryCitiesController extends GeneralAppController {

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
		$this->CountryCity->recursive = 0;
		$this->set('countryCities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CountryCity->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country city')));
		}
		$options = array('conditions' => array('CountryCity.' . $this->CountryCity->primaryKey => $id));
		$this->set('countryCity', $this->CountryCity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CountryCity->create();
			if ($this->CountryCity->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country city')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryCity->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country city')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryCity->Country->find('list');
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
		if (!$this->CountryCity->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country city')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryCity->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country city')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country city')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryCity.' . $this->CountryCity->primaryKey => $id));
			$this->request->data = $this->CountryCity->find('first', $options);
		}
		$countries = $this->CountryCity->Country->find('list');
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
		$this->CountryCity->id = $id;
		if (!$this->CountryCity->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country city')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryCity->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country city')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country city')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CountryCity->recursive = 0;
		$this->set('countryCities', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CountryCity->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country city')));
		}
		$options = array('conditions' => array('CountryCity.' . $this->CountryCity->primaryKey => $id));
		$this->set('countryCity', $this->CountryCity->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CountryCity->create();
			if ($this->CountryCity->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country city')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryCity->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country city')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryCity->Country->find('list');
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
		if (!$this->CountryCity->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country city')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryCity->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country city')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country city')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryCity.' . $this->CountryCity->primaryKey => $id));
			$this->request->data = $this->CountryCity->find('first', $options);
		}
		$countries = $this->CountryCity->Country->find('list');
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
		$this->CountryCity->id = $id;
		if (!$this->CountryCity->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country city')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryCity->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country city')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country city')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
