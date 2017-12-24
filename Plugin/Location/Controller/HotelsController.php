<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * Hotels Controller
 *
 * @property Hotel $Hotel
 * @property PaginatorComponent $Paginator
 */
class HotelsController extends LocationAppController {

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
		$this->Hotel->recursive = 0;
		$this->set('hotels', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Hotel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel')));
		}
		$options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));
		$this->set('hotel', $this->Hotel->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Hotel->create();
			if ($this->Hotel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Hotel->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel')), 'default', array('class' => 'error'));
			}
		}
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
		$countries = $this->Hotel->Country->find('list');
		$zones = $this->Hotel->Zone->find('list');
		$this->set(compact('hotelCategories', 'countries', 'zones'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Hotel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hotel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));
			$this->request->data = $this->Hotel->find('first', $options);
		}
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
		$countries = $this->Hotel->Country->find('list');
		$zones = $this->Hotel->Zone->find('list');
		$this->set(compact('hotelCategories', 'countries', 'zones'));
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
		$this->Hotel->id = $id;
		if (!$this->Hotel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hotel->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hotel')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hotel')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Hotel->recursive = 0;
		$this->set('hotels', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Hotel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel')));
		}
		$options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));
		$this->set('hotel', $this->Hotel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Hotel->create();
			if ($this->Hotel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->Hotel->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel')), 'default', array('class' => 'error'));
			}
		}
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
		$countries = $this->Hotel->Country->find('list');
		$zones = $this->Hotel->Zone->find('list');
		$this->set(compact('hotelCategories', 'countries', 'zones'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Hotel->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Hotel->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('Hotel.' . $this->Hotel->primaryKey => $id));
			$this->request->data = $this->Hotel->find('first', $options);
		}
		$hotelCategories = $this->Hotel->HotelCategory->find('list');
		$countries = $this->Hotel->Country->find('list');
		$zones = $this->Hotel->Zone->find('list');
		$this->set(compact('hotelCategories', 'countries', 'zones'));
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
		$this->Hotel->id = $id;
		if (!$this->Hotel->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Hotel->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hotel')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hotel')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
