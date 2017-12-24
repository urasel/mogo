<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * HomeCategories Controller
 *
 * @property HomeCategory $HomeCategory
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HomeCategoriesController extends InformationAppController {

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
		$this->HomeCategory->recursive = 0;
		$this->set('homeCategories', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->HomeCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home category')));
		}
		$options = array('conditions' => array('HomeCategory.' . $this->HomeCategory->primaryKey => $id));
		$this->set('homeCategory', $this->HomeCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->HomeCategory->create();
			if ($this->HomeCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HomeCategory->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home category')), 'default', array('class' => 'error'));
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
		if (!$this->HomeCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home category')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HomeCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home category')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HomeCategory.' . $this->HomeCategory->primaryKey => $id));
			$this->request->data = $this->HomeCategory->find('first', $options);
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
		$this->HomeCategory->id = $id;
		if (!$this->HomeCategory->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home category')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HomeCategory->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Home category')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Home category')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->HomeCategory->recursive = 0;
		$this->set('homeCategories', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->HomeCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home category')));
		}
		$options = array('conditions' => array('HomeCategory.' . $this->HomeCategory->primaryKey => $id));
		$this->set('homeCategory', $this->HomeCategory->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->HomeCategory->create();
			if ($this->HomeCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->HomeCategory->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home category')), 'default', array('class' => 'error'));
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
		if (!$this->HomeCategory->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home category')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->HomeCategory->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'home category')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'home category')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('HomeCategory.' . $this->HomeCategory->primaryKey => $id));
			$this->request->data = $this->HomeCategory->find('first', $options);
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
		$this->HomeCategory->id = $id;
		if (!$this->HomeCategory->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'home category')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->HomeCategory->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Home category')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Home category')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
