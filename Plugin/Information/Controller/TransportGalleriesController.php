<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * TransportGalleries Controller
 *
 * @property TransportGallery $TransportGallery
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TransportGalleriesController extends InformationAppController {

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
		$this->TransportGallery->recursive = 0;
		$this->set('transportGalleries', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TransportGallery->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport gallery')));
		}
		$options = array('conditions' => array('TransportGallery.' . $this->TransportGallery->primaryKey => $id));
		$this->set('transportGallery', $this->TransportGallery->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TransportGallery->create();
			if ($this->TransportGallery->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport gallery')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportGallery->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport gallery')), 'default', array('class' => 'error'));
			}
		}
		$transportRoutes = $this->TransportGallery->TransportRoute->find('list');
		$this->set(compact('transportRoutes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TransportGallery->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport gallery')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportGallery->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport gallery')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport gallery')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportGallery.' . $this->TransportGallery->primaryKey => $id));
			$this->request->data = $this->TransportGallery->find('first', $options);
		}
		$transportRoutes = $this->TransportGallery->TransportRoute->find('list');
		$this->set(compact('transportRoutes'));
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
		$this->TransportGallery->id = $id;
		if (!$this->TransportGallery->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport gallery')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportGallery->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport gallery')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport gallery')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->TransportGallery->recursive = 0;
		$this->set('transportGalleries', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->TransportGallery->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport gallery')));
		}
		$options = array('conditions' => array('TransportGallery.' . $this->TransportGallery->primaryKey => $id));
		$this->set('transportGallery', $this->TransportGallery->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TransportGallery->create();
			if ($this->TransportGallery->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport gallery')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->TransportGallery->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport gallery')), 'default', array('class' => 'error'));
			}
		}
		$transportRoutes = $this->TransportGallery->TransportRoute->find('list');
		$this->set(compact('transportRoutes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->TransportGallery->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport gallery')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TransportGallery->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'transport gallery')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'transport gallery')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('TransportGallery.' . $this->TransportGallery->primaryKey => $id));
			$this->request->data = $this->TransportGallery->find('first', $options);
		}
		$transportRoutes = $this->TransportGallery->TransportRoute->find('list');
		$this->set(compact('transportRoutes'));
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
		$this->TransportGallery->id = $id;
		if (!$this->TransportGallery->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'transport gallery')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TransportGallery->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Transport gallery')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Transport gallery')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
