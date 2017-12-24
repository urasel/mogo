<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * DoctorSpecializations Controller
 *
 * @property DoctorSpecialization $DoctorSpecialization
 * @property PaginatorComponent $Paginator
 */
class DoctorSpecializationsController extends GeneralAppController {

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
		$this->DoctorSpecialization->recursive = 0;
		$this->set('doctorSpecializations', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DoctorSpecialization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor specialization')));
		}
		$options = array('conditions' => array('DoctorSpecialization.' . $this->DoctorSpecialization->primaryKey => $id));
		$this->set('doctorSpecialization', $this->DoctorSpecialization->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DoctorSpecialization->create();
			if ($this->DoctorSpecialization->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor specialization')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->DoctorSpecialization->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor specialization')), 'default', array('class' => 'error'));
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
		if (!$this->DoctorSpecialization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor specialization')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DoctorSpecialization->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor specialization')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor specialization')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('DoctorSpecialization.' . $this->DoctorSpecialization->primaryKey => $id));
			$this->request->data = $this->DoctorSpecialization->find('first', $options);
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
		$this->DoctorSpecialization->id = $id;
		if (!$this->DoctorSpecialization->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor specialization')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DoctorSpecialization->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Doctor specialization')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Doctor specialization')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DoctorSpecialization->recursive = 0;
		$this->set('doctorSpecializations', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DoctorSpecialization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor specialization')));
		}
		$options = array('conditions' => array('DoctorSpecialization.' . $this->DoctorSpecialization->primaryKey => $id));
		$this->set('doctorSpecialization', $this->DoctorSpecialization->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DoctorSpecialization->create();
			if ($this->DoctorSpecialization->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor specialization')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->DoctorSpecialization->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor specialization')), 'default', array('class' => 'error'));
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
		if (!$this->DoctorSpecialization->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor specialization')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DoctorSpecialization->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor specialization')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor specialization')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('DoctorSpecialization.' . $this->DoctorSpecialization->primaryKey => $id));
			$this->request->data = $this->DoctorSpecialization->find('first', $options);
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
		$this->DoctorSpecialization->id = $id;
		if (!$this->DoctorSpecialization->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor specialization')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DoctorSpecialization->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Doctor specialization')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Doctor specialization')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
