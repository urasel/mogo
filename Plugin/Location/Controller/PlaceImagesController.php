<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * PlaceImages Controller
 *
 * @property PlaceImage $PlaceImage
 * @property PaginatorComponent $Paginator
 */
class PlaceImagesController extends LocationAppController {

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
		$this->PlaceImage->recursive = 0;
		$this->set('placeImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PlaceImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place image')));
		}
		$options = array('conditions' => array('PlaceImage.' . $this->PlaceImage->primaryKey => $id));
		$this->set('placeImage', $this->PlaceImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PlaceImage->create();
			if ($this->PlaceImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->PlaceImage->Point->find('list');
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
		if (!$this->PlaceImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceImage.' . $this->PlaceImage->primaryKey => $id));
			$this->request->data = $this->PlaceImage->find('first', $options);
		}
		$points = $this->PlaceImage->Point->find('list');
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
		$this->PlaceImage->id = $id;
		if (!$this->PlaceImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Place image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Place image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PlaceImage->recursive = 0;
		$this->set('placeImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PlaceImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place image')));
		}
		$options = array('conditions' => array('PlaceImage.' . $this->PlaceImage->primaryKey => $id));
		$this->set('placeImage', $this->PlaceImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PlaceImage->create();
			if ($this->PlaceImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->PlaceImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->PlaceImage->Point->find('list');
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
		if (!$this->PlaceImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PlaceImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'place image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'place image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('PlaceImage.' . $this->PlaceImage->primaryKey => $id));
			$this->request->data = $this->PlaceImage->find('first', $options);
		}
		$points = $this->PlaceImage->Point->find('list');
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
		$this->PlaceImage->id = $id;
		if (!$this->PlaceImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'place image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PlaceImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Place image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Place image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
