<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * HotelExtraFacilities Controller
 *
 * @property HotelExtraFacility $HotelExtraFacility
 * @property PaginatorComponent $Paginator
 */
class HotelExtraFacilitiesController extends GeneralAppController {

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
		$this->HotelExtraFacility->recursive = 0;
		$this->set('hotelExtraFacilities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotelExtraFacility->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel extra facility')));
		}
		$options = array('conditions' => array('HotelExtraFacility.' . $this->HotelExtraFacility->primaryKey => $id));
		$this->set('hotelExtraFacility', $this->HotelExtraFacility->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HotelExtraFacility->create();
			if ($this->HotelExtraFacility->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel extra facility')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelExtraFacility->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel extra facility')), 'default', array('class' => 'error'));
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
		if (!$this->HotelExtraFacility->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel extra facility')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelExtraFacility->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel extra facility')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel extra facility')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelExtraFacility.' . $this->HotelExtraFacility->primaryKey => $id));
			$this->request->data = $this->HotelExtraFacility->find('first', $options);
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
		$this->HotelExtraFacility->id = $id;
		if (!$this->HotelExtraFacility->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel extra facility')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelExtraFacility->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Hotel extra facility')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Hotel extra facility')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HotelExtraFacility->recursive = 0;
		$this->set('hotelExtraFacilities', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HotelExtraFacility->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel extra facility')));
		}
		$options = array('conditions' => array('HotelExtraFacility.' . $this->HotelExtraFacility->primaryKey => $id));
		$this->set('hotelExtraFacility', $this->HotelExtraFacility->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HotelExtraFacility->create();
			if ($this->HotelExtraFacility->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel extra facility')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelExtraFacility->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel extra facility')), 'default', array('class' => 'error'));
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
		if (!$this->HotelExtraFacility->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel extra facility')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelExtraFacility->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel extra facility')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel extra facility')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelExtraFacility.' . $this->HotelExtraFacility->primaryKey => $id));
			$this->request->data = $this->HotelExtraFacility->find('first', $options);
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
		$this->HotelExtraFacility->id = $id;
		if (!$this->HotelExtraFacility->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel extra facility')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelExtraFacility->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Hotel extra facility')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Hotel extra facility')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
