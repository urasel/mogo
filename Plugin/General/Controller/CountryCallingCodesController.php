<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * CountryCallingCodes Controller
 *
 * @property CountryCallingCode $CountryCallingCode
 * @property PaginatorComponent $Paginator
 */
class CountryCallingCodesController extends GeneralAppController {

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
		$this->CountryCallingCode->recursive = 0;
		$this->set('countryCallingCodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CountryCallingCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country calling code')));
		}
		$options = array('conditions' => array('CountryCallingCode.' . $this->CountryCallingCode->primaryKey => $id));
		$this->set('countryCallingCode', $this->CountryCallingCode->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CountryCallingCode->create();
			if ($this->CountryCallingCode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country calling code')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryCallingCode->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country calling code')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryCallingCode->Country->find('list');
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
		if (!$this->CountryCallingCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country calling code')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryCallingCode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country calling code')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country calling code')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryCallingCode.' . $this->CountryCallingCode->primaryKey => $id));
			$this->request->data = $this->CountryCallingCode->find('first', $options);
		}
		$countries = $this->CountryCallingCode->Country->find('list');
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
		$this->CountryCallingCode->id = $id;
		if (!$this->CountryCallingCode->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country calling code')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryCallingCode->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country calling code')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country calling code')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->CountryCallingCode->recursive = 0;
		$this->set('countryCallingCodes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->CountryCallingCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country calling code')));
		}
		$options = array('conditions' => array('CountryCallingCode.' . $this->CountryCallingCode->primaryKey => $id));
		$this->set('countryCallingCode', $this->CountryCallingCode->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->CountryCallingCode->create();
			if ($this->CountryCallingCode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country calling code')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->CountryCallingCode->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country calling code')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->CountryCallingCode->Country->find('list');
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
		if (!$this->CountryCallingCode->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country calling code')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CountryCallingCode->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'country calling code')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'country calling code')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('CountryCallingCode.' . $this->CountryCallingCode->primaryKey => $id));
			$this->request->data = $this->CountryCallingCode->find('first', $options);
		}
		$countries = $this->CountryCallingCode->Country->find('list');
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
		$this->CountryCallingCode->id = $id;
		if (!$this->CountryCallingCode->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'country calling code')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CountryCallingCode->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Country calling code')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Country calling code')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
