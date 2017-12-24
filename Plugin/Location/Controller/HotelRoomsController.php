<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * HotelRooms Controller
 *
 * @property HotelRoom $HotelRoom
 * @property PaginatorComponent $Paginator
 */
class HotelRoomsController extends LocationAppController {

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
		$this->HotelRoom->recursive = 0;
		$this->set('hotelRooms', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotelRoom->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel room')));
		}
		$options = array('conditions' => array('HotelRoom.' . $this->HotelRoom->primaryKey => $id));
		$this->set('hotelRoom', $this->HotelRoom->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HotelRoom->create();
			if ($this->HotelRoom->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel room')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelRoom->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel room')), 'default', array('class' => 'error'));
			}
		}
		$hotels = $this->HotelRoom->Hotel->find('list');
		$hotelRoomCategories = $this->HotelRoom->HotelRoomCategory->find('list');
		$this->set(compact('hotels', 'hotelRoomCategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HotelRoom->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel room')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelRoom->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel room')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel room')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelRoom.' . $this->HotelRoom->primaryKey => $id));
			$this->request->data = $this->HotelRoom->find('first', $options);
		}
		$hotels = $this->HotelRoom->Hotel->find('list');
		$hotelRoomCategories = $this->HotelRoom->HotelRoomCategory->find('list');
		$this->set(compact('hotels', 'hotelRoomCategories'));
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
		$this->HotelRoom->id = $id;
		if (!$this->HotelRoom->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel room')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelRoom->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hotel room')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hotel room')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HotelRoom->recursive = 0;
		$this->set('hotelRooms', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HotelRoom->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel room')));
		}
		$options = array('conditions' => array('HotelRoom.' . $this->HotelRoom->primaryKey => $id));
		$this->set('hotelRoom', $this->HotelRoom->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HotelRoom->create();
			if ($this->HotelRoom->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel room')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelRoom->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel room')), 'default', array('class' => 'error'));
			}
		}
		$hotels = $this->HotelRoom->Hotel->find('list');
		$hotelRoomCategories = $this->HotelRoom->HotelRoomCategory->find('list');
		$this->set(compact('hotels', 'hotelRoomCategories'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->HotelRoom->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel room')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelRoom->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel room')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel room')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelRoom.' . $this->HotelRoom->primaryKey => $id));
			$this->request->data = $this->HotelRoom->find('first', $options);
		}
		$hotels = $this->HotelRoom->Hotel->find('list');
		$hotelRoomCategories = $this->HotelRoom->HotelRoomCategory->find('list');
		$this->set(compact('hotels', 'hotelRoomCategories'));
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
		$this->HotelRoom->id = $id;
		if (!$this->HotelRoom->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel room')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelRoom->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hotel room')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hotel room')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
