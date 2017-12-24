<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * DoctorExpertises Controller
 *
 * @property DoctorExpertise $DoctorExpertise
 * @property PaginatorComponent $Paginator
 */
class DoctorExpertisesController extends GeneralAppController {

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
		$this->DoctorExpertise->recursive = 0;
		$this->set('doctorExpertises', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DoctorExpertise->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor expertise')));
		}
		$options = array('conditions' => array('DoctorExpertise.' . $this->DoctorExpertise->primaryKey => $id));
		$this->set('doctorExpertise', $this->DoctorExpertise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DoctorExpertise->create();
			if ($this->DoctorExpertise->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor expertise')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->DoctorExpertise->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor expertise')), 'default', array('class' => 'error'));
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
		if (!$this->DoctorExpertise->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor expertise')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DoctorExpertise->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor expertise')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor expertise')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('DoctorExpertise.' . $this->DoctorExpertise->primaryKey => $id));
			$this->request->data = $this->DoctorExpertise->find('first', $options);
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
		$this->DoctorExpertise->id = $id;
		if (!$this->DoctorExpertise->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor expertise')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DoctorExpertise->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Doctor expertise')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Doctor expertise')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->DoctorExpertise->recursive = 0;
		$this->set('doctorExpertises', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->DoctorExpertise->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor expertise')));
		}
		$options = array('conditions' => array('DoctorExpertise.' . $this->DoctorExpertise->primaryKey => $id));
		$this->set('doctorExpertise', $this->DoctorExpertise->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->DoctorExpertise->create();
			if ($this->DoctorExpertise->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor expertise')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->DoctorExpertise->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor expertise')), 'default', array('class' => 'error'));
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
		if (!$this->DoctorExpertise->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor expertise')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->DoctorExpertise->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'doctor expertise')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'doctor expertise')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('DoctorExpertise.' . $this->DoctorExpertise->primaryKey => $id));
			$this->request->data = $this->DoctorExpertise->find('first', $options);
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
		$this->DoctorExpertise->id = $id;
		if (!$this->DoctorExpertise->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'doctor expertise')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->DoctorExpertise->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Doctor expertise')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Doctor expertise')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
