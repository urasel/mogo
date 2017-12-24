<?php
App::uses('GeneralAppController', 'General.Controller');
/**
 * HotelRoomCategories Controller
 *
 * @property HotelRoomCategory $HotelRoomCategory
 * @property PaginatorComponent $Paginator
 */
class HotelRoomCategoriesController extends GeneralAppController {

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
		$this->HotelRoomCategory->recursive = 0;
		$this->set('hotelRoomCategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotelRoomCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel room category')));
		}
		$options = array('conditions' => array('HotelRoomCategory.' . $this->HotelRoomCategory->primaryKey => $id));
		$this->set('hotelRoomCategory', $this->HotelRoomCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HotelRoomCategory->create();
			if ($this->HotelRoomCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel room category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelRoomCategory->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel room category')), 'default', array('class' => 'error'));
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
		if (!$this->HotelRoomCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel room category')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelRoomCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel room category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel room category')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelRoomCategory.' . $this->HotelRoomCategory->primaryKey => $id));
			$this->request->data = $this->HotelRoomCategory->find('first', $options);
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
		$this->HotelRoomCategory->id = $id;
		if (!$this->HotelRoomCategory->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel room category')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelRoomCategory->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Hotel room category')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Hotel room category')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HotelRoomCategory->recursive = 0;
		$this->set('hotelRoomCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HotelRoomCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel room category')));
		}
		$options = array('conditions' => array('HotelRoomCategory.' . $this->HotelRoomCategory->primaryKey => $id));
		$this->set('hotelRoomCategory', $this->HotelRoomCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HotelRoomCategory->create();
			if ($this->HotelRoomCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel room category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelRoomCategory->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel room category')), 'default', array('class' => 'error'));
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
		if (!$this->HotelRoomCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel room category')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelRoomCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('general', 'hotel room category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('general', 'hotel room category')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelRoomCategory.' . $this->HotelRoomCategory->primaryKey => $id));
			$this->request->data = $this->HotelRoomCategory->find('first', $options);
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
		$this->HotelRoomCategory->id = $id;
		if (!$this->HotelRoomCategory->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('general', 'hotel room category')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelRoomCategory->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('general', 'Hotel room category')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('general', 'Hotel room category')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
