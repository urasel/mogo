<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * HospitalImages Controller
 *
 * @property HospitalImage $HospitalImage
 * @property PaginatorComponent $Paginator
 */
class HospitalImagesController extends LocationAppController {

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
		$this->HospitalImage->recursive = 0;
		$this->set('hospitalImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital image')));
		}
		$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
		$this->set('hospitalImage', $this->HospitalImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HospitalImage->create();
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HospitalImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
			$this->request->data = $this->HospitalImage->find('first', $options);
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
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
		$this->HospitalImage->id = $id;
		if (!$this->HospitalImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HospitalImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hospital image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hospital image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HospitalImage->recursive = 0;
		$this->set('hospitalImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital image')));
		}
		$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
		$this->set('hospitalImage', $this->HospitalImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HospitalImage->create();
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HospitalImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->HospitalImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HospitalImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hospital image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hospital image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HospitalImage.' . $this->HospitalImage->primaryKey => $id));
			$this->request->data = $this->HospitalImage->find('first', $options);
		}
		$points = $this->HospitalImage->Point->find('list');
		$this->set(compact('points'));
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
		$this->HospitalImage->id = $id;
		if (!$this->HospitalImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hospital image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HospitalImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hospital image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hospital image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
