<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * BloodDonationRecords Controller
 *
 * @property BloodDonationRecord $BloodDonationRecord
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BloodDonationRecordsController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BloodDonationRecord->recursive = 0;
		$this->set('bloodDonationRecords', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BloodDonationRecord->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donation record')));
		}
		$options = array('conditions' => array('BloodDonationRecord.' . $this->BloodDonationRecord->primaryKey => $id));
		$this->set('bloodDonationRecord', $this->BloodDonationRecord->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BloodDonationRecord->create();
			if ($this->BloodDonationRecord->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donation record')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodDonationRecord->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donation record')), 'default', array('class' => 'error'));
			}
		}
		$bloodDonars = $this->BloodDonationRecord->BloodDonar->find('list');
		$this->set(compact('bloodDonars'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BloodDonationRecord->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donation record')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodDonationRecord->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donation record')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donation record')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodDonationRecord.' . $this->BloodDonationRecord->primaryKey => $id));
			$this->request->data = $this->BloodDonationRecord->find('first', $options);
		}
		$bloodDonars = $this->BloodDonationRecord->BloodDonar->find('list');
		$this->set(compact('bloodDonars'));
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
		$this->BloodDonationRecord->id = $id;
		if (!$this->BloodDonationRecord->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donation record')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodDonationRecord->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood donation record')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood donation record')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->BloodDonationRecord->recursive = 0;
		$this->set('bloodDonationRecords', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->BloodDonationRecord->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donation record')));
		}
		$options = array('conditions' => array('BloodDonationRecord.' . $this->BloodDonationRecord->primaryKey => $id));
		$this->set('bloodDonationRecord', $this->BloodDonationRecord->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->BloodDonationRecord->create();
			if ($this->BloodDonationRecord->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donation record')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->BloodDonationRecord->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donation record')), 'default', array('class' => 'error'));
			}
		}
		$bloodDonars = $this->BloodDonationRecord->BloodDonar->find('list');
		$this->set(compact('bloodDonars'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->BloodDonationRecord->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donation record')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BloodDonationRecord->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'blood donation record')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'blood donation record')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('BloodDonationRecord.' . $this->BloodDonationRecord->primaryKey => $id));
			$this->request->data = $this->BloodDonationRecord->find('first', $options);
		}
		$bloodDonars = $this->BloodDonationRecord->BloodDonar->find('list');
		$this->set(compact('bloodDonars'));
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
		$this->BloodDonationRecord->id = $id;
		if (!$this->BloodDonationRecord->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'blood donation record')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BloodDonationRecord->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Blood donation record')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Blood donation record')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
