<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * ProfessionalStudies Controller
 *
 * @property ProfessionalStudy $ProfessionalStudy
 * @property PaginatorComponent $Paginator
 */
class ProfessionalStudiesController extends GeneralAppController {

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
		$this->ProfessionalStudy->recursive = 0;
		$this->set('professionalStudies', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProfessionalStudy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional study')));
		}
		$options = array('conditions' => array('ProfessionalStudy.' . $this->ProfessionalStudy->primaryKey => $id));
		$this->set('professionalStudy', $this->ProfessionalStudy->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProfessionalStudy->create();
			if ($this->ProfessionalStudy->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional study')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->ProfessionalStudy->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional study')), 'default', array('class' => 'error'));
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
		if (!$this->ProfessionalStudy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional study')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProfessionalStudy->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional study')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional study')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ProfessionalStudy.' . $this->ProfessionalStudy->primaryKey => $id));
			$this->request->data = $this->ProfessionalStudy->find('first', $options);
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
		$this->ProfessionalStudy->id = $id;
		if (!$this->ProfessionalStudy->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional study')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfessionalStudy->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Professional study')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Professional study')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->ProfessionalStudy->recursive = 0;
		$this->set('professionalStudies', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ProfessionalStudy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional study')));
		}
		$options = array('conditions' => array('ProfessionalStudy.' . $this->ProfessionalStudy->primaryKey => $id));
		$this->set('professionalStudy', $this->ProfessionalStudy->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProfessionalStudy->create();
			if ($this->ProfessionalStudy->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional study')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->ProfessionalStudy->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional study')), 'default', array('class' => 'error'));
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
		if (!$this->ProfessionalStudy->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional study')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProfessionalStudy->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'professional study')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'professional study')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('ProfessionalStudy.' . $this->ProfessionalStudy->primaryKey => $id));
			$this->request->data = $this->ProfessionalStudy->find('first', $options);
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
		$this->ProfessionalStudy->id = $id;
		if (!$this->ProfessionalStudy->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'professional study')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProfessionalStudy->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Professional study')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Professional study')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
