<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * HotelImages Controller
 *
 * @property HotelImage $HotelImage
 * @property PaginatorComponent $Paginator
 */
class HotelImagesController extends LocationAppController {

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
		$this->HotelImage->recursive = 0;
		$this->set('hotelImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HotelImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel image')));
		}
		$options = array('conditions' => array('HotelImage.' . $this->HotelImage->primaryKey => $id));
		$this->set('hotelImage', $this->HotelImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HotelImage->create();
			if ($this->HotelImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel image')), 'default', array('class' => 'error'));
			}
		}
		$hotels = $this->HotelImage->Hotel->find('list');
		$this->set(compact('hotels'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->HotelImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelImage.' . $this->HotelImage->primaryKey => $id));
			$this->request->data = $this->HotelImage->find('first', $options);
		}
		$hotels = $this->HotelImage->Hotel->find('list');
		$this->set(compact('hotels'));
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
		$this->HotelImage->id = $id;
		if (!$this->HotelImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hotel image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hotel image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HotelImage->recursive = 0;
		$this->set('hotelImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HotelImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel image')));
		}
		$options = array('conditions' => array('HotelImage.' . $this->HotelImage->primaryKey => $id));
		$this->set('hotelImage', $this->HotelImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HotelImage->create();
			if ($this->HotelImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HotelImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel image')), 'default', array('class' => 'error'));
			}
		}
		$hotels = $this->HotelImage->Hotel->find('list');
		$this->set(compact('hotels'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->HotelImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HotelImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'hotel image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'hotel image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HotelImage.' . $this->HotelImage->primaryKey => $id));
			$this->request->data = $this->HotelImage->find('first', $options);
		}
		$hotels = $this->HotelImage->Hotel->find('list');
		$this->set(compact('hotels'));
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
		$this->HotelImage->id = $id;
		if (!$this->HotelImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'hotel image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HotelImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Hotel image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Hotel image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
