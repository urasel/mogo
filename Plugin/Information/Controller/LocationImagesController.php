<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * LocationImages Controller
 *
 * @property LocationImage $LocationImage
 * @property PaginatorComponent $Paginator
 */
class LocationImagesController extends InformationAppController {

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
		$this->LocationImage->recursive = 0;
		$this->set('locationImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LocationImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location image')));
		}
		$options = array('conditions' => array('LocationImage.' . $this->LocationImage->primaryKey => $id));
		$this->set('locationImage', $this->LocationImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LocationImage->create();
			if ($this->LocationImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->LocationImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->LocationImage->Point->find('list');
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
		if (!$this->LocationImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LocationImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('LocationImage.' . $this->LocationImage->primaryKey => $id));
			$this->request->data = $this->LocationImage->find('first', $options);
		}
		$points = $this->LocationImage->Point->find('list');
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
		$this->LocationImage->id = $id;
		if (!$this->LocationImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LocationImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Location image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Location image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->LocationImage->recursive = 0;
		$this->set('locationImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->LocationImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location image')));
		}
		$options = array('conditions' => array('LocationImage.' . $this->LocationImage->primaryKey => $id));
		$this->set('locationImage', $this->LocationImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->LocationImage->create();
			if ($this->LocationImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->LocationImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->LocationImage->Point->find('list');
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
		if (!$this->LocationImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->LocationImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'location image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'location image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('LocationImage.' . $this->LocationImage->primaryKey => $id));
			$this->request->data = $this->LocationImage->find('first', $options);
		}
		$points = $this->LocationImage->Point->find('list');
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
		$this->LocationImage->id = $id;
		if (!$this->LocationImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'location image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LocationImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Location image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Location image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
