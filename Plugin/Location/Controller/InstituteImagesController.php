<?php
App::uses('LocationAppController', 'Location.Controller');
/**
 * InstituteImages Controller
 *
 * @property InstituteImage $InstituteImage
 * @property PaginatorComponent $Paginator
 */
class InstituteImagesController extends LocationAppController {

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
		$this->InstituteImage->recursive = 0;
		$this->set('instituteImages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InstituteImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'institute image')));
		}
		$options = array('conditions' => array('InstituteImage.' . $this->InstituteImage->primaryKey => $id));
		$this->set('instituteImage', $this->InstituteImage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InstituteImage->create();
			if ($this->InstituteImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'institute image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->InstituteImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'institute image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->InstituteImage->Point->find('list');
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
		if (!$this->InstituteImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'institute image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InstituteImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'institute image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'institute image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('InstituteImage.' . $this->InstituteImage->primaryKey => $id));
			$this->request->data = $this->InstituteImage->find('first', $options);
		}
		$points = $this->InstituteImage->Point->find('list');
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
		$this->InstituteImage->id = $id;
		if (!$this->InstituteImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'institute image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InstituteImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Institute image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Institute image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->InstituteImage->recursive = 0;
		$this->set('instituteImages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->InstituteImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'institute image')));
		}
		$options = array('conditions' => array('InstituteImage.' . $this->InstituteImage->primaryKey => $id));
		$this->set('instituteImage', $this->InstituteImage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->InstituteImage->create();
			if ($this->InstituteImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'institute image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->InstituteImage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'institute image')), 'default', array('class' => 'error'));
			}
		}
		$points = $this->InstituteImage->Point->find('list');
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
		if (!$this->InstituteImage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'institute image')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->InstituteImage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('location', 'institute image')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('location', 'institute image')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('InstituteImage.' . $this->InstituteImage->primaryKey => $id));
			$this->request->data = $this->InstituteImage->find('first', $options);
		}
		$points = $this->InstituteImage->Point->find('list');
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
		$this->InstituteImage->id = $id;
		if (!$this->InstituteImage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('location', 'institute image')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->InstituteImage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('location', 'Institute image')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('location', 'Institute image')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
