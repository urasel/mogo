<?php
App::uses('InformationAppController', 'Information.Controller');
/**
 * YellowPages Controller
 *
 * @property YellowPage $YellowPage
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class YellowPagesController extends InformationAppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->YellowPage->recursive = 0;
		$this->set('yellowPages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->YellowPage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'yellow page')));
		}
		$options = array('conditions' => array('YellowPage.' . $this->YellowPage->primaryKey => $id));
		$this->set('yellowPage', $this->YellowPage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->YellowPage->create();
			if ($this->YellowPage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'yellow page')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->YellowPage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'yellow page')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->YellowPage->Country->find('list');
		$points = $this->YellowPage->Point->find('list');
		$placeTypes = $this->YellowPage->PlaceType->find('list');
		$this->set(compact('countries', 'points', 'placeTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->YellowPage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'yellow page')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->YellowPage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'yellow page')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'yellow page')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('YellowPage.' . $this->YellowPage->primaryKey => $id));
			$this->request->data = $this->YellowPage->find('first', $options);
		}
		$countries = $this->YellowPage->Country->find('list');
		$points = $this->YellowPage->Point->find('list');
		$placeTypes = $this->YellowPage->PlaceType->find('list');
		$this->set(compact('countries', 'points', 'placeTypes'));
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
		$this->YellowPage->id = $id;
		if (!$this->YellowPage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'yellow page')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->YellowPage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Yellow page')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Yellow page')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->YellowPage->recursive = 0;
		$this->set('yellowPages', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->YellowPage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'yellow page')));
		}
		$options = array('conditions' => array('YellowPage.' . $this->YellowPage->primaryKey => $id));
		$this->set('yellowPage', $this->YellowPage->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->YellowPage->create();
			if ($this->YellowPage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'yellow page')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $this->YellowPage->id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'yellow page')), 'default', array('class' => 'error'));
			}
		}
		$countries = $this->YellowPage->Country->find('list');
		$points = $this->YellowPage->Point->find('list');
		$placeTypes = $this->YellowPage->PlaceType->find('list');
		$this->set(compact('countries', 'points', 'placeTypes'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->YellowPage->exists($id)) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'yellow page')));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->YellowPage->saveAssociated($this->request->data)) {
				$this->Session->setFlash(__d('croogo', '%s has been saved', __d('information', 'yellow page')), 'default', array('class' => 'success'));
				$redirectTo = array('action' => 'index');
				if (isset($this->request->data['apply'])) {
					$redirectTo = array('action' => 'edit', $id);
				}
				if (isset($this->request->data['save_and_new'])) {
					$redirectTo = array('action' => 'add');
				}
				return $this->redirect($redirectTo);
			} else {
				$this->Session->setFlash(__d('croogo', '%s could not be saved. Please, try again.', __d('information', 'yellow page')), 'default', array('class' => 'error'));
			}
		} else {
			$options = array('conditions' => array('YellowPage.' . $this->YellowPage->primaryKey => $id));
			$this->request->data = $this->YellowPage->find('first', $options);
		}
		$countries = $this->YellowPage->Country->find('list');
		$points = $this->YellowPage->Point->find('list');
		$placeTypes = $this->YellowPage->PlaceType->find('list');
		$this->set(compact('countries', 'points', 'placeTypes'));
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
		$this->YellowPage->id = $id;
		if (!$this->YellowPage->exists()) {
			throw new NotFoundException(__d('croogo', 'Invalid %s', __d('information', 'yellow page')));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->YellowPage->delete()) {
			$this->Session->setFlash(__d('croogo', '%s deleted', __d('information', 'Yellow page')), 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__d('croogo', '%s was not deleted', __d('information', 'Yellow page')), 'default', array('class' => 'error'));
		return $this->redirect(array('action' => 'index'));
	}
}
