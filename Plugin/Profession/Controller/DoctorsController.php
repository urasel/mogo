<?php
App::uses('ProfessionAppController', 'Profession.Controller');
/**
 * Doctors Controller
 *
 * @property Doctor $Doctor
 * @property PaginatorComponent $Paginator
 */
class DoctorsController extends ProfessionAppController {

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
		$this->Doctor->recursive = 0;
		$this->set('doctors', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('profession', 'doctor')));
		}
		$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
		$this->set('doctor', $this->Doctor->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Doctor->create();
			if ($this->Doctor->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('profession', 'doctor')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Doctor->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('profession', 'doctor')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Doctor->Point->find('list');
		$hospitals = $this->Doctor->Hospital->find('list');
		$sexes = $this->Doctor->Sex->find('list');
		$religions = $this->Doctor->Religion->find('list');
		$doctorSpecializations = $this->Doctor->DoctorSpecialization->find('list');
		$doctorExpertises = $this->Doctor->DoctorExpertise->find('list');
		$this->set(compact('points', 'hospitals', 'sexes', 'religions', 'doctorSpecializations', 'doctorExpertises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('profession', 'doctor')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Doctor->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('profession', 'doctor')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('profession', 'doctor')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		$points = $this->Doctor->Point->find('list');
		$hospitals = $this->Doctor->Hospital->find('list');
		$sexes = $this->Doctor->Sex->find('list');
		$religions = $this->Doctor->Religion->find('list');
		$doctorSpecializations = $this->Doctor->DoctorSpecialization->find('list');
		$doctorExpertises = $this->Doctor->DoctorExpertise->find('list');
		$this->set(compact('points', 'hospitals', 'sexes', 'religions', 'doctorSpecializations', 'doctorExpertises'));
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
		$this->Doctor->id = $id;
		if (!$this->Doctor->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('profession', 'doctor')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Doctor->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('profession', 'Doctor')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('profession', 'Doctor')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Doctor->recursive = 0;
		$this->set('doctors', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('profession', 'doctor')));
		}
		$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
		$this->set('doctor', $this->Doctor->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Doctor->create();
			if ($this->Doctor->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('profession', 'doctor')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Doctor->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('profession', 'doctor')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->Doctor->Point->find('list');
		$hospitals = $this->Doctor->Hospital->find('list');
		$sexes = $this->Doctor->Sex->find('list');
		$religions = $this->Doctor->Religion->find('list');
		$doctorSpecializations = $this->Doctor->DoctorSpecialization->find('list');
		$doctorExpertises = $this->Doctor->DoctorExpertise->find('list');
		$this->set(compact('points', 'hospitals', 'sexes', 'religions', 'doctorSpecializations', 'doctorExpertises'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Doctor->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('profession', 'doctor')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Doctor->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('profession', 'doctor')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('profession', 'doctor')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Doctor.' . $this->Doctor->primaryKey => $id));
			$this->request->data = $this->Doctor->find('first', $options);
		}
		$points = $this->Doctor->Point->find('list');
		$hospitals = $this->Doctor->Hospital->find('list');
		$sexes = $this->Doctor->Sex->find('list');
		$religions = $this->Doctor->Religion->find('list');
		$doctorSpecializations = $this->Doctor->DoctorSpecialization->find('list');
		$doctorExpertises = $this->Doctor->DoctorExpertise->find('list');
		$this->set(compact('points', 'hospitals', 'sexes', 'religions', 'doctorSpecializations', 'doctorExpertises'));
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
		$this->Doctor->id = $id;
		if (!$this->Doctor->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('profession', 'doctor')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Doctor->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('profession', 'Doctor')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('profession', 'Doctor')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
