<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * ProfessionalDegrees Controller
 *
 * @property ProfessionalDegree $ProfessionalDegree
 * @property PaginatorComponent $Paginator
 */
class ProfessionalDegreesController extends GeneralAppController {

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
		$this->ProfessionalDegree->recursive = 0;
		$this->set('professionalDegrees', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProfessionalDegree->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional degree')));
		}
		$options = array('conditions' => array('ProfessionalDegree.' . $this->ProfessionalDegree->primaryKey => $id));
		$this->set('professionalDegree', $this->ProfessionalDegree->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProfessionalDegree->create();
			if ($this->ProfessionalDegree->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional degree')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->ProfessionalDegree->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional degree')), 'default', array('class' => 'error'));
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
		if (!$this->ProfessionalDegree->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional degree')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProfessionalDegree->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional degree')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional degree')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ProfessionalDegree.' . $this->ProfessionalDegree->primaryKey => $id));
			$this->request->data = $this->ProfessionalDegree->find('first', $options);
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
		$this->ProfessionalDegree->id = $id;
		if (!$this->ProfessionalDegree->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional degree')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfessionalDegree->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Professional degree')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Professional degree')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProfessionalDegree->recursive = 0;
		$this->set('professionalDegrees', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProfessionalDegree->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional degree')));
		}
		$options = array('conditions' => array('ProfessionalDegree.' . $this->ProfessionalDegree->primaryKey => $id));
		$this->set('professionalDegree', $this->ProfessionalDegree->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProfessionalDegree->create();
			if ($this->ProfessionalDegree->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional degree')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->ProfessionalDegree->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional degree')), 'default', array('class' => 'error'));
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
		if (!$this->ProfessionalDegree->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional degree')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProfessionalDegree->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional degree')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional degree')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ProfessionalDegree.' . $this->ProfessionalDegree->primaryKey => $id));
			$this->request->data = $this->ProfessionalDegree->find('first', $options);
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
		$this->ProfessionalDegree->id = $id;
		if (!$this->ProfessionalDegree->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional degree')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfessionalDegree->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Professional degree')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Professional degree')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
