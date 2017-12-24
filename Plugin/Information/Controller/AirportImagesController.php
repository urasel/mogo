<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * AirportImages Controller
 *
 * @property AirportImage $AirportImage
 * @property PaginatorComponent $Paginator
 */
class AirportImagesController extends InformationAppController {

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
		$this->AirportImage->recursive = 0;
		$this->set('airportImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AirportImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport image')));
		}
		$options = array('conditions' => array('AirportImage.' . $this->AirportImage->primaryKey => $id));
		$this->set('airportImage', $this->AirportImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AirportImage->create();
			if ($this->AirportImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->AirportImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->AirportImage->Point->find('list');
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
		if (!$this->AirportImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AirportImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AirportImage.' . $this->AirportImage->primaryKey => $id));
			$this->request->data = $this->AirportImage->find('first', $options);
		}
		$points = $this->AirportImage->Point->find('list');
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
		$this->AirportImage->id = $id;
		if (!$this->AirportImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AirportImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Airport image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Airport image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->AirportImage->recursive = 0;
		$this->set('airportImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->AirportImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport image')));
		}
		$options = array('conditions' => array('AirportImage.' . $this->AirportImage->primaryKey => $id));
		$this->set('airportImage', $this->AirportImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AirportImage->create();
			if ($this->AirportImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->AirportImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->AirportImage->Point->find('list');
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
		if (!$this->AirportImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AirportImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'airport image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'airport image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('AirportImage.' . $this->AirportImage->primaryKey => $id));
			$this->request->data = $this->AirportImage->find('first', $options);
		}
		$points = $this->AirportImage->Point->find('list');
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
		$this->AirportImage->id = $id;
		if (!$this->AirportImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'airport image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AirportImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Airport image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Airport image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
