<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * BdDistricts Controller
 *
 * @property BdDistrict $BdDistrict
 * @property PaginatorComponent $Paginator
 */
class BdDistrictsController extends GeneralAppController {

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
		$this->BdDistrict->recursive = 0;
		$this->set('bdDistricts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BdDistrict->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd district')));
		}
		$options = array('conditions' => array('BdDistrict.' . $this->BdDistrict->primaryKey => $id));
		$this->set('bdDistrict', $this->BdDistrict->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BdDistrict->create();
			if ($this->BdDistrict->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd district')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdDistrict->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd district')), 'default', array('class' => 'error'));
			}
		}
		$bdDivisions = $this->BdDistrict->BdDivision->find('list');
		$this->set(compact('bdDivisions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BdDistrict->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd district')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdDistrict->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd district')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd district')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdDistrict.' . $this->BdDistrict->primaryKey => $id));
			$this->request->data = $this->BdDistrict->find('first', $options);
		}
		$bdDivisions = $this->BdDistrict->BdDivision->find('list');
		$this->set(compact('bdDivisions'));
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
		$this->BdDistrict->id = $id;
		if (!$this->BdDistrict->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd district')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdDistrict->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd district')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd district')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BdDistrict->recursive = 0;
		$this->set('bdDistricts', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BdDistrict->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd district')));
		}
		$options = array('conditions' => array('BdDistrict.' . $this->BdDistrict->primaryKey => $id));
		$this->set('bdDistrict', $this->BdDistrict->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BdDistrict->create();
			if ($this->BdDistrict->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd district')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BdDistrict->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd district')), 'default', array('class' => 'error'));
			}
		}
		$bdDivisions = $this->BdDistrict->BdDivision->find('list');
		$this->set(compact('bdDivisions'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BdDistrict->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd district')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BdDistrict->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'bd district')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'bd district')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BdDistrict.' . $this->BdDistrict->primaryKey => $id));
			$this->request->data = $this->BdDistrict->find('first', $options);
		}
		$bdDivisions = $this->BdDistrict->BdDivision->find('list');
		$this->set(compact('bdDivisions'));
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
		$this->BdDistrict->id = $id;
		if (!$this->BdDistrict->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'bd district')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BdDistrict->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Bd district')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Bd district')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
